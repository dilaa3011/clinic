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
                        <a href="#">Data Pasien</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Data Pasien</h4>
                        </div>
                        <div class="col-6 d-flex align-items-center">
                            <a href="<?= base_url('/add-pasien'); ?>" class="btn btn-primary btn-round ms-auto">
                                <i class="fas fa-plus"></i> Pasien Baru
                            </a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- tabel pasien -->
                    <div class="table-responsive">
                        <table
                            id="datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Nomor yang bisa dihubungi</th>
                                    <th>Jenis Kelamin</th>
                                    <th style="width: 10%"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pasien as $p) : ?>
                                    <tr>
                                        <td><?= $p['nik']; ?></td>
                                        <td><?= $p['nama_lengkap']; ?></td>
                                        <td><?= $p['alamat_lengkap']; ?>, rt <?= $p['rt']; ?>, rw <?= $p['rw']; ?>, kecamatan <?= $p['kecamatan']; ?>, kelurahan <?= $p['kelurahan']; ?>, <?= $p['provinsi']; ?></td>
                                        <td><?php
                                            if ($p['telepon_rumah'] !== '-' && $p['telepon_rumah'] !== '') {
                                                echo $p['telepon_rumah'];
                                            } elseif ($p['telepon_selular'] !== '-' && $p['telepon_selular'] !== '') {
                                                echo $p['telepon_selular'];
                                            } else {
                                                echo '-';
                                            }
                                            ?></td>
                                        <td><?= $p['nama_jenis_kelamin']; ?></td>
                                        <td>
                                            <div class="form-button-action text-center d-flex justify-content-center gap-2">
                                                <a href="<?= base_url('/pasien-edit?id_pasien=' . $p['id_pasien']); ?>"
                                                    class="btn btn-outline-info btn-sm rounded-circle"
                                                    title="Edit Pasien">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button type="button"
                                                    class="btn btn-outline-danger btn-sm rounded-circle btn-delete"
                                                    title="Hapus Pasien"
                                                    data-id="<?= $p['id_pasien']; ?>"
                                                    data-nama="<?= $p['nama_lengkap']; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <button type="button"
                                                    class="btn btn-outline-info btn-sm rounded-circle"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#detailModal<?= $p['nik']; ?>"
                                                    title="Detail Pasien">
                                                    <i class="fas fa-user-plus"></i>
                                                </button>
                                            </div>

                                            <!-- Detail Modal -->
                                            <div class="modal fade" id="detailModal<?= $p['nik']; ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Informasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table id="datatables" class="table table-borderless">
                                                                <tr>
                                                                    <td>Nomor Rekam Medis</td>
                                                                    <td>:</td>
                                                                    <td><?= $p['nomor_rekam_medis']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>NIK</td>
                                                                    <td>:</td>
                                                                    <td><?= $p['nik']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td>:</td>
                                                                    <td><?= $p['nama_lengkap']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Usia</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?php
                                                                        $tanggalLahir = new DateTime($p['tanggal_lahir']);
                                                                        $today = new DateTime();
                                                                        $usia = $today->diff($tanggalLahir)->y;
                                                                        echo $usia . ' tahun';
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Alamat</td>
                                                                    <td>:</td>
                                                                    <td><?= $p['alamat_lengkap']; ?>, rt <?= $p['rt']; ?>, rw <?= $p['rw']; ?>, kecamatan <?= $p['kecamatan']; ?>, kelurahan <?= $p['kelurahan']; ?>, <?= $p['provinsi']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nomor yang bisa dihubungi</td>
                                                                    <td>:</td>
                                                                    <td><?php
                                                                        if ($p['telepon_rumah'] !== '-' && $p['telepon_rumah'] !== '') {
                                                                            echo $p['telepon_rumah'];
                                                                        } elseif ($p['telepon_selular'] !== '-' && $p['telepon_selular'] !== '') {
                                                                            echo $p['telepon_selular'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>

                                                            <!-- Tambahan Tabel Rekam Medis -->
                                                            <?php if (!empty($p['rekam_medis'])): ?>
                                                                <hr>
                                                                <h5>Riwayat Rekam Medis</h5>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped">
                                                                        <thead class="table-light">
                                                                            <tr>
                                                                                <th>Tanggal</th>
                                                                                <th>Keluhan</th>
                                                                                <th>Diagnosa</th>
                                                                                <th>Tindakan</th>
                                                                                <th>Catatan</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach ($p['rekam_medis'] as $rm): ?>
                                                                                <tr>
                                                                                    <td><?= esc($rm['tanggal_periksa']) ?></td>
                                                                                    <td><?= esc($rm['keluhan']) ?></td>
                                                                                    <td><?= esc($rm['diagnosa']) ?></td>
                                                                                    <td><?= esc($rm['nama_tindakan'] ?? '-') ?></td>
                                                                                    <td><?= esc($rm['catatan']) ?></td>
                                                                                </tr>
                                                                            <?php endforeach; ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <?php else: ?>
                                                                <hr>
                                                                <p class="text-muted">Belum ada data rekam medis.</p>
                                                            <?php endif; ?>
                                                            <!-- End Rekam Medis -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="<?= base_url('/ambilAntrian'); ?>" method="post" class="d-inline">
                                                                <input type="hidden" name="nomor_rekam_medis" value="<?= $p['nomor_rekam_medis']; ?>">
                                                                <input type="hidden" name="nik" value="<?= $p['nik']; ?>" />
                                                                <button type="submit" class="btn btn-primary">Ambil Antrian</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end tabel pasien -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Script hapus -->
<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const nama = this.getAttribute('data-nama');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data " + nama + " tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= base_url('pasien/delete'); ?>/" + id;
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>