<?php
$this->extend('layout/dashboard');

$this->section('content');
$session = session();
?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">Dashboard</li>
      <li class="breadcrumb-item active"><?php echo !empty($data) ? 'Edit' : 'Tambah'; ?> Peserta</li>
    </ol>
    <div class="card">
      <?php
      helper('system');
      if (!empty($session->getFlashData('message'))) {
        $message = $session->getFlashData('message');
        alert($message['msg'], $message['alert']);
      }
      ?>

      <form action="/blt<?php echo !empty($data) ? '/' . $data['id'] : ''; ?>" method="post" enctype="multipart/form-data">
        <?php
        if (!empty($data)) {
        ?>
          <input type="hidden" name="_method" value="POST">
        <?php
        }
        ?>
        <?= csrf_field() ?>
        <div class="card-header">
          <?php echo !empty($data) ? 'Edit' : 'Tambah'; ?> Peserta
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Sesuai Ktp</label>
                <?php
                if (!empty($validation->showError('nama_ktp'))) {
                  $valid = 'is-invalid';
                  $value = old('nama_ktp');
                } else {
                  $valid = '';
                  $value = !empty($data['nama_ktp']) ? $data['nama_ktp'] : old('nama_ktp');
                }
                echo form_input(['name' => 'nama_ktp', 'placeholder' => 'nama_ktp', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('nama_ktp'); ?>
                </div>
              </div>
              <div class="form-group">
                <label>Nama Panggilan</label>
                <?php
                if (!empty($validation->showError('nama'))) {
                  $valid = 'is-invalid';
                  $value = old('nama');
                } else {
                  $valid = '';
                  $value = !empty($data['nama']) ? $data['nama'] : old('nama');
                }
                echo form_input(['name' => 'nama', 'placeholder' => 'nama panggilan', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('nama'); ?>
                </div>
              </div>
              <div class="form-group">
                <label>Telepon / Hp</label>
                <?php
                if (!empty($validation->showError('telp'))) {
                  $valid = 'is-invalid';
                  $value = old('telp');
                } else {
                  $valid = '';
                  $value = !empty($data['telp']) ? $data['telp'] : old('telp');
                }
                echo form_input(['name' => 'telp', 'placeholder' => 'telepon', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('telp'); ?>
                </div>
              </div>
              <div class="form-group">
                <label>Nomor WA</label>
                <?php
                if (!empty($validation->showError('wa'))) {
                  $valid = 'is-invalid';
                  $value = old('wa');
                } else {
                  $valid = '';
                  $value = !empty($data['wa']) ? $data['wa'] : old('wa');
                }
                echo form_input(['name' => 'wa', 'placeholder' => 'telepon', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('wa'); ?>
                </div>
              </div>
              <div class="form-group">
                <label>Email</label>
                <?php
                if (!empty($validation->showError('email'))) {
                  $valid = 'is-invalid';
                  $value = old('email');
                } else {
                  $valid = '';
                  $value = !empty($data['email']) ? $data['email'] : old('email');
                }
                echo form_input(['name' => 'email', 'placeholder' => 'telepon', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('email'); ?>
                </div>
              </div>
              <div class="form-group">
                <label>Nomor TPS</label>
                <?php
                if (!empty($validation->showError('no'))) {
                  $valid = 'is-invalid';
                  $value = old('no');
                } else {
                  $valid = '';
                  $value = !empty($data['no']) ? $data['no'] : old('no');
                }
                echo form_input(['name' => 'no', 'placeholder' => 'telepon', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('no'); ?>
                </div>
              </div>
              <div class="form-group">
                <label>Nik</label>
                <?php
                if (!empty($validation->showError('nik'))) {
                  $valid = 'is-invalid';
                  $value = old('nik');
                } else {
                  $valid = '';
                  $value = !empty($data['nik']) ? $data['nik'] : old('nik');
                }
                echo form_input(['type' => 'number', 'name' => 'nik', 'placeholder' => 'nik', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('nik'); ?>
                </div>
              </div>
              <div class="form-group">
                <label>Kecamatan</label>
                <?php
                if (!empty($validation->showError('kecamatan'))) {
                  $valid = 'is-invalid';
                  $value = old('kecamatan');
                } else {
                  $valid = '';
                  $value = !empty($data['kecamatan']) ? $data['kecamatan'] : old('kecamatan');
                }
                echo form_input(['name' => 'kecamatan', 'placeholder' => 'kecamatan', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('kecamatan'); ?>
                </div>
              </div>
              <div class="form-group">
                <label>Desa</label>
                <?php
                if (!empty($validation->showError('desa'))) {
                  $valid = 'is-invalid';
                  $value = old('desa');
                } else {
                  $valid = '';
                  $value = !empty($data['desa']) ? $data['desa'] : old('desa');
                }
                echo form_input(['name' => 'desa', 'placeholder' => 'desa', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('desa'); ?>
                </div>
              </div>
              <div class="form-group">
                <label>Dukuh</label>
                <?php
                if (!empty($validation->showError('dukuh'))) {
                  $valid = 'is-invalid';
                  $value = old('dukuh');
                } else {
                  $valid = '';
                  $value = !empty($data['dukuh']) ? $data['dukuh'] : old('dukuh');
                }
                echo form_input(['name' => 'dukuh', 'placeholder' => 'dukuh', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('dukuh'); ?>
                </div>
              </div>
              <div class="form-group">
                <label>RT</label>
                <?php
                if (!empty($validation->showError('rt'))) {
                  $valid = 'is-invalid';
                  $value = old('rt');
                } else {
                  $valid = '';
                  $value = !empty($data['rt']) ? $data['rt'] : old('rt');
                }
                echo form_input(['type'=>'number','name' => 'rt', 'placeholder' => 'rt', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('rt'); ?>
                </div>
              </div>
              <div class="form-group">
                <label>RW</label>
                <?php
                if (!empty($validation->showError('rw'))) {
                  $valid = 'is-invalid';
                  $value = old('rw');
                } else {
                  $valid = '';
                  $value = !empty($data['rw']) ? $data['rw'] : old('rw');
                }
                echo form_input(['type'=>'number','name' => 'rw', 'placeholder' => 'rw', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
                <div class="invalid-feedback">
                  <?php echo $validation->showError('rw'); ?>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Foto</label>
                <?php $valid = !empty($validation->showError('foto')) ? 'is-invalid' : ''; ?>
                <?php $value = !empty($data['foto']) ? '/images/tps/' . $data['foto'] : old('foto'); ?>
                <div class="custom-file" style="height: 200px;">
                  <?php
                  echo form_upload(['name' => 'foto', 'id' => 'foto', 'placeholder' => 'foto', 'class' => 'custom-file-input ' . $valid, 'value' => $value, 'accept' => '.jpg,.jpeg,.png,.gif']);
                  ?>
                  <label class="custom-file-label" for="foto">Ambil Gambar ...</label>
                  <div class="invalid-feedback">
                    <?php echo $validation->showError('foto'); ?>
                  </div>
                  <?php
                  $gambar = !empty($data['foto']) ? '/images/tps/' . $data['foto'] : 'https://www.freeiconspng.com/uploads/no-image-icon-11.PNG';
                  ?>
                  <img src="<?php echo $gambar; ?>" class="img image_place img-fluid" width="200" alt="Icon No Free Png" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
          <button class="btn btn-sm btn-warning" type="reset"><i class="fa fa-redo"></i> Reset</button>
        </div>
      </form>
    </div>
  </div>
</main>
<?php
$this->endSection();

$this->section('js');
?>
<script src="/assets/js/script.js"></script>
<?php
$this->endSection();
