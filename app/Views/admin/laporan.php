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
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="<?= base_url('/laporan'); ?>">Laporan</a></li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <form id="formFilter" action="<?= base_url('/master-lap-klinik'); ?>" method="post">
                            <div class="input-group">
                                <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" value="<?= $tanggal_awal ?? '' ?>">
                                <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" value="<?= $tanggal_akhir ?? '' ?>">
                                <!-- <button type="submit" class="btn btn-primary">Cari</button> -->
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
                    <table id="tabelLaporan" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No. Pembayaran</th>
                                <th>Tanggal</th>
                                <th>Nama Pasien</th>
                                <th>NIK</th>
                                <th>Perawatan</th>                                
                                <th>Dosis</th>
                                <th>Metode</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="7" class="text-end">Total Pendapatan</th>
                                <th>Rp <?= number_format($total, 2, ',', '.'); ?></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($pembayaran as $row): ?>
                                <tr>
                                    <td><?= $row['no_bayar']; ?></td>
                                    <td><?= $row['tanggal_bayar']; ?></td>
                                    <td><?= $row['nama_lengkap']; ?></td>
                                    <td><?= $row['nik']; ?></td>
                                    <td><?= $row['nama_tindakan'] ?? '-'; ?></td>                                    
                                    <td><?= $row['dosis'] ?? '-'; ?></td>
                                    <td><?= $row['cara_pembayaran']; ?></td>
                                    <td>Rp <?= number_format($row['total_bayar'], 2, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
        // Sinkronisasi tanggal filter dan cetak
        const formFilter = document.getElementById('formFilter');
        const formCetak = document.getElementById('formCetak');

        const tanggalAwal = document.getElementById('tanggal_awal');
        const tanggalAkhir = document.getElementById('tanggal_akhir');
        const cetakAwal = document.getElementById('cetak_tanggal_awal');
        const cetakAkhir = document.getElementById('cetak_tanggal_akhir');

        formFilter.addEventListener('submit', function () {
            cetakAwal.value = tanggalAwal.value;
            cetakAkhir.value = tanggalAkhir.value;
        });

        formCetak.addEventListener('submit', function () {
            cetakAwal.value = tanggalAwal.value;
            cetakAkhir.value = tanggalAkhir.value;
        });

        // Inisialisasi DataTables
        $(document).ready(function () {
            $('#tabelLaporan').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Laporan Pendapatan Klinik'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Laporan Pendapatan Klinik'
                    },
                    {
                        extend: 'print',
                        title: 'Laporan Pendapatan Klinik'
                    }
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });
    </script>
</div>
<?= $this->endSection(); ?>
