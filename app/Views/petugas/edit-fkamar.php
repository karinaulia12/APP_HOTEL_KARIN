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
                            <textarea class=" form-control <?= ($validasi->hasError('nama_fkamar')) ? 'is-invalid' : ''; ?>" name="nama_fkamar" id="" cols="30" rows="10"><?= $data_fkamar[0]['nama_fkamar']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validasi->getError('nama_fkamar'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Tipe Kamar</label>
                            <select class=" form-select <?= ($validasi->hasError('no_kamar')) ? 'is-invalid' : ''; ?>" name="type_kamar" id="" value="">
                                <option <?= $data_fkamar[0]['id_type_kamar'] == '1' ? 'selected' : ''; ?> value="1">Standard Room - Rp. </option>
                                <option <?= $data_fkamar[0]['id_type_kamar'] == '2' ? 'selected' : ''; ?> value="2">Superior Room - Rp. </option>
                                <option <?= $data_fkamar[0]['id_type_kamar'] == '3' ? 'selected' : ''; ?> value="3">Deluxe Room - Rp. </option>
                                <option <?= $data_fkamar[0]['id_type_kamar'] == '4' ? 'selected' : ''; ?> value="4">Junior Suite Room - Rp. </option>
                                <option <?= $data_fkamar[0]['id_type_kamar'] == '5' ? 'selected' : ''; ?> value="5">Suite Room - Rp. </option>
                                <option <?= $data_fkamar[0]['id_type_kamar'] == '6' ? 'selected' : ''; ?> value="6">Presidential Room - Rp. </option>
                            </select>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validasi->getError('no_kamar'); ?>
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