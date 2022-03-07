<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row">
        <div class="col justify-content-center">
            <h1 class="display-6"><i class="fa fa-plus text-primary" aria-hidden="true"></i> Tambah Fasilitas Kamar</h1>
            <hr>
            <form action="/petugas/fkamar/add" method="post">
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
                            <textarea class="form-control <?= ($validasi->hasError('nama_fkamar')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan fasilitas kamar" name="nama_fkamar" id="" cols="30" rows="10"></textarea>
                            <div class="invalid-feedback">
                                <?= $validasi->getError('nama_fkamar'); ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="" class="form-label">Tipe Kamar</label>
                            <select class="form-select text-capitalize <?= ($validasi->hasError('no_kamar')) ? 'is-invalid' : ''; ?>" name="type_kamar" id="">
                                <option selected>Pilih Tipe Kamar</option>
                                <option class="text-capitalize" value="superior">superior</option>
                                <option class="text-capitalize" value="deluxe">deluxe</option>
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