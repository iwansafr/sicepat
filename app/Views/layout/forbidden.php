<?php
$this->extend('layout/dashboard');

$this->section('content');
?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">Dashboard</li>
      <li class="breadcrumb-item active">Problem</li>
    </ol>
    <?php
    if (!empty($msg) && !empty($alert)) {
      alert($msg, $alert);
    }
    ?>
  </div>
</main>
<?php
$this->endSection();