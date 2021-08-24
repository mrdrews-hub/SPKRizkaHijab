<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>/admin/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?=base_url()?>/admin/assets/img/favicon.png">
  <title>
    SPK-RIZKAHIJAB
  </title>
 
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="<?=base_url()?>/admin/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?=base_url()?>/admin/assets/css/black-dashboard.min.css?v=1.0.0" rel="stylesheet" />

</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            M
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            MENU
          </a>
        </div>
        <ul class="nav">
          <li <?= ( $this->uri->segment(1) == "alternatif" ) ? "class='active'" : ""?>>
            <a href="<?= site_url('alternatif') ?>">
              <i class="tim-icons icon-atom"></i>
              <p>Alternatif</p>
            </a>
          </li>
          <li <?= ( $this->uri->segment(1) == "kriteria" ) ? "class='active'" : ""?>>
            <a href="<?= site_url('kriteria') ?>">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Kriteria</p>
            </a>
          </li>
          <li  <?= ( $this->uri->segment(1) == "rangking" ) ? "class='active'" : ""?>>
            <a href="<?= site_url('rangking')?>">
              <i class="tim-icons icon-pin"></i>
              <p>Ranking</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">RIZKA HIJAB</a>
          </div>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="nav ml-auto">
                <h5>Sistem Penunjang Keputusan</h5>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">
            <?= $contents ?>
      </div>

      <footer class="footer">
        <div class="container-fluid">
            <div class="copyright">
              <ul class="nav">
                <li>
                  <a class="nav-link text-primary" href="<?= site_url("welcome") ?>">About Us</a>
                </li>
              </ul>
            </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>/admin/assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url() ?>/admin/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>/admin/assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/admin/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <!-- Chart JS -->
  <script src="<?= base_url() ?>/admin/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url() ?>/admin/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url() ?>/admin/assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <!-- MY SCRIPT -->
  <script>
        let base_url = "<?php echo site_url();?>";
  </script>
  <script src="<?= base_url() ?>/assets/js/kriteria.js"></script>
  <script src="<?= base_url() ?>/assets/js/alternatif.js"></script>
<script>

$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

$('.main-panel').perfectScrollbar('destroy');

$('.main-panel').perfectScrollbar('update');
</script>
</body>
</html>