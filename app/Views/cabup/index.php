<?php
$this->extend('layout/dashboard');

$this->section('content');
$session = session();
helper('system');
?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">Dashboard</li>
      <li class="breadcrumb-item active">Data Cabup</li>
    </ol>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Cabup
      </div>
      <div class="card-body">
        <?php
        if (!empty($session->getFlashData('message'))) {
          $message = $session->getFlashData('message');
          alert($message['msg'], $message['alert']);
        } ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              $i = 1;
              helper('system');
              foreach ($data as $key => $value) {
              ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $value['nama']; ?></td>
                  <td><?php echo $value['no']; ?></td>
                  <td>
                    <div class="form-group form-inline">
                      <a href="/cabup/<?php echo $value['id']; ?>/edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a> |
                      <form action="/cabup/<?php echo $value['id']; ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php
                $i++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
$this->endSection();
