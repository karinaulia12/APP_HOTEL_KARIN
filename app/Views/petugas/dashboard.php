<?= $this->extend('argon/argon-dsb'); ?>

<?= $this->section('content'); ?>

<!-- <div class="container-sm"> -->
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-6 mb-4 text-light">Selamat Datang <strong><?= session()->get('nama_petugas'); ?></strong>
        </h1>
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Kamar</p>
                                    <h5 class="font-weight-bolder">
                                        <?= $hitung_kamar; ?>
                                    </h5>
                                    <p class="mb-0">
                                        <a href="/petugas/kamar">Lihat Kamar <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Tipe Kamar</p>
                                    <h5 class="font-weight-bolder">
                                        <?= $hitung_tkamar; ?>
                                    </h5>
                                    <p class="mb-0">
                                        <a href="/petugas/tkamar">Lihat Tipe Kamar <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Fasilitas Hotel</p>
                                    <h5 class="font-weight-bolder">
                                        <?= $hitung_fumum; ?>
                                    </h5>
                                    <p class="mb-0">
                                        <a href="/petugas/fumum">Lihat Fasilitas Hotel <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col">
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Tipe Kamar</div>
                    <div class="card-body">
                        <div class="row">
                            <h5 class="card-title col-sm-9">Jumlah Tipe Kamar</h5>
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
                            <h5 class="card-title col-sm-9">Jumlah Fasilitas Hotel</h5>
                            <p class="card-text display-5 col-3"><?= $hitung_fumum; ?></p>
                            <a href="/petugas/fumum" class="text-white">Lihat Fasilitas Hotel <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- </div> -->
    </div>
</div>
<!-- </div> -->
<?= $this->include('argon/chart'); ?>

<?= $this->endSection(); ?>