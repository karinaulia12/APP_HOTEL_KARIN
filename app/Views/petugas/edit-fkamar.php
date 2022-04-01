<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row">
        <div class="col justify-content-center">
            <h1 class="display-6"><i class="fa fa-pen text-primary" aria-hidden="true"></i> Edit Fasilitas Kamar</h1>
            <hr>
            <form action="/petugas/fkamar/update" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <div class="row">

                        <!-- <div class="row mt-3"> -->
                        <div class="col-6">
                            <label for="NoKamar" class="form-label">Fasilitas Kamar</label>
                            <input type="hidden" name="id_fkamar" value="<?= $data_fkamar[0]['id_fkamar']; ?>">
                            <input type="hidden" name="id_tk" value="<?= $data_fkamar[0]['id_type_kamar']; ?>">
                            <textarea class=" form-control <?= ($validasi->hasError('nama_fkamar')) ? 'is-invalid' : ''; ?>" name="nama_fkamar" id="" cols="30" rows="6"><?= $data_fkamar[0]['nama_fkamar']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validasi->getError('nama_fkamar'); ?>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="col">
                                <label for="" class="form-label">Tipe Kamar</label>
                                <select class=" form-select <?= ($validasi->hasError('no_kamar')) ? 'is-invalid' : ''; ?>" name="type_kamar" id="" value="">
                                    <?php foreach ($fkamar as $fk) : ?>
                                        <option <?= $fk['id_type_kamar'] == $data_fkamar[0]['id_type_kamar'] ? 'selected' : ''; ?> value="<?= $fk['id_type_kamar']; ?>"><?= $fk['type_kamar']; ?> - Rp <?= number_format($fk['harga'], 0, ',', '.'); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validasi->getError('no_kamar'); ?>
                                </div>
                            </div>

                            <div class="col mt-3">
                                <label for="" class="form-label">Stok Kamar</label>
                                <input type="number" name="stok_kamar" value="<?= $data_fkamar[0]['stok_kamar']; ?>" class="form-control" placeholder="Masukkan stok kamar">
                            </div>
                        </div>
                    </div>

                    <!-- </div> -->
                    <button type="submit" class="btn btn-primary my-3 justify-align-center">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>