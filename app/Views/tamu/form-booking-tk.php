<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-lg">
    <div class="row">
        <div class="col">
            <h1 class="display-6">Tipe <span class="badge bg-info"> <?= $nama_tk['type_kamar']; ?></span></h1>
            <hr>
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
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="/booking/type" method="post">
                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" class="form-control" name="nik" id="exampleFormControlInput1" placeholder="Nomor Induk Kependudukan">
                    <input type="hidden" name="id_tk" value="<?= $nama_tk['id_type_kamar']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Pemesan</label>
                    <input type="text" name="nama_pemesan" placeholder="Masukkan nama lengkap Anda" class="form-control" id="exampleFormControlTextarea1">
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="no_telp" placeholder="Masukkan nama lengkap Anda" class="form-control" id="exampleFormControlTextarea1">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" placeholder="Masukkan nama lengkap Anda" class="form-control" id="exampleFormControlTextarea1">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Tamu</label>
                    <input type="text" name="nama_tamu" placeholder="Masukkan nama lengkap Anda" class="form-control" id="exampleFormControlTextarea1">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Kamar</label>
                    <input type="number" name="jml_kamar" placeholder="Jumlah kamar yang dipesan" class="form-control" id="exampleFormControlTextarea1">
                </div>

                <div class="mb-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Check-In</span>
                        <input type="date" name="checkin" placeholder="Tanggal Check-In" class="form-control" id="exampleFormControlTextarea1">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Check-Out</span>
                        <input type="date" name="checkout" placeholder="Tanggal Check-Out" class="form-control" id="exampleFormControlTextarea1">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Pesan</button>
            </form>
        </div>

        <div class="col-md-6">
            <div class="card text-start">
                <img class="card-img-top" src="/gambar/<?= $nama_tk['foto']; ?>" alt="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title"><?= $nama_tk['type_kamar']; ?></h4>
                            <p class="card-text"><span class="badge bg-success">Rp <?= number_format($nama_tk['harga'], 0, ',', '.'); ?></span>
                                <span class="badge bg-info"><?= count($kmr_tersedia); ?> kamar tersedia</span>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="card-title">Fasilitas: </h4>
                            <div class="row">
                                <div class="col-6 ">
                                    <?php foreach ($fkamar as $row) : ?>
                                        <!-- <div class="text-center"> -->
                                        <!-- <div class="grid"> -->
                                        <!-- <div class="row-lg-5"> -->
                                        <p class="card-text">
                                            <span class="badge bg-primary"><?= $row['nama_fkamar']; ?></span>
                                        </p>
                                        <!-- </div> -->
                                        <!-- </div> -->
                                        <!-- </div> -->
                                    <?php endforeach; ?>
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