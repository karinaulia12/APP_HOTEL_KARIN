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
                        <div class="card-header">Kamar
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title col-8">Jumlah Kamar</h5>
                                <h1 class="card-text display-5 col-4"><strong><?= $hitung_kamar; ?></strong></h1>
                                <a href="/petugas/kamar" class="text-white">Lihat Kamar <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-header">Tipe Kamar</div>
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title col-9">Jumlah Tipe Kamar</h5>
                                <p class="card-text display-5 col-3"><?= $hitung_fkamar; ?></p>
                                <a href="/petugas/tkamar" class="text-white">Lihat Tipe Kamar <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Fasilitas Hotel</div>
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title col-9">Jumlah Fasilitas Hotel</h5>
                                <p class="card-text display-5 col-3"><?= $hitung_fumum; ?></p>
                                <a href="/petugas/fumum" class="text-white">Lihat Fasilitas Hotel <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>