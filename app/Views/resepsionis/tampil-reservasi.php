<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h1 class="fw-lighter display-6"> Data Reservasi</h1>
        </div>
    </div>
    <div class="row">
        <hr>
        <div class="col">
            <div class="row justify-content-end">
                <div class="col-4">
                    <form action="" method="get">
                        <div class="input-group my-2">
                            <input type="date" class="form-control" value="<?= $keyword ? $keyword : null; ?>" name="keyword">
                            <button class="btn btn-outline-primary" type="submit">Check-In</button>
                        </div>
                    </form>
                </div>
                <div class="col-4">
                    <form action="" method="get">
                        <div class="input-group my-2">
                            <input type="text" class="form-control" value="<?= $keyword ? $keyword : null; ?>" placeholder="Cari nama tamu..." name="keyword">
                            <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <?php if (session()->getFlashdata('update_rsv')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong><?= session()->getFlashdata('update_rsv'); ?></strong>
                </div>

                <script>
                    var alertList = document.querySelectorAll('.alert');
                    alertList.forEach(function(alert) {
                        new bootstrap.Alert(alert)
                    })
                </script>

            <?php endif; ?>
            <?php if (!$reservasi) { ?>
                <div class="row justify-content-center mt-3">
                    <div class="col">
                        <div class="alert alert-danger" role="alert">
                            <h4>Data reservasi tidak ditemukan!</h4>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <table class="table table-bordered my-2 table-hover table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Nama Tamu</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Tipe Kamar</th>
                            <th width="50px">Jumlah Kamar</th>
                            <!-- <th>Nama Pemesan</th> -->
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($reservasi as $row) : ?>
                            <tr class="text-center">
                                <td><?= $no++; ?></td>
                                <td>
                                    <span class="badge bg-info"><?= $row['nama_tamu']; ?></span>
                                </td>
                                <td><?= date('d-m-Y', strtotime($row['checkin'])); ?></td>
                                <td><?= date('d-m-Y', strtotime($row['checkout'])); ?></td>
                                <td><?= $row['type_kamar']; ?></td>
                                <td><?= $row['jml_kamar']; ?></td>
                                <!-- <td><?= $row['nama_pemesan']; ?></td> -->
                                <td>Rp <?= number_format($row['total'], '0', ',', '.'); ?></td>
                                <td><?php if ($row['status'] == '1') { ?>
                                        <!-- pending -->
                                        <span class="badge bg-warning">
                                            Pending
                                        </span>

                                    <?php } elseif ($row['status'] == '2') { ?>
                                        <!-- checkin -->
                                        <span class="badge bg-primary">
                                            Check-In
                                        </span>

                                    <?php } elseif ($row['status'] == '3') { ?>
                                        <!-- checkout -->
                                        <span class="badge bg-success">
                                            Check-Out
                                        </span>

                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <!-- <div class="btn-group" role="group"> -->
                                    <a href="/resepsionis/reservasi/detail/<?= $row['id_reservasi']; ?>" title="Detail" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                                    <a href="/resepsionis/reservasi/edit/<?= $row['id_reservasi']; ?>" title="Edit" class="btn btn-warning"><i class="fa fa-pen" aria-hidden="true"></i></a>
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Status
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                        <a class="dropdown-item <?= $row['status'] == 1 ? 'disabled' : ''; ?> " href="/resepsionis/reservasi/pending/<?= $row['id_reservasi']; ?>">Pending</a>
                                        <a class="dropdown-item <?= $row['status'] == 2 ? 'disabled' : ''; ?> " href="/resepsionis/reservasi/checkin/<?= $row['id_reservasi']; ?>">Check-in</a>
                                        <a class="dropdown-item <?= $row['status'] == 3 ? 'disabled' : ''; ?> " href="/resepsionis/reservasi/checkout/<?= $row['id_reservasi']; ?>">Check-out</a>
                                        <a class="dropdown-item <?= $row['status'] != 1 ? 'disabled' : ''; ?> " href="/resepsionis/reservasi/batal/<?= $row['id_reservasi']; ?>" onclick="return confirm('Apakah Anda yakin akan dibatalkan?')">Batal</a>
                                    </div>
                                    <a class="btn btn-danger my-1 <?= $row['status'] == 1 ? 'disabled' : ''; ?>" href="/reservasi/pdf/<?= $row['id_reservasi']; ?>"><i class="fa-solid fa-file-pdf"></i></a>
                                    <!-- </div> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>