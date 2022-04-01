<?= $this->extend('tamu/lp_tamu2'); ?>
<?= $this->section('content_tamu'); ?>
<!-- ======= Pricing Section ======= -->
<section id="price" class="pricing">
    <div class="container" data-aos="fade-up">

        <div class="section-header mt-5">
            <h2>Harga</h2>
            <p>Kami memiliki harga kamar yang sangat terjangkau per malamnya.</p>
        </div>

        <div class="row gy-4">
            <?php foreach ($data_fkamar as $fk) : ?>
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="pricing-item featured">

                        <div class="pricing-header">
                            <h3><?= $fk['type_kamar']; ?></h3>
                            <h4><sup>Rp</sup><?= number_format($fk['harga'], 0, ',', '.'); ?><span> / malam</span></h4>
                        </div>
                        <ul>
                        </ul>
                        <div class="text-center mt-auto">
                            <a href="#" class="buy-btn">Book Now</a>
                        </div>

                    </div>
                </div><!-- End Pricing Item -->
            <?php endforeach; ?>

        </div>

    </div>
</section><!-- End Pricing Section -->
<?= $this->endSection(); ?>