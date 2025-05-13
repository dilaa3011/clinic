<div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="<?= base_url('/dashboard'); ?>" class="logo">
                <img src="<?= base_url(); ?>clinic/assets/header.png" alt="navbar brand" class="navbar-brand" width="50" height="50" />
                <!-- <h1>Dill</h1> -->
            </a>
            <!-- toogle sidebar -->
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <!-- Search -->
            <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"></nav>
            <!-- form Search -->
            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">
                    </a>

                </li>
                <!-- Profil -->
                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="<?= session('foto'); ?>" alt="profile" class="avatar-img rounded-circle" />
                        </div>
                        <span class="profile-username">
                            <!-- <span class="op-7">Hi,</span> -->
                            <span class="fw-bold"><?= session('nama'); ?></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <img src="<?=session('foto')?>" alt="image profile" class="avatar-img rounded" />
                                    </div>
                                    <div class="u-text">
                                        <h4><?= session('nama'); ?></h4>
                                        <p class="text-muted"><?= session('email'); ?></p>
                                        <!-- <a href="#" class="btn btn-xs btn-secondary btn-sm">View Profile</a> -->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="#">Account Setting</a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="<?= base_url('/logout'); ?>">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>
                <!-- end Profil -->
            </ul>
        </div>
    </nav>
</div>
<!-- End Navbar -->