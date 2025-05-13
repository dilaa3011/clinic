<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Daftar Dokter</h3>
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
                    <a href="<?=base_url('/master-dokter'); ?>">Dokter</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <!-- <h4 class="card-title">Add Row</h4> -->
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addDokterModal">
                            <i class="fa fa-plus"></i>
                            Tambah Dokter
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal add-->
                    <div class="modal fade" id="addDokterModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold"> Tambah</span>
                                        <span class="fw-light"> Dokter </span>
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('dokter/add'); ?>" method="POST">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kode Dokter</label>
                                                    <input id="kode_dokter" name="kode_dokter" type="text" class="form-control" value="<?= $kode_dokter; ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama</label>
                                                    <input id="nama" type="text" name="nama" class="form-control" placeholder="masukkan nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 pe-0">
                                                <div class="form-group form-group-default">
                                                    <label>Spesialis</label>
                                                    <input id="spesialis" type="text" name="spesialis" class="form-control" placeholder="masukkan spesialis" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>No. Telepon</label>
                                                    <input id="nomor_hp" type="text" name="nomor_hp" class="form-control" placeholder="masukkan nomor telepon " />
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
                        <table id="dokterTable" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Spesialis</th>
                                    <th>No. Telepon</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dokter as $d) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['nama']; ?></td>
                                        <td><?= $d['spesialis']; ?></td>
                                        <td><?= $d['nomor_hp']; ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" class="btn btn-sm btn-primary me-1" title="Edit Data" data-bs-toggle="modal" data-bs-target="#updateDokterModal<?= $d['id_dokter']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus Data" data-id="<?= $d['id_dokter']; ?>" nama-id = "<?= $d['nama']; ?>" data-bs-toggle="modal" data-bs-target="#deleteDokterModal<?= $d['id_dokter']; ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>

                                            <!-- modal update -->
                                            <div class="modal fade" id="updateDokterModal<?= $d['id_dokter']; ?>" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title">
                                                                <span class="fw-mediumbold"> Edit Data</span>
                                                                <span class="fw-light"> Dokter </span>
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('dokter/update'); ?>" method="POST">
                                                                <input type="hidden" name="id_dokter" value="<?= $d['id_dokter']; ?>">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Kode Dokter</label>
                                                                            <input id="kode_dokter" name="kode_dokter" type="text" class="form-control" value="<?= $d['kode_dokter']; ?>" readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Nama</label>
                                                                            <input id="nama" type="text" name="nama" class="form-control" placeholder="<?= $d['nama']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 pe-0">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Spesialis</label>
                                                                            <input id="spesialis" type="text" name="spesialis" class="form-control" placeholder="<?= $d['spesialis']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group form-group-default">
                                                                            <label>No. Telepon</label>
                                                                            <input id="nomor_hp" type="text" name="nomor_hp" class="form-control" placeholder="<?= $d['nomor_hp']; ?> " />
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
            window.location.href = "<?= base_url('dokter/delete'); ?>/" + id;
          }
        });
      });
    });
  </script>
<?= $this->endSection(); ?>