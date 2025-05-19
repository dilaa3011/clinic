<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Dashboard</h3>
      </div>
      <div class="ms-md-auto py-2 py-md-0">
        <a href="<?= base_url('/pasien'); ?>" class="btn btn-primary btn-round">Pasien Baru</a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-primary bubble-shadow-small">
                  <i class="fas fa-users"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Data Pasien</p>
                  <h4 class="card-title"><?= $totalPasien; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-info bubble-shadow-small">
                  <i class="fas fa-user-check"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Data Tindakan</p>
                  <h4 class="card-title"><?= $totalTindakan; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                  <i class="far fa-check-circle"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Data Keluhan</p>
                  <h4 class="card-title">576</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-success bubble-shadow-small">
                  <i class="fas fa-luggage-cart"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Pemasukan</p>
                  <h4 class="card-title">$ 1,345</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="card card-round">
          <div class="card mt-4">
            <div class="card-header">
              <div class="card-head-row">
                <div class="card-title">Statistik Pasien</div>
                <div class="card-tools">
                  <a href="#" class="btn btn-label-info btn-round btn-sm">
                    <span class="btn-label">
                      <i class="fa fa-print"></i>
                    </span>
                    Print
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="chart-container" style="min-height: 375px">
                <canvas id="statisticsChart"></canvas>
              </div>
              <div id="myChartLegend"></div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-md-4">

        <!-- banyak pasien today -->
        <div class="card card-round">
          <div class="card-body pb-0">
            <div class="h1 fw-bold float-end text-primary">
              <?= ($persentaseKenaikan > 0 ? '+' : '') . $persentaseKenaikan ?>%
            </div>
            <h2 class="mb-2"><?= $jumlahPasienTerbaru ?></h2>
            <p class="text-muted">Pasien Terbaru</p>
          </div>
        </div>
        <div class="card card-round">
          <div class="card-body">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Daftar Pasien Terbaru</div>
              <a href="<?= base_url('pasien') ?>" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-list py-4">
              <?php foreach ($pasienTerbaru as $pasien): ?>
                <div class="item-list d-flex align-items-center mb-2">
                  <div class="avatar">
                    <span class="avatar-title rounded-circle border border-white">
                      <?= strtoupper(substr($pasien['nama_lengkap'], 0, 2)) ?>
                    </span>
                  </div>
                  <div class="info-user ms-3">
                    <div class="username"><?= esc($pasien['nama_lengkap']) ?></div>
                    <div class="status">Terdaftar: <?= date('d M Y', strtotime($pasien['created_at'])) ?></div>
                  </div>
                  <button class="btn btn-icon btn-link btn-success ms-auto" title="Lihat Detail">
                    <i class="fas fa-check"></i>
                  </button>
                </div>
              <?php endforeach; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">      
      <div class="col-md-8">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Riwayat Transaksi</div>
              <div class="card-tools">
                <a href="#" class="btn btn-label-info btn-round btn-sm">
                  <span class="btn-label">
                    <i class="fa fa-print"></i>
                  </span>
                  Print
                </a>
              </div>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center mb-0">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID Pembayaran</th>
                    <th scope="col" class="text-end">Tanggal/Waktu</th>
                    <th scope="col" class="text-end">Total</th>
                    <th scope="col" class="text-end">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($riwayatTransaksi)): ?>
                    <tr>
                      <td colspan="4" class="text-center">Belum ada transaksi terbaru</td>
                    </tr>
                  <?php else: ?>
                    <?php foreach ($riwayatTransaksi as $transaksi): ?>
                      <tr>
                        <th scope="row">
                          <button class="btn btn-icon btn-round btn-success btn-sm me-2">
                            <i class="fa fa-check"></i>
                          </button>
                          Payment from #<?= $transaksi['no_bayar']; ?>
                        </th>
                        <td class="text-end"><?= date('M d, Y, h:i A', strtotime($transaksi['tanggal_bayar'])); ?></td>
                        <td class="text-end">$<?= number_format($transaksi['total_bayar'], 2); ?></td>
                        <td class="text-end">
                          <span class="badge badge-success">Completed</span>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  // Data untuk chart
  var bulan = <?= json_encode($bulan); ?>;
  var jumlahPasien = <?= json_encode($jumlahPasien); ?>;

  // Membuat chart menggunakan Chart.js
  var ctx = document.getElementById('statisticsChart').getContext('2d');
  var statisticsChart = new Chart(ctx, {
    type: 'bar', 
    data: {
      labels: bulan, 
      datasets: [{
        label: 'Jumlah Pasien',
        data: jumlahPasien, 
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        tooltip: {
          enabled: true
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<?= $this->endSection(); ?>