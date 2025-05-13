<?= $this->extend('/layout/template') ?>
<?= $this->section('content') ?>

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
                        <a href="<?= base_url('/pasien'); ?>">Pemeriksaan Pasien</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Periksa Pasien</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-flex align-items-center">
                        <h2>Pasien <?= $rekamMedis['nama_lengkap']; ?></h2>
                    </div>
                </div>
                <form action="<?= site_url('/update_rekam_medis') ?>" method="POST">
                    <div class="card-cody">
                        <input type="hidden" name="rekam_id" value="<?= $rekamMedis['id_rm'] ?>">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keluhan">Keluhan</label>
                                    <input type="text" class="form-control" id="keluhan" name="keluhan"
                                        placeholder="<?= isset($rekamMedis['keluhan']) ? $rekamMedis['keluhan'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="riwayat_penyakit">Riwayat Penyakit</label>
                                    <input type="text" class="form-control" id="riwayat_penyakit" name="riwayat_penyakit"
                                        placeholder="<?= isset($rekamMedis['riwayat_penyakit']) ? $rekamMedis['riwayat_penyakit'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="riwayat_alergi">Riwayat Alergi</label>
                                    <input type="text" class="form-control" id="riwayat_alergi" name="riwayat_alergi"
                                        placeholder="<?= isset($rekamMedis['riwayat_alergi']) ? $rekamMedis['riwayat_alergi'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="riwayat_pengobatan">Riwayat Pengobatan</label>
                                    <input type="text" class="form-control" id="riwayat_pengobatan" name="riwayat_pengobatan"
                                        placeholder="<?= isset($rekamMedis['riwayat_pengobatan']) ? $rekamMedis['riwayat_pengobatan'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <input type="text" class="form-control" id="catatan" name="catatan" placeholder="<?= isset($rekamMedis['catatan']) ? $rekamMedis['catatan'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="diagnosa">Diagnosa</label>
                                    <input type="text" class="form-control" id="diagnosa" name="diagnosa"
                                        placeholder="<?= isset($rekamMedis['diagnosa']) ? $rekamMedis['diagnosa'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="periksa_bibir">Periksa Bibir Masuk Mulut</label>
                                    <input type="text" class="form-control" id="periksa_bibir" name="periksa_bibir"
                                        placeholder="<?= isset($rekamMedis['periksa_bibir']) ? $rekamMedis['periksa_bibir'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="periksa_gigi_geligi">Periksa Gigi Geligi</label>
                                    <input type="text" class="form-control" id="periksa_gigi_geligi" name="periksa_gigi_geligi"
                                        placeholder="<?= isset($rekamMedis['periksa_gigi_geligi']) ? $rekamMedis['periksa_gigi_geligi'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="periksa_lidah">Periksa Lidah</label>
                                    <input type="text" class="form-control" id="periksa_lidah" name="periksa_lidah"
                                        placeholder="<?= isset($rekamMedis['periksa_lidah']) ? $rekamMedis['periksa_lidah'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="periksa_langit_langit">Periksa Langit-Langit</label>
                                    <input type="text" class="form-control" id="periksa_langit_langit" name="periksa_langit_langit"
                                        placeholder="<?= isset($rekamMedis['periksa_langit_langit']) ? $rekamMedis['periksa_langit_langit'] : ''; ?>">
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="penyakit">Penyakit</label>
                                    <select class="form-control" id="penyakit" name="penyakit">
                                        <option value="">Pilih Penyakit</option>
                                        <?php foreach ($penyakit as $p): ?>
                                            <option value="<?= $p['id_penyakit'] ?>" <?= $rekamMedis['penyakit_id'] == $p['id_penyakit'] ? 'selected' : '' ?>>
                                                <?= $p['nama_penyakit'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tindakan">Tindakan</label>
                                    <select class="form-control" id="tindakan" name="tindakan">
                                        <option value="">Pilih Tindakan</option>
                                        <?php foreach ($tindakan as $t): ?>
                                            <option value="<?= $t['id_tindakan'] ?>" <?= $rekamMedis['tindakan_id'] == $t['id_tindakan'] ? 'selected' : '' ?>>
                                                <?= $t['nama_tindakan'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="resep">Resep</label><br>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#resepModal<?= $rekamMedis['pasien_id'] ?>">
                                        <?= !empty($resepPasien) ? 'Lihat / Tambah Resep' : 'Isi Resep' ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action d-flex justify-content-end m-4">
                        <button type="submit" class="btn btn-primary me-3">Simpan</button>
                        <a href="<?= base_url('/rekam-medis') ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- Modal Resep -->
            <?php
            $rekam = $rekamMedis;
            $pasienId = $rekam['pasien_id'];
            $dokterId = $rekam['dokter_id'];
            $namaPasien = $rekam['nama_lengkap'];
            $resepList = $resepPasien ?? [];
            ?>

            <div class="modal fade" id="resepModal<?= $pasienId ?>" tabindex="-1" aria-labelledby="resepModalLabel<?= $pasienId ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="<?= base_url('resep/simpan') ?>" method="POST">
                            <input type="hidden" name="rekam_id" value="<?= esc($rekam['id_rm']) ?>">
                            <input type="hidden" name="pasien_id" value="<?= esc($pasienId) ?>">
                            <input type="hidden" name="dokter_id" value="<?= esc($dokterId) ?>">

                            <div class="modal-header">
                                <h5 class="modal-title" id="resepModalLabel<?= $pasienId ?>">
                                    Resep Obat - <?= esc($namaPasien) ?>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <?php if (!empty($resepList)): ?>
                                    <div class="mb-3">
                                        <strong>Resep Sebelumnya:</strong>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nama Obat</th>
                                                    <th>Dosis</th>
                                                    <th>Aturan Pakai</th>
                                                    <th>Tanggal Resep</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($resepList as $r): ?>
                                                    <tr>
                                                        <td><?= esc($r['nama_obat']) ?></td>
                                                        <td><?= esc($r['dosis']) ?></td>
                                                        <td><?= esc($r['aturan_pakai']) ?></td>
                                                        <td><?= date('d-m-Y', strtotime($r['tanggal_resep'])) ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="hapusResep(<?= $r['id_resep'] ?>, '<?= esc($namaPasien) ?>')">
                                                                Hapus
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else: ?>
                                    <p class="text-muted">Belum ada obat yang diresepkan.</p>
                                <?php endif; ?>

                                <div id="resepFields<?= $pasienId ?>">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label>Nama Obat</label>
                                            <select name="obat_id[]" class="form-control" required>
                                                <option value="">Pilih Obat</option>
                                                <?php foreach ($obatList as $obat): ?>
                                                    <option value="<?= esc($obat['id_obat']) ?>"><?= esc($obat['nama_obat']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <label>Jumlah</label>
                                            <input type="number" name="jumlah_obat[]" class="form-control" required>
                                        </div>

                                        <div class="col-md-2">
                                            <label>Dosis</label>
                                            <input type="text" name="dosis[]" class="form-control" required>
                                        </div>

                                        <div class="col-md-2">
                                            <label>Aturan Pakai</label>
                                            <input type="text" name="aturan_pakai[]" class="form-control" required>
                                        </div>

                                        <div class="col-md-2">
                                            <label>Unit</label>
                                            <input type="text" name="unit[]" class="form-control">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.modal-body -->

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan Resep</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

        </div>
    </div>
</div>
<script>
    function tambahResep(pasienId) {
        let container = document.getElementById('resepFields' + pasienId);
        let field = `
      <div class="row mb-3">
        <div class="col-md-6">
          <input type="text" name="obat_id[]" class="form-control" placeholder="Nama Obat" required>
        </div>
        <div class="col-md-2">
          <input type="number" name="jumlah_obat[]" class="form-control" placeholder="Jumlah" required>
        </div>
        <div class="col-md-2">
          <input type="text" name="dosis[]" class="form-control" placeholder="Dosis">
        </div>
        <div class="col-md-2">
          <input type="text" name="aturan_pakai[]" class="form-control" placeholder="Aturan Pakai">
        </div>
      </div>
    `;
        container.insertAdjacentHTML('beforeend', field);
    }
</script>

<script>
    function hapusResep(idResep, namaPasien) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Resep untuk pasien " + namaPasien + " akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke URL hapus
                window.location.href = "<?= base_url('resep/hapus') ?>/" + idResep;
            }
        });
    }
</script>


<?= $this->endSection() ?>