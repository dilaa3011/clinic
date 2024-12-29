<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?= $tittle; ?></title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="icon" href="<?= base_url(); ?>clinic/assets/tittle.png" type="image/x-icon" />

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
        urls: ["kaiadmin/assets/css/fonts.min.css"],
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

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="<?= base_url('/'); ?>" class="logo">
            <img src="<?= base_url(); ?>clinic/assets/header.png" alt="navbar brand" class="navbar-brand pt-md-4" height="200" />
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

    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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

    <!-- Kaiadmin JS -->
    <script src="kaiadmin/assets/js/kaiadmin.min.js"></script>

    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });
    </script>
    <!-- pagination -->
    <script>
      $(document).ready(function() {
        $('#add-row').DataTable({
          pageLength: 3,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
          $('#add-row')
            .dataTable()
            .fnAddData([$('#nama').val(), $('#alamat').val(), $('#telepon').val(), $('#alamat').val(), $('#pekerjaan').val(), $('#gender').val(), action]);
          $('#addRowModal').modal('hide');
        });
      });
    </script>
    <script>
      const statisticsCtx = document.getElementById('statisticsChart').getContext('2d');
      new Chart(statisticsCtx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{
              label: 'Red Zone',
              data: [100, 200, 150, 300, 350, 400, 450, 500, 550, 600, 700, 800],
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
              borderColor: 'rgba(255, 99, 132, 1)',
              borderWidth: 2,
              fill: true,
            },
            {
              label: 'Blue Zone',
              data: [200, 250, 300, 350, 400, 450, 500, 550, 600, 700, 800, 1000],
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 2,
              fill: true,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: true
            },
          },
        },
      });
    </script>
    <script>
      const salesCtx = document.getElementById('dailySalesChart').getContext('2d');
      new Chart(salesCtx, {
        type: 'line',
        data: {
          labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
          datasets: [{
            label: 'Sales',
            data: [500, 700, 1000, 1200, 1500, 2000, 2500],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2,
            fill: true,
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            },
          },
        },
      });
    </script>
</body>

</html>