<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8">
            <h1 class="fw-lighter display-6"> Data Tamu</h1>
        </div>
        <div class="col-4">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" value="<?= $keyword ? $keyword : ''; ?>" placeholder="Cari Data Tamu..." name="keyword">
                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <hr>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <!-- <th>Nama</th> -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data_tamu as $row) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['nik']; ?></td>
                            <td><?= $row['nama_tamu']; ?></td>
                            <td><?= $row['no_telp']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td class="text-center">
                                <a href="/petugas/fumum/edit/<?= $row['nik']; ?>" class="btn btn-warning btn-sm mx-1 my-1">Edit</a>
                                <a href="/petugas/fumum/hapus/<?= $row['nik']; ?>" class="btn btn-danger  btn-sm mx-1 my-1">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>