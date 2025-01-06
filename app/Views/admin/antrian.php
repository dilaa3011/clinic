<?= $this->extend('/layout/template'); ?>
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
                        <a href="#">Antrian</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="multi-filter-select" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No. Rekam Medis</th>
                            <th>Name</th>
                            <th>Anrian</th>
                            <!-- <th>Keluhan</th>
                                    <th>Diagnosis</th> -->
                            <th>Tanggal Periksa</th>
                            <th>Status Pemeriksaan</th>
                            <th>Tarif</th>
                            <th>Perawatan</th>
                            <th>Asuransi</th>
                            <th>Status Bayar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No. Rekam Medis</th>
                            <th>Name</th>
                            <th>No.Anrian</th>
                            <!-- <th>Keluhan</th>
                                    <th>Diagnosis</th> -->
                            <th>Tanggal Periksa</th>
                            <th>Status Pemeriksaan</th>
                            <th>Tarif</th>
                            <th>Perawatan</th>
                            <th>Asuransi</th>
                            <th>Status Bayar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>RM0001</td>
                            <td>Tiger Nixon</td>
                            <td>1</td>
                            <td>2011/04/25</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-menunggu" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menunggu
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                            <td>Obat</td>
                            <td>Drg.Ami</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-menunggu" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menunggu
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-menunggu" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menunggu
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>RM0002</td>
                            <td>Garrett Winters</td>
                            <td>2</td>
                            <td>2011/07/25</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-sedang" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Diperiksa
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                            <td>Obat</td>
                            <td>Drg.Ami</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-menunggu" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menunggu
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-menunggu" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menunggu
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>RM0003</td>
                            <td>Ashton Cox</td>
                            <td>3</td>
                            <td>2009/01/12</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-selesai" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Selesai
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                            <td>Obat</td>
                            <td>Drg.Ami</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-menunggu" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menunggu
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-menunggu" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menunggu
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>RM0004</td>
                            <td>Cedric Kelly</td>
                            <td>4</td>
                            <td>2012/03/29</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-selesai" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Selesai
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                            <td>Obat</td>
                            <td>Drg.Ami</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-menunggu" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menunggu
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-menunggu" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menunggu
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>RM0005</td>
                            <td>Airi Satou</td>
                            <td>5</td>
                            <td>2008/11/28</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-selesai" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Selesai
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                            <td>Obat</td>
                            <td>Drg.Ami</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-menunggu" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menunggu
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-rounded dropdown-toggle btn-menunggu" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menunggu
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" data-status="menunggu">Menunggu</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="sedang">Diperiksa</button></li>
                                        <li><button class="dropdown-item" type="button" data-status="selesai">Selesai</button></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>