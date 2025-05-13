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
                        <a href="<?= base_url('/rekam-medis'); ?>">Data Rekam Medis</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Rekam Medis Pasien</h4>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <form action="<?= base_url('/all-rm'); ?>" method="get">
                                <button type="submit" class="btn btn-primary btn-round ms-auto">
                                    <i class="fab fa-searchengin me-2"></i>
                                    Data Rekam Medis
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Antrian</th>
                                    <th>No. Rekam Medis</th>
                                    <th>Name</th>
                                    <th>Usia</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Penyakit</th>
                                    <th>Tindakan</th>
                                    <th>Dokter</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Antrian</th>
                                    <th>No. Rekam Medis</th>
                                    <th>Name</th>
                                    <th>Usia</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Penyakit</th>
                                    <th>Tindakan</th>
                                    <th>Dokter</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($rekamMedis as $rekam): ?>
                                    <tr>
                                        <td><?= $rekam['nomor_antrian'] ?></td>
                                        <td><?= $rekam['no_rm']; ?></td>
                                        <td><?= $rekam['nama_pasien'] ?></td>
                                        <td><?= $rekam['tanggal_lahir'] ? date_diff(date_create($rekam['tanggal_lahir']), date_create('today'))->y : '-' ?></td>
                                        <td><?= date('d-m-Y', strtotime($rekam['tanggal_periksa'])); ?></td>
                                        <td>
                                            <?php
                                            // Menampilkan penyakit
                                            echo $rekam['penyakit_id'] ? $rekam['nama_penyakit'] : 'Belum Diisi';
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            // Menampilkan tindakan
                                            echo $rekam['tindakan_id'] ? $rekam['nama_tindakan'] : 'Belum Diisi';
                                            ?>
                                        </td>
                                        <td><?= session('nama') ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <form action="<?= base_url('/detail'); ?>" method="post">
                                                    <input type="hidden" name="id_rm" value="<?= $rekam['id_rm']; ?>">
                                                    <button type="submit" class="btn btn-link btn-rounded btn-outline-info">
                                                        <i class="btn btn-rounded btn-outline-info">Periksa</i>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>