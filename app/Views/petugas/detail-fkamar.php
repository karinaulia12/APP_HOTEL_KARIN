<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col">
            <h1 class="display-6"> <i class="fa fa-check text-primary" aria-hidden="true"></i> Detail Fasilitas Kamar</h1>
            <hr>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header text-capitalize">
                    <?= $dataFkamar[0]['type_kamar']; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Fasilitas :</h5>
                    <p class="card-text"><?= $dataFkamar[0]['nama_fkamar']; ?></p>
                    <a href="/petugas/fkamar/edit/<?= $dataFkamar[0]['id_fkamar']; ?>" class="btn btn-warning text-center"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                    <a href="/petugas/fkamar/hapus/<?= $dataFkamar[0]['id_fkamar']; ?>" type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin menghapusnya?')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>