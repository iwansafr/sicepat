<?php
$this->extend('layout/dashboard');

$this->section('content');
?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">Dashboard</li>
      <li class="breadcrumb-item active"><?php echo $title; ?></li>
    </ol>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data <?php echo $title; ?>
      </div>
      <div class="card-body">
        <!-- Button trigger modal -->
        <?php
        helper('system');
        if (!empty(session()->getFlashData('message'))) {
          $message = session()->getFlashData('message');
          alert($message['msg'], $message['alert']);
        }
        ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
          Beri Kami <?php echo $title; ?>
        </button>
        <hr>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form action="" method="post">
              <?= csrf_field(); ?>
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Kotak <?php echo $title; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nama">Nama Pengirim</label>
                    <input type="text" name="nama" class="form-control" placeholder="nama pengirim" required>
                  </div>
                  <div class="form-group">
                    <label for="hp">No Hp Pengirim</label>
                    <input type="number" name="hp" class="form-control" placeholder="No hp pengirim" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email Pengirim</label>
                    <input type="email" name="email" class="form-control" placeholder="email pengirim" required>
                  </div>
                  <div class="form-group">
                    <label for="pesan">isi <?= $title; ?></label>
                    <textarea type="text" name="pesan" class="form-control" required></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable6" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama</th>
                <th><?php echo $title; ?></th>
                <th>action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Nama</th>
                <th><?php echo $title; ?></th>
                <th>action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              foreach ($data as $key => $value) {
              ?>
                <tr>
                  <td><?php echo $value['nama']; ?></td>
                  <td><?php echo $value['pesan']; ?></td>
                  <td><a href="/<?php echo strtolower($title) . '/' . $value['id']; ?>"><i class="fa fa-eye"></i> Buka</a></td>
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
</main>
<?php
$this->endSection();
