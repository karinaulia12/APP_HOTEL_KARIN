<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col">
            <form action="/petugas/kamar/update-foto" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <h1 class="display-6"><i class="fa fa-pen text-primary" aria-hidden="true"></i> Edit Foto Kamar</h1>
                        </div>
                        <div class="col-8 alert alert-primary" role="alert">
                            Silahkan pilih foto yang akan diubah!
                        </div>
                    </div>
                    <hr>
                    <div class="col-6">
                        <label for="" class="form-label mt-3">Foto</label>
                        <input type="file" class="form-control" value="<?= $dataKamar[0]['foto']; ?>">
                        <div class="col-6">
                            <img src="/gambar/<?= $dataKamar[0]['foto']; ?>" alt="" class="img-thumbnail mt-1 img-preview">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>

    <?= $this->endSection(); ?>