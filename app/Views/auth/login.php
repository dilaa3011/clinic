<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($tittle); ?></title>
    <link rel="icon" href="<?= base_url(); ?>clinic/assets/tittle.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url(); ?>seo/src/assets/css/styles.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="flash-message-full-width" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 9999;">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success text-center" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="<?= base_url(); ?>clinic/assets/tittle-2.png" alt="navbar brand" class="navbar-brand" height="150" />
                                </a>
                                <p class="text-center">CLINIC drg. SONIYA MAYASARI</p>

                                <!-- Form Login -->
                                <form action="<?= base_url('/login'); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>

                                    <div class="d-flex align-items-center ">
                                        <a class="text-primary fw-bold justify-content-center" href="<?= base_url('/forgot-password'); ?>">Forgot Password?</a>
                                    </div>

                                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4" type="submit">Sign In</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="seo/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="seo/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

</body>

</html>