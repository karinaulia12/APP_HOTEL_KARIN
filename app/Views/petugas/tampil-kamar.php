<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container-sm">
    <div class="row ">
        <div class="col">
            <h1 class="fw-lighter display-6"> Data Kamar</h1>
            <hr>
            <a href="/petugas/kamar/tambah" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Kamar</a>

            <?php if (session()->getFlashdata('tambahKamar')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="fw-light">Data Kamar <?= session()->get('no_kamar'); ?> berhasil ditambahkan</div>
                </div>
            <?php } ?>
            <?php if (session()->getFlashdata('hapusKamar')) { ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="fw-light"><?= session()->getFlashdata('hapusKamar'); ?></div>
                </div>
            <?php } ?>
            <?php if (session()->getFlashdata('editKamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="fw-light"><?= session()->getFlashdata('editKamar'); ?></div>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('editFotoKamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="fw-light"><?= session()->getFlashdata('editFotoKamar'); ?></div>
                </div>
            <?php endif; ?>
            <div class="row">
                <?php $no = 1;
                foreach ($dataKamar as $kamar) : ?>
                    <div class="col-sm-4">
                        <div class="card mb-4" style="width: 18rem;">
                            <img src="/gambar/<?= $kamar['foto']; ?>" class="card-img-top" alt="Kamar">
                            <div class="card-body">
                                <h5 class="card-title text-center fs-3 fw-bold"><?= $kamar['no_kamar']; ?></h5>
                                <p class="card-text fs-5 fw-lighter">Tipe Kamar: <strong><?= $kamar['type_kamar']; ?></strong></p>
                                <p class="card-text fs-5 fw-lighter">Harga: <strong>Rp. <?= $kamar['harga']; ?></strong></p>
                                <div class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/petugas/kamar/detail/<?= $kamar['id_kamar']; ?>" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                                        <a href="/petugas/kamar/edit/<?= $kamar['id_kamar']; ?>" class="btn btn-warning"><i class="fa fa-pen" aria-hidden="true"></i></a>
                                        <a href="/petugas/kamar/edit-foto/<?= $kamar['id_kamar']; ?>" class="btn btn-primary"><i class="fa fa-pen" aria-hidden="true"></i> Foto</a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modelHapus" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Modal Logout -->
                <div class="modal fade" id="modelHapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Hapus Data Kamar <?= $dataKamar[0]['no_kamar']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin akan menghapusnya?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                <a href="/petugas/kamar/hapus/<?= $kamar['id_kamar']; ?>" type="button" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>