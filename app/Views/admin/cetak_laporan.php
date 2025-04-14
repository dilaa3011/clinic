<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $tittle; ?></title>
    <link rel="icon" href="<?= base_url(); ?>clinic/assets/tittle.png" type="image/x-icon" />

</head>

<body>
    <h3 style="text-align: center;">Laporan Rekam Medis</h3>
    
    <div style="text-align: center;">
        <?php if (!empty($tanggal_awal) && !empty($tanggal_akhir)) : ?>
            <p>Periode: <?= date('d-m-Y', strtotime($tanggal_awal)) ?> s/d <?= date('d-m-Y', strtotime($tanggal_akhir)) ?></p>
        <?php else : ?>
            <p>Periode: Semua Data</p>            
        <?php endif; ?>
        <p>Tanggal Cetak: <?= date('d-m-Y') ?></p>
    </div>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
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
        <tbody>
            <?php if (empty($rekamMedis)) : ?>
                <tr>
                    <td colspan="8" style="text-align: center;">Tidak ada data</td>
                </tr>
            <?php else : ?>
                <?php foreach ($rekamMedis as $rekam) : ?>
                    <tr>
                        <td>RM<?= str_pad($rekam['id'], 4, '0', STR_PAD_LEFT); ?></td>
                        <td><?= date('d-m-Y', strtotime($rekam['tanggal_periksa'])); ?></td>
                        <td><?= $rekam['nama_pasien']; ?></td>
                        <td><?= $rekam['nik']; ?></td>
                        <td><?= $rekam['nama_dokter']; ?></td>
                        <td><?= $rekam['tindakan']; ?></td>
                        <td><?= $rekam['resep']; ?></td>
                        <td>Rp <?= number_format($rekam['tarif'], 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>

</body>

</html>


