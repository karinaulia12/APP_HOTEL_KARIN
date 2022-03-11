<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col-8">
            <h1 class="fw-lighter display-6"> Fasilitas Hotel</h1>
        </div>
        <div class="col-4">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" value="<?= $keyword ? $keyword : ''; ?>" placeholder="Cari Fasilitas Hotel..." name="keyword">
                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <hr>
            <a href="/petugas/fumum/tambah" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Fasilitas Hotel</a>
            <?php if (session()->getFlashdata('tambah_fumum')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong><?= session()->getFlashdata('tambah_fumum'); ?></strong>
                </div>

            <?php endif; ?>
            <?php if (!$data_fumum) { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Data fasilitas hotel tidak ditemukan!</strong>
                </div>

            <?php } else { ?>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Fasilitas Hotel</th>
                            <th>Foto</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_fumum as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $row['nama_fumum']; ?></td>
                                <td>
                                    <img width="300px" src="/gambar/<?= $row['foto']; ?>" alt="">
                                </td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td class="text-center">
                                    <a href="/petugas/fumum/edit/<?= $row['id_fumum']; ?>" class="btn btn-warning btn-sm mx-1 my-1">Edit</a>
                                    <a href="/petugas/fumum/hapus/<?= $row['id_fumum']; ?>" class="btn btn-danger  btn-sm mx-1 my-1">Hapus</a>
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