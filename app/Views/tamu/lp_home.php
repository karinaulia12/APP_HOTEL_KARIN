<?= $this->extend('tamu/lp_tamu2'); ?>
<?= $this->section('home'); ?>
<section id="hero-fullscreen" class="hero-fullscreen d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center position-relative" data-aos="zoom-out">
        <?php if (session()->getFlashdata('pesan_kamar')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?= session()->getFlashdata('pesan_kamar'); ?>
            </div>
        <?php endif; ?>

        <h2>Welcome to <span>AuHotelia</span></h2>
        <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
        <div class="d-flex">
            <a href="/form-booking" class="btn-get-started scrollto">Pesan Kamar Sekarang</a>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>