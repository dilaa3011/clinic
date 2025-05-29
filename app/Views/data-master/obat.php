<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Daftar Obat</h3>
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
                    <a href="<?= base_url('/master-obat'); ?>">Obat</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <!-- <h4 class="card-title">Add Row</h4> -->
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addObatModal">
                            <i class="fa fa-plus"></i>
                            Tambah Obat
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal add-->
                    <div class="modal fade" id="addObatModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold"> Tambah</span>
                                        <span class="fw-light"> Obat </span>
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('obat/add'); ?>" method="POST">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kode Obat</label>
                                                    <input id="kode_obat" type="text" name="kode_obat" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Obat</label>
                                                    <input id="nama" type="text" name="nama" class="form-control" placeholder="masukkan nama obat" required />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Satuan Obat</label>
                                                    <input id="satuan" type="text" name="satuan" class="form-control" placeholder="masukkan satuan obat" required />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Stok Obat</label>
                                                    <input id="stok" type="text" name="stok" class="form-control" placeholder="masukkan stok obat" required />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Harga Obat</label>
                                                    <input id="harga" type="text" name="harga" class="form-control" placeholder="masukkan harga obat" required />
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
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Stok Obat</th>                                    
                                    <th>Harga Obat</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($obat as $item) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $item['kode_obat']; ?></td>
                                        <td><?= $item['nama_obat']; ?></td>
                                        <td><?= $item['stok'];?> <?=  $item['satuan'] ; ?></td>
                                        <td>Rp. <?= number_format($item['harga'], 0, ',', '.'); ?> / <?=  $item['satuan'] ; ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" class="btn btn-sm btn-primary me-1" title="Edit Data" data-bs-toggle="modal" data-bs-target="#updateObatModal<?= $item['id_obat']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus Data" data-id="<?= $item['id_obat']; ?>" nama-id="<?= $item['nama_obat']; ?>" data-bs-toggle="modal" data-bs-target="#deleteGenderModal<?= $item['id_obat']; ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>

                                            <!-- modal update -->
                                            <div class="modal fade" id="updateObatModal<?= $item['id_obat']; ?>" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title">
                                                                <span class="fw-mediumbold"> Edit Data</span>
                                                                <span class="fw-light"> Obat </span>
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('obat/update'); ?>" method="POST">
                                                                <input type="hidden" name="id_obat" value="<?= $item['id_obat']; ?>">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Kode Obat</label>
                                                                            <input id="kode_obat" type="text" name="kode_obat" class="form-control" placeholder="<?= $item['kode_obat']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Obat</label>
                                                                            <input id="nama" type="text" name="nama" class="form-control" placeholder="<?= $item['nama_obat']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Stok</label>
                                                                            <input id="stok" type="text" name="stok" class="form-control" placeholder="<?= $item['stok']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Satuan</label>
                                                                            <input id="satuan" type="text" name="satuan" class="form-control" placeholder="<?= $item['satuan']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Harga Obat</label>
                                                                            <input id="harga" type="text" name="harga" class="form-control" placeholder="Rp <?= number_format($item['harga'], 0, ',', '.'); ?>" />
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
                    window.location.href = "<?= base_url('obat/delete'); ?>/" + id;
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>