<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8">
            <h1 class="fw-lighter display-6"> Tipe Kamar</h1>
        </div>
        <div class="col-4">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" value="<?= $keyword ? $keyword : ''; ?>" placeholder="Cari Tipe Kamar..." name="keyword">
                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <hr>
            <a href="/petugas/tkamar/tambah" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Tipe Kamar</a>
            <?php if (session()->getFlashdata('tambahFkamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('tambah_tkamar'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('edit_tkamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('edit_tkamar'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('hapus_tkamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('hapus_tkamar'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Tipe Kamar</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Nama Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- data asli fkamar  -->
                    <?php $no = 1;
                    foreach ($fkamar as $row) : ?>
                        <tr class="text-center">
                            <td><?= $no++; ?></td>
                            <td>
                                <span class="badge bg-info">
                                    <?= $row['type_kamar']; ?>
                                </span>
                            </td>
                            <td>Rp <?= number_format($row['harga'], '0', ',', '.'); ?></td>
                            <td><img src="/gambar/<?= $row['foto']; ?>" width="300px"></td>
                            <td><?= $row['nama_fkamar']; ?></td>
                            <td>
                                <a href="/petugas/tkamar/edit/<?= $row['id_type_kamar']; ?>" class="btn btn-warning btn-sm mx-1 my-1">Edit</a>
                                <a href="/petugas/tkamar/hapus/<?= $row['id_type_kamar']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin akan menghapusnya?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?= $this->endSection(); ?>