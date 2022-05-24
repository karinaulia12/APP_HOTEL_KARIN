<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row">
        <div class="col justify-content-center">
            <form action="/petugas/tkamar/update" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6"><i class="fa fa-pen text-primary" aria-hidden="true"></i> Edit Tipe Kamar</h1>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <label for="NoKamar" class="form-label">Nama Tipe Kamar</label>
                            <input type="hidden" name="id_type_kamar" value="<?= $data_tk[0]['id_type_kamar']; ?>">
                            <input type="text" class="form-control <?= ($validasi->hasError('type_kamar')) ? 'is-invalid' : ''; ?>" name="type_kamar" id="" placeholder="Masukkan nama tipe kamar" value="<?= $data_tk[0]['type_kamar']; ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('type_kamar'); ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="" class="form-label">Harga</label>
                            <div class="input-group ">
                                <span class="input-group-text" id="basic-addon1">Rp. </span>
                                <input type="text" class="form-control <?= ($validasi->hasError('harga')) ? 'is-invalid' : ''; ?>" value="<?= $data_tk[0]['harga'] ?>" name="harga" id="" placeholder="Masukkan harga kamar"><br>
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('harga'); ?>
                                </div>
                            </div>
                        </div>

                        <!-- </div> -->
                        <div class="col-6">
                            <label for="" class="form-label mt-3">Foto</label>
                            <input type="file" class="form-control <?= ($validasi->hasError('foto')) ? 'is-invalid' : ''; ?>" name="foto" id="" placeholder="">
                            <input type="hidden" value="<?= $data_tk[0]['foto'] ?>" name="nama_foto">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('foto'); ?>
                            </div>
                            <div class="col-sm-4">
                                <?php if (!empty($data_tk[0]['foto'])) { ?>
                                    <img src="/gambar/<?= $data_tk[0]['foto']; ?>" class="img-thumbnail mt-1 img-preview">
                                <?php } else { ?>
                                    <img src="/gambar/noimage.jpg" alt="" class="img-thumbnail mt-1 img-preview">
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Fasilitas Kamar</label>
                            <input type="hidden" name="id_fkamar" value="<?= $data_tk[0]['id_fkamar']; ?>">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tambahkan fasilitas kamar" name="nama_fkamar"><?= $data_tk[0]['nama_fkamar'] ?></textarea>
                        </div>

                        <div class="col-8 mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tambahkan deskripsi tipe kamar" name="deskripsi"><?= $data_tk[0]['deskripsi'] ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>