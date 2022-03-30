<?= $this->extend('tamu/lp_tamu2'); ?>
<?= $this->section('home'); ?>
<!-- <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
        <img src="/landing_page2/assets/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
        <h2>Welcome to <span>AuHotelia</span></h2>
        <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
        <div class="d-flex">
            <a href="/form-booking" class="btn-get-started scrollto">Pesan Sekarang</a> -->
<!-- <a href="#" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
<!-- </div>
    </div>
</section> -->

<section id="hero-fullscreen" class="hero-fullscreen d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center position-relative" data-aos="zoom-out">
        <?php if (session()->getFlashdata('pesan_kamar')) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
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