<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col">
            <h1 class="fw-lighter display-6"> Fasilitas Kamar</h1>
            <hr>
            <a href="/petugas/fkamar/tambah" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Fasilitas Kamar</a>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>No Kamar</th>
                        <th>Nama Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($dataKamar as $row) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm rounded-pill text-white" href="/petugas/kamar/detail/<?= $row['id_kamar']; ?>"><?= $row['no_kamar']; ?></a>
                            </td>
                            <td><?= $row['nama_fkamar']; ?></td>
                            <td class="text-center">
                                <a href="/petugas/fkamar/edit/<?= $row['id_fkamar']; ?>" class="btn btn-warning btn-sm mx-1 my-1">Edit</a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modelHapus" class="btn btn-danger btn-sm mx-1 my-1">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Modal Logout -->
            <div class="modal fade" id="modelHapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Data Fasilitas Kamar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin akan menghapusnya?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <a href="/petugas/fkamar/hapus/<?= $fkamar[0]['id_fkamar']; ?>" type="button" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>