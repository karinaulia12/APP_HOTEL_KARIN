<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>AuHotelia</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="landing_page2/assets/img/favicon.png" rel="icon">
    <link href="landing_page2/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/landing_page2/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/landing_page2/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/landing_page2/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/landing_page2/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/landing_page2/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="/landing_page2/assets/css/variables.css" rel="stylesheet">
    <!-- <link href="/landing_page2/assets/css/variables-blue.css" rel="stylesheet"> -->
    <!-- <link href="/landing_page2/assets/css/variables-green.css" rel="stylesheet"> -->
    <!-- <link href="/landing_page2/assets/css/variables-orange.css" rel="stylesheet"> -->
    <!-- <link href="/landing_page2/assets/css/variables-purple.css" rel="stylesheet"> -->
    <!-- <link href="/landing_page2/assets/css/variables-red.css" rel="stylesheet"> -->
    <!-- <link href="/landing_page2/assets/css/variables-pink.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="/landing_page2/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: HeroBiz - v2.1.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="/landing_page2/assets/img/logo.png" alt="">
                <h1>AuHotelia<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>

                    <a href="/"><span>Home</span></a>

                    <li><a class="nav-link scrollto" href="/fasilitas-hotel">Fasilitas Hotel</a></li>
                    <li><a class="nav-link scrollto" href="/fasilitas-kamar">Fasilitas Kamar</a></li>
                    <li><a class="nav-link scrollto" href="/form-booking">Pesan</a></li>
                    <li><a class="nav-link scrollto" href="/harga">Price</a></li>
                    <!-- <li><a href="blog.html">Blog</a></li> -->
                    <!-- <li class="dropdown"><a href="#"><span>Tipe Kamar</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="#">Standard Room</a></li>
                            <li><a href="#">Superior Room</a></li>
                            <li><a href="#">Deluxe Room</a></li>
                            <li><a href="#">Junior Suite Room</a></li>
                            <li><a href="#">Suite Room</a></li>
                            <li><a href="#">Presidential Room</a></li>
                        </ul>
                    </li> -->
                    <!-- <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->

            <!-- <a class="btn-getstarted scrollto" href="index.html#about">Get Started</a> -->

        </div>
    </header><!-- End Header -->

    <!-- <section id="hero-animated" class="hero-animated d-flex align-items-center"> -->
    <?= $this->renderSection('home'); ?>
    <!-- <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
            <img src="/landing_page2/assets/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
            <h2>Welcome to <span>AuHotelia</span></h2>
            <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
            <div class="d-flex">
                <a href="/form-booking" class="btn-get-started scrollto">Pesan Sekarang</a>
                <a href="#" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
        </div> -->
    <!-- </section> -->

    <main id="main">

        <?= $this->renderSection('content_tamu'); ?>

        <!-- ======= Contact Section ======= -->
        <!-- <section id="contact" class="contact">
            <div class="container">

                <div class="section-header">
                    <h2>Contact Us</h2>
                    <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p>
                </div>

            </div>

            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
            </div> -->
        <!-- End Google Maps -->


        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-legal text-center">
            <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>HeroBiz</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>

            </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/landing_page2/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/landing_page2/assets/vendor/aos/aos.js"></script>
    <script src="/landing_page2/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/landing_page2/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/landing_page2/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/landing_page2/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/landing_page2/assets/js/main.js"></script>

    <script>
        var alertList = document.querySelectorAll('.alert');
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert)
        })
    </script>

</body>

</html>