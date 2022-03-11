<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1 class="display-6"> <i class="fa fa-check text-primary" aria-hidden="true"></i> Detail Reservasi</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <!-- <img class="card-img-top" src="holder.js/100x180/?text=Image cap" alt="Card image cap"> -->
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Item 1</li>
                    <li class="list-group-item">Item 2</li>
                    <li class="list-group-item">Item 3</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>