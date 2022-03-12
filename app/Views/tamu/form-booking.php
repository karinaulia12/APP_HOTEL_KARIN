<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-sm">
    <div class="row">
        <div class="col">
            <h1 class="display-6">Form Booking Kamar</h1>
            <hr>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Contoh: 320820.....">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan nama lengkap Anda" class="form-control" id="exampleFormControlTextarea1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Check-In</label>
                        <input type="date" placeholder="Tanggal Check-In" class="form-control" id="exampleFormControlTextarea1">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Check-Out</label>
                        <input type="date" placeholder="Tanggal Check-Out" class="form-control" id="exampleFormControlTextarea1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" placeholder="Masukkan No. Telepon Anda" class="form-control" id="exampleFormControlTextarea1">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" placeholder="Masukkan Email Anda" class="form-control" id="exampleFormControlTextarea1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>