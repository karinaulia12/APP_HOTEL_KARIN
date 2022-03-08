<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row">
        <div class="col justify-content-center">
            <form action="/petugas/fumum/update" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6"><i class="fa fa-pen text-primary" aria-hidden="true"></i> Edit Fasilitas Hotel</h1>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <label for="NoKamar" class="form-label">Fasilitas Hotel</label>
                            <textarea class="form-control <?= ($validasi->hasError('nama_fumum')) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="4" placeholder="Tambahkan fasilitas hotel" name="nama_fumum"><?= $data_fumum[0]['nama_fumum']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validasi->getError('nama_fumum'); ?>
                            </div>
                        </div>
                        <!-- </div> -->

                        <div class="col">
                            <label for="" class="form-label">Foto</label>
                            <input type="file" class="form-control <?= ($validasi->hasError('foto')) ? 'is-invalid' : ''; ?>" name="foto" id="" placeholder="" value="<?= $data_fumum[0]['foto']; ?>">
                            <div class="col-4">
                                <img src="/gambar/<?= $data_fumum[0]['foto']; ?>" alt="" class="img-thumbnail mt-1 img-preview">
                            </div>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validasi->getError('foto'); ?>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control <?= ($validasi->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="4" placeholder="Tambahkan deskripsi" name="deskripsi"><?= $data_fumum[0]['deskripsi']; ?></textarea>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validasi->getError('deskripsi'); ?>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary my-3">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>