<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Sakit</title>
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

        .line {
            border-top: 3px double #000;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .underline {
            text-decoration: underline;
        }

        .signature {
            margin-top: 60px;
            text-align: right;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="row text-center">
        <div class="col-2">
            <img src="<?= base_url('clinic/assets/tittle.png') ?>" alt="Logo" class="header-logo mb-2">
        </div>
        <div class="col-10">
            <h5 class="mb-0">KLINIK GIGI Dr. MAYASARI</h5>
            <p class="mb-0">Jl. Bharata Perumnas Bumi Telukjambe No. C16, Sukaluyu, Telukjambe Timur, Karawang</p>
            <p>(<?= $dokter['no_hp'] ?>)</p>
        </div>
    </div>
    <hr class="line">
    <div class="text-center mb-4">
        <h6><strong>SURAT KETERANGAN SAKIT</strong></h6>
    </div>

    <div class="mt-4">
        <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>

        <table class="table table-borderless">
            <tr>
                <td style="width: 25%">Nama</td>
                <td>: <?= $resume['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>: <?= \CodeIgniter\I18n\Time::parse($resume['tanggal_lahir'])->age . ' tahun' ?> / <?= $resume['nama_jenis_kelamin'] ?? '-' ?></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: <?= $resume['pekerjaan']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= $resume['alamat_lengkap'] ?? '-' ?>, RT <?= $resume['rt'] ?? '-' ?>, RW <?= $resume['rw'] ?? '-' ?>, Kelurahan <?= $resume['kelurahan'] ?? '-' ?>, Kecamatan <?= $resume['kecamatan'] ?? '-' ?>, Provinsi <?= $resume['provinsi'] ?? '-' ?></td>
            </tr>
        </table>
        <?php
        $tanggalMulai = date('d F Y');
        $tanggalSelesai = date('d F Y', strtotime('+2 days'));
        ?>


        <p class="mt-4">
            Oleh karena <strong>SAKIT</strong>, dengan diagnosis <span class="underline"><?= $resume['diagnosa'] ?></span>
            sehingga perlu diberikan <br>

            <strong>ISTIRAHAT</strong> selama <span class="underline">3</span> hari, terhitung mulai tanggal
            <span class="underline"><?= $tanggalMulai ?></span> s/d <span class="underline"><?= $tanggalSelesai ?></span>.

        </p>

        <p>Demikian surat keterangan ini dibuat dengan sebenarnya dan untuk dipergunakan semestinya.</p>
    </div>

    <div class="signature">
        <p>Bangkalan, <?= date('d F Y') ?></p>
        <p>Dokter gigi yang menyatakan,</p>
        <br><br>
        <p class="fw-bold underline">(drg. <?= $dokter['nama'] ?>)</p>
    </div>

</body>

</html>