<?= $this->extend('/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="row">
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="<?= base_url('/dashboard'); ?>">
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
                            <th>Nama</th>
                            <th>No. Antrian</th>
                            <th>Tanggal Periksa</th>
                            <th>Status Pemeriksaan</th>
                            <th>Tarif</th>
                            <th>Status Bayar</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No. Rekam Medis</th>
                            <th>Nama</th>
                            <th>No. Antrian</th>
                            <th>Tanggal Periksa</th>
                            <th>Status Pemeriksaan</th>
                            <th>Tarif</th>
                            <th>Status Bayar</th>
                            <th> </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($antrian as $a):

                            $pasienModel = new \App\Models\PasienModel();
                            $pasien = $pasienModel->where('nik', $a['nik'])->first();
                            $rekamMedisModel = new \App\Models\RMModel();
                            $rekam = $rekamMedisModel->where('nomor_antrian', $a['nomor_antrian'])->first();
                            // dd($rekam)

                        ?>
                            <tr>
                                <td>RM<?= str_pad($a['id'], 4, '0', STR_PAD_LEFT); ?></td>
                                <td><?= $pasien ? $pasien['nama'] : 'Nama tidak ditemukan';
                                    ?></td>
                                <td><?= $a['nomor_antrian']; ?></td>
                                <td><?= date('d-m-Y', strtotime($a['tanggal_periksa'])); ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-rounded dropdown-toggle btn-<?= $a['status_pemeriksaan']; ?>" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= ucfirst($a['status_pemeriksaan']); ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li>
                                                <form action="<?= base_url('antrian/ubah-status/' . $a['id']); ?>" method="post">
                                                    <button class="dropdown-item" type="submit" name="status_pemeriksaan" value="menunggu">Menunggu</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="<?= base_url('antrian/ubah-status/' . $a['id']); ?>" method="post">
                                                    <button class="dropdown-item" type="submit" name="status_pemeriksaan" value="diperiksa">Diperiksa</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="<?= base_url('antrian/ubah-status/' . $a['id']); ?>" method="post">
                                                    <button class="dropdown-item" type="submit" name="status_pemeriksaan" value="selesai">Selesai</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>Rp <?= number_format($a['tarif'], 2, ',', '.'); ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-rounded dropdown-toggle btn-<?= $a['status_bayar']; ?>" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= ucfirst($a['status_bayar']); ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li>
                                                <form action="<?= base_url('antrian/ubah-status-bayar/' . $a['id']); ?>" method="post">
                                                    <button class="dropdown-item" type="submit" name="status_bayar" value="belum lunas">Belum Lunas</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="<?= base_url('antrian/ubah-status-bayar/' . $a['id']); ?>" method="post">
                                                    <button class="dropdown-item" type="submit" name="status_bayar" value="lunas">Lunas</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" class="btn btn-link btn-rounded btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $a['id'] ?>">
                                            <i class="btn btn-rounded btn-outline-info">Detail</i>
                                        </button>
                                    </div>
                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="detailModal<?= $a['id'] ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailModalLabel">Detail Informasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('/update-tarif'); ?>" method="POST">
                                                    <input type="hidden" name="id_antrian" id="id_antrian" value="<?= $a['id']; ?>">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="tarif">Tarif</label>
                                                                <input type="number" class="form-control" id="tarif" name="tarif" value="<?= $a['tarif']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="perawatan">Perawatan</label>
                                                                <input type="text" class="form-control" id="perawatan" name="perawatan" value="<?= $rekam['tindakan']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="resep">Resep</label>
                                                                <input type="text" class="form-control" id="resep" name="resep" value="<?= $rekam['resep']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    // pop up sukses
    <?php if (session()->getFlashdata('message')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session()->getFlashdata('message') ?>',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>
</script>

<?= $this->endSection(); ?>