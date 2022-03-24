<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8">
            <h1 class="fw-lighter display-6"> Data Reservasi</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <hr>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nama Tamu</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>No Kamar</th>
                        <th>Jumlah Kamar</th>
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
                            <td><?= $row['nama_tamu']; ?></td>
                            <td><?= $row['checkin']; ?></td>
                            <td><?= $row['checkout']; ?></td>
                            <td><?= $row['no_kamar']; ?></td>
                            <td><?= $row['jml_kamar']; ?></td>
                            <td><?= $row['total']; ?></td>
                            <td><?php if ($row['status_txt'] == 'Pending') { ?>
                                    <!-- pending -->
                                    <span class="badge bg-warning">
                                        <?= $row['status_txt']; ?>
                                    </span>
                                <?php } elseif ($row['status_txt'] == 'Check-In') { ?>
                                    <!-- checkin -->
                                    <span class="badge bg-primary">
                                        <?= $row['status_txt']; ?>
                                    </span>
                                <?php } elseif ($row['status_txt'] == 'Check-Out') { ?>
                                    <!-- checkout -->
                                    <span class="badge bg-success">
                                        <?= $row['status_txt']; ?>
                                    </span>
                                <?php } elseif ($row['status_txt'] == 'Terima') { ?>
                                    <!-- terima -->
                                    <span class="badge bg-info">
                                        <?= $row['status_txt']; ?>
                                    </span>
                                <?php } elseif ($row['status_txt'] == 'Tolak') { ?>
                                    <!-- tolak -->
                                    <span class="badge bg-danger">
                                        <?= $row['status_txt']; ?>
                                    </span>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <!-- <a href="/petugas/fumum/edit/<?= $row['id_reservasi']; ?>" class="btn btn-warning btn-sm mx-1 my-1">Edit</a> -->
                                <div class="btn-group" role="group">
                                    <a href="/resepsionis/reservasi/detail/<?= $row['id_reservasi']; ?>" title="Detail" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                                    <!-- <div class="dropdown"> -->
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Status
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="/resepsionis/reservasi/checkin/<?= $row['id_reservasi']; ?>">Check-in</a>
                                        <a class="dropdown-item" href="/resepsionis/reservasi/checkout/<?= $row['id_reservasi']; ?>">Check-out</a>
                                        <a class="dropdown-item" href="/resepsionis/reservasi/terima/<?= $row['id_reservasi']; ?>">Terima</a>
                                        <a class="dropdown-item" href="/resepsionis/reservasi/tolak/<?= $row['id_reservasi']; ?>">Tolak</a>
                                    </div>
                                    <a class="btn btn-danger" href="/resepsionis/reservasi/hapus/<?= $row['id_reservasi']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <!-- </div> -->
                                    <!-- <a href="/petugas/fumum/hapus/<?= $row['id_reservasi']; ?>" title="Hapus" class="btn btn-danger  btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>