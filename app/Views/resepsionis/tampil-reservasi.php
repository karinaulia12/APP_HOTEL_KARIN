<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8">
            <h1 class="fw-lighter display-6"> Data Reservasi</h1>
        </div>
        <div class="col-4">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" value="<?= $keyword ? $keyword : ''; ?>" placeholder="Cari Reservasi..." name="keyword">
                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <hr>
            <!-- <a href="/resepsionis/reservasi/tambah" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Reservasi</a> -->
            <?php if (session()->getFlashdata('tambah_fumum')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('tambah_fumum'); ?>
                </div>

            <?php endif; ?>
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
                            <td><?= $row['status']; ?></td>
                            <td class="text-center">
                                <!-- <a href="/petugas/fumum/edit/<?= $row['id_reservasi']; ?>" class="btn btn-warning btn-sm mx-1 my-1">Edit</a> -->
                                <div class="btn-group" role="group">
                                    <a href="/resepsionis/reservasi/detail/<?= $row['id_reservasi']; ?>" title="Detail" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                                    <!-- <div class="dropdown"> -->
                                    <button class="btn btn-warning dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Status
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="#">Check-in</a>
                                        <a class="dropdown-item" href="#">Check-out</a>
                                        <a class="dropdown-item" href="#">Terima</a>
                                        <a class="dropdown-item" href="#">Tolak</a>
                                        <a class="dropdown-item" href="#">Hapus</a>
                                    </div>
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