<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col">
            <h1 class="display-6"> <i class="fa fa-check text-primary" aria-hidden="true"></i> Detail Reservasi</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Status <h1-6><span class="badge <?php if ($reservasi['status'] == '1') {
                                                                                echo 'bg-warning';
                                                                            } elseif ($reservasi['status'] == '2') {
                                                                                echo 'bg-primary';
                                                                            } else {
                                                                                echo 'bg-success';
                                                                            } ?>"><?= $status[0]['status_txt'] ?></span></h1-6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="card border-primary text-start">
                                <div class="card-body">
                                    <h3 class="card-title">Data Tamu</h3>
                                    <table class="table table-hover table-inverse table-responsive">
                                        <tr>
                                            <td>Nama Tamu</td>
                                            <td>: </td>
                                            <td><?= $reservasi['nama_tamu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>NIK</td>
                                            <td>: </td>
                                            <td><?= $reservasi['nik'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Telp</td>
                                            <td>: </td>
                                            <td><?= $reservasi['no_telp'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>: </td>
                                            <td><?= $reservasi['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pemesan</td>
                                            <td>: </td>
                                            <td><?= $reservasi['nama_pemesan'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border-warning text-start">
                                <div class="card-body">
                                    <h3 class="card-title">Data Reservasi</h3>
                                    <table class="table table-hover table-inverse table-responsive">
                                        <tr>
                                            <td width="30%">Tipe Kamar</td>
                                            <td>: </td>
                                            <td><?= $reservasi['type_kamar'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>: </td>
                                            <td>Rp <?= number_format($reservasi['harga'], '0', ',', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Kamar</td>
                                            <td>: </td>
                                            <td><?= $reservasi['jml_kamar'] ?> kamar</td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Nomor Kamar</td>
                                            <td>: </td>
                                            <td><?= $reservasi['no_kamar'] ?></td>
                                        </tr> -->
                                        <tr>
                                            <td>Jumlah Hari</td>
                                            <td>: </td>
                                            <td><?= $reservasi['jmlHari'] ?> hari - (<?= date('l, d-m-Y', strtotime($reservasi['checkin'])); ?> - <?= date('l, d-m-Y', strtotime($reservasi['checkout'])); ?>)</td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>: </td>
                                            <td><span class="badge bg-success">Rp <?= number_format($reservasi['total'], '0', ',', '.'); ?></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="alert alert-success" role="alert">
                                    <strong>Total: Rp <?= number_format($reservasi['total'], '0', ',', '.'); ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>