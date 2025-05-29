<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Daftar Tindakan</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/dashboard'); ?>">Data Master</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/master-tindakan'); ?>">Tindakan</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <!-- <h4 class="card-title">Add Row</h4> -->
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addTindakanModal">
                            <i class="fa fa-plus"></i>
                            Tambah Tindakan
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal add-->
                    <div class="modal fade" id="addTindakanModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold"> Tambah</span>
                                        <span class="fw-light"> Tindakan </span>
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('tindakan/add'); ?>" method="POST">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kode Tindakan</label>
                                                    <input id="kode_tindakan" type="text" name="kode_tindakan" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Tindakan</label>
                                                    <input id="nama" type="text" name="nama" class="form-control" placeholder="masukkan nama tindakan" required />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Harga Tindakan</label>
                                                    <input id="harga" type="text" name="harga" class="form-control" placeholder="masukkan harga tindakan" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal add -->
                    <div class="table-responsive">
                        <table id="datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Tindakan</th>
                                    <th>Nama Tindakan</th>
                                    <th>Harga Tindakan</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($tindakan as $tdk) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $tdk['kode_tindakan']; ?></td>
                                        <td><?= $tdk['nama_tindakan']; ?></td>
                                        <td>Rp. <?= number_format($tdk['harga'], 0, ',', '.'); ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" class="btn btn-sm btn-primary me-1" title="Edit Data" data-bs-toggle="modal" data-bs-target="#updateTindakanModal<?= $tdk['id_tindakan']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus Data" data-id="<?= $tdk['id_tindakan']; ?>" nama-id="<?= $tdk['nama_tindakan']; ?>" data-bs-toggle="modal" data-bs-target="#deleteGenderModal<?= $tdk['id_tindakan']; ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>

                                            <!-- modal update -->
                                            <div class="modal fade" id="updateTindakanModal<?= $tdk['id_tindakan']; ?>" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title">
                                                                <span class="fw-mediumbold"> Edit Data</span>
                                                                <span class="fw-light"> Tindakan </span>
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('tindakan/update'); ?>" method="POST">
                                                                <input type="hidden" name="id_tindakan" value="<?= $tdk['id_tindakan']; ?>">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Kode Tindakan</label>
                                                                            <input id="kode_tindakan" type="text" name="kode_tindakan" class="form-control" placeholder="<?= $tdk['kode_tindakan']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Tindakan</label>
                                                                            <input id="nama" type="text" name="nama" class="form-control" placeholder="<?= $tdk['nama_tindakan']; ?>" />
                                                                        </div>
                                                                    </div>                                                                    
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Harga Tindakan</label>
                                                                            <input id="harga" type="text" name="harga" class="form-control" placeholder="Rp <?= number_format($tdk['harga'], 0, ',', '.'); ?>" />
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer border-0">
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal update -->
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

<!-- Script hapus -->
<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const nama = this.getAttribute('nama-id');
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
                    window.location.href = "<?= base_url('tindakan/delete'); ?>/" + id;
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>