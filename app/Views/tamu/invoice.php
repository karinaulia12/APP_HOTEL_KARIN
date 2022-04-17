<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Data Reservasi Kamar | AuHotelia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;1,200;1,300;1,400;1,500&family=Libre+Franklin:ital,wght@0,100;0,200;0,300;0,400;0,500;1,200;1,300;1,500&family=Montserrat:wght@100;300&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Josefin Sans', sans-serif;
        }

        @media (min-width: 1200px) {
            .display-6 {
                font-size: 2.5rem;
            }
        }

        table {
            caption-side: bottom;
            border-collapse: collapse;
        }

        thead,
        tbody,
        tfoot,
        tr,
        td,
        th {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .table-bordered> :not(caption)>* {
            border-width: 1px 0;
        }

        .table-bordered> :not(caption)>*>* {
            border-width: 0 1px;
        }
    </style>
</head>

<body style="margin-bottom: 50px;">
    <!-- <p align="left" style="margin-left:250px; margin-top:50px">
        To :</br>
        <?= $reservasi['nama_pemesan']; ?><br>
        <?= $reservasi['no_telp']; ?><br>
        <?= $reservasi['email']; ?><br>

    </p>
    <h1 align="center">Invoice AuHotelia<br />
        <span style="font-size:12pt">Nomor : <?= $nama_file; ?></span>
    </h1>
    <table class="table table-bordered" align="center">
        <thead>
            <tr>
                <th width="30px">No</th>
                <th width="400px">Item</th>
                <th width="100px">Qty</th>
                <th width="160px">Harga</th>
                <th width="200px">Total</th>
            </tr>
        </thead>
        <tr style="min-height:400px">
            <td align="center" width="25px">1</td>
            <td width="250px">Kamar : <?= $reservasi['no_kamar']; ?><br />
                From : <?= date('l, d-m-Y', strtotime($reservasi['checkin'])); ?><br />
                To : <?= date('l, d-m-Y', strtotime($reservasi['checkout'])); ?>
            </td>
            <td align="center" width="55px"><?= $reservasi['jml_kamar']; ?> kamar<br />
                <?= $reservasi['jmlHari']; ?> hari</td>
            <td align="center" width="85px">Rp. <?= number_format($reservasi['harga'], '0', ',', '.'); ?></td>
            <td align="center" width="115px">Rp. <?= number_format($reservasi['total'], '0', ',', '.'); ?></td>
        </tr>
    </table> -->

    <h1 align="center" style="margin-top:50px">Invoice AuHotelia<br />
        <span style="font-size:12pt">Nomor : <?= $nama_file; ?></span>
    </h1>
    <hr>
    <hr>

    <ul>
        <li>
            <h3 style="margin-top:30px">Data Pemesan</h3>
        </li>
    </ul>
    <table width="100%" style="margin-left: 40px">
        <tr style="margin-top: 10px" height="25px">
            <th align="left" width="20px;" style="margin-top: 20px">Nama Pemesan</th>
            <td align="left" width="5px;" style="margin-top: 20px">: </td>
            <td width="80px;" style="margin-top: 20px; margin-right: 20px"><?= $reservasi['nama_pemesan']; ?></td>
        </tr>
        <tr style="margin-top: 20px" height="25px">
            <th align="left" width="20px;" style="margin-top: 20px">NIK</th>
            <td align="left" width="5px;" style="margin-top: 20px">: </td>
            <td width="80px;" style="margin-top: 20px; margin-right: 20px"><?= $reservasi['nik']; ?></td>
        </tr>
        <tr style="margin-top: 20px" height="25px">
            <th align="left" width="20px;" style="margin-top: 20px">No. Telepon</th>
            <td align="left" width="5px;" style="margin-top: 20px">: </td>
            <td width="80px;" style="margin-top: 20px; margin-right: 20px"><?= $reservasi['no_telp']; ?></td>
        </tr>
        <tr style="margin-top: 20px" height="25px">
            <th align="left" width="20px;" style="margin-top: 20px">Email</th>
            <td align="left" width="5px;" style="margin-top: 20px">: </td>
            <td width="80px;" style="margin-top: 20px; margin-right: 20px"><?= $reservasi['email']; ?></td>
        </tr>
    </table>

    <ul>
        <li>
            <h3 style="margin-top:30px">Data Tamu</h3>
        </li>
    </ul>
    <table width="100%" style="margin-left: 40px">
        <tr style="margin-top: 10px" height="25px">
            <th align="left" width="20px;">Nama Tamu</th>
            <td align="left" width="5px;" style="margin-top: 20px">: </td>
            <td width="80px;" style="margin-top: 20px; margin-right: 20px"><?= $reservasi['nama_tamu']; ?></td>
        </tr>
    </table>

    <ul>
        <li>
            <h3 style="margin-top:30px">Data Reservasi</h3>
        </li>
    </ul>
    <table width="75%" style="margin-left: 40px">
        <tr style="margin-top: 10px" height="25px">
            <th align="left" width="20px;" style="margin-top: 20px">Tipe Kamar</th>
            <td align="left" width="5px;" style="margin-top: 20px">: </td>
            <td width="80px;" style="margin-top: 20px; margin-right: 20px"><?= $reservasi['type_kamar']; ?></td>
        </tr>
        <tr style="margin-top: 20px" height="25px">
            <th align="left" width="10px;" style="margin-top: 20px">Tgl Check-In</th>
            <td align="left" width="5px;" style="margin-top: 20px">: </td>
            <td width="80px;" style="margin-top: 20px; margin-right: 20px"><?= date('l, d-m-Y', strtotime($reservasi['checkin'])); ?></td>
        </tr>
        <tr style="margin-top: 20px" height="25px">
            <th align="left" width="10px;" style="margin-top: 20px">Tgl Check-Out</th>
            <td align="left" width="5px;" style="margin-top: 20px">: </td>
            <td width="80px;" style="margin-top: 20px; margin-right: 20px"><?= date('l, d-m-Y', strtotime($reservasi['checkout'])); ?></td>
        </tr>
        <tr style="margin-top: 20px" height="25px">
            <th align="left" width="10px;" style="margin-top: 20px">Jml Hari</th>
            <td align="left" width="5px;" style="margin-top: 20px">: </td>
            <td width="80px;" style="margin-top: 20px; margin-right: 20px"><?= $reservasi['jmlHari']; ?> hari</td>
        </tr>
        <tr style="margin-top: 20px" height="25px">
            <th align="left" width="10px;" style="margin-top: 20px">Jml Kamar</th>
            <td align="left" width="5px;" style="margin-top: 20px">: </td>
            <td width="80px;" style="margin-top: 20px; margin-right: 20px"><?= $reservasi['jml_kamar']; ?> kamar</td>
        </tr>
        <tr style="margin-top: 20px" height="25px">
            <th align="left" width="10px;" style="margin-top: 20px">Harga/tipe kamar</th>
            <td align="left" width="5px;" style="margin-top: 20px">: </td>
            <td width="80px;" style="margin-top: 20px; margin-right: 20px">Rp <?= number_format($reservasi['harga'], '0', ',', '.'); ?></td>
        </tr>
        <tr height="25px">
            <th align="left" width="10px;">TOTAL</th>
            <td align="left" width="5px;">: </td>
            <td width="80px;" style=" margin-right: 20px"><strong>Rp <?= number_format($reservasi['total'], '0', ',', '.'); ?></strong></td>
        </tr>
    </table>
    <!-- 

    <h5 class="display-6">AuHotelia <?= $nama_file; ?></h5>
    <h6 class="display-6"><?= $nama_file; ?></h6>
    <table align=center border="1" cellspacing="0" cellpadding="1" class="table table-striped table-bordered">
        <thead align=center>
            <tr>
                <td>NIK</td>
                <td>Nama Pemesan</td>
                <td>Nama Tamu</td>
                <td>No. Kamar</td>
                <td>Tipe Kamar</td>
                <td>Harga</td>
                <td>Jumlah Kamar</td>
                <td>Check-In</td>
                <td>Check-Out</td>
                <td>Total</td>
            </tr>
        </thead>
        <tbody align=center class="text-center">
            <tr>
                <td><?= $reservasi['nik']; ?></td>
                <td><?= $reservasi['nama_pemesan']; ?></td>
                <td><?= $reservasi['nama_tamu']; ?></td>
                <td><?= $reservasi['no_kamar']; ?></td>
                <td><?= $reservasi['type_kamar']; ?></td>
                <td><?= $reservasi['harga']; ?></td>
                <td><?= $reservasi['jml_kamar']; ?></td>
                <td><?= $reservasi['checkin']; ?></td>
                <td><?= $reservasi['checkout']; ?></td>
                <td collspan="8" align="right">Rp <strong?><?= number_format($reservasi['total'], '0', ',', '.'); ?></strong></td>
            </tr>
        </tbody>
    </table> -->
    <!-- <p>Total Bayar: Rp <strong?><?= number_format($reservasi['total'], '0', ',', '.'); ?></strong></p> -->
</body>

</html>