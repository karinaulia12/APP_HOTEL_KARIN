<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row">
        <div class="col justify-content-center">
            <form action="/petugas/tkamar/add" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6"><i class="fa fa-plus text-primary" aria-hidden="true"></i> Tambah Tipe Kamar</h1>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <label for="NoKamar" class="form-label">Nama Tipe Kamar</label>
                            <!-- <input type="text" name="id_type_kamar" value=""> -->
                            <input type="text" class="form-control <?= ($validasi->hasError('type_kamar')) ? 'is-invalid' : ''; ?>" name="type_kamar" id="" placeholder="Masukkan nama tipe kamar" value="<?= old('type_kamar'); ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('type_kamar'); ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="" class="form-label">Harga</label>
                            <div class="input-group ">
                                <span class="input-group-text" id="basic-addon1">Rp. </span>
                                <input type="text" class="form-control <?= ($validasi->hasError('harga')) ? 'is-invalid' : ''; ?>" value="<?= old('harga'); ?>" name="harga" id="" placeholder="Masukkan harga kamar"><br>
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('harga'); ?>
                                </div>
                            </div>
                        </div>

                        <!-- </div> -->
                        <div class="col-6">
                            <label for="" class="form-label mt-3">Foto</label>
                            <input type="file" class="form-control <?= ($validasi->hasError('foto')) ? 'is-invalid' : ''; ?>" value="<?= old('foto'); ?>" name="foto" id="" placeholder="">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('foto'); ?>
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Fasilitas Kamar</label>
                            <textarea class="form-control" value="<?= old('nama_fkamar'); ?>" id="exampleFormControlTextarea1" rows="3" placeholder="Tambahkan fasilitas kamar" name="nama_fkamar"></textarea>
                        </div>

                        <div class="col-8 mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" value="<?= old('deskripsi'); ?>" id="exampleFormControlTextarea1" rows="3" placeholder="Tambahkan deskripsi tipe kamar" name="deskripsi"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>