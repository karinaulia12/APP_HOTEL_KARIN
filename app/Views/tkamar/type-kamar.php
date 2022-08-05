<?= $this->extend('argon/argon-dsb'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col">
            <hr>
            <a href="/petugas/tkamar/tambah" class="btn btn-light mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Tipe Kamar</a>
            <?php if (session()->getFlashdata('tambah_tkamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('tambah_tkamar'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('edit_tkamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('edit_tkamar'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('hapus_tkamar')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('hapus_tkamar'); ?>
                </div>
            <?php endif; ?>
            <div class="row mt-4">
                <div class="col-lg mb-lg-0 mb-4">
                    <div class="card ">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2"><?= $judul; ?></h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tkamar as $row) : ?>
                                        <tr>
                                            <td>
                                                <div class="py-1 align-items-center">
                                                    <div class="ms-4">
                                                        <!-- <p class="text-xs font-weight-bold mb-0">#</p> -->
                                                        <h6 class="text-sm mb-0"><?= $no++; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">Tipe:</p>
                                                    <h6 class="text-sm mb-0"><?= $row['type_kamar']; ?></h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">Harga:</p>
                                                    <h6 class="text-sm mb-0">Rp <?= number_format($row['harga'], '0', ',', '.'); ?></h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <div class="col text-center">
                                                    <!-- <p class="text-xs font-weight-bold mb-0">Gambar:</p> -->
                                                    <img src="/gambar/<?= $row['foto']; ?>" width="200px" class="rounded">
                                                </div>
                                            </td>
                                            <!-- <td width="100px">
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">Fasilitas:</p>
                                                </div>
                                                <h6 class="text-sm mb-0"><?= $row['nama_fkamar']; ?></h6>
                                            </td> -->
                                            <td>
                                                <div class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">Aksi:</p>
                                                    <a href="/petugas/tkamar/edit/<?= $row['id_type_kamar']; ?>" class="btn btn-warning btn-sm mx-1 my-1">Edit</a>
                                                    <a href="/petugas/tkamar/hapus/<?= $row['id_type_kamar']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin akan menghapusnya?')">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>