<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Data Reservasi Kamar | AuHotelia</title>

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

<body>
    <div class="container-sm">
        <div class="row">
            <div class="col">
                <h2 class="display-6">Bukti Reservasi <?= $nama_file; ?></h2>
                <a class="btn btn-success btn-lg mb-2" href="<?= base_url('PdfController/generate/' . $reservasi['id_reservasi']) ?>">
                    Download PDF
                </a>
                <a class="btn btn-warning mx-2 mb-2" href="<?= site_url('') ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Kembali
                </a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr align=center>
                            <td>NIK</td>
                            <td>Nama Tamu</td>
                            <!-- <td>No. Kamar</td> -->
                            <td>Tipe Kamar</td>
                            <td>Jumlah Kamar</td>
                            <td>Check-In</td>
                            <td>Check-Out</td>
                            <td>Jumlah Hari</td>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr align=center>
                            <td><?= $reservasi['nik']; ?></td>
                            <td><?= $reservasi['nama_tamu']; ?></td>
                            <!-- <td><?= $reservasi['no_kamar']; ?></td> -->
                            <td><?= $reservasi['type_kamar']; ?></td>
                            <td><?= $reservasi['jml_kamar']; ?> kamar</td>
                            <td><?= date('l, d-m-Y', strtotime($reservasi['checkin'])); ?></td>
                            <td><?= date('l, d-m-Y', strtotime($reservasi['checkout'])); ?></td>
                            <td><?= $reservasi['jmlHari']; ?> hari</td>
                        </tr>
                    </tbody>
                </table>
                <p>Total Bayar: Rp <strong?><?= number_format($reservasi['total'], '0', ',', '.'); ?></strong></p>

            </div>
        </div>
    </div>
</body>

</html>