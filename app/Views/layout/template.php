<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Admin Dashboard</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="kaiadmin/assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Public Sans:300,400,500,600,700"]
      },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["assets/css/fonts.min.css"],
      },
      active: function() {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="kaiadmin/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="kaiadmin/assets/css/plugins.min.css" />
  <link rel="stylesheet" href="kaiadmin/assets/css/kaiadmin.min.css" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="<?= base_url(); ?> assets/css/demo.css" />
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="<?= base_url('/'); ?>" class="logo">
            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
          </a>
          <!-- toggle sidebar -->
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
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-secondary">
            <li class="nav-item">
              <a href="<?= base_url('/'); ?>">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Menu</h4>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/pasien'); ?>">
                <i class="fas fa-user-alt"></i>
                <p>Data Pasien</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="#">
                <i class="fas fa-user-friends"></i>
                <p>Data Kunjungan</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?= base_url('/tindakan'); ?>">
                <i class="fas fa-file"></i>
                <p>Data Tindakan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/payment'); ?>">
                <i class="fas fa-desktop"></i>
                <p>Transaksi</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->


    <div class="main-panel">
      <!-- Navbar -->
      <?= $this->include('/layout/nav'); ?>

      <!-- content -->
      <?= $this->renderSection('content'); ?>

      <!-- Footer -->
      <?= $this->include('/layout/footer'); ?>
    </div>
    <!--   Core JS Files   -->
    <script src="kaiadmin/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="kaiadmin/assets/js/core/popper.min.js"></script>
    <script src="kaiadmin/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="kaiadmin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="kaiadmin/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="kaiadmin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="kaiadmin/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="kaiadmin/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="kaiadmin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="kaiadmin/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="kaiadmin/assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="kaiadmin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Datatables -->
    <script src="<?= base_url(''); ?> kaiadmin/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="kaiadmin/assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="kaiadmin/assets/js/setting-demo.js"></script>
    <script src="../assets/js/setting-demo2.js"></script>
    <script src="kaiadmin/assets/js/demo.js"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
</body>

</html>