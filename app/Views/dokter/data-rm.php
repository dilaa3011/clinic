<?= $this->extend('layout/template'); ?>

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
                        <a href="#">Data Rekam Medis</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Rekam Medis Pasien</h4>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <form action="<?= base_url('/all-rm'); ?>" method="get">
                                <button type="submit" class="btn btn-primary btn-round ms-auto">
                                    <i class="fab fa-searchengin me-2"></i>
                                     Data Rekam Medis
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= $this->include('/dokter/form-rm'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // pop up berhasil
    <?php if (session()->getFlashdata('success')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session()->getFlashdata('success') ?>',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>
</script>

<?= $this->endSection(); ?>