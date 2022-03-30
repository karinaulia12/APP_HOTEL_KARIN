<?= $this->extend('tamu/lp_tamu2'); ?>
<?= $this->section('content_tamu'); ?>
<!-- ======= F.A.Q Section ======= -->
<section id="faq" class="faq">
    <div class="container-fluid mt-5" data-aos="fade-up">

        <div class="row gy-4 px-xl-5">

            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                <div class="section-header mt-5">
                    <h2>Fasilitas Kamar</h2>
                    <p>Berbagai fasilitas dari tipe kamar yang kami miliki akan sangat memuaskan bagi Anda dalam berbagai kebutuhan dan keinginan.</p>
                </div>

                <div class="accordion accordion-flush" id="faqlist">
                    <?php foreach ($data_fkamar as $fk) : ?>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?= $fk['id_fkamar']; ?>">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    <?= $fk['type_kamar']; ?>
                                </button>
                            </h3>
                            <div id="faq-content-<?= $fk['id_fkamar']; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    <?= $fk['nama_fkamar']; ?>
                                </div>
                            </div>
                        </div><!-- # Faq item-->
                    <?php endforeach; ?>
                </div>

            </div>

            <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("/landing_page2/assets/img/faq-2.jpg");'>&nbsp;</div>
        </div>

    </div>
</section><!-- End F.A.Q Section -->


<!-- ======= Features Section ======= -->
<section id="features" class="features">
    <div class="container" data-aos="fade-up">

        <div class="section-header mt-5">
            <h2>Fasilitas Kamar</h2>
            <p>Berbagai fasilitas dari tipe kamar yang kami miliki akan sangat memuaskan bagi Anda dalam berbagai kebutuhan dan keinginan.</p>
        </div>

        <ul class="nav nav-tabs row gy-4 d-flex">
            <?php foreach ($data_fkamar as $fk) : ?>
                <li class="nav-item col-6 col-md-4 col-lg-2 text-center">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#<?= $fk['id_fkamar'] ?>">
                        <i class="bi bi-binoculars color-cyan"></i>
                        <h4><?= $fk['type_kamar']; ?></h4>
                    </a>
                </li>
            <?php endforeach; ?>
            <!-- End Tab 1 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                    <i class="bi bi-box-seam color-indigo"></i>
                    <h4>Undaesenti</h4>
                </a>
            </li><!-- End Tab 2 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                    <i class="bi bi-brightness-high color-teal"></i>
                    <h4>Pariatur</h4>
                </a>
            </li><!-- End Tab 3 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                    <i class="bi bi-command color-red"></i>
                    <h4>Nostrum</h4>
                </a>
            </li><!-- End Tab 4 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-5">
                    <i class="bi bi-easel color-blue"></i>
                    <h4>Adipiscing</h4>
                </a>
            </li><!-- End Tab 5 Nav -->

            <li class="nav-item col-6 col-md-4 col-lg-2">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-6">
                    <i class="bi bi-map color-orange"></i>
                    <h4>Reprehit</h4>
                </a>
            </li><!-- End Tab 6 Nav -->

        </ul>

        <div class="tab-content">
            <?php foreach ($data_fkamar as $row) : ?>
                <div class="tab-pane active show" id="<?= $row['id_fkamar']; ?>">
                    <div class="row gy-4">
                        <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                            <h3><?= $row['type_kamar']; ?></h3>
                            <p class="fst-italic">
                                <?= $row['nama_fkamar']; ?>
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> <?= $row['nama_fkamar']; ?>.</li>
                                <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                                <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum
                            </p>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                            <img src="/landing_page2/assets/img/features-1.svg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End Tab Content 1 -->
            <?php endforeach; ?>

            <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                    <div class="col-lg-8 order-2 order-lg-1">
                        <h3>Undaesenti</h3>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                        </ul>
                    </div>
                    <div class="col-lg-4 order-1 order-lg-2 text-center">
                        <img src="/landing_page2/assets/img/features-2.svg" alt="" class="img-fluid">
                    </div>
                </div>
            </div><!-- End Tab Content 2 -->

            <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                    <div class="col-lg-8 order-2 order-lg-1">
                        <h3>Pariatur</h3>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</li>
                        </ul>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                    </div>
                    <div class="col-lg-4 order-1 order-lg-2 text-center">
                        <img src="/landing_page2/assets/img/features-3.svg" alt="" class="img-fluid">
                    </div>
                </div>
            </div><!-- End Tab Content 3 -->

            <div class="tab-pane" id="tab-4">
                <div class="row gy-4">
                    <div class="col-lg-8 order-2 order-lg-1">
                        <h3>Nostrum</h3>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                        </ul>
                    </div>
                    <div class="col-lg-4 order-1 order-lg-2 text-center">
                        <img src="/landing_page2/assets/img/features-4.svg" alt="" class="img-fluid">
                    </div>
                </div>
            </div><!-- End Tab Content 4 -->

            <div class="tab-pane" id="tab-5">
                <div class="row gy-4">
                    <div class="col-lg-8 order-2 order-lg-1">
                        <h3>Adipiscing</h3>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                        </ul>
                    </div>
                    <div class="col-lg-4 order-1 order-lg-2 text-center">
                        <img src="/landing_page2/assets/img/features-5.svg" alt="" class="img-fluid">
                    </div>
                </div>
            </div><!-- End Tab Content 5 -->

            <div class="tab-pane" id="tab-6">
                <div class="row gy-4">
                    <div class="col-lg-8 order-2 order-lg-1">
                        <h3>Reprehit</h3>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                        </ul>
                    </div>
                    <div class="col-lg-4 order-1 order-lg-2 text-center">
                        <img src="/landing_page2/assets/img/features-6.svg" alt="" class="img-fluid">
                    </div>
                </div>
            </div><!-- End Tab Content 6 -->

        </div>

    </div>
</section><!-- End Features Section -->
<?= $this->endSection(); ?>