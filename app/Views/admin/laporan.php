<?= $this->extend('layout/template'); ?>
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
                        <a href="<?= base_url('/laporan'); ?>">Laporan</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <form id="formFilter" action="<?= base_url('/laporan'); ?>" method="post">
                            <div class="input-group">
                                <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal">
                                <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <form action="<?= site_url('laporan/cetak'); ?>" method="post" target="_blank" id="formCetak">
                                <input type="hidden" name="tanggal_awal" id="cetak_tanggal_awal">
                                <input type="hidden" name="tanggal_akhir" id="cetak_tanggal_akhir">
                                <button type="submit" class="btn btn-primary">Cetak</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No. Rekam Medis</th>
                                <th>Tanggal Periksa</th>
                                <th>Nama Pasien</th>
                                <th>NIK</th>
                                <th>Nama Dokter</th>
                                <th>Perawatan</th>
                                <th>Resep</th>
                                <th>Total Tarif</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No. Rekam Medis</th>
                                <th>Tanggal Periksa</th>
                                <th>Nama Pasien</th>
                                <th>NIK</th>
                                <th>Nama Dokter</th>
                                <th>Perawatan</th>
                                <th>Resep</th>
                                <th>Total Tarif</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($rekamMedis as $rekam): ?>
                                <tr>
                                    <td>RM<?= str_pad($rekam['id'], 4, '0', STR_PAD_LEFT); ?></td>
                                    <td><?= $rekam['tanggal_periksa']; ?></td>
                                    <td><?= $rekam['nama_pasien']; ?></td>
                                    <td><?= $rekam['nik']; ?></td>
                                    <td><?= $rekam['nama_dokter']; ?></td>
                                    <td><?= $rekam['tindakan']; ?></td>
                                    <td><?= $rekam['resep']; ?></td>
                                    <td>Rp <?= number_format($rekam['tarif'], 2, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Saat submit form pencarian
        document.getElementById('formFilter').addEventListener('submit', function() {
            document.getElementById('cetak_tanggal_awal').value = document.getElementById('tanggal_awal').value;
            document.getElementById('cetak_tanggal_akhir').value = document.getElementById('tanggal_akhir').value;
        });

        // Tambahkan juga sinkronisasi saat user belum submit pencarian tapi langsung klik "Cetak"
        document.getElementById('formCetak').addEventListener('submit', function() {
            document.getElementById('cetak_tanggal_awal').value = document.getElementById('tanggal_awal').value;
            document.getElementById('cetak_tanggal_akhir').value = document.getElementById('tanggal_akhir').value;
        });
    </script>



    <?= $this->endSection(); ?>