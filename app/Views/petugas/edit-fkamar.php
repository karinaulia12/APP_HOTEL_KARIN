<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row">
        <div class="col justify-content-center">
            <h1 class="display-6"><i class="fa fa-plus text-primary" aria-hidden="true"></i> Edit Fasilitas Kamar</h1>
            <hr>
            <form action="/petugas/fkamar/update" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-5">
                            <label for="" class="form-label">Tipe Kamar</label>
                            <select class=" form-select <?= ($validasi->hasError('no_kamar')) ? 'is-invalid' : ''; ?>" name="type_kamar" id="" value="">
                                <option <?= $data_fkamar[0]['type_kamar'] == 'superior' ? 'selected' : ''; ?> value="superior">Superior</option>
                                <option <?= $data_fkamar[0]['type_kamar'] == 'deluxe' ? 'selected' : ''; ?> value="deluxe">Deluxe</option>
                            </select>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validasi->getError('no_kamar'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="NoKamar" class="form-label">Fasilitas Kamar</label>
                            <input type="hidden" name="id_fkamar" value="<?= $data_fkamar[0]['id_fkamar']; ?>">
                            <input class=" form-control <?= ($validasi->hasError('nama_fkamar')) ? 'is-invalid' : ''; ?>" name="nama_fkamar" id="" cols="30" rows="10" value="<?= $data_fkamar[0]['nama_fkamar']; ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('nama_fkamar'); ?>
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