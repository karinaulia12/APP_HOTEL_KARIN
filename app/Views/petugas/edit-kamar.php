<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row">
        <div class="col justify-content-center">
            <form action="/petugas/kamar/update" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6"><i class="fa fa-pencil text-primary" aria-hidden="true"></i> Edit Kamar</h1>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <label for="NoKamar" class="form-label">No. Kamar</label>
                            <input type="text" class="form-control" name="no_kamar" value="<?= $dataKamar[0]['no_kamar']; ?>" placeholder="Masukkan nomor kamar" readonly>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Tipe Kamar</label>
                            <select value="<?= old('type_kamar'); ?>" class=" form-select <?= ($validasi->hasError('type_kamar')) ? 'is-invalid' : ''; ?>" name="type_kamar">
                                <option <?= $dataKamar[0]['id_type_kamar'] == '1' ? 'selected' : ''; ?> value=1>Standard Room - Rp <?= number_format($data_typekamar[0]['harga'], '0', ',', '.'); ?></option>
                                <option <?= $dataKamar[0]['id_type_kamar'] == '2' ? 'selected' : ''; ?> value=2>Superior Room - Rp <?= number_format($data_typekamar[0]['harga'], '0', ',', '.'); ?></option>
                                <option <?= $dataKamar[0]['id_type_kamar'] == '3' ? 'selected' : ''; ?> value=3>Deluxe Room - Rp <?= number_format($data_typekamar[0]['harga'], '0', ',', '.'); ?></option>
                                <option <?= $dataKamar[0]['id_type_kamar'] == '4' ? 'selected' : ''; ?> value=4>Junior Suite Room - Rp <?= number_format($data_typekamar[0]['harga'], '0', ',', '.'); ?></option>
                                <option <?= $dataKamar[0]['id_type_kamar'] == '5' ? 'selected' : ''; ?> value=5>Suite Room - Rp <?= number_format($data_typekamar[0]['harga'], '0', ',', '.'); ?></option>
                                <option <?= $dataKamar[0]['id_type_kamar'] == '6' ? 'selected' : ''; ?> value=6>Presidential Room - Rp <?= number_format($data_typekamar[0]['harga'], '0', ',', '.'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="" class="form-label mt-3">Foto</label>
                            <input type="hidden" name="nama_foto" value="<?= ($dataKamar[0]['foto']) ? $dataKamar[0]['foto'] : '' ?>">
                            <input type="file" onchange="previewImage" class="form-control <?= ($validasi->hasError('foto')) ? 'is-invalid' : ''; ?>" value="<?= old('foto'); ?>" name="foto" value="" placeholder="">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('foto'); ?>
                            </div>
                            <div class="col-sm-4">
                                <?php if (!empty($dataKamar[0]['foto'])) { ?>
                                    <img src="/gambar/<?= $dataKamar[0]['foto']; ?>" alt="<?= $dataKamar[0]['foto']; ?>" class="img-thumbnail mt-1 img-preview" onchange="previewImage">
                                <?php } else { ?>
                                    <img src="/gambar/noimage.jpg" onchange="previewImage" alt="" class="img-thumbnail mt-1 img-preview">
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <label for="" class="form-label">Harga</label>
                            <div class="input-group ">
                                <span class="input-group-text" id="basic-addon1">Rp. </span>
                                <input type="text" class="form-control <?= ($validasi->hasError('harga')) ? 'is-invalid' : ''; ?>" value="<?= number_format($data_typekamar[0]['harga'], '0', ',', '.'); ?>" name="harga" placeholder="Masukkan harga kamar" readonly><br>
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('harga'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 mt-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control" value="<?= old('deskripsi'); ?>" id="exampleFormControlTextarea1" rows="3" placeholder="Tambahkan deskripsi" name="deskripsi"><?= $dataKamar[0]['deskripsi']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>