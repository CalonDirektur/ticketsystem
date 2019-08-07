<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BFI Syariah Helpdesk</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/mdi/css/materialdesignicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/feather/feather.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/base/vendor.bundle.base.css') ?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/flag-icon-css/css/flag-icon.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/jquery-bar-rating/fontawesome-stars-o.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/jquery-bar-rating/fontawesome-stars.css') ?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets2/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/css/jquery.dataTables.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/css/rowReorder.dataTables.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/css/responsive.dataTables.min.css') ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets2/img/bfi.jpg') ?>" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center bg-info">
        <a class="navbar-brand brand-logo text-white" href="<?= base_url('dashboard') ?>">BFI SYARIAH</a>
        <a class="navbar-brand brand-logo-mini text-white" href="<?= base_url('dashboard') ?>">BFI</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <!-- <a class="dropdown-item preview-item">
                <i class="icon-head"></i> Profile
              </a> -->
              <a href="<?= site_url('auth/logout') ?>" class="dropdown-item preview-item">
                <i class="icon-inbox"></i> Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas bg-info" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="<?= base_url('assets2/img/profile-pic.jpg') ?>">
          </div>
          <div class="user-name">
            <?= ucfirst($this->fungsi->user_login()->name) ?>
          </div>
          <div class="user-designation">
            <?php
            if ($this->fungsi->user_login()->level == 1) {
              echo "Cabang User<br>" . ucfirst($this->fungsi->user_login()->nama_cabang);
            } else if ($this->fungsi->user_login()->level == 2) {
              echo "Admin level 1";
            } else if ($this->fungsi->user_login()->level == 3) {
              echo "Admin level 2";
            } else if ($this->fungsi->user_login()->level == 4) {
              echo "Admin NST";
            } else if ($this->fungsi->user_login()->level == 5) {
              echo "Superuser";
            }
            ?>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('dashboard') ?>">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php if ($this->session->userdata('level') == 1) { ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#daftar-tiket" aria-expanded="false" aria-controls="daftar-tiket">
                <i class="icon-disc menu-icon"></i>
                <span class="menu-title">Daftar Tiket</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="daftar-tiket">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_input_produk') ?>">Form Input Produk</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_lead_management') ?>">Form Lead Management</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_aktivasi_agent') ?>">Form Aktivasi Agent</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_nst') ?>">Form NST</a></li>
                </ul>
              </div>
            </li>
          <?php } ?>
          <?php if ($this->session->userdata('level') == 5) { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('auth/list_user') ?>">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">List User Akun</span>
              </a>
            </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper p-0">
          <?= $contents; ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- <footer class="footer">
        </footer> -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="<?= base_url('assets2/vendors/base/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('assets2/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('assets2/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('assets2/js/template.js') ?>"></script>
  <script src="<?= base_url('assets2/vendors/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('assets2/vendors/jquery-bar-rating/jquery.barrating.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/dashboard.js') ?>"></script>

  <!-- ANEKA JAVASCRIPT IBRAHIM -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="<?= base_url('assets2/js/jquery-3.4.1.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/dataTables.rowReorder.min.js') ?>"></script>
  <script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets2/js/myJs.js') ?>"></script>
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> -->

</body>

</html>