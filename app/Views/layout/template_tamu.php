<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>AuHotelia</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/template_tamu/assets/img/favicon.png" rel="icon">
    <link href="/template_tamu/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/template_tamu/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/template_tamu/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template_tamu/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/template_tamu/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/template_tamu/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/template_tamu/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/template_tamu/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Delicious - v4.7.1
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
            <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
            <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: 11:00 AM - 23:00 PM</span></i>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <div class="logo me-auto">
                <h1><a href="index.html">AuHotelia</a></h1>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#specials">Fasilitas Hotel</a></li>
                    <li><a class="nav-link scrollto" href="#why-us">Fasilitas Kamar</a></li>
                    <li><a class="nav-link scrollto" href="#events">Price</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#events">Book Now</a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="#book-a-table" class="book-a-table-btn scrollto">Book Now</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background-image: url(/template_tamu/assets/img/1.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><span>AuHotelia</span></h2>
                                <div class="row justify-content-center">
                                    <?php if (session()->getFlashdata('pesan_kamar')) : ?>
                                        <div class="alert alert-warning alert-dismissible fade show col-6" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <strong><?= (session()->getFlashdata('pesan_kamar')); ?></strong>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (session()->getFlashdata('gagal_rsv')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong><?= session()->getFlashdata('gagal_rsv'); ?></strong>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (session()->getFlashdata('penuh')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong><?= session()->getFlashdata('penuh'); ?></strong>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                                <div>
                                    <!-- <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto my-2">Our Menu</a> -->
                                    <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Specials Section ======= -->
        <section id="specials" class="specials">
            <div class="container">

                <div class="section-title">
                    <h2>Why Choose<span> Our Hotel</span></h2>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <?php foreach ($data_fumum as $row) : ?>
                                <li class="nav-item">
                                    <a class="nav-link <?= $data_fumum[0]['id_fumum'] == $row['id_fumum'] ? 'active show' : ''; ?> " data-bs-toggle="tab" href="#tab-<?= $row['id_fumum'] ?>"><?= $row['nama_fumum'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <?php foreach ($data_fumum as $fu) : ?>
                                <div class="tab-pane <?= $data_fumum[0]['id_fumum'] == $fu['id_fumum'] ? 'active show' : ''; ?>" id="tab-<?= $fu['id_fumum'] ?>">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3 class="mt-3"><?= $fu['nama_fumum'] ?></h3>
                                            <p class="fst-italic"><?= $fu['deskripsi'] ?></p>
                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="/gambar/<?= $fu['foto'] ?>" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Specials Section -->

        <!-- ======= Whu Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="section-title">
                    <h2><span>Fasilitas Kamar</span> yang kami miliki</h2>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
                </div>

                <div class="row">
                    <?php $no = 1;
                    foreach ($data_fkamar as $row) : ?>
                        <div class="col-lg-4 my-2">
                            <div class="box">
                                <span><?= $no++; ?></span>
                                <h4><?= $row['type_kamar']; ?></h4>
                                <!-- <p><?= implode(', ', $row); ?></p> -->
                                <p><?= $row['nama_fkamar']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
        </section><!-- End Whu Us Section -->

        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
            <div class="container">

                <div class="section-title">
                    <h2>Pesan sesuai dengan <span>tipe kamar </span> yang Anda inginkan</h2>
                </div>

                <div class="events-slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($data_tk2 as $row) : ?>
                            <div class="swiper-slide">
                                <div class="row event-item">
                                    <div class="col-lg-6">
                                        <img src="/gambar/<?= $row['foto']; ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                                        <h3><?= $row['type_kamar']; ?></h3>
                                        <div class="price">
                                            <p><span>Rp <?= number_format($row['harga'], '0', ',', '.'); ?></span></p>
                                        </div>
                                        <ul>
                                            <li><i class="bi bi-check-circle"></i> <?= $row['nama_fkamar']; ?></li>
                                        </ul>
                                        <a href="/form-booking/<?= $row['id_type_kamar']; ?>" class="book-a-table-btn scrollto">Book now</a>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Events Section -->

        <!-- ======= Book A Table Section ======= -->
        <section id="book-a-table" class="book-a-table">
            <div class="container">

                <div class="section-title">
                    <h2><span>Book Now</span></h2>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
                </div>

                <form action="/booking" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="text" name="nama_pemesan" class="form-control" id="name" placeholder="Nama Pemesan" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <!-- <div class="validate"></div> -->
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="text" name="nik" class="form-control" id="name" placeholder="Masukkan NIK" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <!-- <div class="validate"></div> -->
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="text" name="no_telp" class="form-control" id="name" placeholder="Masukkan nomor telepon" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <!-- <div class="validate"></div> -->
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6 col-md-6 form-group mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" data-rule="email" data-msg="Please enter a valid email">
                                <!-- <div class="validate"></div> -->
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <input type="text" name="nama_tamu" class="form-control" id="name" placeholder="Nama Tamu" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <!-- <div class="validate"></div> -->
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6 col-md-6 form-group">
                                <label class="form-label">Checkin</label>
                                <input type="date" name="checkin" class="form-control" id="date" placeholder="Checkin" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <!-- <div class="validate"></div> -->
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label class="form-label">Checkout</label>
                                <input type="date" name="checkout" class="form-control" id="date" placeholder="Checkout" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <!-- <div class="validate"></div> -->
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6 col-md-6 form-group">
                                <input type="number" class="form-control" name="jml_kamar" id="time" placeholder="Jumlah Kamar" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <!-- <div class="validate"></div> -->
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <select class="form-select" name="type_kamar" id="inputGroupSelect01">
                                    <option selected>Pilih Tipe Kamar...</option>
                                    <?php foreach ($type_kamar as $tk) : ?>
                                        <option value="<?= $tk['id_type_kamar']; ?>"><?= $tk['type_kamar']; ?> - Rp <?= number_format($tk['harga'], 0, ',', '.'); ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <!-- <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div> -->
                        <div class="sent-message">Booking kamar sudah berhasil. Silahkan download invoice untuk bukti pada saar check-in. Terima Kasih!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Reservation</button></div>
                </form>

            </div>
        </section><!-- End Book A Table Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>AuHotelia</h3>
            <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>RPL@SCADA</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/template_tamu/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/template_tamu/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/template_tamu/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/template_tamu/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/template_tamu/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/template_tamu/assets/js/main.js"></script>

</body>

</html>