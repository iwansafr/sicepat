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
      <li class="breadcrumb-item active"><?php echo !empty($data) ? 'Edit' : 'Tambah'; ?> Cabup</li>
    </ol>
    <div class="card">
      <?php
      helper('system');
      if (!empty($session->getFlashData('message'))) {
        $message = $session->getFlashData('message');
        alert($message['msg'], $message['alert']);
      }
      ?>

      <form action="/cabup<?php echo !empty($data) ? '/' . $data['id'] : ''; ?>" method="POST">
        <?php
        if (!empty($data)) {
        ?>
          <input type="hidden" name="_method" value="PUT">
        <?php
        } else {
        ?>
          <input type="hidden" name="_method" value="POST">
        <?php
        }
        ?>
        <?= csrf_field() ?>
        <div class="card-header">
          <?php echo !empty($data) ? 'Edit' : 'Tambah'; ?> Cabup
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>nama</label>
            <?php $valid = !empty($validation->showError('nama')) ? 'is-invalid' : ''; ?>
            <?php $value = !empty($data['nama']) ? $data['nama'] : old('nama'); ?>
            <?php echo form_input(['name' => 'nama', 'placeholder' => 'nama', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
            <div class="invalid-feedback">
              <?php echo $validation->showError('nama'); ?>
            </div>
          </div>
          <div class="form-group">
            <label>nomor</label>
            <?php $valid = !empty($validation->showError('no')) ? 'is-invalid' : ''; ?>
            <?php $value = !empty($data['no']) ? $data['no'] : old('no'); ?>
            <?php echo form_input(['name' => 'no', 'placeholder' => 'no', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
            <div class="invalid-feedback">
              <?php echo $validation->showError('no'); ?>
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
