<?php
$this->extend('layout/dashboard');

$this->section('content');
$role = session()->get('role');
?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">Dashboard</li>
      <li class="breadcrumb-item">tps</li>
      <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="card">
      <div class="card-header">
        Detail
      </div>
      <div class="card-body">
        <?php
        helper('system');
        if (!empty(session()->getFlashData('message'))) {
          $message = session()->getFlashData('message');
          alert($message['msg'], $message['alert']);
        }
        ?>
        <div class="table-responsive">
          <table class="table table-hovered">
            <tr>
              <td>Nama</td>
              <td>: <?php echo $data['nama']; ?></td>
            </tr>
            <tr>
              <td>NIK</td>
              <td>: <?php echo $data['nik']; ?></td>
            </tr>
          </table>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>Foto</label>
              <br>
              <img src="/images/tps/<?php echo $data['foto']; ?>" class="img img-fluid" width="100%" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      
    </div>
  </div>
</main>
<?php
$this->endSection();