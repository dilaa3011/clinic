<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Resume Medis Pasien</title>
    <link rel="icon" href="<?= base_url(); ?>clinic/assets/tittle.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>        

         body {
            font-family: 'Times New Roman', Times, serif;
            margin: 40px;
        }

        .header-logo {
            width: 100px;
        }
        table {
            width: 100%;
        }

        .kop {
            border: 1px solid black;
            padding: 10px;
        }

        .line {
            border-top: 3px double #000;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .title {
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
            /* text-decoration: underline; */
        }

        li {
            margin-top: 20px;
        }

        .signature {
            float: right;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="row text-center">
        <div class="col-2">
            <img src="<?= base_url('clinic/assets/tittle.png') ?>" alt="Logo" class="header-logo mb-2">
        </div>
        <div class="col-10">
            <h5 class="mb-0">PRAKTIK MANDIRI drg. SONIYA MAYASARI</h5>
            <p class="mb-0">JL Sidingsako No.35, Kemayoran, Kec. Bangkalan, Kabupaten Bangkalan, Jawa Timur 69116<br>
                    Telepon: (0857) 4554 - 4445 | Email: <a href="mailto:drg.soniya@gmail.com">drg.soniya@gmail.com</a></p>
        </div>
    </div>
    <hr class="line">    

    <h6 class="title">RESUME MEDIS PASIEN</h6>

    <div class="container mt-4" style="font-size: 16px;">

        <!-- data pasien -->
        <table >
            <tr>
                <td>Nomor Rekam Medis</td>
                <td>: <?= $resume['nomer_rm']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <?= $resume['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <?= $resume['nama_jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: <?= date('d-m-Y', strtotime($resume['tanggal_lahir'])); ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= $resume['alamat_lengkap'] ?? '-' ?>, RT <?= $resume['rt'] ?? '-' ?>, RW <?= $resume['rw'] ?? '-' ?>, Kelurahan <?= $resume['kelurahan'] ?? '-' ?>, Kecamatan <?= $resume['kecamatan'] ?? '-' ?>, Provinsi <?= $resume['provinsi'] ?? '-' ?></td>
            </tr>
        </table>
        <br>
        <!-- I. Anamnesis -->
        <div class="mb-4">
            <strong>I. Anamnesis / Keluhan Utama : </strong> <?= ucwords(nl2br($resume['anamnesa'])); ?>
            <!-- <p style="margin-left: 20px;"></p> -->
        </div>
        <br>

        <!-- II. Pemeriksaan Klinis -->
        <div class="mb-4">
            <strong>II. Pemeriksaan Klinis :</strong>
            <ul>
                <li><strong>Ekstraoral</strong> : <?= $resume['ekstraoral'] ?? '..............................................................'; ?></li>
                <li><strong>Intraoral</strong>
                <li>Gigi : <?= $resume['gigi'] ?? '..............................................................'; ?></li>
                <li>Perkusi : <?= $resume['perkusi'] ?? '..............................................................'; ?></li>
                <li>Vitalitas Pulpa : <?= $resume['vitalitas'] ?? '..............................................................'; ?></li>
                <li>Mukosa dan Gingiva : <?= $resume['mukosa'] ?? '..............................................................'; ?></li>
            </ul>
            </li>
            </ul>
        </div>

        <!-- III. Diagnosis -->
        <div class="mb-4">
            <strong>III. Diagnosis :</strong>
            <ul>
                <li>
                    Diagnosis Utama : <?= $resume['diagnosa'] ?? '..............................................................'; ?>
                </li>
                <li>Diagnosis Sekunder : <?= $resume['diagnosa'] ?? '..............................................................'; ?></li>
            </ul>
        </div>

        <!-- IV. Penatalaksanaan -->
        <div class="mb-4">
            <strong>IV. Penatalaksanaan :</strong>
            <ul>
                <li>Edukasi pasien terkait kondisi dan rencana perawatan :
                    <div style="margin-left: 20px; margin-top: 20px">
                        <?= $tindakan ? $tindakan['nama_tindakan'] : 'Tidak Ada Tindakan'; ?>
                    </div>
                </li>
                <li> Dilakukan tindakan perawatan :
                    <div style="margin-left: 20px; margin-top: 20px">
                        <?= $tindakan ? $tindakan['nama_tindakan'] : 'Tidak Ada Tindakan'; ?>
                    </div>
                </li>
                <li>Obat-obatan :
                    <ul style="margin-left: 20px; margin-top: 20px">
                        <?php if (!empty($resep)) : ?>
                            <?php foreach ($resep as $r) : ?>
                                <li>
                                    <?= $r['nama_obat']; ?> (<?= $r['jumlah_obat']; ?> <?= $r['unit']; ?>), Aturan pakai: <?= $r['aturan_pakai']; ?>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li><em>Tidak ada resep obat.</em></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li> Jadwal kontrol :
                    <div style="margin-left: 20px; margin-top: 20px">
                        <?= $resume['jadwal_kontrol'] ?? '..............................................................'; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>



    <div class="signature">
        <p>Bangkalan, .........................</p>
        Dokter Gigi Pemeriksa<br><br>
        <img src="<?= base_url('uploads/ttd/' . $dokter['ttd']) ?>" alt="Tanda Tangan Dokter" style="width: 150px;">
        <br>
        <strong><?= $dokter['nama']; ?></strong><br>
        (<?= $dokter['no_hp']; ?>)
    </div>

</body>

</html>