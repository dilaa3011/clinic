<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Daftar Penyakit</h3>
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
                    <a href="<?= base_url('/master-penyakit'); ?>">Penyakit</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <!-- <h4 class="card-title">Add Row</h4> -->
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addPenyakitModal">
                            <i class="fa fa-plus"></i>
                            Tambah Penyakit
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal add-->
                    <div class="modal fade" id="addPenyakitModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold"> Tambah</span>
                                        <span class="fw-light"> Penyakit </span>
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('penyakit/add'); ?>" method="POST">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kode Penyakit</label>
                                                    <input id="kode_penyakit" type="text" name="kode_penyakit" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Penyakit</label>
                                                    <input id="nama" type="text" name="nama" class="form-control" placeholder="masukkan nama penyakit" required/>
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
                        <table id="genderTable" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Penyakit</th>
                                    <th>Nama Penyakit</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($penyakit as $py) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $py['kode_penyakit']; ?></td>
                                        <td><?= $py['nama_penyakit']; ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" class="btn btn-sm btn-primary me-1" title="Edit Data" data-bs-toggle="modal" data-bs-target="#updatePenyakitModal<?= $py['id_penyakit']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus Data" data-id="<?= $py['id_penyakit']; ?>" nama-id="<?= $py['nama_penyakit']; ?>" data-bs-toggle="modal" data-bs-target="#deleteGenderModal<?= $py['id_penyakit']; ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>

                                            <!-- modal update -->
                                            <div class="modal fade" id="updatePenyakitModal<?= $py['id_penyakit']; ?>" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title">
                                                                <span class="fw-mediumbold"> Edit Data</span>
                                                                <span class="fw-light"> Penyakit </span>
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('penyakit/update'); ?>" method="POST">
                                                                <input type="hidden" name="id_penyakit" value="<?= $py['id_penyakit']; ?>">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Kode Penyakit</label>
                                                                            <input id="kode_penyakit" type="text" name="kode_penyakit" class="form-control" placeholder="<?= $py['kode_penyakit']; ?>"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Penyakit</label>
                                                                            <input id="nama" type="text" name="nama" class="form-control" value="<?= $py['nama_penyakit']; ?>" />
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
                    window.location.href = "<?= base_url('penyakit/delete'); ?>/" + id;
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>