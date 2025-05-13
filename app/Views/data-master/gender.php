<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Daftar Jenis Kelamin</h3>
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
                    <a href="<?= base_url('/master-gender'); ?>">Jenis Kelamin</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <!-- <h4 class="card-title">Add Row</h4> -->
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addGenderModal">
                            <i class="fa fa-plus"></i>
                            Tambah Jenis Kelamin
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal add-->
                    <div class="modal fade" id="addGenderModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold"> Tambah</span>
                                        <span class="fw-light"> gender </span>
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('gender/add'); ?>" method="POST">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Jenis Kelamin</label>
                                                    <input id="nama" type="text" name="nama" class="form-control" placeholder="masukkan nama"/>
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
                                    <th>Nama</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($jenis_kelamin as $gender) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $gender['nama_jenis_kelamin']; ?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" class="btn btn-sm btn-primary me-1" title="Edit Data" data-bs-toggle="modal" data-bs-target="#updateGenderModal<?= $gender['id_jenis_kelamin']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus Data" data-id="<?= $gender['id_jenis_kelamin']; ?>" nama-id="<?= $gender['nama_jenis_kelamin']; ?>" data-bs-toggle="modal" data-bs-target="#deleteGenderModal<?= $gender['id_jenis_kelamin']; ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>

                                            <!-- modal update -->
                                            <div class="modal fade" id="updateGenderModal<?= $gender['id_jenis_kelamin']; ?>" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title">
                                                                <span class="fw-mediumbold"> Edit Data</span>
                                                                <span class="fw-light"> Jenis Kelamin </span>
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('gender/update'); ?>" method="POST">
                                                                <input type="hidden" name="id_jenis_kelamin" value="<?= $gender['id_jenis_kelamin']; ?>">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group form-group-default">
                                                                            <label>Jenis Kelamin</label>
                                                                            <input id="nama" type="text" name="nama" class="form-control" placeholder="<?= $gender['nama_jenis_kelamin']; ?>" />
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
            window.location.href = "<?= base_url('gender/delete'); ?>/" + id;
          }
        });
      });
    });
  </script>
<?= $this->endSection(); ?>