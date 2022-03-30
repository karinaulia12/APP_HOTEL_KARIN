<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-lg">
    <div class="row">
        <div class="col">
            <h1 class="display-6">Form Booking Kamar</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/booking" method="post">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik" id="exampleFormControlInput1" placeholder="Contoh: 320820.....">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_tamu" placeholder="Masukkan nama lengkap Anda" class="form-control" id="exampleFormControlTextarea1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Check-In</label>
                            <input type="date" name="checkin" placeholder="Tanggal Check-In" class="form-control" id="exampleFormControlTextarea1">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Check-Out</label>
                            <input type="date" name="checkout" placeholder="Tanggal Check-Out" class="form-control" id="exampleFormControlTextarea1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Kamar</label>
                            <select multiple name="pilihKamar[]" class="form-select">
                                <?php foreach ($kamar as $k) : ?>
                                    <option value="<?= $k['id_kamar']; ?>"><?= $k['no_kamar']; ?> - <?= $k['type_kamar']; ?> | <?= $k['harga']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="no_telp" placeholder="Masukkan No. Telepon Anda" class="form-control" id="exampleFormControlTextarea1">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" placeholder="Masukkan Email Anda" class="form-control" id="exampleFormControlTextarea1">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Pesan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>