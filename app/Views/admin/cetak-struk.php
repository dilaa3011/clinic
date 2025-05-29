<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Struk Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 20px;
        }

        .header,
        .footer {
            text-align: center;
        }

        .header img {
            height: 40px;
        }

        .info {
            margin: 20px 0;
        }

        .info td {
            padding: 2px 4px;
        }

        hr {
            border: 1px dashed #000;
            margin: 10px 0;
        }

        .total-section {
            margin-top: 10px;
        }

        .total-section td {
            padding: 4px;
        }

        .footer {
            margin-top: 40px;
        }

        .right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="header">
        <img src="<?= base_url('clinic/assets/tittle.png') ?>" alt="Logo" class="header-logo mb-2">
        <h5 class="mb-0">PRAKTIK MANDIRI drg. SONIYA MAYASARI</h5>
        <p class="mb-0">JL Sidingsako No.35, Kemayoran, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69116<br>
            Telepon: (0857) 4554 - 4445 | Email: <a href="mailto:drg.soniya@gmail.com">drg.soniya@gmail.com</a></p>
    </div>

    <hr>

    <table class="info" width="100%">
        <tr>
            <td>Cashier</td>
            <td>: <?= esc($pembayaran['nama_petugas']) ?></td>
        </tr>
        <tr>
            <td>Pasien</td>
            <td>: <?= esc($pasien['nama_lengkap']) ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: <?= date('d-m-Y H:i', strtotime($pembayaran['tanggal_bayar'])) ?></td>
            <td class="right">No. Struk: <?= esc($pembayaran['no_bayar']) ?></td>
        </tr>
    </table>

    <hr>

    <h4>Biaya Administrasi</h4>
    <p><?= esc($tindakan['nama_tindakan'] ?? '-') ?> - Rp. <?= number_format($tindakan['tarif'] ?? 0, 0, ',', '.') ?></p>

    <h4>Obat-obatan</h4>
    <p><?= esc($obat['nama_obat'] ?? '-') ?> - Rp. <?= number_format($obat['harga'] ?? 0, 0, ',', '.') ?></p>

    <hr>

    <?php
    $tarif = (int)($tindakan['tarif'] ?? 0);
    $harga_obat = (int)($obat['harga'] ?? 0);
    $bayar = $pembayaran['uang_bayar'];
    $total = (int)$pembayaran['total_bayar'];
    $kembali = $bayar - $total;
    ?>

    <table class="total-section" width="100%">
        <tr>
            <td class="right bold">Harga:</td>
            <td class="right">Rp. <?= number_format($pembayaran['total_bayar'], 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td class="right bold">Diskon:</td>
            <td class="right">Rp. 0</td>
        </tr>
        <tr>
            <td class="right bold">Total:</td>
            <td class="right">Rp. <?= number_format($pembayaran['total_bayar'], 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td class="right bold">Dibayar:</td>
            <td class="right">Rp. <?= number_format($bayar, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td class="right bold">Kembali:</td>
            <td class="right">Rp. <?= number_format($kembali, 0, ',', '.') ?></td>
        </tr>
    </table>

    <div class="footer">
        <p>Terima Kasih<br>Semoga Lekas Sembuh</p>
    </div>

</body>

</html>