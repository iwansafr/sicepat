<?php
$this->extend('layout/dashboard');

$this->section('content');
$role = session()->get('role');
$tipe = ['1' => 'Saran', '2' => 'Masukkan', '3' => 'Pertanyaan'];
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
              <td style="width: 20%;">Nama</td>
              <td>: <?php echo $data['nama']; ?></td>
            </tr>
            <tr>
              <td style="width: 20%;">No HP</td>
              <td>: <?php echo $data['hp']; ?></td>
            </tr>
            <tr>
              <td style="width: 20%;">Email</td>
              <td>: <?php echo $data['email']; ?></td>
            </tr>
            <tr>
              <td style="width: 20%;"><?php echo $tipe[$data['tipe']]; ?></td>
              <td>: <?php echo $data['pesan']; ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="card-footer">
    </div>
  </div>
</main>
<?php
$this->endSection();
