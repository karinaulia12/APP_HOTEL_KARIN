<?= $this->extend('argon/argon-dsb') ?>
<?= $this->section('content') ?>

<div class="container-sm">
    <!-- <div class="row">
        <div class="col-8">
            <h1 class="fw-lighter display-6"> <i class="fa fa-bed text-primary" aria-hidden="true"></i> Data Kamar</h1>
        </div>
        <div class="col-4">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="<?= $keyword ? $keyword : ''; ?>" placeholder="Cari Kamar..." name="keyword">
                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </div> -->
    <div class="row ">
        <div class="col">
            <hr>
            <!-- <a href="/petugas/kamar/tambah" class="btn btn-light mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Kamar</a> -->
            <button class="btn btn-light mb-3" data-bs-toggle="modal" data-bs-target="#kamarTambah"><i class="fa fa-plus" aria-hidden="true"></i> Kamar</button>
    

            <?php if (session()->getFlashdata('tambahKamar')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="fw-light">Data Kamar <strong><?= session()->get('no_kamar'); ?></strong> berhasil ditambahkan</div>
                </div>
            <?php } ?>
            <?php if (session()->getFlashdata('hapusKamar')) { ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="fw-light"><strong><?= session()->getFlashdata('hapusKamar'); ?></strong></div>
                </div>
            <?php } ?>
            <?php if (session()->getFlashdata('editKamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="fw-light"><strong><?= session()->getFlashdata('editKamar'); ?></strong></div>
                </div>
            <?php endif; ?>
            <div class="row">
                <?php if (!$kamar) : ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Data Kamar tidak ditemukan!</strong>
                    </div>
                <?php endif; ?>
                <?php foreach ($kamar as $row) : ?>
                    <div class="col-lg-3 col-sm-12 mx-4">
                        <div class="card mb-4" style="width: 18rem;">
                            <img src="/gambar/<?= $row['foto']; ?>" class="card-img-top" alt="<?= $row['foto']; ?>">
                            <div class="card-body">
                                <h5 class="card-title text-center fs-3 fw-bold"><?= $row['no_kamar']; ?></h5>
                                <p class="card-text fs-5 fw-lighter text-capitalize">
                                    Tipe: <span class="badge bg-primary"><?= $row['type_kamar']; ?></span><br>
                                    Harga: <span class="badge bg-success">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></span>
                                </p>
                                <div class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/petugas/kamar/detail/<?= $row['id_kamar']; ?>" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                                        <a href="/petugas/kamar/edit/<?= $row['id_kamar']; ?>" class="btn btn-warning"><i class="fa fa-pen" aria-hidden="true"></i></a>
                                        <a href="/petugas/kamar/hapus/<?= $row['id_kamar']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapusnya?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>
<?= $this->include('kamar/modal-tambah'); ?>
<?= $this->endSection(); ?>