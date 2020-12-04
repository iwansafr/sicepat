<!DOCTYPE html>
<html lang="en">

<head>
  <?php echo $this->include('layout/meta') ?>
</head>

<body class="sb-nav-fixed">
  <?php echo $this->include('layout/navbar') ?>
  <div id="layoutSidenav">
    <?php echo $this->include('layout/sidenav') ?>
    <div id="layoutSidenav_content">
      <?php echo $this->renderSection('content') ?>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2020</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="/template/js/scripts.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="/template/assets/demo/datatables-demo.js"></script>
  <?php echo $this->renderSection('js') ?>
</body>

</html>