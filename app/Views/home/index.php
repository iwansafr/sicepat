<?php
$this->extend('layout/dashboard');

$this->section('content');
// dd(session()->get());
?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
      <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
          <div class="card-body">Saran</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="/saran">Buka Kotak Saran</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
          <div class="card-body">Masukkan</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="/masukkan">Buka Kotak Masukkan</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white mb-4">
          <div class="card-body">Pertanyaan</div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="/pertanyaan">Buka Kotak Pertanyaan</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-6">
        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-chart-area mr-1"></i>
            Grafik Data TPS
          </div>
          <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
        </div>
      </div>
      <div class="col-xl-6">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="desa-tab" data-toggle="tab" href="#desa" role="tab" aria-controls="desa" aria-selected="true">Desa</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="kecamatan-tab" data-toggle="tab" href="#kecamatan" role="tab" aria-controls="kecamatan" aria-selected="false">Kecamatan</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="dinsos-tab" data-toggle="tab" href="#dinsos" role="tab" aria-controls="dinsos" aria-selected="false">Dinsos</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="provinsi-tab" data-toggle="tab" href="#provinsi" role="tab" aria-controls="provinsi" aria-selected="false">Provinsi</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="kementerian-tab" data-toggle="tab" href="#kementerian" role="tab" aria-controls="kementerian" aria-selected="false">Kementerian</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="desa" role="tabpanel" aria-labelledby="desa-tab">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Penerima BLT DESA
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable6" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      foreach ($data_tps['desa'] as $key => $value) {
                      ?>
                        <tr>
                          <td><?php echo $value['nama']; ?></td>
                          <td><?php echo $value['alamat']; ?></td>
                          <td><?php echo $value['pekerjaan']; ?></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="kecamatan" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Penerima BLT KECAMATAN
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable5" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      foreach ($data_tps['kecamatan'] as $key => $value) {
                      ?>
                        <tr>
                          <td><?php echo $value['nama']; ?></td>
                          <td><?php echo $value['alamat']; ?></td>
                          <td><?php echo $value['pekerjaan']; ?></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="dinsos" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Penerima BLT DINSOS
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      foreach ($data_tps['dinsos'] as $key => $value) {
                      ?>
                        <tr>
                          <td><?php echo $value['nama']; ?></td>
                          <td><?php echo $value['alamat']; ?></td>
                          <td><?php echo $value['pekerjaan']; ?></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="provinsi" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Penerima BLT PROVINSI
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      foreach ($data_tps['provinsi'] as $key => $value) {
                      ?>
                        <tr>
                          <td><?php echo $value['nama']; ?></td>
                          <td><?php echo $value['alamat']; ?></td>
                          <td><?php echo $value['pekerjaan']; ?></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="kementerian" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Penerima BLT KEMENTERIAN
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      foreach ($data_tps['kementerian'] as $key => $value) {
                      ?>
                        <tr>
                          <td><?php echo $value['nama']; ?></td>
                          <td><?php echo $value['alamat']; ?></td>
                          <td><?php echo $value['pekerjaan']; ?></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
$this->endSection();
$this->section('js');
?>
<script>
  $(document).ready(function() {
    $('#dataTable6').DataTable();
    $('#dataTable5').DataTable();
    $('#dataTable4').DataTable();
    $('#dataTable3').DataTable();
    $('#dataTable2').DataTable();
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script>
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';

  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var to_desa = <?php echo count($data_tps['desa']); ?>;
  var to_kecamatan = <?php echo count($data_tps['kecamatan']); ?>;
  var to_dinsos = <?php echo count($data_tps['dinsos']); ?>;
  var to_provinsi = <?php echo count($data_tps['provinsi']); ?>;
  var to_kementerian = <?php echo count($data_tps['kementerian']); ?>;
  var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ["Desa", "Kecamatan", "Dinsos", "Provinsi", "Kementerian"],
      datasets: [{
        data: [to_desa, to_kecamatan, to_dinsos, to_provinsi, to_kementerian],
        backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#795548'],
      }],
    },
  });
</script>
<?php
$this->endSection();
