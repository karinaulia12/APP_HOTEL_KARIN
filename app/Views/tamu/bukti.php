<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Data Reservasi Kamar | AuHotelia</title>
    <style>
        .display-6 {
            font-size: calc(1.375rem + 1.5vw);
            font-weight: 300;
            line-height: 1.2;
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

<body>
    <p align="right" style="margin-right:250px">
        To :</br>
        <?= $reservasi['nama_pemesan']; ?><br>
        <?= $reservasi['no_telp']; ?><br>
        <?= $reservasi['email']; ?><br>
    </p>

    <h1 align="center">Invoice AuHotelia<br />
        <span style="font-size:12pt">Nomor : <?= $nama_file; ?></span>
    </h1>
    <table class="table table-bordered" align="center" border="1" cellpadding="1">
        <thead>
            <tr>
                <th width="25px">No</th>
                <th width="250px">Item</th>
                <th width="55px">Qty</th>
                <th width="85px">Harga</th>
                <th width="115px">Total</th>
            </tr>
        </thead>
        <tr style="min-height:400px">
            <td align="center" width="25px">1</td>
            <td width="250px">Kamar : <?= $reservasi['no_kamar']; ?><br />
                From : <?= date('d-m-Y', strtotime($reservasi['checkin'])); ?><br />
                To : <?= date('d-m-Y', strtotime($reservasi['checkout'])); ?>
            </td>
            <td align="center" width="55px"><?= $reservasi['jml_kamar']; ?> kamar<br />
                <?= $reservasi['jmlHari']; ?> hari</td>
            <td align="center" width="85px">Rp. <?= number_format($reservasi['harga'], '0', ',', '.'); ?></td>
            <td align="center" width="115px">Rp. <?= number_format($reservasi['total'], '0', ',', '.'); ?></td>
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