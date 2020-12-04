<?php
$this->extend('layout/dashboard');

$this->section('content');
?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">Dashboard</li>
      <li class="breadcrumb-item active">Login</li>
    </ol>
  </div>
  <div class="container">
    <form action="" method="post">
      <?= csrf_field() ?>
      <div class="card">
        <div class="card-header">
          Login
        </div>
        <div class="card-body">
          <?php
          helper('system');
          if (!empty(session()->getFlashData('message'))) {
            $message = session()->getFlashData('message');
            alert($message['msg'], $message['alert']);
          }
          ?>
          <div class="form-group">
            <?php
            $value = old('username');
            if (!empty($validation->showError('username'))) {
              $valid = 'is-invalid';
            } else {
              $valid = '';
            } ?>
            <label for="">username</label>
            <input type="text" class="form-control <?php echo $valid; ?>" name="username" value="<?php echo $value; ?>">
            <div class="invalid-feedback">
              <?php echo $validation->showError('username'); ?>
            </div>
          </div>
          <div class="form-group">
            <?php
            $value = old('password');
            if (!empty($validation->showError('password'))) {
              $valid = 'is-invalid';
            } else {
              $valid = '';
            } ?>
            <label for="">password</label>
            <input type="password" class="form-control <?php echo $valid; ?>" name="password" value="<?php echo $value; ?>">
            <div class="invalid-feedback">
              <?php echo $validation->showError('password'); ?>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-success" type="submit"><i class="fa fa-sign-in-alt"></i> Login</button>
        </div>
      </div>
    </form>
  </div>
</main>
<?php
$this->endSection();
