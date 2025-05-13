<?= $this->extend('/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="row">
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="<?= base_url('/dashboard'); ?>">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Antrian</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="multi-filter-select" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No. Rekam Medis</th>
                            <th>Nama</th>
                            <th>No. Antrian</th>
                            <th>Tanggal Periksa</th>
                            <th>Status Pemeriksaan</th>
                            <th>Tarif</th>
                            <th>Status Bayar</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No. Rekam Medis</th>
                            <th>Nama</th>
                            <th>No. Antrian</th>
                            <th>Tanggal Periksa</th>
                            <th>Status Pemeriksaan</th>
                            <th>Tarif</th>
                            <th>Status Bayar</th>
                            <th> </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $pasienModel = new \App\Models\PasienModel();
                        foreach ($antrian as $a):
                            $pasien = $pasienModel->where('nik', $a['nik'])->first();
                        ?>
                            <tr>
                                <td><?= $a['no_rm']; ?></td>
                                <td><?= $pasien ? $pasien['nama_lengkap'] : 'Nama tidak ditemukan';
                                    ?></td>
                                <td><?= $a['nomor_antrian']; ?></td>
                                <td><?= date('d-m-Y', strtotime($a['tanggal_periksa'])); ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-rounded dropdown-toggle btn-<?= $a['status_pemeriksaan']; ?>" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= ucfirst($a['status_pemeriksaan']); ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li>
                                                <form action="<?= base_url('antrian/ubah-status/' . $a['id_antrian']); ?>" method="post">
                                                    <button class="dropdown-item" type="submit" name="status_pemeriksaan" value="menunggu">Menunggu</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="<?= base_url('antrian/ubah-status/' . $a['id_antrian']); ?>" method="post">
                                                    <button class="dropdown-item" type="submit" name="status_pemeriksaan" value="diperiksa">Diperiksa</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="<?= base_url('antrian/ubah-status/' . $a['id_antrian']); ?>" method="post">
                                                    <button class="dropdown-item" type="submit" name="status_pemeriksaan" value="selesai">Selesai</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>Rp <?= number_format($a['tarif'], 2, ',', '.'); ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-rounded dropdown-toggle btn-<?= $a['status_bayar']; ?>" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= ucfirst($a['status_bayar']); ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li>
                                                <form action="<?= base_url('antrian/ubah-status-bayar/' . $a['id_antrian']); ?>" method="post">
                                                    <button class="dropdown-item" type="submit" name="status_bayar" value="belum lunas">Belum Lunas</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="<?= base_url('antrian/ubah-status-bayar/' . $a['id_antrian']); ?>" method="post">
                                                    <button class="dropdown-item" type="submit" name="status_bayar" value="lunas">Lunas</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" class="btn btn-link btn-rounded btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $a['id_antrian'] ?>">
                                            <i class="btn btn-rounded btn-outline-info">Detail</i>
                                        </button>
                                    </div>
                                </td>
                                <?php foreach ($antrian as $a): ?>
                            </tr>
                        <?php
                                endforeach; ?>
                    </tbody>


                </table>
                <div class="modal fade" id="detailModal<?= $a['id_antrian'] ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('/update-tarif'); ?>" method="POST">
                                    <input type="hidden" name="id_antrian" value="<?= $a['id_antrian']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tarif">Tarif</label>
                                                <input type="number" class="form-control" name="tarif" value="<?= $a['tarif']; ?>">
                                            </div>
                                        </div>

                                        <?php $rekam = $rekamMedis[$a['rm_id']] ?? null; 
                                        // dd($rekamMedis);?>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="penyakit">Penyakit</label>
                                                <input type="text" class="form-control" value="<?= $rekam['nama_penyakit'] ?? 'Belum diisi'; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="perawatan">Perawatan</label>
                                                <input type="text" class="form-control" value="<?= $rekam['nama_tindakan'] ?? 'Belum diisi'; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="resep">Resep</label><br>
                                                <?php $resepList = $resepPasien[$a['rm_id']] ?? []; ?>
                                                <?php if (!empty($resepList)): ?>
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
                                                                <?php foreach ($resepList as $r): ?>
                                                                    <tr>
                                                                        <td><?= esc($r['nama_obat']) ?></td>
                                                                        <td><?= esc($r['dosis']) ?></td>
                                                                        <td><?= esc($r['aturan_pakai']) ?></td>
                                                                        <td><?= date('d-m-Y', strtotime($r['tanggal_resep'])) ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    <?php else: ?>
                                                        <p class="text-muted">Belum ada obat yang diresepkan.</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>