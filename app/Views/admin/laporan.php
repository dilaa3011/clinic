<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="row">
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="<?= base_url('/'); ?>">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Laporan</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post">
                            <div class="input-group">
                                <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal">
                                <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary">Cetak</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No. Rekam Medis</th>
                                <th>Tangal Periksa</th>
                                <th>Nama Dokter</th>
                                <th>Perawatan</th>
                                <th>Resep</th>
                                <th>Total Tarif</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No. Rekam Medis</th>
                                <th>Tangal Periksa</th>
                                <th>Nama Dokter</th>
                                <th>Perawatan</th>
                                <th>Resep</th>
                                <th>Total Tarif</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>RM0001</td>
                                <td>2021-08-01</td>
                                <td>Dr. Amy</td>
                                <td>Rawat Jalan</td>
                                <td>Paracetamol</td>
                                <td>Rp. 50.000</td>
                            </tr>
                            <tr>
                                <td>RM0002</td>
                                <td>2021-08-02</td>
                                <td>Dr. Amy</td>
                                <td>Rawat Jalan</td>
                                <td>Amoxilin</td>
                                <td>Rp. 100.000</td>
                            </tr>
                            <tr>
                                <td>RM0003</td>
                                <td>2021-08-03</td>
                                <td>Dr. Amy</td>
                                <td>Rawat Jalan</td>
                                <td>Paracetamol</td>
                                <td>Rp. 75.000</td>
                            </tr>
                            <tr>
                                <td>RM0004</td>
                                <td>2021-08-04</td>
                                <td>Dr. Amy</td>
                                <td>Rawat Jalan</td>
                                <td>Paracetamol</td>
                                <td>Rp. 50.000</td>
                            </tr>
                            <tr>
                                <td>RM0005</td>
                                <td>2021-08-05</td>
                                <td>Dr. Amy</td>
                                <td>Rawat Jalan</td>
                                <td>Paracetamol</td>
                                <td>Rp. 50.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <?= $this->endSection(); ?>