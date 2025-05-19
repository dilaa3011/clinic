<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Pendapatan Klinik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2,
        h4 {
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid black;
            padding: 6px;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        @media print {
            button {
                display: none;
            }
        }
    </style>
</head>

<body>

    <h2>Laporan Pendapatan Klinik</h2>
    <?php if ($tanggal_awal && $tanggal_akhir): ?>
        <h4>Periode: <?= date('d/m/Y', strtotime($tanggal_awal)); ?> - <?= date('d/m/Y', strtotime($tanggal_akhir)); ?></h4>
    <?php else: ?>
        <h4>Semua Data</h4>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Pembayaran</th>
                <th>Tanggal</th>
                <th>Pasien</th>
                <th>NIK</th>
                <th>Perawatan</th>
                <th>Obat</th>
                <th>Dosis</th>
                <th>Metode</th>
                <th>Total (Rp)</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($pembayaran as $row): ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $row['no_bayar']; ?></td>
                    <td><?= date('d/m/Y', strtotime($row['tanggal_bayar'])); ?></td>
                    <td><?= $row['nama_lengkap']; ?></td>
                    <td><?= $row['nik']; ?></td>
                    <td><?= $row['nama_tindakan'] ?? '-'; ?></td>
                    <td><?= $row['nama_obat'] ?? '-'; ?></td>
                    <td><?= $row['dosis'] ?? '-'; ?></td>
                    <td><?= $row['cara_pembayaran']; ?></td>
                    <td class="text-end"><?= number_format($row['total_bayar'], 2, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="9" class="text-end">Total Pendapatan</th>
                <th class="text-end">Rp <?= number_format($total, 2, ',', '.'); ?></th>
            </tr>
        </tbody>
    </table>

    <br><br>
    <div style="text-align: right; margin-top: 40px;">
        <p><?= date('d F Y'); ?></p>
        <p>Petugas</p>
        <br><br>
        <p><?= session('nama'); ?></p>
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <button onclick="window.print()">Cetak / Print</button>
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>

</body>

</html>