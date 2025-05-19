<div class="table-responsive">
    <div class="table-responsive">
        <table id="multi-filter-select" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No. Rekam Medis</th>
                    <th>Name</th>
                    <th>Usia</th>
                    <th>Tanggal Periksa</th>
                    <th>Penyakit</th>
                    <th>Tindakan</th>
                    <th>Dokter</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No. Rekam Medis</th>
                    <th>Name</th>
                    <th>Usia</th>
                    <th>Tanggal Periksa</th>
                    <th>Penyakit</th>
                    <th>Tindakan</th>
                    <th>Dokter</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $no = 1;
                foreach ($rekamMedis as $rekam):
                    // foreach ($antrian as $a): 
                ?>

                    <tr>
                        <td><?= $rekam['no_rm']; ?></td>
                        <td><?= $rekam['nama_pasien'] ?></td>
                        <td><?= $rekam['tanggal_lahir'] ? date_diff(date_create($rekam['tanggal_lahir']), date_create('today'))->y : '-' ?></td>
                        <td><?= date('d-m-Y', strtotime($rekam['tanggal_periksa'])); ?></td>
                        <td>
                            <?php
                            // Menampilkan penyakit
                            echo $rekam['penyakit_id'] ? $rekam['nama_penyakit'] : 'Belum Diisi';
                            ?>
                        </td>
                        <td>
                            <?php
                            // Menampilkan tindakan
                            echo $rekam['tindakan_id'] ? $rekam['nama_tindakan'] : 'Belum Diisi';
                            ?>
                        </td>
                        <td>
                            <?= session('nama'); ?>
                        </td>

                        <td>
                            <div class="form-button-action">
                                <button type="button" class="btn btn-link btn-rounded btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $rekam['id_rm'] ?>">
                                    <i class="btn btn-rounded btn-outline-info">Detail</i>
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="detailModal<?= $rekam['id_rm'] ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= site_url('/update_rekam_medis') ?>" method="POST">
                                                <input type="hidden" name="rekam_id" value="<?= $rekam['id_rm'] ?>">
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
                                                            <label for="penyakit">Penyakit</label>
                                                            <input type="text" class="form-control" id="penyakit" name="penyakit"
                                                                value="<?= isset($rekam) && $rekam['nama_penyakit'] ? $rekam['nama_penyakit'] : 'Belum diisi'; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="perawatan">Perawatan</label>
                                                            <input type="text" class="form-control" id="perawatan" name="perawatan"
                                                                value="<?= isset($rekam) && $rekam['nama_tindakan'] ? $rekam['nama_tindakan'] : 'Belum diisi'; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="catatan">Catatan</label>
                                                            <input type="text" class="form-control" id="catatan" name="catatan" value="<?= $rekam['catatan'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="resep">Resep</label><br>
                                                            <?php if (!empty($resepPerRM[$rekam['id_rm']])): ?>
                                                                <div class="mb-3">                                                                    
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nama Obat</th>
                                                                                <th>Dosis</th>
                                                                                <th>Aturan Pakai</th>
                                                                                <th>Tanggal Resep</th>                                                                            
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach ($resepPerRM[$rekam['id_rm']] as $r): ?>
                                                                                <tr>
                                                                                    <td><?= esc($r['nama_obat']) ?></td>
                                                                                    <td><?= esc($r['dosis']) ?></td>
                                                                                    <td><?= esc($r['aturan_pakai']) ?></td>
                                                                                    <td><?= date('d-m-Y', strtotime($r['tanggal_resep'])) ?></td>                                                                                    
                                                                                </tr>
                                                                            <?php endforeach; ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <?php else: ?>
                                                                <p class="text-muted">Belum ada obat yang diresepkan.</p>
                                                            <?php endif; ?>

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