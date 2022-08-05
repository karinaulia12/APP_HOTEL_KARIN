<!-- Modal -->
<div class="row">
    <div class="col-12">
        <div class="modal fade" id="kamarTambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kamar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/petugas/kamar/add" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="NoKamar" class="form-label">No. Kamar</label>
                                        <input type="text" class="form-control <?= ($validasi->hasError('no_kamar')) ? 'is-invalid' : ''; ?>" name="no_kamar" id="" placeholder="Masukkan nomor kamar" value="<?= old('no_kamar'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('no_kamar'); ?>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label for="" class="form-label">Tipe Kamar</label>
                                        <select value="<?= old('type_kamar'); ?>" class=" form-select <?= ($validasi->hasError('type_kamar')) ? 'is-invalid' : ''; ?>" name="id_type_kamar" id="">
                                            <?php $no = 1;
                                            foreach ($dataTypeKamar as $tk) : ?>
                                                <option value="<?= $tk['id_type_kamar']; ?>"><?= $tk['type_kamar']; ?> - Rp <?= number_format($tk['harga'], 0, ',', '.'); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validasi->getError('type_kamar'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- <button type="submit" class="btn btn-primary my-3">Kirim</button> -->
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>