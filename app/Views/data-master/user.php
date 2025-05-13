<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Daftar User</h3>
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
                    <a href="<?= base_url('/master-user'); ?>">User</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <!-- <h4 class="card-title">Add Row</h4> -->
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="fa fa-plus"></i>
                            Tambah User
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal add-->
                    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold"> Tambah</span>
                                        <span class="fw-light"> User </span>
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('user/add'); ?>" method="POST">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required autofocus>
                                                </div>

                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Masukkan enail" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="username" name="username" class="form-control" placeholder="Masukkan Username" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                                                </div>


                                                <div class="form-group">
                                                    <label>Nomor Telepon</label>
                                                    <input type="no_hp" name="no_hp" class="form-control" placeholder="Masukkan telepon" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <select name="role" class="form-control" required>
                                                        <option value="">Masukkan Role User</option>
                                                        <option value="1">Dokter</option>
                                                        <option value="2">Admin</option>
                                                        <option value="3">Staff</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select name="jenis_kelamin_id" class="form-control" required>
                                                        <?php foreach ($jenisKelamin as $jk) : ?>
                                                            <option value="<?= $jk['id_jenis_kelamin']; ?>">
                                                                <?= esc($jk['nama_jenis_kelamin']); ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
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
                        <table id="userTable" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Role</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($user as $u) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $u['nama']; ?></td>
                                        <td><?= $u['email']; ?></td>
                                        <td><?= $u['nama_jenis_kelamin']; ?></td>
                                        <td>
                                            <?php
                                            if ($u['role'] == 1) echo 'Dokter';
                                            elseif ($u['role'] == 2) echo 'Admin';
                                            elseif ($u['role'] == 3) echo 'Staff';
                                            else echo 'Tidak Diketahui';
                                            ?>
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" class="btn btn-sm btn-primary me-1" title="Edit Data" data-bs-toggle="modal" data-bs-target="#updateUserModal<?= $u['id_user']; ?>">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus Data" data-id="<?= $u['id_user']; ?>" nama-id="<?= $u['nama']; ?>" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?= $u['id_user']; ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>

                                            <!-- modal update -->
                                            <div class="modal fade" id="updateUserModal<?= $u['id_user']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title">Detail Data User</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('user/update'); ?>" method="POST">
                                                                <input type="hidden" name="id_user" value="<?= $u['id_user']; ?>">

                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input type="text" name="nama" class="form-control" value="<?= esc($u['nama']); ?>" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" name="email" class="form-control" value="<?= esc($u['email']); ?>" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Username</label>
                                                                    <input type="username" name="username" class="form-control" value="<?= esc($u['username']); ?>" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Nomor Telepon</label>
                                                                    <input type="no_hp" name="no_hp" class="form-control" value="<?= esc($u['no_hp']); ?>" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Role</label>
                                                                    <select name="role" class="form-control" required>
                                                                        <option value="1" <?= $u['role'] == 1 ? 'selected' : ''; ?>>Dokter</option>
                                                                        <option value="2" <?= $u['role'] == 2 ? 'selected' : ''; ?>>Admin</option>
                                                                        <option value="3" <?= $u['role'] == 3 ? 'selected' : ''; ?>>Staff</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Jenis Kelamin</label>
                                                                    <select name="jenis_kelamin_id" class="form-control" required>
                                                                        <?php foreach ($jenisKelamin as $jk) : ?>
                                                                            <option value="<?= $jk['id_jenis_kelamin']; ?>" <?= $u['jenis_kelamin_id'] == $jk['id_jenis_kelamin'] ? 'selected' : ''; ?>>
                                                                                <?= esc($jk['nama_jenis_kelamin']); ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="modal-footer border-0">
                                                                    <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
                    window.location.href = "<?= base_url('user/delete'); ?>/" + id;
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>