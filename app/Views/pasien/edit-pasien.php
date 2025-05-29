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
                        <a href="<?= base_url('/pasien'); ?>">Data Pasien</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Pasien</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-flex align-items-center">
                        <h2>Edit Data Pasien</h2>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/pasien/update/' . $pasien['id_pasien']); ?>" method="post" class="form-horizontal">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <?php
                                $fields = [
                                    'nomor_rekam_medis' => ['readonly' => true],
                                    'nik' => [],
                                    'nama_lengkap' => [],
                                    'tempat_lahir' => [],
                                    'tanggal_lahir' => ['type' => 'date'],
                                    'nama_ibu_kandung' => [],
                                    'telepon_rumah' => [],
                                    'telepon_selular' => [],
                                    'suku' => [],
                                    'bahasa' => []
                                ];

                                foreach ($fields as $name => $opts):
                                    $label = ucwords(str_replace('_', ' ', $name));
                                    $type = $opts['type'] ?? 'text';
                                    $readonly = isset($opts['readonly']) ? 'readonly' : '';
                                ?>
                                    <div class="form-group">
                                        <label for="<?= $name ?>"><?= $label ?></label>
                                        <input type="<?= $type ?>" id="<?= $name ?>" name="<?= $name ?>" class="form-control" value="<?= $pasien[$name]; ?>" <?= $readonly ?>>
                                    </div>
                                <?php endforeach; ?>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($jenis_kelamin as $jk): ?>
                                            <option value="<?= $jk['id_jenis_kelamin']; ?>" <?= $pasien['jenis_kelamin_id'] == $jk['id_jenis_kelamin'] ? 'selected' : ''; ?>>
                                                <?= $jk['nama_jenis_kelamin']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" id="agama" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($agama as $a): ?>
                                            <option value="<?= $a['id_agama']; ?>" <?= $pasien['agama_id'] == $a['id_agama'] ? 'selected' : ''; ?>>
                                                <?= $a['nama_agama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="row m-2">
                                    <?php
                                    $smallFields = ['rt', 'rw', 'kecamatan', 'kelurahan'];
                                    foreach ($smallFields as $f):
                                    ?>
                                        <div class="form-group col-md-3">
                                            <label for="<?= $f ?>"><?= ucwords($f) ?></label>
                                            <input type="text" id="<?= $f ?>" name="<?= $f ?>" class="form-control" value="<?= $pasien[$f]; ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <?php
                                $rightFields = ['kota', 'kode_pos', 'provinsi', 'negara', 'pekerjaan', 'identitas_lain'];
                                foreach ($rightFields as $name):
                                ?>
                                    <div class="form-group">
                                        <label for="<?= $name ?>"><?= ucwords(str_replace('_', ' ', $name)) ?></label>
                                        <input type="text" id="<?= $name ?>" name="<?= $name ?>" class="form-control" value="<?= $pasien[$name]; ?>">
                                    </div>
                                <?php endforeach; ?>

                                <div class="form-group">
                                    <label for="alamat_lengkap">Alamat Lengkap</label>
                                    <textarea name="alamat_lengkap" id="alamat_lengkap" class="form-control" required><?= $pasien['alamat_lengkap']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_domisili">Alamat Domisili</label>
                                    <textarea name="alamat_domisili" id="alamat_domisili" class="form-control"><?= $pasien['alamat_domisili']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status_pernikahan">Status Pernikahan</label>
                                    <select name="status_pernikahan" id="status_pernikahan" class="form-control" >
                                        <!-- <option value="">-- Pilih --</option> -->
                                        <?php
                                        $statusOptions = ['Belum Menikah', 'Menikah', 'Duda', 'Janda'];
                                        foreach ($statusOptions as $status):
                                        ?>
                                            <option value="<?= $status ?>" <?= $pasien['status_pernikahan'] == $status ? 'selected' : ''; ?>>
                                                <?= $status ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <select name="pendidikan" id="pendidikan" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($pendidikan as $p): ?>
                                            <option value="<?= $p['id_pendidikan']; ?>" <?= $pasien['pendidikan_id'] == $p['id_pendidikan'] ? 'selected' : ''; ?>>
                                                <?= $p['nama_pendidikan']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card-action d-flex justify-content-end m-4">
                            <button type="submit" class="btn btn-primary me-3">Simpan</button>
                            <a href="<?= base_url('/pasien'); ?>" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>