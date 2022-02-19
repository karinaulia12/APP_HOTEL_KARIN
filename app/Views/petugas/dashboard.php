<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col">
            <h1 class="display-6">Selamat Datang <strong><?= session()->get('nama_petugas'); ?></strong>
            </h1>

            <!-- <div class="col-4">
                <div class="card">
                    <i class="fa fa-bed fa-3x" aria-hidden="true"></i>
                    <div class="card-body">
                        <h4 class="card-title">Title</h4>
                        <p class="card-text">Text</p>
                    </div>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>


<?= $this->endSection(); ?>