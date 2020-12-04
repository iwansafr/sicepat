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
      <li class="breadcrumb-item">BLT</li>
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
            <tr>
              <td>Alamat</td>
              <td>: <?php echo $data['alamat']; ?></td>
            </tr>
            <tr>
              <td>Pekerjaan</td>
              <td>: <?php echo $data['pekerjaan']; ?></td>
            </tr>
          </table>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>Foto Diri</label>
              <br>
              <img src="/images/blt/<?php echo $data['foto_diri']; ?>" class="img img-fluid" width="100%" alt="">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Foto KTP</label>
              <br>
              <img src="/images/blt/<?php echo $data['foto_ktp']; ?>" class="img img-fluid" width="100%" alt="">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Foto KK</label>
              <br>
              <img src="/images/blt/<?php echo $data['foto_kk']; ?>" class="img img-fluid" width="100%" alt="">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Foto Rumah</label>
              <br>
              <img src="/images/blt/<?php echo $data['foto_rumah']; ?>" class="img img-fluid" width="100%" alt="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label for="">Progress</label>
            <div class="row">
              <?php foreach ($valid as $key => $value) {
                if ($key >= $data['valid_count']) {
              ?>
              <div class="col-md-2">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" disabled checked id="<?php echo $key; ?>">
                  <label class="custom-control-label" for="<?php echo $key; ?>"><?php echo $value; ?></label>
                </div>
              </div>
              <?php
                } else {
                ?>
              <div class="col-md-2">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" disabled id="<?php echo $key; ?>">
                  <label class="custom-control-label" for="<?php echo $key; ?>"><?php echo $value; ?></label>
                </div>
              </div>
              <?php
                }
              }
              ?>
            </div>
          </div>
          <div class="col-md-12">
            <label>Koordinat</label>
            <b>: Longitude <?php echo $data['longitude']; ?> Latitude <?php echo $data['latitude']; ?> <a
                target="_blank"
                href="https://www.google.com/maps/dir//<?php echo $data['latitude']; ?>,<?php echo $data['longitude']; ?>/@<?php echo $data['latitude']; ?>,<?php echo $data['longitude']; ?>"
                class="btn btn-default btn-warning"><i class="fa fa-map"></i> Lihat Map</a></b>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <?php
      if ($data['valid_count'] == $role && $role > 2) {
      ?>
      <form action="/blt/valid/<?php echo $data['id']; ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="put">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" name="valid" id="verifikasi">
          <label class="custom-control-label" for="verifikasi">Kirim ke
            <?php echo $valid[$role - 1]; ?></label>
          <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Kirim</button>
        </div>
      </form>
      <?php
      } else {
      ?>
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" checked disabled id="verifikasi">
        <label class="custom-control-label" for="verifikasi">Sudah Masuk
          <?php echo $valid[$data['valid_count']]; ?></label>
      </div>
      <?php
      }
      ?>
    </div>
  </div>
</main>
<?php
$this->endSection();