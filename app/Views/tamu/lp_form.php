<?= $this->extend('tamu/lp_tamu2'); ?>
<?= $this->section('content_tamu'); ?>
<section id="contact" class="contact">
    <div class="container">

        <div class="section-header mt-5">
            <h2>Form Reservasi</h2>
            <p>Booking sekarang sebelum kehabisan.</p>
        </div>

        <div class="row gy-5 gx-lg-5">

            <div class="col-lg-4">

                <div class="info">
                    <!-- <h3>Get in touch</h3>
                    <p>Et id eius voluptates atque nihil voluptatem enim in tempore minima sit ad mollitia commodi minus.</p> -->

                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>auhotelia@gmail.com</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call:</h4>
                            <p>+62 5589 55488 55</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

            </div>

            <div class="col-lg-8">
                <form action="/booking" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control rounded-pill" id="name" placeholder="Masukkan NIK Anda" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="text" class="form-control rounded-pill" name="nama_tamu" id="email" placeholder="Nama lengkap Anda" required>
                        </div>
                    </div>
                    <div class="row">
                        <span>Check-In</span>
                        <div class="col-md-6 form-group">
                            <input type="date" class="form-control rounded-pill" name="check-in" id="subject" placeholder="Subject" required>
                        </div>
                        <span>Check-In</span>
                        <div class="col-md-6 form-group">
                            <input type="date" class="form-control rounded-pill" name="check-out" id="subject" placeholder="Subject" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Pesan</button></div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>
</section>
<?= $this->endSection(); ?>