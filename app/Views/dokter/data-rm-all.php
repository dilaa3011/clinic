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
                        <a href="<?= base_url('/rekam-medis'); ?>">Data Rekam Medis</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data Semua Rekam Medis</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Rekam Medis Pasien</h4>
                        <a href="<?= base_url('/rekam-medis'); ?>" class="btn btn-primary btn-round">
                            Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <?= $this->include('/dokter/form-rm-all'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>