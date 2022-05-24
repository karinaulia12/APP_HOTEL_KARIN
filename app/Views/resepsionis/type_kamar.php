<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="fw-lighter display-6"> <i class="fa fa-bed text-primary" aria-hidden="true"></i> Data Tipe Kamar</h1>
        </div>
    </div>
    <div class="row">
        <?php foreach ($tk as $t) : ?>
            <div class="col-4">
                <div class="card text-start my-3">
                    <img class="card-img-top" src="/gambar/<?= $t['foto']; ?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title"><?= $t['type_kamar']; ?></h4>
                        <p class="card-text">
                            <a class="btn btn-primary" href="/form-booking/<?= $t['id_type_kamar']; ?>" role="button">Booking</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- </div> -->
</div>
<?= $this->endSection(); ?>