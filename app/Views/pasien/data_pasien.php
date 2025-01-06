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
                <!-- modal data -->
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
                                    <!-- <p class="small">Create a new row using this form, make sure you fill them all</p> -->
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>nama</label>
                                                    <input id="nama" type="text" class="form-control" placeholder="isi nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group form-group-default p-2">
                                                    <label>Alamat</label>
                                                    <input id="alamat" type="text" class="form-control" placeholder="isi alamat" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 gx-2">
                                                <div class="form-group form-group-default p-2">
                                                    <label>Nomor Telpon</label>
                                                    <input id="telepon" type="text" class="form-control" placeholder="isi Telepon" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group form-group-default p-2">
                                                    <label>Pekerjaan</label>
                                                    <input id="pekerjaan" type="text" class="form-control" placeholder="isi pekerjaan" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 pe-0">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal Lahir</label>
                                                    <input id="tanggal" type="date" class="form-control" />
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
                                                                name="flexRadioDefault"
                                                                id="gender" value="laki-laki" />
                                                            <label
                                                                class="form-check-label"
                                                                for="laki-laki">
                                                                Laki-laki
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                name="flexRadioDefault"
                                                                id="gender" value="perempuan" />
                                                            <label
                                                                class="form-check-label"
                                                                for="perempuan">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" id="addRowButton" class="btn btn-primary">Tambah</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
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
                                    <th>Usia</th>
                                    <th>Jenis Kelamin</th>
                                    <th style="width: 10%"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>352546756455</td>
                                    <td>Tiger Nixon</td>
                                    <td>Edinburgh</td>
                                    <td>894759230983</td>
                                    <td>30</td>
                                    <td>Laki-laki</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" class="btn btn-link btn-rounded btn-outline-info"
                                                data-bs-toggle="modal"
                                                data-bs-target="#antrianModal">
                                                <i class="btn btn-rounded btn-outline-info">Lihat</i>
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="antrianModal" tabindex="-1" aria-labelledby="antrianModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="antrianModalLabel">Detail Informasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table>
                                                            <tr>
                                                                <td>Antrian Saat ini</td>
                                                                <td>:</td>
                                                                <td>12</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('/antrian'); ?>" class="btn btn-secondary" id="addToQueueButton" data-patient-id="352546756455">Antrian</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>352546756455</td>
                                    <td>Tiger Nixon</td>
                                    <td>Edinburgh</td>
                                    <td>894759230983</td>
                                    <td>30</td>
                                    <td>Laki-laki</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" class="btn btn-link btn-rounded btn-outline-info"
                                                data-bs-toggle="modal"
                                                data-bs-target="#antrianModal">
                                                <i class="btn btn-rounded btn-outline-info">Lihat</i>
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="antrianModal" tabindex="-1" aria-labelledby="antrianModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="antrianModalLabel">Detail Informasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table>
                                                            <tr>
                                                                <td>Antrian Saat ini</td>
                                                                <td>:</td>
                                                                <td>12</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('/antrian'); ?>" class="btn btn-secondary" id="addToQueueButton" data-patient-id="352546756455">Antrian</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>352546756455</td>
                                    <td>Tiger Nixon</td>
                                    <td>Edinburgh</td>
                                    <td>894759230983</td>
                                    <td>30</td>
                                    <td>Laki-laki</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" class="btn btn-link btn-rounded btn-outline-info"
                                                data-bs-toggle="modal"
                                                data-bs-target="#antrianModal">
                                                <i class="btn btn-rounded btn-outline-info">Lihat</i>
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="antrianModal" tabindex="-1" aria-labelledby="antrianModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="antrianModalLabel">Detail Informasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table>
                                                            <tr>
                                                                <td>Antrian Saat ini</td>
                                                                <td>:</td>
                                                                <td>12</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('/antrian'); ?>" class="btn btn-secondary" id="addToQueueButton" data-patient-id="352546756455">Antrian</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>352546756455</td>
                                    <td>Tiger Nixon</td>
                                    <td>Edinburgh</td>
                                    <td>894759230983</td>
                                    <td>30</td>
                                    <td>Laki-laki</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" class="btn btn-link btn-rounded btn-outline-info"
                                                data-bs-toggle="modal"
                                                data-bs-target="#antrianModal">
                                                <i class="btn btn-rounded btn-outline-info">Lihat</i>
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="antrianModal" tabindex="-1" aria-labelledby="antrianModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="antrianModalLabel">Detail Informasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table>
                                                            <tr>
                                                                <td>Antrian Saat ini</td>
                                                                <td>:</td>
                                                                <td>12</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('/antrian'); ?>" class="btn btn-secondary" id="addToQueueButton" data-patient-id="352546756455">Antrian</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end tabel pasien -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>