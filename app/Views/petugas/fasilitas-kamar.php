<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-sm">
    <div class="row">
        <div class="col">
            <h1 class="fw-lighter display-6"> Data Fasilitas Kamar</h1>
            <hr>
            <a href="/petugas/fkamar/tambah" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Fasilitas Kamar</a>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Id Kamar</th>
                        <th>No Kamar</th>
                        <th>Nama Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataKamar as $row) : ?>
                        <tr>
                            <td scope="row"><?= $row['id_kamar']; ?></td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm rounded-pill text-white" href="/petugas/kamar/detail/<?= $row['id_kamar']; ?>"><?= $row['no_kamar']; ?></a>
                            </td>
                            <td><?= $row['nama_fkamar']; ?></td>
                            <td class="text-center">
                                <a href="" class="btn btn-warning btn-sm">Edit</a>
                                <a href="" class="btn btn-danger  btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>