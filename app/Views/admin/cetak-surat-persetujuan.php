<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Informed Consent</title>    
    <link rel="icon" href="<?= base_url('clinic/assets/tittle.png') ?>" type="image/png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 40px;
        }

        .header-logo {
            width: 100px;
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

    <div class="container mt-4">
        <!-- Kop -->
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

        <div class="text-center mb-4">
            <h6><strong>INFORMED CONSENT</strong></h6>
        </div>

        <!-- Isi Formulir -->
        <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>
        <table class="table table-borderless">
            <tr>
                <td style="width: 25%">Nama</td>
                <td>: _____________________________________</td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>: _____________________________________</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: _____________________________________</td>
            </tr>
        </table>

        <p>Menerangkan bahwa <strong>*) SAYA SENDIRI / ANAK / ORANG TUA / SAUDARA </strong> dari:</p>
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
                <td>Alamat</td>
                <td>: <?= $resume['alamat_lengkap'] ?? '-' ?>, RT <?= $resume['rt'] ?? '-' ?>, RW <?= $resume['rw'] ?? '-' ?>, Kelurahan <?= $resume['kelurahan'] ?? '-' ?>, Kecamatan <?= $resume['kecamatan'] ?? '-' ?>, Provinsi <?= $resume['provinsi'] ?? '-' ?></td>
            </tr>
        </table>

        <p><strong>*) SETUJU / MENOLAK</strong> untuk dilakukan tindakan medis berupa :</p>
        <p class="ms-3"><?= $tindakan['nama_tindakan'] ?></p>

        <p>Saya telah menyatakan dengan sesungguhnya dan tanpa paksaan bahwa saya:</p>
        <ol type="a">
            <li>Telah diberikan informasi dan penjelasan serta peringatan akan risiko kemungkinan yang timbul apabila tidak dilakukan tindakan medis yang berupa <u><?= $tindakan['nama_tindakan'] ?></u></li>
            <li>Telah saya pahami sepenuhnya informasi dan penjelasan yang diberikan dokter</li>
            <li>Atas tanggung jawab dan risiko saya sendiri tetap <strong>setuju / menolak</strong> *) tindakan medis yang dianjurkan oleh dokter</li>
        </ol>

        <p>Demikian pernyataan ini saya buat dengan penuh kesadaran dan tanpa paksaan</p>

        <p><em>*) Coret yang tidak perlu</em></p>

        <!-- Tanda tangan -->
        <div class="row mt-5">
            <div class="col-6"></div>
            <div class="col-6 text-end">
                <p>Bangkalan, .........................</p>
                <p>Dokter gigi,</p>
                <div class="signature-space">
                    <img src="<?= base_url('uploads/ttd/' . $dokter['ttd']) ?>" alt="Tanda Tangan Dokter" style="width: 150px;">
                </div>
                <p>(drg. <?= $dokter['nama']; ?>)</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-6 text-center">
                <p>Yang membuat pernyataan,</p>
                <div class="signature-space"></div>
                <p>( <?= $resume['nama_lengkap']; ?> )</p>
            </div>
            <div class="col-6 text-center">
                <p>Saksi,</p>
                <div class="signature-space"></div>
                <p>( _______________________ )</p>
            </div>
        </div>
    </div>

</body>

</html>