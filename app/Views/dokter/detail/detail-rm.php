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
                                        placeholder="<?= isset($rekamMedis['periksa_bibir_masuk_mulut']) ? $rekamMedis['periksa_bibir_masuk_mulut'] : ''; ?>">
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

                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="form-group text-center">
                                    <img src="<?= base_url(); ?>clinic/assets/susunan-gigi.jpg" alt="gambar odontogram" style="height: 200px;">
                                </div>
                            </div>

                            <div class="col-md-12 d-flex justify-content-center align-items-center" style="gap: 100px;">
                                <!-- Tabel kiri -->
                                <div style="width: 400px;">
                                    <table class="table table-bordered text-center" style="font-size: 5px;">
                                        <thead>
                                            <tr>
                                                <th>11 [51]</th>
                                                <td><input type="text" name="11" class="form-control m-0" placeholder="<?= isset($odontogram['g11']) ? $odontogram['g11'] : '' ?>"></td>
                                                <td><input type="text" name="21" class="form-control" placeholder="<?= isset($odontogram['g21']) ? $odontogram['g21'] : '' ?>"></td>
                                                <th>[61] 21</th>
                                            </tr>
                                            <tr>
                                                <th>12 [52]</th>
                                                <td><input type="text" name="12" class="form-control" placeholder="<?= isset($odontogram['g12']) ? $odontogram['g12'] : '' ?>"></td>
                                                <td><input type="text" name="22" class="form-control" placeholder="<?= isset($odontogram['g22']) ? $odontogram['g22'] : '' ?>"></td>
                                                <th>[62] 22</th>
                                            </tr>
                                            <tr>
                                                <th>13 [53]</th>
                                                <td><input type="text" name="13" class="form-control" placeholder="<?= isset($odontogram['g13']) ? $odontogram['g13'] : '' ?>"></td>
                                                <td><input type="text" name="23" class="form-control" placeholder="<?= isset($odontogram['g23']) ? $odontogram['g23'] : '' ?>"></td>
                                                <th>[63] 23</th>
                                            </tr>
                                            <tr>
                                                <th>14 [54]</th>
                                                <td><input type="text" name="14" class="form-control" placeholder="<?= isset($odontogram['g14']) ? $odontogram['g14'] : '' ?>"></td>
                                                <td><input type="text" name="24" class="form-control" placeholder="<?= isset($odontogram['g24']) ? $odontogram['g24'] : '' ?>"></td>
                                                <th>[64] 24</th>
                                            </tr>
                                            <tr>
                                                <th>15 [55]</th>
                                                <td><input type="text" name="15" class="form-control" placeholder="<?= isset($odontogram['g15']) ? $odontogram['g15'] : '' ?>"></td>
                                                <td><input type="text" name="25" class="form-control" placeholder="<?= isset($odontogram['g25']) ? $odontogram['g25'] : '' ?>"></td>
                                                <th>[65] 25</th>
                                            </tr>
                                            <tr>
                                                <th>16</th>
                                                <td><input type="text" name="16" class="form-control" placeholder="<?= isset($odontogram['g16']) ? $odontogram['g16'] : '' ?>"></td>
                                                <td><input type="text" name="26" class="form-control" placeholder="<?= isset($odontogram['g26']) ? $odontogram['g26'] : '' ?>"></td>
                                                <th>26</th>
                                            </tr>
                                            <tr>
                                                <th>17</th>
                                                <td><input type="text" name="17" class="form-control" placeholder="<?= isset($odontogram['g17']) ? $odontogram['g17'] : '' ?>"></td>
                                                <td><input type="text" name="27" class="form-control" placeholder="<?= isset($odontogram['g27']) ? $odontogram['g27'] : '' ?>"></td>
                                                <th>27</th>
                                            </tr>
                                            <tr>
                                                <th>18</th>
                                                <td><input type="text" name="18" class="form-control" placeholder="<?= isset($odontogram['g18']) ? $odontogram['g18'] : '' ?>"></td>
                                                <td><input type="text" name="28" class="form-control" placeholder="<?= isset($odontogram['g28']) ? $odontogram['g28'] : '' ?>"></td>
                                                <th>28</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>

                                <!-- Tabel kanan -->
                                <div style="width: 400px;">
                                    <table class="table table-bordered text-center" style="font-size: 5px;">
                                        <thead>
                                            <tr>
                                                <th>48</th>
                                                <td><input type="text" name="48" class="form-control" placeholder="<?= isset($odontogram['g48']) ? $odontogram['g48'] : '' ?>"></td>
                                                <td><input type="text" name="38" class="form-control" placeholder="<?= isset($odontogram['g38']) ? $odontogram['g38'] : '' ?>"></td>
                                                <th>38</th>
                                            </tr>
                                            <tr>
                                                <th>47</th>
                                                <td><input type="text" name="47" class="form-control" placeholder="<?= isset($odontogram['g47']) ? $odontogram['g47'] : '' ?>"></td>
                                                <td><input type="text" name="37" class="form-control" placeholder="<?= isset($odontogram['g37']) ? $odontogram['g37'] : '' ?>"></td>
                                                <th>37</th>
                                            </tr>
                                            <tr>
                                                <th>46</th>
                                                <td><input type="text" name="46" class="form-control" placeholder="<?= isset($odontogram['g46']) ? $odontogram['g46'] : '' ?>"></td>
                                                <td><input type="text" name="36" class="form-control" placeholder="<?= isset($odontogram['g36']) ? $odontogram['g36'] : '' ?>"></td>
                                                <th>36</th>
                                            </tr>
                                            <tr>
                                                <th>45 [85]</th>
                                                <td><input type="text" name="45" class="form-control" placeholder="<?= isset($odontogram['g45']) ? $odontogram['g45'] : '' ?>"></td>
                                                <td><input type="text" name="35" class="form-control" placeholder="<?= isset($odontogram['g35']) ? $odontogram['g35'] : '' ?>"></td>
                                                <th>[75] 35</th>
                                            </tr>
                                            <tr>
                                                <th>44 [84]</th>
                                                <td><input type="text" name="44" class="form-control" placeholder="<?= isset($odontogram['g44']) ? $odontogram['g44'] : '' ?>"></td>
                                                <td><input type="text" name="34" class="form-control" placeholder="<?= isset($odontogram['g34']) ? $odontogram['g34'] : '' ?>"></td>
                                                <th>[74] 34</th>
                                            </tr>
                                            <tr>
                                                <th>43 [83]</th>
                                                <td><input type="text" name="43" class="form-control" placeholder="<?= isset($odontogram['g43']) ? $odontogram['g43'] : '' ?>"></td>
                                                <td><input type="text" name="33" class="form-control" placeholder="<?= isset($odontogram['g33']) ? $odontogram['g33'] : '' ?>"></td>
                                                <th>[73] 33</th>
                                            </tr>
                                            <tr>
                                                <th>42 [82]</th>
                                                <td><input type="text" name="42" class="form-control" placeholder="<?= isset($odontogram['g42']) ? $odontogram['g42'] : '' ?>"></td>
                                                <td><input type="text" name="32" class="form-control" placeholder="<?= isset($odontogram['g32']) ? $odontogram['g32'] : '' ?>"></td>
                                                <th>[72] 32</th>
                                            </tr>
                                            <tr>
                                                <th>41 [81]</th>
                                                <td><input type="text" name="41" class="form-control" placeholder="<?= isset($odontogram['g41']) ? $odontogram['g41'] : '' ?>"></td>
                                                <td><input type="text" name="31" class="form-control" placeholder="<?= isset($odontogram['g31']) ? $odontogram['g31'] : '' ?>"></td>
                                                <th>[71] 31</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="penyakit">Penyakit</label>
                                    <input type="text" class="form-control" id="search-penyakit" placeholder="Ketik kode atau nama penyakit...">
                                    <div id="no-result-message" style="display:none; color: red; margin-top: 5px;">Data tidak ditemukan.</div>
                                </div>
                                <div class="form-grou">
                                    <select class="form-control mt-0" id="penyakit" name="penyakit">
                                        <option value="">Pilih Penyakit</option>
                                        <?php foreach ($penyakit as $p): ?>
                                            <option
                                                value="<?= $p['id_penyakit'] ?>"
                                                data-nama="<?= strtolower($p['nama_penyakit']) ?>"
                                                data-kode="<?= strtolower($p['kode_penyakit']) ?>"
                                                <?= $rekamMedis['penyakit_id'] == $p['id_penyakit'] ? 'selected' : '' ?>>
                                                <?= $p['kode_penyakit']; ?> | <?= $p['nama_penyakit'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validasi">Validasi Tindakan</label>
                                        <select class="form-control" id="validasi" name="validasi" onchange="toggleTindakanDropdown()">
                                            <option value="">Pilih Persetujuan</option>
                                            <option value="1" <?= isset($rekamMedis['validasi']) && $rekamMedis['validasi'] == 1 ? 'selected' : '' ?>>Setuju</option>
                                            <option value="0" <?= isset($rekamMedis['validasi']) && $rekamMedis['validasi'] == 0 ? 'selected' : '' ?>>Tidak Setuju</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p style="margin-bottom: 0px;">nb: simpan dulu sebelum cetak Informed dan General Consent</p>
                                    <div class="form-group d-flex align-items-center gap-2">
                                        <button type="button" id="btnCetakInformed" class="btn btn-success" onclick="cetakInformedConsent()" disabled>
                                            Cetak Informed Consent
                                        </button>
                                        <button type="button" id="btnCetakGeneral" class="btn btn-success" onclick="cetakGeneralConsent()" disabled>
                                            Cetak General Consent
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tindakan">Tindakan</label>
                                    <select class="form-control" id="tindakan" name="tindakan" <?= (isset($validasi) && $validasi['validasi'] == 0) ? 'disabled' : '' ?>>
                                        <!-- <select class="form-control" id="tindakan" name="tindakan" disabled> -->
                                        <option value="">Pilih Tindakan</option>
                                        <?php foreach ($tindakan as $t): ?>
                                            <option value="<?= $t['id_tindakan'] ?>" <?= $rekamMedis['tindakan_id'] == $t['id_tindakan'] ? 'selected' : '' ?>>
                                                <?= $t['nama_tindakan'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div id="tanggal-masuk-keluar" style="display: none;">
                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Tindakan</label>
                                    <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk"
                                        value="<?= isset($formTindakan['tanggal_pelaksanaan']) ? $formTindakan['tanggal_pelaksanaan'] : (isset($rekamMedis['tanggal_masuk']) ? $rekamMedis['tanggal_masuk'] : '') ?>">
                                </div>
                                <div class="row">
                                    <?php 
                                    date_default_timezone_set('Asia/Jakarta');
                                    $now = date('H:i'); 
                                    ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="waktu_mulai">Waktu Mulai</label>
                                            <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai"
                                                value="<?= isset($formTindakan['waktu_mulai']) ? $formTindakan['waktu_mulai'] : $now ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="waktu_selesai">Waktu Selesai</label>
                                            <input type="time" class="form-control" name="waktu_selesai" id="waktu_selesai"
                                                value="<?= isset($formTindakan['waktu_selesai']) ? $formTindakan['waktu_selesai'] : '' ?>">
                                        </div>
                                    </div>
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
            // dd($rekam);
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
                                        <table id="datatables" class="table table-bordered">
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
    function toggleTindakanDropdown() {
        const validasi = document.getElementById('validasi').value;
        const tindakanDropdown = document.getElementById('tindakan');
        const tanggalFields = document.getElementById('tanggal-masuk-keluar');
        const btnCetakInformed = document.getElementById('btnCetakInformed');
        const btnCetakGeneral = document.getElementById('btnCetakGeneral');

        if (validasi === '1') {
            tindakanDropdown.disabled = false;
            btnCetakInformed.removeAttribute('disabled');
            btnCetakGeneral.removeAttribute('disabled');
            tanggalFields.style.display = 'block';
        } else {
            tindakanDropdown.disabled = true;
            tindakanDropdown.value = ""; // kosongkan pilihan
            btnCetakInformed.setAttribute('disabled', true);
            btnCetakGeneral.setAttribute('disabled', true);
            tanggalFields.style.display = 'none';
        }
    }

    // Jalankan sekali saat halaman dimuat (untuk preselect)
    window.onload = function() {
        toggleTindakanDropdown();
    };

    // cetak

    function cetakInformedConsent() {
        const idRekam = <?= json_encode($rekamMedis['id_rm']) ?>;
        window.open('<?= base_url('/cetak-informed-consent') ?>' + idRekam, '_blank');
    }

    function cetakGeneralConsent() {
        const idRekam = <?= json_encode($rekamMedis['id_rm']) ?>;
        window.open('<?= base_url('/cetak-general-consent') ?>' + idRekam, '_blank');
    }

    // Panggil saat halaman dimuat untuk mempertahankan kondisi saat edit
    window.addEventListener('DOMContentLoaded', () => {
        toggleTindakanDropdown();
    });
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('search-penyakit');
        const selectPenyakit = document.getElementById('penyakit');
        const noResultMessage = document.getElementById('no-result-message');
        const options = Array.from(selectPenyakit.options).slice(1); // Lewati default option

        searchInput.addEventListener('input', function() {
            const keyword = this.value.toLowerCase();

            // Reset dulu select
            selectPenyakit.innerHTML = '';
            const defaultOption = document.createElement('option');
            defaultOption.text = 'Pilih Penyakit';
            defaultOption.value = '';
            selectPenyakit.appendChild(defaultOption);

            // Filter dan tambahkan opsi yang cocok
            let hasMatch = false;
            options.forEach(option => {
                const nama = option.dataset.nama || '';
                const kode = option.dataset.kode || '';

                if (nama.includes(keyword) || kode.includes(keyword)) {
                    selectPenyakit.appendChild(option);
                    hasMatch = true;
                }
            });

            // Tampilkan/ Sembunyikan pesan
            noResultMessage.style.display = hasMatch ? 'none' : 'block';

            // Auto-select jika hanya 1 data cocok
            if (selectPenyakit.options.length === 2) {
                selectPenyakit.selectedIndex = 1;
            }
        });
    });
</script>

<?= $this->endSection() ?>