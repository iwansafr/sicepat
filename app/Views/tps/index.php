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
      <li class="breadcrumb-item active">Data User</li>
    </ol>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data User
      </div>
      <div class="card-body">
        <?php
        if (!empty($session->getFlashData('message'))) {
          $message = $session->getFlashData('message');
          alert($message['msg'], $message['alert']);
        } ?>
        <a href="/blt/excel" class="btn btn-sm btn-secondary"><i class="fa fa-file-excel"></i> Download</a>
        <hr>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
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
                  <td><?php echo $value['nik']; ?></td>
                  <td><?php echo $value['nama']; ?></td>
                  <td><?php echo $value['alamat']; ?></td>
                  <td><?php echo $value['pekerjaan']; ?></td>
                  <td>
                    <div class="form-group form-inline">
                      <a href="/blt/<?php echo $value['id'] . '/edit'; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a> |
                      <a href="/blt/<?php echo $value['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a> |
                      <form action="/blt/<?php echo $value['id']; ?>" method="post">
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
