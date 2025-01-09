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
                  <h4 class="card-title">1,294</h4>
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
                  <h4 class="card-title">1303</h4>
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
      <div class="col-md-4">
        <div class="card card-primary card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Pemasukan</div>
            </div>
            <div class="card-category">Desember 2024</div>
          </div>
          <div class="card-body pb-0">
            <div class="mb-4 mt-2">
              <h1>Rp.4,578.58</h1>
            </div>
            <div class="pull-in">
              <canvas id="dailySalesChart"></canvas>
            </div>
          </div>
        </div>
        <!-- banyak pasien today -->
        <div class="card card-round">
          <div class="card-body pb-0">
            <div class="h1 fw-bold float-end text-primary">+5%</div>
            <h2 class="mb-2">17</h2>
            <p class="text-muted">Pasien Terbaru</p>
            <div class="pull-in sparkline-fix">
              <div id="lineChart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card card-round">
          <div class="card-body">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Daftar Pasien Terbaru</div>
            </div>
            <div class="card-list py-4">
              <div class="item-list">
                <div class="avatar">
                  <img
                    src="<?= base_url(); ?>kaiadmin/assets/img/jm_denis.jpg"
                    alt="..."
                    class="avatar-img rounded-circle" />
                </div>
                <div class="info-user ms-3">
                  <div class="username">Jimmy Denis</div>
                  <div class="status">Graphic Designer</div>
                </div>
                <button class="btn btn-icon btn-link btn-succsess op-8">
                  <i class="fas fa-check"></i>
                </button>
              </div>
              <div class="item-list">
                <div class="avatar">
                  <span
                    class="avatar-title rounded-circle border border-white">CF</span>
                </div>
                <div class="info-user ms-3">
                  <div class="username">Chandra Felix</div>
                  <div class="status">Sales Promotion</div>
                </div>
                <button class="btn btn-icon btn-link btn-succsess op-8">
                  <i class="fas fa-check"></i>
                </button>
              </div>
              <div class="item-list">
                <div class="avatar">
                  <img
                    src="<?= base_url(); ?>kaiadmin/assets/img/talha.jpg"
                    alt="..."
                    class="avatar-img rounded-circle" />
                </div>
                <div class="info-user ms-3">
                  <div class="username">Talha</div>
                  <div class="status">Front End Designer</div>
                </div>
                <button class="btn btn-icon btn-link btn-succsess op-8">
                  <i class="fas fa-check"></i>
                </button>
              </div>
              <div class="item-list">
                <div class="avatar">
                  <img
                    src="<?= base_url(); ?>kaiadmin/assets/img/chadengle.jpg"
                    alt="..."
                    class="avatar-img rounded-circle" />
                </div>
                <div class="info-user ms-3">
                  <div class="username">Chad</div>
                  <div class="status">CEO Zeleaf</div>
                </div>
                <button class="btn btn-icon btn-link btn-succsess op-8">
                  <i class="fas fa-check"></i>
                </button>
              </div>
              <div class="item-list">
                <div class="avatar">
                  <span
                    class="avatar-title rounded-circle border border-white bg-primary">H</span>
                </div>
                <div class="info-user ms-3">
                  <div class="username">Hizrian</div>
                  <div class="status">Web Designer</div>
                </div>
                <button class="btn btn-icon btn-link btn-succsess op-8">
                  <i class="fas fa-check"></i>
                </button>
              </div>
              <div class="item-list">
                <div class="avatar">
                  <span
                    class="avatar-title rounded-circle border border-white bg-secondary">F</span>
                </div>
                <div class="info-user ms-3">
                  <div class="username">Farrah</div>
                  <div class="status">Marketing</div>
                </div>
                <button class="btn btn-icon btn-link btn-succsess op-8">
                  <i class="fas fa-check"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Riwayat Transaksi</div>
              <div class="card-tools">
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
                  <tr>
                    <th scope="row">
                      <button
                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                        <i class="fa fa-check"></i>
                      </button>
                      Payment from #10231
                    </th>
                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                    <td class="text-end">$250.00</td>
                    <td class="text-end">
                      <span class="badge badge-success">Completed</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <button
                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                        <i class="fa fa-check"></i>
                      </button>
                      Payment from #10231
                    </th>
                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                    <td class="text-end">$250.00</td>
                    <td class="text-end">
                      <span class="badge badge-success">Completed</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <button
                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                        <i class="fa fa-check"></i>
                      </button>
                      Payment from #10231
                    </th>
                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                    <td class="text-end">$250.00</td>
                    <td class="text-end">
                      <span class="badge badge-success">Completed</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <button
                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                        <i class="fa fa-check"></i>
                      </button>
                      Payment from #10231
                    </th>
                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                    <td class="text-end">$250.00</td>
                    <td class="text-end">
                      <span class="badge badge-success">Completed</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <button
                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                        <i class="fa fa-check"></i>
                      </button>
                      Payment from #10231
                    </th>
                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                    <td class="text-end">$250.00</td>
                    <td class="text-end">
                      <span class="badge badge-success">Completed</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <button
                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                        <i class="fa fa-check"></i>
                      </button>
                      Payment from #10231
                    </th>
                    <td class="text-end">Mar 19, 2020, 2.45pm</td>
                    <td class="text-end">$250.00</td>
                    <td class="text-end">
                      <span class="badge badge-success">Completed</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>