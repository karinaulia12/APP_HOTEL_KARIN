<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col">
            <h1 class="display-6 mb-4">Selamat Datang <strong><?= session()->get('nama_petugas'); ?></strong>
            </h1>
            <div class="row">
                <div class="col">
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">Kamar</div>
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title col-8">Jumlah Kamar</h5>
                                <div class="col-3">
                                    <i class="fa fa-bed fa-3x" aria-hidden="true"></i>
                                </div>
                                <h6 class="card-text display-6 col-2"><?= $hitung_kamar; ?></h6>
                                <a href="/petugas/kamar" class="col-10 mt-3 text-white">Lihat Kamar <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-header">Kamar</div>
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Kamar</h5>
                            <p class="card-text"><?= $hitung_kamar; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Kamar</div>
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Kamar</h5>
                            <p class="card-text"><?= $hitung_kamar; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>