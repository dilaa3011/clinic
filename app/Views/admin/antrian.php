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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Antrian Pasien</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No. Rekam Medis</th>
                                    <th>Nama</th>
                                    <th>No. Antrian</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Status Pemeriksaan</th>
                                    <th>Status Resep</th>
                                    <th>Status Bayar</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($rekamMedis as $a):
                                    // dd($rekamMedis);
                                ?>
                                    <tr>
                                        <td><?= esc($a['no_rm'] ?? '');  ?></td>
                                        <td><?= esc($a['nama_pasien'] ?? ''); ?></td>
                                        <td><?= esc($a['nomor_antrian']); ?></td>
                                        <td><?= date('d-m-Y', strtotime($a['tanggal_periksa'])); ?></td>
                                        <td><?= ucfirst($a['status_pemeriksaan']); ?></td>
                                        <td><?= !empty($a['status_resep']) ? ucwords(str_replace('_', ' ', $a['status_resep'])) : 'Tidak ada resep'; ?></td>
                                        <td><?= ucfirst($a['status_bayar']); ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" class="btn btn-link btn-rounded btn-outline-info" data-bs-toggle="modal" data-bs-target="#bayarModal<?= $a['id_antrian'] ?>">
                                                    <i class="btn btn-rounded btn-outline-info">Bayar</i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- modal bayar -->
                        <?php foreach ($rekamMedis as $a): ?>
                            <div class="modal fade" id="bayarModal<?= $a['id_antrian'] ?>" tabindex="-1" aria-labelledby="bayarModalLabel<?= $a['id_antrian'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h5 class="modal-title" id="bayarModalLabel<?= $a['id_antrian'] ?>">Pembayaran Nomor</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('/pembayaran'); ?>" method="POST" class="form-bayar" data-id="<?= $a['id_antrian'] ?>">
                                                <input type="hidden" name="id_antrian" value="<?= esc($a['id_antrian']); ?>">
                                                <?php
                                                $no_bayar = 'BYR-' . date('d-m-Y', strtotime($a['tanggal_periksa'])) . '-0' . $a['nomor_antrian'];
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="no_bayar_<?= $a['id_antrian'] ?>">Nomor Bayar</label>
                                                            <input type="text" class="form-control" id="no_bayar_<?= $a['id_antrian'] ?>" name="no_bayar" value="<?= $no_bayar ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Resep Obat -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="resep_<?= $a['id_antrian'] ?>">Resep</label>
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
                                                                </div>
                                                            <?php else: ?>
                                                                <p class="text-muted">Belum ada obat yang diresepkan.</p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Penyakit & Tindakan -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="penyakit_<?= $a['id_antrian'] ?>">Penyakit</label>
                                                            <input type="text" class="form-control" id="penyakit_<?= $a['id_antrian'] ?>" value="<?= esc($a['nama_penyakit'] ?? 'Belum diisi'); ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="perawatan_<?= $a['id_antrian'] ?>">Perawatan</label>
                                                            <input type="text" class="form-control" id="perawatan_<?= $a['id_antrian'] ?>" value="<?= esc($a['nama_tindakan'] ?? 'Belum diisi'); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tarif -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="tarif">Tarif</label>
                                                            <input type="text" class="form-control input-rupiah" name="tarif" id="tarif_<?= $a['id_antrian'] ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Uang Dibayar & Kembalian -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="uang_dibayar">Uang Dibayar</label>
                                                            <input type="text" name="uang_dibayar" class="form-control input-rupiah" id="uang_dibayar_<?= $a['id_antrian'] ?>">
                                                            <input type="hidden" name="uang_dibayar_asli" id="uang_dibayar_asli_<?= $a['id_antrian'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="kembalian">Kembalian</label>
                                                            <input type="text" class="form-control" id="kembalian_<?= $a['id_antrian'] ?>" readonly>
                                                            <input type="hidden" name="kembalian" id="kembalian_hidden">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Cara Pembayaran -->
                                                <?php
                                                $caraPembayaranSebelumnya = $pembayaran['cara_pembayaran'] ?? null;
                                                $sudahMengisi = !empty($caraPembayaranSebelumnya);
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="cara_pembayaran">Cara Pembayaran</label>
                                                            <select name="cara_pembayaran" class="form-control" id="cara_pembayaran" <?= $sudahMengisi ? 'disabled' : '' ?> required>
                                                                <option value="">Pilih Metode Bayar</option>
                                                                <?php foreach ($caraPembayaranOptions as $caraPembayaran): ?>
                                                                    <option value="<?= $caraPembayaran ?>" <?= $caraPembayaranSebelumnya == $caraPembayaran ? 'selected' : '' ?>>
                                                                        <?= ucfirst($caraPembayaran) ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?php if ($sudahMengisi): ?>
                                                                <input type="hidden" name="cara_pembayaran" value="<?= esc($caraPembayaranSebelumnya) ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tombol -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Bayar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- end modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('.form-bayar');

        forms.forEach(form => {
            const id = form.dataset.id;
            const tarifInput = document.getElementById('tarif_' + id);
            const bayarInput = document.getElementById('uang_dibayar_' + id);
            const kembaliInput = document.getElementById('kembalian_' + id);
            const bayarAsliInput = document.getElementById('uang_dibayar_asli_' + id);

            function formatRupiah(angka) {
                let number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return rupiah;
            }

            function rupiahToNumber(rupiah) {
                let angka = rupiah.replace(/\./g, '').replace(/,/g, '.');
                return parseFloat(angka) || 0;
            }

            function hitungKembalian() {
                const tarif = rupiahToNumber(tarifInput.value);
                const bayar = rupiahToNumber(bayarInput.value);
                const kembali = bayar - tarif;

                if (kembali < 0) {
                    kembaliInput.value = 'Rp 0';
                } else {
                    kembaliInput.value = 'Rp ' + formatRupiah(kembali.toString());
                }
            }

            function formatAndSet(inputElement, hiddenElement = null) {
                let cursorPos = inputElement.selectionStart;
                let raw = inputElement.value;
                raw = raw.replace(/[^\d]/g, '');
                const angka = parseInt(raw) || 0;
                inputElement.value = formatRupiah(angka.toString());
                if (hiddenElement) hiddenElement.value = angka;
                inputElement.selectionEnd = cursorPos;
            }

            tarifInput.addEventListener('input', function () {
                formatAndSet(tarifInput);
                hitungKembalian();
            });

            bayarInput.addEventListener('input', function () {
                formatAndSet(bayarInput, bayarAsliInput);
                hitungKembalian();
            });

            // Jika modal terbuka dan sudah ada nilai, hitung
            hitungKembalian();
        });
    });
</script>


<?= $this->endSection(); ?>