<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <ul class="nav nav-secondary">
            <?php $role = session()->get('role'); ?>

            <?php if ($role == 2) : // Admin 
            ?>
                <li class="nav-item">
                    <a href="<?= base_url('/dashboard'); ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#master" class="collapsed" aria-expanded="false">
                        <i class="fas fa-folder"></i>
                        <p>Data Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="master">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= base_url('/master-user'); ?>"><span class="sub-item">Data User</span></a></li>
                            <li><a href="<?= base_url('/master-dokter'); ?>"><span class="sub-item">Data Dokter</span></a></li>
                            <li><a href="<?= base_url('/master-agama'); ?>"><span class="sub-item">Data Agama</span></a></li>
                            <li><a href="<?= base_url('/master-pendidikan'); ?>"><span class="sub-item">Data Pendidikan</span></a></li>
                            <li><a href="<?= base_url('/master-gender'); ?>"><span class="sub-item">Data Jenis Kelamin</span></a></li>
                            <li><a href="<?= base_url('/master-penyakit'); ?>"><span class="sub-item">Data Penyakit</span></a></li>
                            <li><a href="<?= base_url('/master-tindakan'); ?>"><span class="sub-item">Data Tindakan</span></a></li>
                            <li><a href="<?= base_url('/master-obat'); ?>"><span class="sub-item">Data Obat</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item"><a href="<?= base_url('/pasien'); ?>"><i class="fas fa-user-plus"></i>
                        <p>Data Pasien</p>
                    </a></li>
                <li class="nav-item"><a href="<?= base_url('/antrian'); ?>"><i class="fas fa-notes-medical"></i>
                        <p>Antrian</p>
                    </a></li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#laporan" class="collapsed" aria-expanded="false">
                        <i class="fas fa-folder"></i>
                        <p>Laporan</p><span class="caret"></span>
                    </a>
                    <div class="collapse" id="laporan">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= base_url('/master-lap-pasien'); ?>"><span class="sub-item">Laporan Pasien</span></a></li>
                            <li><a href="<?= base_url('/master-lap-klinik'); ?>"><span class="sub-item">Laporan Klinik</span></a></li>
                        </ul>
                    </div>
                </li>

            <?php elseif ($role == 1) : // Dokter 
            ?>
                <li class="nav-item">
                    <a href="<?= base_url('/dashboard'); ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#masterDokter" class="collapsed" aria-expanded="false">
                        <i class="fas fa-folder"></i>
                        <p>Data Master</p><span class="caret"></span>
                    </a>
                    <div class="collapse" id="masterDokter">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= base_url('/master-user'); ?>"><span class="sub-item">Data User</span></a></li>
                            <li><a href="<?= base_url('/master-dokter'); ?>"><span class="sub-item">Data Dokter</span></a></li>
                            <li><a href="<?= base_url('/master-penyakit'); ?>"><span class="sub-item">Data Penyakit</span></a></li>
                            <li><a href="<?= base_url('/master-tindakan'); ?>"><span class="sub-item">Data Tindakan</span></a></li>
                            <li><a href="<?= base_url('/master-obat'); ?>"><span class="sub-item">Data Obat</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item"><a href="<?= base_url('/pasien'); ?>"><i class="fas fa-user-plus"></i>
                        <p>Data Pasien</p>
                    </a></li>
                <li class="nav-item"><a href="<?= base_url('/antrian'); ?>"><i class="fas fa-notes-medical"></i>
                        <p>Antrian</p>
                    </a></li>
                <li class="nav-item"><a href="<?= base_url('/rekam-medis'); ?>"><i class="fas fa-file-medical-alt"></i>
                        <p>Data Rekam Medis</p>
                    </a></li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#laporan" class="collapsed" aria-expanded="false">
                        <i class="fas fa-folder"></i>
                        <p>Laporan</p><span class="caret"></span>
                    </a>
                    <div class="collapse" id="laporan">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= base_url('/master-lap-pasien'); ?>"><span class="sub-item">Laporan Pasien</span></a></li>
                            <li><a href="<?= base_url('/master-lap-klinik'); ?>"><span class="sub-item">Laporan Klinik</span></a></li>
                        </ul>
                    </div>
                </li>

            <?php elseif ($role == 3) : // IT 
            ?>
                <li class="nav-item">
                    <a href="<?= base_url('/dashboard'); ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <div class="collapse" id="master">
                    <ul class="nav nav-collapse">
                        <li><a href="<?= base_url('/master-user'); ?>"><span class="sub-item">Data User</span></a></li>
                        <li><a href="<?= base_url('/master-dokter'); ?>"><span class="sub-item">Data Dokter</span></a></li>
                        <li><a href="<?= base_url('/master-agama'); ?>"><span class="sub-item">Data Agama</span></a></li>
                        <li><a href="<?= base_url('/master-pendidikan'); ?>"><span class="sub-item">Data Pendidikan</span></a></li>
                        <li><a href="<?= base_url('/master-gender'); ?>"><span class="sub-item">Data Jenis Kelamin</span></a></li>
                        <li><a href="<?= base_url('/master-penyakit'); ?>"><span class="sub-item">Data Penyakit</span></a></li>
                        <li><a href="<?= base_url('/master-tindakan'); ?>"><span class="sub-item">Data Tindakan</span></a></li>
                        <li><a href="<?= base_url('/master-obat'); ?>"><span class="sub-item">Data Obat</span></a></li>
                    </ul>
                </div>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#laporan" class="collapsed" aria-expanded="false">
                        <i class="fas fa-folder"></i>
                        <p>Laporan</p><span class="caret"></span>
                    </a>
                    <div class="collapse" id="laporan">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= base_url('/master-lap-pasien'); ?>"><span class="sub-item">Laporan Pasien</span></a></li>
                            <li><a href="<?= base_url('/master-lap-klinik'); ?>"><span class="sub-item">Laporan Klinik</span></a></li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>