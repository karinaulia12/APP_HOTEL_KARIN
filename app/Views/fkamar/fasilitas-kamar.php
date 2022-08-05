<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8">
            <h1 class="fw-lighter display-6"> Fasilitas Kamar</h1>
        </div>
        <div class="col-4">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" value="<?= $keyword ? $keyword : ''; ?>" placeholder="Cari Fasilitas Kamar..." name="keyword">
                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <hr>
            <a href="/petugas/fkamar/tambah" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Fasilitas Kamar</a>
            <?php if (session()->getFlashdata('tambahFkamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('tambahFkamar'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('edit_fkamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('edit_fkamar'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('hapus_fkamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('hapus_fkamar'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Tipe Kamar</th>
                        <th>Nama Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- data asli fkamar  -->
                    <?php $no = 1;
                    foreach ($fkamar as $row) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm rounded-pill text-white" href="/petugas/fkamar/detail/<?= $row['id_fkamar']; ?>">
                                    <?= $row['type_kamar']; ?>
                                </a>
                            </td>
                            <td><?= $row['nama_fkamar']; ?></td>
                            <td class="text-center">
                                <a href="/petugas/fkamar/edit/<?= $row['id_fkamar']; ?>" class="btn btn-warning btn-sm mx-1 my-1">Edit</a>
                                <a href="/petugas/fkamar/hapus/<?= $row['id_fkamar']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin menghapusnya?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?= $this->endSection(); ?>