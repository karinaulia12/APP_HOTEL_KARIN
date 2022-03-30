<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-lg">
    <div class="row">
        <div class="col justify-content-center">
            <form action="/petugas/fumum/update" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <h1 class="display-6"><i class="fa fa-pen text-primary" aria-hidden="true"></i> Edit Fasilitas Hotel</h1>
                    <hr>
                    <?php if (!empty(session()->getFlashdata('edit_fumum'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <?= session()->getFlashdata('edit_fumum'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-6">
                            <input type="hidden" name="id_fumum" value="<?= $data_fumum[0]['id_fumum']; ?>">
                            <label for="NoKamar" class="form-label">Fasilitas Hotel</label>
                            <textarea class="form-control <?= ($validasi->hasError('nama_fumum')) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="4" placeholder="Tambahkan fasilitas hotel" name="nama_fumum"><?= $data_fumum[0]['nama_fumum']; ?></textarea>
                        </div>

                        <div class="col">
                            <label for="" class="form-label">Foto</label>
                            <input type="hidden" name="nama_foto_fumum" value="<?= $data_fumum[0]['foto']; ?>">
                            <input type="file" class="form-control <?= ($validasi->hasError('foto')) ? 'is-invalid' : ''; ?>" name="foto">
                            <div class="col-sm-4">
                                <?php if (!empty($data_fumum[0]['foto'])) { ?>
                                    <img src="/gambar/<?= $data_fumum[0]['foto']; ?>" alt="<?= $data_fumum[0]['foto']; ?>" class="img-thumbnail mt-1 img-preview" onchange="previewImage">
                                <?php } else { ?>
                                    <img src="/gambar/noimage.jpg" onchange="previewImage" alt="" class="img-thumbnail mt-1 img-preview">
                                <?php } ?>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control <?= ($validasi->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="exampleFormControlTextarea1" rows="4" placeholder="Tambahkan deskripsi" name="deskripsi"><?= $data_fumum[0]['deskripsi']; ?></textarea>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary my-3">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>