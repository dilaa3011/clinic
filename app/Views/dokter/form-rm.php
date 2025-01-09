<div class="table-responsive">
    <table id="multi-filter-select" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Antrian</th>
                <th>No. Rekam Medis</th>
                <th>Name</th>
                <th>Usia</th>
                <th>Tanggal Periksa</th>
                <th>Perawatan</th>
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
                <!-- <th>Keluhan</th>
                                    <th>Diagnosis</th> -->
                <th>Tanggal Periksa</th>
                <th>Perawatan</th>
                <th>Dokter</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>1</td>
                <td>RM0001</td>
                <td>Tiger Nixon</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>keisi klau di form udh d isi</td>
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
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="keluhan">Keluhan</label>
                                                    <input type="text" class="form-control" id="keluhan" name="keluhan" value="Istirahat kurang">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="diagnosa">Diagnosa</label>
                                                    <input type="text" class="form-control" id="diagnosa" name="diagnosa" value="Galau">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="perawatan">Perawatan</label>
                                                    <input type="text" class="form-control" id="perawatan" name="perawatan" value="Istirahat">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="resep">Resep</label>
                                                    <input type="text" class="form-control" id="resep" name="resep" value="Paracetamol">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="catatan">Catatan</label>
                                                    <input type="text" class="form-control" id="catatan" name="catatan" value="Obat">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>RM0002</td>
                <td>Garrett Winters</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>keisi klau di form udh d isi</td>
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
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="keluhan">Keluhan</label>
                                                    <input type="text" class="form-control" id="keluhan" name="keluhan" value="Istirahat kurang">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="diagnosa">Diagnosa</label>
                                                    <input type="text" class="form-control" id="diagnosa" name="diagnosa" value="Galau">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="perawatan">Perawatan</label>
                                                    <input type="text" class="form-control" id="perawatan" name="perawatan" value="Istirahat">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="resep">Resep</label>
                                                    <input type="text" class="form-control" id="resep" name="resep" value="Paracetamol">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="catatan">Catatan</label>
                                                    <input type="text" class="form-control" id="catatan" name="catatan" value="Obat">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>RM0003</td>
                <td>Ashton Cox</td>
                <td>66</td>
                <td>2011/01/12</td>
                <td>keisi klau di form udh d isi</td>
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
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="keluhan">Keluhan</label>
                                                    <input type="text" class="form-control" id="keluhan" name="keluhan" value="Istirahat kurang">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="diagnosa">Diagnosa</label>
                                                    <input type="text" class="form-control" id="diagnosa" name="diagnosa" value="Galau">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="perawatan">Perawatan</label>
                                                    <input type="text" class="form-control" id="perawatan" name="perawatan" value="Istirahat">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="resep">Resep</label>
                                                    <input type="text" class="form-control" id="resep" name="resep" value="Paracetamol">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="catatan">Catatan</label>
                                                    <input type="text" class="form-control" id="catatan" name="catatan" value="Obat">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>RM0004</td>
                <td>Cedric Kelly</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>keisi klau di form udh d isi</td>
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
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="keluhan">Keluhan</label>
                                                    <input type="text" class="form-control" id="keluhan" name="keluhan" value="Istirahat kurang">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="diagnosa">Diagnosa</label>
                                                    <input type="text" class="form-control" id="diagnosa" name="diagnosa" value="Galau">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="perawatan">Perawatan</label>
                                                    <input type="text" class="form-control" id="perawatan" name="perawatan" value="Istirahat">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="resep">Resep</label>
                                                    <input type="text" class="form-control" id="resep" name="resep" value="Paracetamol">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="catatan">Catatan</label>
                                                    <input type="text" class="form-control" id="catatan" name="catatan" value="Obat">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>RM0005</td>
                <td>Airi Satou</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>keisi klau di form udh d isi</td>
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
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="keluhan">Keluhan</label>
                                                    <input type="text" class="form-control" id="keluhan" name="keluhan" value="Istirahat kurang">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="diagnosa">Diagnosa</label>
                                                    <input type="text" class="form-control" id="diagnosa" name="diagnosa" value="Galau">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="perawatan">Perawatan</label>
                                                    <input type="text" class="form-control" id="perawatan" name="perawatan" value="Istirahat">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="resep">Resep</label>
                                                    <input type="text" class="form-control" id="resep" name="resep" value="Paracetamol">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="catatan">Catatan</label>
                                                    <input type="text" class="form-control" id="catatan" name="catatan" value="Obat">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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