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
                            <th>Status Resep</th>
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
                            <th>Status Resep</th>
                            <th>Status Bayar</th>
                            <th> </th>
                        </tr>
                    </tfoot>
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
                                <td><?= ucwords(str_replace('_', ' ', $a['status_resep'])); ?></td>
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
                    <div class="modal fade" id="bayarModal<?= $a['id_antrian'] ?>" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title" id="bayarModalLabel">Pembayaran Nomor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('/pembayaran'); ?>" method="POST">
                                        <input type="hidden" name="id_antrian" value="<?= esc($a['id_antrian']); ?>">
                                        <?php
                                        $no_bayar = 'BYR-' . date('d-m-Y', strtotime($a['tanggal_periksa'])) . '-0' . $a['nomor_antrian'];
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="no_bayar">Nomor Bayar</label>
                                                    <input type="text" class="form-control" id="no_bayar" name="no_bayar" value="<?= $no_bayar ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Resep Obat -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="resep">Resep</label>
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
                                                                    <?php foreach ($resepList as $r):
                                                                        // dd($r);
                                                                    ?>
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
                                                    <label for="penyakit">Penyakit</label>
                                                    <input type="text" class="form-control" value="<?= esc($a['nama_penyakit'] ?? 'Belum diisi'); ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="perawatan">Perawatan</label>
                                                    <input type="text" class="form-control" value="<?= esc($a['nama_tindakan'] ?? 'Belum diisi'); ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tarif -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="tarif_display">Tarif</label>
                                                    <!-- Untuk tampilan -->
                                                    <input type="text" class="form-control" id="tarif_display" value="Rp <?= number_format($tarif[$a['rm_id']] ?? 0, 0, ',', '.'); ?>" readonly>
                                                    <!-- Untuk dikirim ke server -->
                                                    <input type="hidden" name="tarif" id="tarif" value="<?= esc($tarif[$a['rm_id']] ?? 0); ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Uang Dibayar & Kembalian -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="uang_dibayar">Uang Dibayar</label>
                                                    <input type="text" class="form-control" id="uang_dibayar" required>
                                                    <input type="hidden" name="uang_dibayar" id="uang_dibayar">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kembalian">Kembalian</label>
                                                    <input type="text" class="form-control" id="kembalian" readonly>
                                                    <input type="hidden" name="kembalian" id="kembalian">
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
                                                    <select name="cara_pembayaran" class="form-control" <?= $sudahMengisi ? 'disabled' : '' ?> required>
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
                    <!-- end modal bayar -->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tarifInput = document.querySelector('input[name="tarif"]');
        const bayarInput = document.getElementById('uang_dibayar');
        const kembaliInput = document.getElementById('kembalian');
        const hiddenInput = document.getElementById('hiddenInput'); // Tambahkan input tersembunyi

        // Fungsi untuk menghitung kembalian
        function hitungKembalian() {
            const tarif = parseInt(tarifInput.value.replace(/\D/g, '')) || 0; // Menghapus non-numeric dari tarif
            const bayar = parseInt(bayarInput.value.replace(/\D/g, '')) || 0; // Menghapus non-numeric dari bayar
            const kembali = bayar - tarif;
            kembaliInput.value = formatRupiah(kembali.toString()); // Format kembalian dengan format rupiah
        }

        // Event listener untuk input bayar
        bayarInput.addEventListener('input', function() {
            let raw = bayarInput.value.replace(/[^,\d]/g, ''); // Menghapus semua karakter selain angka dan koma
            if (raw === '') {
                bayarInput.value = '';
                hiddenInput.value = '';
                return;
            }

            let number = parseInt(raw, 10); // Mengubah nilai menjadi angka
            bayarInput.value = formatRupiah(number.toString()); // Format kembali sebagai rupiah
            hiddenInput.value = number; // Menyimpan nilai angka mentah
        });

        // Event listener untuk input tarif dan bayar
        tarifInput.addEventListener('input', hitungKembalian);
        bayarInput.addEventListener('input', hitungKembalian);

        // Fungsi untuk format angka ke format rupiah
        function formatRupiah(angka, prefix) {
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
            return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }
    });
</script>


<?= $this->endSection(); ?>