<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row">
        <div class="col justify-content-center">
            <form action="/petugas/kamar/add" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6"><i class="fa fa-plus text-primary" aria-hidden="true"></i> Tambah Kamar</h1>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <label for="NoKamar" class="form-label">No. Kamar</label>
                            <input type="text" class="form-control <?= ($validasi->hasError('no_kamar')) ? 'is-invalid' : ''; ?>" name="no_kamar" id="" placeholder="Masukkan nomor kamar" value="<?= old('no_kamar'); ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('no_kamar'); ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="" class="form-label">Tipe Kamar</label>
                            <select class=" form-select <?= ($validasi->hasError('type_kamar')) ? 'is-invalid' : ''; ?>" name="type_kamar" id="">
                                <option selected>Pilih tipe kamar</option>
                                <option value="Superior">Superior</option>
                                <option value="Deluxe">Deluxe</option>
                            </select>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validasi->getError('type_kamar'); ?>
                            </div>
                        </div>
                        <!-- </div> -->
                        <div class="col-6">
                            <label for="" class="form-label mt-3">Foto</label>
                            <input type="file" onChange="previewImage" class="form-control <?= ($validasi->hasError('foto')) ? 'is-invalid' : ''; ?>" name="foto" id="" placeholder="">
                            <div class="col-sm-4">
                                <img src="/gambar/noimage.jpg" onChange="previewImage" alt="" class="img-thumbnail mt-1 img-preview">
                            </div>
                        </div>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validasi->getError('foto'); ?>
                        </div>

                        <div class="col-6 mt-3">
                            <label for="" class="form-label">Harga</label>
                            <input type="text" class="form-control <?= ($validasi->hasError('harga')) ? 'is-invalid' : ''; ?>" name="harga" id="" placeholder="Masukkan harga kamar">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validasi->getError('harga'); ?>
                            </div>
                        </div>

                        <div class="col-8 mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tambahkan deskripsi" name="deskripsi"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>