<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>General Consent</title>
    
    <link rel="shortcut icon" href="<?= base_url('clinic/assets/tittle.png') ?>" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 40px;
        }

        .logo {
            width: 80px;
        }

        .line {
            border-top: 3px double #000;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .signature-space {
            height: 60px;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="container">
        <!-- Kop -->
        <div class="row text-center mb-3">
            <div class="col-2">
                <img src="<?= base_url('clinic/assets/tittle.png') ?>" alt="Logo" class="logo">
            </div>
            <div class="col-10">
                <h5 class="mb-0">PRAKTIK MANDIRI drg. SONIYA MAYASARI</h5>
                <p class="mb-0">Jl. Sidowarek No.35, Kemayoran, Bangkalan, Jawa Timur 69116<br>
                    Telepon: (0857) 4554 - 4445 | Email: drg.soniya@gmail.com</p>
            </div>
        </div>
        <hr class="line">

        <h6 class="text-center mb-3"><strong>GENERAL CONSENT</strong></h6>

        <!-- IDENTITAS PASIEN -->
        <h6><strong>IDENTITAS PASIEN</strong></h6>
        <table class="table table-borderless">
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
                <td>No. Telpon</td>
                <td>:
                    <?php if ($resume['telepon_rumah'] !== '-' && $resume['telepon_rumah'] !== '') {
                        echo $resume['telepon_rumah'];
                    } elseif ($resume['telepon_selular'] !== '-' && $resume['telepon_selular'] !== '') {
                        echo $resume['telepon_selular'];
                    } else {
                        echo '-';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= $resume['alamat_lengkap'] ?? '-' ?>, RT <?= $resume['rt'] ?? '-' ?>, RW <?= $resume['rw'] ?? '-' ?>, Kelurahan <?= $resume['kelurahan'] ?? '-' ?>, Kecamatan <?= $resume['kecamatan'] ?? '-' ?>, Provinsi <?= $resume['provinsi'] ?? '-' ?></td>
            </tr>
        </table>

        <p><strong>PASIEN / WALI HARUS MEMBACA, MEMAHAMI DAN MENGISI INFORMASI BERIKUT</strong></p>

        <ol>
            <li><strong>PERSETUJUAN UNTUK PERAWATAN DAN PENGOBATAN</strong><br>
                Saya menyetujui dilakukannya pemeriksaan, perawatan dan tindakan medis berupa: <strong><?= $tindakan['nama_tindakan'] ?></strong>.
                Saya telah menerima penjelasan secara rinci dan memahami risiko serta manfaat dari tindakan tersebut.
            </li>
            <li class="mt-3"><strong>PERSETUJUAN PELEPASAN INFORMASI</strong><br>
                Saya mengizinkan informasi medis saya dibagikan kepada pihak yang berwenang apabila dibutuhkan untuk keperluan medis lebih lanjut atau keperluan administratif.
                <br>
                Informasi tersebut boleh diberikan kepada:
                <ol type="1">
                    <li>....................................................</li>
                    <li>....................................................</li>
                    <li>....................................................</li>
                </ol>
            </li>
            <li class="mt-3"><strong>HAK DAN TANGGUNG JAWAB PASIEN</strong><br>
                Saya memahami bahwa saya berhak untuk bertanya, menolak, atau meminta pendapat kedua (second opinion) atas tindakan yang akan dilakukan.
                Saya juga bertanggung jawab memberikan informasi yang akurat kepada dokter dan mematuhi instruksi pengobatan.
            </li>
            <li class="mt-3"><strong>INFORMASI BIAYA</strong><br>
                Saya memahami bahwa saya akan dikenakan biaya atas tindakan medis ini sesuai dengan ketentuan tarif yang berlaku.
            </li>
        </ol>

        <!-- Tanda tangan -->
        <div class="row mt-5">
            <div class="col-6 text-center">
                <p>Wali Pasien</p>
                <div class="signature-space"></div>
                <p>( <?= $resume['nama_lengkap'] ?> )</p>
            </div>
            <div class="col-6 text-center">
                <p>Saksi</p>
                <div class="signature-space"></div>
                <p>( ................................ )</p>
            </div>
        </div>
    </div>

</body>

</html>