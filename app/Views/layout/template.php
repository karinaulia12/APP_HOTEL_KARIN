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
</style>

<body class="bg-light d-flex flex-column h-100 huruf1">
    <!-- header -->
    <header>
        <div class="container-fluid mb-5">
            <div class="row mb-5">
                <div class="col mb-5">
                    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
                        <div class="container-sm">
                            <a class="navbar-brand" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" href="/petugas/dashboard"> <i class="fa-solid fa-hotel"></i> AuHotelia</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <?php if (session()->get('level') == 'admin') { ?>
                                <div class="navbar navbar-collapse" id="collapseExample" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="/petugas/dashboard">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="/petugas/kamar">Kamar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/petugas/fkamar">Fasilitas Kamar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/petugas/fumum">Fasilitas Hotel</a>
                                        </li>
                                    <?php } ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modelLogout">Logout</a>
                                    </li>
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

            <footer class="mt-auto py-3 footer fixed-bottom bg-light">
                <div class="container">
                    <span class="fw-light text-muted">By rpl@scada</span>
                </div>
            </footer>
    </header>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.js"></script>
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
    </script>

</body>

</html>