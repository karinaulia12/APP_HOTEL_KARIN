<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col justify-content-center">
            <form action="/petugas/fumum/add" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6"><i class="fa fa-plus text-primary" aria-hidden="true"></i> Tambah Fasilitas Hotel</h1>
                    <hr>
                    <!-- <div class="row"> -->
                    <div class="col-8">
                        <label for="NoKamar" class="form-label">Nama Fasilitas</label>
                        <input type="text" class="form-control <?= ($validasi->hasError('nama_fumum')) ? 'is-invalid' : ''; ?>" name="nama_fumum" id="" placeholder="Masukkan nomor kamar" value="<?= old('nama_fumum'); ?>">
                        <div class="invalid-feedback">
                            <?= $validasi->getError('nama_fumum'); ?>
                        </div>
                    </div>

                    <div class="col-8">
                        <label for="" class="form-label mt-3">Foto</label>
                        <input type="file" onChange="previewImage" class="form-control <?= ($validasi->hasError('foto')) ? 'is-invalid' : ''; ?>" name="foto" id="" placeholder="">
                        <div class="col-sm-4">
                            <img src="/gambar/noimage.jpg" onChange="previewImage" alt="" class="img-thumbnail mt-1 img-preview">
                        </div>
                    </div>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validasi->getError('foto'); ?>
                    </div>

                    <div class="col mt-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control <?= ($validasi->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="3" placeholder="Tambahkan deskripsi" name="deskripsi"></textarea>
                    </div>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validasi->getError('deskripsi'); ?>
                    </div>
                    <!-- </div> -->
                    <button type="submit" class="btn btn-primary my-3">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>