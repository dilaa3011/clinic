<div class="table-responsive">
    <div class="table-responsive">
        <table id="multi-filter-select" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>Antrian</th>
                    <th>No. Rekam Medis</th>
                    <th>Name</th>
                    <th>Usia</th>
                    <th>Tanggal Periksa</th>
                    <th>Perawatan</th>
                    <th>Dokter</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Antrian</th>
                    <th>No. Rekam Medis</th>
                    <th>Name</th>
                    <th>Usia</th>
                    <th>Tanggal Periksa</th>
                    <th>Perawatan</th>
                    <th>Dokter</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $no = 1;
                foreach ($rekamMedis as $rekam):
                // dd($rekam)?>
                    <tr>
                        <td><?= $rekam['nomor_antrian'] ?></td>
                        <td><?= $rekam['no_rm']; ?></td>
                        <td><?= $rekam['nama_pasien'] ?></td>
                        <td><?= $rekam['tanggal_lahir'] ? date_diff(date_create($rekam['tanggal_lahir']), date_create('today'))->y : '-' ?></td>
                        <td><?= date('d-m-Y', strtotime($rekam['tanggal_periksa'])); ?></td>
                        <td><?= $rekam['tindakan'] ?></td>
                        <td><?= $rekam['nama_dokter'] ?></td>
                        <td>
                            <div class="form-button-action">
                                <button type="button" class="btn btn-link btn-rounded btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $rekam['id'] ?>">
                                    <i class="btn btn-rounded btn-outline-info">Detail</i>
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="detailModal<?= $rekam['id'] ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= site_url('/update_rekam_medis') ?>" method="POST">
                                                <input type="hidden" name="rekam_id" value="<?= $rekam['id'] ?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="keluhan">Keluhan</label>
                                                            <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?= $rekam['keluhan'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="diagnosa">Diagnosa</label>
                                                            <input type="text" class="form-control" id="diagnosa" name="diagnosa" value="<?= $rekam['diagnosa'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tindakan">Perawatan</label>
                                                            <input type="text" class="form-control" id="tindakan" name="tindakan" value="<?= $rekam['tindakan'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="resep">Resep</label>
                                                            <input type="text" class="form-control" id="resep" name="resep" value="<?= $rekam['resep'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="catatan">Catatan</label>
                                                            <input type="text" class="form-control" id="catatan" name="catatan" value="<?= $rekam['catatan'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>