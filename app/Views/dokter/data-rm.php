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
                        <a href="#">Data Rekam Medis</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rekam Medis Pasien</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No. Rekam Medis</th>
                                    <th>Name</th>
                                    <th>Usia</th>
                                    <!-- <th>Keluhan</th>
                                    <th>Diagnosis</th> -->
                                    <th>Tanggal Periksa</th>
                                    <th>Catatan</th>
                                    <th>Perawatan</th>
                                    <th>Dokter</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No. Rekam Medis</th>
                                    <th>Name</th>
                                    <th>Usia</th>
                                    <!-- <th>Keluhan</th>
                                    <th>Diagnosis</th> -->
                                    <th>Tanggal Periksa</th>
                                    <th>Catatan</th>
                                    <th>Perawatan</th>
                                    <th>Dokter</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>342786-823478</td>
                                    <td>Tiger Nixon</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>Istirahat kurang</td>
                                    <td>Obat</td>
                                    <td>Drg.Ami</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" class="btn btn-link btn-rounded btn-outline-info"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal">
                                                <i class="btn btn-rounded btn-outline-info">Detail</i>
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table>
                                                            <tr>
                                                                <td>Nama</td>
                                                                <td>:</td>
                                                                <td>Tiger Nixon</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Usia</td>
                                                                <td>:</td>
                                                                <td>61</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Keluhan</td>
                                                                <td>:</td>
                                                                <td>Istirahat kurang</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diagnosa</td>
                                                                <td>:</td>
                                                                <td>Galau</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>342786-823478</td>
                                    <td>Tiger Nixon</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>Istirahat kurang</td>
                                    <td>Obat</td>
                                    <td>Drg.Ami</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" class="btn btn-link btn-rounded btn-outline-info"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal">
                                                <i class="btn btn-rounded btn-outline-info">Detail</i>
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table>
                                                            <tr>
                                                                <td>Nama</td>
                                                                <td>:</td>
                                                                <td>Tiger Nixon</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Usia</td>
                                                                <td>:</td>
                                                                <td>61</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Keluhan</td>
                                                                <td>:</td>
                                                                <td>Istirahat kurang</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diagnosa</td>
                                                                <td>:</td>
                                                                <td>Galau</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>342786-823478</td>
                                    <td>Tiger Nixon</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>Istirahat kurang</td>
                                    <td>Obat</td>
                                    <td>Drg.Ami</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" class="btn btn-link btn-rounded btn-outline-info"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal">
                                                <i class="btn btn-rounded btn-outline-info">Detail</i>
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table>
                                                            <tr>
                                                                <td>Nama</td>
                                                                <td>:</td>
                                                                <td>Tiger Nixon</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Usia</td>
                                                                <td>:</td>
                                                                <td>61</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Keluhan</td>
                                                                <td>:</td>
                                                                <td>Istirahat kurang</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diagnosa</td>
                                                                <td>:</td>
                                                                <td>Galau</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>342786-823478</td>
                                    <td>Tiger Nixon</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>Istirahat kurang</td>
                                    <td>Obat</td>
                                    <td>Drg.Ami</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" class="btn btn-link btn-rounded btn-outline-info"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal">
                                                <i class="btn btn-rounded btn-outline-info">Detail</i>
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table>
                                                            <tr>
                                                                <td>Nama</td>
                                                                <td>:</td>
                                                                <td>Tiger Nixon</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Usia</td>
                                                                <td>:</td>
                                                                <td>61</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Keluhan</td>
                                                                <td>:</td>
                                                                <td>Istirahat kurang</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diagnosa</td>
                                                                <td>:</td>
                                                                <td>Galau</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>342786-823478</td>
                                    <td>Tiger Nixon</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>Istirahat kurang</td>
                                    <td>Obat</td>
                                    <td>Drg.Ami</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" class="btn btn-link btn-rounded btn-outline-info"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal">
                                                <i class="btn btn-rounded btn-outline-info">Detail</i>
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table>
                                                            <tr>
                                                                <td>Nama</td>
                                                                <td>:</td>
                                                                <td>Tiger Nixon</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Usia</td>
                                                                <td>:</td>
                                                                <td>61</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Keluhan</td>
                                                                <td>:</td>
                                                                <td>Istirahat kurang</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diagnosa</td>
                                                                <td>:</td>
                                                                <td>Galau</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>