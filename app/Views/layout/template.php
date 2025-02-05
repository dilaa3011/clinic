<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?= $tittle; ?></title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="icon" href="<?= base_url(); ?>clinic/assets/tittle.png" type="image/x-icon" />

  <!-- pop up -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Fonts and icons -->
  <script src="<?= base_url(); ?>kaiadmin/assets/js/plugin/webfont/webfont.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

  <style>
    .btn-menunggu {
      background-color: red;
      color: white;
    }

    .btn-sedang {
      background-color: yellow;
      color: black;
    }

    .btn-selesai {
      background-color: blue;
      color: white;
    }
  </style>

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>kaiadmin/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>kaiadmin/assets/css/plugins.min.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>kaiadmin/assets/css/kaiadmin.min.css" />

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="<?= base_url('/dashboard'); ?>" class="logo">
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
              <a href="<?= base_url('/dashboard'); ?>">
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
                <i class="fas fa-user-plus"></i>
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
              <a href="<?= base_url('/rm'); ?>">
                <i class="fas fa-file-medical-alt"></i>
                <p>Data Rekam Medis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/antrian'); ?>">
                <i class="fas fa-notes-medical"></i>
                <p>Antrian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/laporan'); ?>">
                <i class="fas fa-desktop"></i>
                <p>Laporan</p>
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
    <script src="<?= base_url(); ?>kaiadmin/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url(); ?>kaiadmin/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url(); ?>kaiadmin/assets/js/core/bootstrap.min.js"></script>

    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?= base_url(); ?>kaiadmin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="<?= base_url(); ?>kaiadmin/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?= base_url(); ?>kaiadmin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?= base_url(); ?>kaiadmin/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="<?= base_url(); ?>kaiadmin/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?= base_url(); ?>kaiadmin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?= base_url(); ?>kaiadmin/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="<?= base_url(); ?>kaiadmin/assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url(); ?>kaiadmin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="<?= base_url(); ?>kaiadmin/assets/js/kaiadmin.min.js"></script>

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
        $('#basic-datatables').DataTable({});

        $('#multi-filter-select').DataTable({
          pageLength: 5,
          initComplete: function() {
            this.api()
              .columns()
              .every(function() {
                var column = this;
                var select = $('<select class="form-select"><option value=""></option></select>')
                  .appendTo($(column.footer()).empty())
                  .on('change', function() {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                  });
              });
          },
        });

        // Add Row
        $('#add-row').DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
          $('#add-row')
            .dataTable()
            .fnAddData([$('#addName').val(), $('#addPosition').val(), $('#addOffice').val(), action]);
          $('#addRowModal').modal('hide');
        });
      });
    </script>
    <!-- antrian -->
    <script>
      document.getElementById('addToQueueButton').addEventListener('click', function() {
        const patientId = this.getAttribute('data-patient-id');

        // Kirim data ke backend menggunakan fetch
        fetch('/antrian/add', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '<?= csrf_hash() ?>' // jika CSRF diaktifkan
            },
            body: JSON.stringify({
              patientId: patientId
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              alert('Pasien berhasil dimasukkan ke dalam antrian.');
              window.location.href = '/antrian'; // Redirect ke halaman antrian
            } else {
              alert('Gagal memasukkan pasien ke antrian.');
            }
          })
          .catch(error => console.error('Error:', error));
      });
    </script>

    <!-- grafik dashboard -->
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

    <!-- status -->
    <script>
      const button = document.getElementById('dropdownMenu2');
      const items = document.querySelectorAll('.dropdown-item');

      items.forEach(item => {
        item.addEventListener('click', function() {
          const status = this.getAttribute('data-status');

          // Reset button classes
          button.className = 'btn btn-rounded dropdown-toggle';

          // Add class based on status
          if (status === 'menunggu') {
            button.classList.add('btn-menunggu');
            button.textContent = 'Menunggu';
          } else if (status === 'sedang') {
            button.classList.add('btn-sedang');
            button.textContent = 'Diperiksa';
          } else if (status === 'selesai') {
            button.classList.add('btn-selesai');
            button.textContent = 'Selesai';
          }
        });
      });
    </script>

    <!-- pop up -->
    <!-- Script Pop-Up -->

</body>

</html>