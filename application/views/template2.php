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
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/flag-icon-css/css/flag-icon.min.css') ?>"/>
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/jquery-bar-rating/fontawesome-stars-o.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/jquery-bar-rating/fontawesome-stars.css') ?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets2/css/style.css') ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets/img/bfi.jpg') ?>" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo text-white" href="<?= base_url('dashboard') ?>">BFI SYARIAH</a>
        <a class="navbar-brand brand-logo-mini text-white" href="<?= base_url('dashboard') ?>">BFI</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-lg-flex d-none">
                <button type="button" class="btn btn-info font-weight-bold">+ Create New</button>
            </li>
          <li class="nav-item dropdown d-flex">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="icon-air-play mx-0"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item">               
                  <i class="icon-head"></i> Profile
              </a>
              <a href="<?= site_url('auth/logout') ?>" class="dropdown-item preview-item">
                  <i class="icon-inbox"></i> Logout
              </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-4 d-lg-flex d-none">
            <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
              <i class="icon-grid"></i>
            </a>
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
      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #3794fc">
        <div class="user-profile">
          <div class="user-image">
            <img src="<?= base_url('assets2/images/faces/face28.png') ?>">
          </div>
          <div class="user-name">
          <?= ucfirst($this->fungsi->user_login()->name) ?>
          </div>
          <div class="user-designation">
          <?php
            if ($this->fungsi->user_login()->level == 1) {
                echo "Cabang User<br>".ucfirst($this->fungsi->user_login()->nama_cabang);
            } else if ($this->fungsi->user_login()->level == 2) {
                echo "Admin level 1";
            } else if ($this->fungsi->user_login()->level == 3) {
                echo "Admin level 2";
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
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#daftar-tiket" aria-expanded="false" aria-controls="daftar-tiket">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Daftar Tiket</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="daftar-tiket">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= site_url('ticket_register/form_my_talim') ?>">My Talim</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= site_url('ticket_register/form_my_hajat') ?>">My Hajat</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reviewed-tickets" aria-expanded="false" aria-controls="reviewed-tickets">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Reviewed Tickets</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reviewed-tickets">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#pending-tickets" aria-expanded="false" aria-controls="pending-tickets">
                    <i class="icon-disc menu-icon"></i>
                    <span class="menu-title">Pending</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="pending-tickets">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= site_url('status/pending/mytalim') ?>">My Ta'lim</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= site_url('ticket_register/form_my_hajat') ?>">Approved</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= site_url('ticket_register/form_my_hajat') ?>">Rejected</a></li>
                    </ul>
                </div>
            </li>

                <li class="nav-item"> <a class="nav-link" href="<?= site_url('ticket_register/form_my_hajat') ?>">Approved</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= site_url('ticket_register/form_my_hajat') ?>">Rejected</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <?= $contents; ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="https://www.templatewatch.com/" target="_blank" class="text-muted">templatewatch</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="icon-heart"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets2/js/myJs.js') ?>"></script>
  <!-- base:js -->
  <script src="<?= base_url('assets2/vendors/base/vendor.bundle.base.js') ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?= base_url('assets2/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('assets2/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('assets2/js/template.js') ?>"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="<?= base_url('assets2/vendors/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('assets2/vendors/jquery-bar-rating/jquery.barrating.min.js') ?>"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="<?= base_url('assets2/js/dashboard.js') ?>"></script>
  <!-- End custom js for this page-->
</body>

</html>

