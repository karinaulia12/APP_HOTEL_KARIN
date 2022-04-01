<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1 class="display-6"> <i class="fa fa-check text-primary" aria-hidden="true"></i> Detail Kamar</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="/gambar/<?= $dataKamar[0]['foto']; ?>" class="img-fluid rounded-start" alt="<?= $dataKamar[0]['foto']; ?>">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title display-6 text-center"><?= $dataKamar[0]['no_kamar']; ?></h5>
                            <hr>
                            <div class="row">
                                <p class="card-text col-6">Tipe Kamar : <strong><?= $data_typeKamar[0]['type_kamar']; ?></strong></p>
                                <p class="card-text col-6">Harga : Rp <?= number_format($data_typeKamar[0]['harga'], 0, ',', '.'); ?></p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card mt-3">
                                        <h5 class="card-header text-center">
                                            Deskripsi Kamar
                                        </h5>
                                        <div class="card-body">
                                            <p class="card-text"><?= $dataKamar[0]['deskripsi']; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="card mt-3">
                                        <h5 class="card-header">
                                            Fasilitas Kamar
                                        </h5>
                                        <div class="card-body">
                                            <p class="card-text"><?= $nama_fasilitas[0]['nama_fkamar']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-4 text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/petugas/kamar/edit/<?= $dataKamar[0]['id_kamar']; ?>" class="btn btn-warning"><i class="fa fa-pen" aria-hidden="true"></i> Edit</a>
                                        <!-- <a href="/petugas/kamar/edit-foto/<?= $dataKamar[0]['id_kamar']; ?>" class="btn btn-primary"><i class="fa fa-pen" aria-hidden="true"></i> Foto</a> -->
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modelHapus" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

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
                                    <a href="/petugas/kamar/hapus/<?= $dataKamar[0]['id_kamar']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>