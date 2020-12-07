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
      <li class="breadcrumb-item active"><?php echo !empty($data) ? 'Edit' : 'Tambah'; ?> User</li>
    </ol>
    <div class="card">
      <?php
      helper('system');
      if (!empty($session->getFlashData('message'))) {
        $message = $session->getFlashData('message');
        alert($message['msg'], $message['alert']);
      }
      ?>

      <form action="/user<?php echo !empty($data) ? '/' . $data['id'] : ''; ?>" method="POST">
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
          <?php echo !empty($data) ? 'Edit' : 'Tambah'; ?> User
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Username</label>
            <?php $valid = !empty($validation->showError('username')) ? 'is-invalid' : ''; ?>
            <?php $value = !empty($data['username']) ? $data['username'] : old('username'); ?>
            <?php echo form_input(['name' => 'username', 'placeholder' => 'username', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
            <div class="invalid-feedback">
              <?php echo $validation->showError('username'); ?>
            </div>
          </div>
          <div class="form-group">
            <label>Password</label>
            <?php $valid = !empty($validation->showError('password')) ? 'is-invalid' : ''; ?>
            <?php $value = !empty($data['password']) ? '' : old('password'); ?>
            <?php echo form_password(['name' => 'password', 'placeholder' => 'password', 'class' => 'form-control ' . $valid, 'value' => $value]); ?>
            <div class="invalid-feedback">
              <?php echo $validation->showError('password'); ?>
            </div>
          </div>
          <div class="form-group">
            <label>Role</label>
            <?php
            $option = [
              'name' => 'role',
              'class' => 'form-control',
              'options' => $role
            ];
            if (!empty($data['role'])) {
              $option['selected'] = $data['role'];
            }
            if (!empty(old('role'))) {
              $option['selected'] = old('role');
            }
            ?>
            <?php echo form_dropdown($option); ?>
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
<script src="/assets/js/user.js"></script>
<?php
$this->endSection();

