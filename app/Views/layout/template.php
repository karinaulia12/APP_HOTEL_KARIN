<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">

    <link rel="stylesheet" href="/font-awesome/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/6.0.0/css/font-awesome.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<style>
    .huruf {
        font-family: 'Montserrat', sans-serif;
    }

    .huruf1 {
        font-family: 'Quicksand', sans-serif;
    }

    .bg-pink {
        background-color: #9E426B;
    }
</style>

<body class="bg-light d-flex flex-column h-100 huruf1">
    <!-- header -->
    <header>
        <div class="container-fluid mb-5">
            <div class="row mb-5">
                <div class="col mb-5">
                    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary" data-bs-toggle=" collapse" href="#collapseExample" id="navbarResponsive">
                        <div class=" container-sm">
                            <?php if (session()->get('level') == 'admin') { ?>
                                <a class="navbar-brand" role="button" aria-expanded="false" aria-controls="collapseExample" href="/petugas/dashboard"> <i class="fa-solid fa-hotel"></i> AuHotelia</a>
                            <?php } elseif (session()->get('level') == 'resepsionis') { ?>
                                <a class="navbar-brand" role="button" aria-expanded="false" aria-controls="collapseExample" href="/resepsionis/dashboard"> <i class="fa-solid fa-hotel"></i> AuHotelia</a>
                            <?php } else { ?>
                                <a class="navbar-brand" role="button" aria-expanded="false" aria-controls="collapseExample" href="/"> <i class="fa-solid fa-hotel"></i> AuHotelia</a>
                            <?php } ?>
                            <button class="navbar-toggler" type="button" aria-expanded="false" aria-controls="collapseExample" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="navbar navbar-collapse collapse" id="collapseExample">
                                <ul class="navbar-nav">
                                    <?php if (session()->get('level') == 'admin') { ?>
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="/petugas/dashboard">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="/petugas/kamar">Kamar</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="/petugas/fkamar">Fasilitas Kamar</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="/petugas/tkamar">Tipe Kamar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/petugas/fumum">Fasilitas Hotel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modelLogout">Logout</a>
                                        </li>
                                    <?php } elseif (session()->get('level') == 'resepsionis') { ?>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="/resepsionis/reservasi">Reservasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/resepsionis/type-kamar">Tipe Kamar</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="/resepsionis/tamu">Tamu</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modelLogout">Logout</a>
                                        </li>

                                    <?php } else { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/form-booking">Form Booking</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- </div> -->
                    </nav>

                    <!-- Modal Logout -->
                    <div class="modal fade" id="modelLogout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Logout</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin akan keluar?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                    <a href="/petugas/logout" type="button" class="btn btn-primary">Ya</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?= $this->renderSection('content') ?>

    </header>
    <footer class="mt-auto py-3 footer bg-light">
        <div class="container">
            <span class="fw-light text-muted">By rpl@scada</span>
        </div>
    </footer>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script src="/js/jquery-3.6.0.js"></script>
    <script src="/font-awesome/js/all.js"></script>
    <script>
        function previewImage() {
            const foto = document.querySelector('foto');
            const fotoLabel = document.querySelector('.form-control');
            const imgPreview = document.querySelector('.img-preview');

            fotoLabel.textContent = foto.files[0].name;

            const fileFoto = new Reader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onLoad = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function confirmToDelete(el) {
            $("#delete-button").attr("href", el.dataset.href);
            $("#confirm-dialog").modal('show');
        }

        $(document).ready(function() {
            $('.dropdown-toggle').dropdown()
        });
    </script>

</body>

</html>