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
                        <a href="#">Tambah Pasien</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-flex align-items-center">
                        <h2>Tambah Pasien</h2>
                    </div>
                </div>
                <div class="card-cody">
                    <form action="<?= base_url('/pasien-add'); ?>" method="post" class="form-horizontal">
                        <?= csrf_field(); ?>

                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="nomor_rekam_medis" for="nomor_rekam_medis">Nomor Rekam Medis</label>
                                    <input type="text" name="nomor_rekam_medis" class="form-control" value="<?= $nomor_rekam_medis; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" id="nik"  name="nik" class="form-control" maxlength="16" autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($jenis_kelamin as $jk): ?>
                                            <option value="<?= $jk['id_jenis_kelamin']; ?>"><?= $jk['nama_jenis_kelamin']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" id="agama" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($agama as $a): ?>
                                            <option value="<?= $a['id_agama']; ?>"><?= $a['nama_agama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="nama_ibu_kandung">Nama Ibu Kandung</label>
                                    <input type="text" id="nama_ibu_kandung" name="nama_ibu_kandung" class="form-control">
                                </div>

                                
                                <div class="form-group">
                                    <label for="telepon_rumah">Telepon Rumah</label>
                                    <input type="text" id="telepon_rumah" name="telepon_rumah" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="telepon_seluler">Telepon Selular</label>
                                    <input type="text" id="telepon_seluler" name="telepon_selular" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="suku">Suku</label>
                                    <input type="text" id="suku" name="suku" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="bahasa">Bahasa</label>
                                    <input type="text" id="bahasa" name="bahasa" class="form-control">
                                </div>

                                
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="row m-2">
                                    <div class="form-group col-md-2">
                                        <label for="rt">RT</label>
                                        <input type="text" id="rt" name="rt" class="form-control">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="rw">RW</label>
                                        <input type="text" id="rw" name="rw" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" id="kecamatan" name="kecamatan" class="form-control">
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label for="kelurahan">Kelurahan</label>
                                        <input type="text" id="kelurahan" name="kelurahan" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <input type="text" id="kota" name="kota" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" id="kode_pos" name="kode_pos" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" id="provinsi" name="provinsi" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="negara">Negara</label>
                                    <input type="text" id="negara" name="negara" class="form-control" value="Indonesia">
                                </div>

                                <div class="form-group">
                                    <label for="alamat_lengkap">Alamat Lengkap</label>
                                    <textarea name="alamat_lengkap" id="alamat_lengkap"  class="form-control" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_domisi">Alamat Domisili</label>
                                    <textarea name="alamat_domisili" id="alamat_domisili" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" id="pekerjaan" name="pekerjaan" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="status_pernikahan">Status Pernikahan</label>
                                    <select name="status_pernikahan" id="status_pernikahan" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Duda">Duda</option>
                                        <option value="Janda">Janda</option>
                                    </select>
                                </div>                                

                                <div class="form-group">
                                    <label for="perndidikan">Pendidikan</label>
                                    <select name="pendidikan" id="pendidikan" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($pendidikan as $p): ?>
                                            <option value="<?= $p['id_pendidikan']; ?>"><?= $p['nama_pendidikan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="identitas_lain">Identitas Lain</label>
                                    <input type="text" id="identitas_lain" name="identitas_lain" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Simpan -->
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