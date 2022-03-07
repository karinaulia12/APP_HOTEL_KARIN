<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row">
        <div class="col justify-content-center">
            <form action="/petugas/kamar/update" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6"><i class="fa fa-pen text-primary" aria-hidden="true"></i> Edit Kamar</h1>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <input type="hidden" name="id_kamar" value="<?= $dataKamar[0]['id_kamar']; ?>">
                            <label for="NoKamar" class="form-label">No. Kamar</label>
                            <input type="text" class="form-control" name="no_kamar" id="" placeholder="Masukkan nomor kamar" value="<?= $dataKamar[0]['no_kamar']; ?>" readonly>
                        </div>
                        <!-- </div> -->

                        <!-- <div class="row"> -->
                        <div class="col-6">
                            <label for="" class="form-label">Tipe Kamar</label>
                            <select class="form-select <?= ($validasi->hasError('type_kamar')) ? 'is-invalid' : ''; ?>" name="type_kamar" id="">
                                <!-- <option value="">Pilih tipe kamar</option> -->
                                <option <?= $dataKamar[0]['type_kamar'] == 'superior' ? 'selected' : ''; ?> value="superior">Superior</option>
                                <option <?= $dataKamar[0]['type_kamar'] == 'deluxe' ? 'selected' : ''; ?> value="deluxe">Deluxe</option>
                            </select>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validasi->getError('type_kamar'); ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="" class="form-label mt-3">Harga</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1">Rp. </span>
                                <input type="text" class="form-control <?= ($validasi->hasError('harga')) ? 'is-invalid' : ''; ?>" name="harga" id="" placeholder="Masukkan harga kamar" value="<?= old('harga'); ?>">
                            </div>
                            <div class="invalid-feedback">
                                <?= $validasi->getError('harga'); ?>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" value="<?= $dataKamar[0]['deskripsi']; ?>" placeholder="Tambahkan deskripsi" name="deskripsi"></textarea>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary my-3">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>