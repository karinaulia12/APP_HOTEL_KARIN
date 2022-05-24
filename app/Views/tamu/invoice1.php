<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/invoice.css">
    <title>Invoice</title>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="invoice">
                <!-- begin invoice-company -->
                <div class="invoice-company text-inverse f-w-600">
                    <span class="pull-right hidden-print">
                        <a href="<?= site_url('PdfController/generate/' . $reservasi['id_reservasi']); ?>" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                        <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                    </span>
                    AuHotelia, Inc
                </div>
                <!-- end invoice-company -->
                <!-- begin invoice-header -->
                <div class="invoice-header">
                    <div class="invoice-from">
                        <small>from</small>
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">AuHotelia</strong><br>
                            Street Sukamulya<br>
                            Kuningan, 45556<br>
                            Phone: (+62) 8976 5432 123<br>
                            Email: auhotelia@gmail.com
                        </address>
                    </div>
                    <div class="invoice-to">
                        <small>to</small>
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse"><?= $reservasi['nama_pemesan']; ?></strong><br>
                            <!-- Street Address<br>
                            City, Zip Code<br> -->
                            Phone: <?= $reservasi['no_telp']; ?><br>
                            Email: <?= $reservasi['email']; ?>
                        </address>
                    </div>
                    <div class="invoice-date">
                        <small>Invoice / <?= date('m'); ?></small>
                        <div class="date text-inverse m-t-5"><?= date('d-m-Y H:i:s a',); ?></div>
                        <div class="invoice-detail">
                            #0000<?= $reservasi['id_reservasi']; ?><br>
                            Booking Kamar
                        </div>
                    </div>
                </div>
                <!-- end invoice-header -->
                <!-- begin invoice-content -->
                <div class="invoice-content">
                    <!-- begin table-responsive -->
                    <div class="table-responsive">
                        <table class="table table-invoice">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10%">Nama Tamu</th>
                                    <th class="text-center" width="10%">Tipe Kamar</th>
                                    <th class="text-right" width="10%">Harga</th>
                                    <th class="text-center" width="10%">Jumlah Kamar</th>
                                    <th class="text-center" width="10%">Checkin</th>
                                    <th class="text-center" width="10%">Checkout</th>
                                    <th class="text-center" width="10%">Jumlah Hari</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr padding-top="20px" padding-bottom="20px" class="text-right">
                                    <td>
                                        <span class="text-inverse"><?= $reservasi['nama_tamu']; ?></span><br>
                                        <!-- <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small> -->
                                    </td>
                                    <td class="text-center"><?= $reservasi['type_kamar']; ?></td>
                                    <td class="text-center">Rp <?= number_format($reservasi['harga'], '0', ',', '.'); ?>,00</td>
                                    <td class="text-right"><?= $reservasi['jml_kamar']; ?> kamar</td>
                                    <td class="text-right"><?= date('l, d-m-Y', strtotime($reservasi['checkin'])); ?></td>
                                    <td class="text-right"><?= date('l, d-m-Y', strtotime($reservasi['checkout'])); ?></td>
                                    <td><?= $reservasi['jmlHari']; ?> hari</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                    <!-- begin invoice-price -->
                    <div class="invoice-price"><br><br><br>
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <small>SUBTOTAL</small>
                                    <span class="text-inverse">Rp <?= number_format($reservasi['total'], '0', ',', '.'); ?>,00</span>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-price-right">
                            <small>TOTAL</small> <span class="f-w-600">Rp <?= number_format($reservasi['total'], '0', ',', '.'); ?>,00</span>
                        </div>
                    </div>
                    <!-- end invoice-price -->
                </div>
                <!-- end invoice-content -->
                <!-- begin invoice-note -->
                <div class="invoice-note">
                    <!-- * Make all cheques payable to [Your Company Name]<br> -->
                    * Payment is due within 7 days<br>
                    * If you have any questions concerning this invoice, contact [AuHotelia, (+62) 8976 5432 123, auhotelia@gmail.com]
                </div>
                <!-- end invoice-note -->
                <!-- begin invoice-footer -->
                <div class="invoice-footer">
                    <p class="text-center m-b-5 f-w-600">
                        THANK YOU FOR YOUR RESERVED
                    </p>
                    <p class="text-center">
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> auhotelia.com</span>
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> auhotelia@gmail.com</span>
                    </p>
                </div>
                <!-- end invoice-footer -->
            </div>
        </div>
    </div>
</body>

</html>