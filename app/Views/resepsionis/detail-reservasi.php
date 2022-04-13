<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col">
            <h1 class="display-6"> <i class="fa fa-check text-primary" aria-hidden="true"></i> Detail Reservasi</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body text-primary">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>