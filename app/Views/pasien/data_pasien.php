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
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-primary btn-round ms-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Pasien Baru
                        </button>
                    </div>
                </div>
                <!-- modal add pasien -->
                <div class="card-body">
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold text-info">Pasien</span>
                                        <span class="fw-light"> Baru </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">                                    
                                    <form action="<?= base_url('pasien/save'); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>NIK</label>
                                                    <input id="nik" name="nik" type="text" class="form-control" placeholder="Isi nik" required />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama</label>
                                                    <input id="nama" name="nama" type="text" class="form-control" placeholder="Isi nama" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-default p-2">
                                                    <label>Alamat</label>
                                                    <input id="alamat" name="alamat" type="text" class="form-control" placeholder="Isi alamat" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-default p-2">
                                                    <label>Nomor Telepon</label>
                                                    <input id="telepon" name="telepon" type="text" class="form-control" placeholder="Isi telepon" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-default p-2">
                                                    <label>Pekerjaan</label>
                                                    <input id="pekerjaan" name="pekerjaan" type="text" class="form-control" placeholder="Isi pekerjaan" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4 pe-0">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal Lahir</label>
                                                    <input id="tanggal_lahir" name="tanggal_lahir" type="date" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label><br />
                                                    <div class="d-flex">
                                                        <div class="form-check-inline">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="jenis_kelamin"
                                                                id="laki-laki" value="Laki-laki" required />
                                                            <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="jenis_kelamin"
                                                                id="perempuan" value="Perempuan" required />
                                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end modal data -->
                <!-- tabel pasien -->
                <div class="table-responsive">
                    <table
                        id="add-row"
                        class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Telepon</th>
                                <th>Jenis Kelamin</th>
                                <th style="width: 10%"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pasien as $p) : ?>
                                <tr>
                                    <td><?= $p['nik']; ?></td>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['alamat']; ?></td>
                                    <td><?= $p['telepon']; ?></td>
                                    <td><?= $p['jenis_kelamin']; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" class="btn btn-link btn-rounded btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $p['nik']; ?>">
                                                <i class="btn btn-rounded btn-outline-info">Lihat</i>
                                            </button>
                                        </div>
                                        <!-- Detail Modal -->
                                        <div class="modal fade" id="detailModal<?= $p['nik']; ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-borderless">

                                                            <tr>
                                                                <td>NIK</td>
                                                                <td>:</td>
                                                                <td><?= $p['nik']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama</td>
                                                                <td>:</td>
                                                                <td><?= $p['nama']; ?></td>
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
                                                                <td><?= $p['alamat']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nomor Telepon</td>
                                                                <td>:</td>
                                                                <td><?= $p['telepon']; ?></td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <!-- Button Ambil Antrian -->
                                                        <form action="<?= base_url('/ambilAntrian'); ?>" method="post">                                                            
                                                            <input type="hidden" name="nik" value="<?= $p['nik']; ?>" />
                                                            <button type="submit" class="btn btn-primary">Ambil Antrian</button>
                                                        </form>
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
<script>
    // pop up  berhasil
    <?php if (session()->getFlashdata('success')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session()->getFlashdata('success') ?>',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>
</script>
<?= $this->endSection(); ?>