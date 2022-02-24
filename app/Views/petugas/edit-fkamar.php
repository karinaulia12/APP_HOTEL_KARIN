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
                    <?php if (session()->getFlashdata('tambahFkamar')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?= session()->getFlashdata('tambahFkamar'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-6">
                            <label for="NoKamar" class="form-label">Fasilitas Kamar</label>
                            <input class=" form-control <?= ($validasi->hasError('nama_fkamar')) ? 'is-invalid' : ''; ?>" name="nama_fkamar" id="" cols="30" rows="10" value="<?= $data_fkamar[0]['nama_fkamar']; ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('nama_fkamar'); ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="" class="form-label">No Kamar</label>
                            <select class=" form-control <?= ($validasi->hasError('no_kamar')) ? 'is-invalid' : ''; ?>" name="no_kamar" id="" value="">
                                <?php foreach ($data_noKamar as $row) : ?>
                                    <option value="<?= $row['id_kamar']; ?>"><?= $row['no_kamar']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validasi->getError('no_kamar'); ?>
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