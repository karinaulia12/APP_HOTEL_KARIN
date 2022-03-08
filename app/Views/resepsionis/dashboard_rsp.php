<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-sm">
    <div class="row">
        <div class="col">
            <h1 class="display-6 mb-4">Selamat Datang <strong><?= session()->get('nama_petugas'); ?></strong>
            </h1>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">Reservasi
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title col-8">Jumlah Reservasi</h5>
                                <h1 class="card-text display-5 col-4"><strong><?= $jml_reservasi; ?></strong></h1>
                                <a href="/resepsionis/reservasi" class="text-white">Lihat Reservasi <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-header">Tamu
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title col-8">Jumlah Tamu Per Hari Ini</h5>
                                <h1 class="card-text display-5 col-4"><strong><?= $jml_reservasi; ?></strong></h1>
                                <a href="/resepsionis/tamu" class="text-white">Lihat Tamu <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>