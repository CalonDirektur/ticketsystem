<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BFI SYARI'AH HELPDESK</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="icon" href="<?= base_url('assets/img/bfi.jpg') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- DataTable css -->
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url('dashboard') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>BFI</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>BFI Syari'ah</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <!-- Angka Notif -->
                <span class="label label-danger count"></span>
              </a>
              <!-- Data baru masuk -->
              <ul class="dropdown-menu">
                <!-- <li class="header">You have 9 tasks</li> -->

                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= ucfirst($this->fungsi->user_login()->name) ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  <p>
                    <?= $this->fungsi->user_login()->name ?>
                  </p>
                  <small>
                    Access Level:
                    <?php
                    if ($this->fungsi->user_login()->level == 1) {
                      echo "user";
                    } else if ($this->fungsi->user_login()->level == 2) {
                      echo "Admin level 1";
                    } else if ($this->fungsi->user_login()->level == 3) {
                      echo "Admin level 2";
                    }
                    ?>
                  </small>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p> <?= $this->fungsi->user_login()->name ?></p>
            <a href="#"></i>
              <?php
              if ($this->fungsi->user_login()->level == 1) {
                echo "Cabang " . ucfirst($this->fungsi->user_login()->nama_cabang);
              } else if ($this->fungsi->user_login()->level == 2) {
                echo ucfirst($this->fungsi->user_login()->nama_cabang);
              }
              ?>
            </a>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
          </li>
          <!-- Menu untuk User -->
          <?php if ($this->session->userdata('level') == 1) { ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i><span>Daftar Ticket</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= site_url('ticket_register/form_my_talim') ?>"><i class="fa fa-users"></i><span>My Talim</span></a></li>
                <li><a href="<?= site_url('ticket_register/form_my_hajat') ?>"><i class="fa fa-users"></i><span>My Hajat</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> <span>Reviewed Tickets</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-list"></i>Pending
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?= site_url('status/pending/mytalim') ?>"><i class="fa fa-circle-o"></i>My Ta'lim</a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> My Hajat
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="<?= base_url('status/pending/myhajat/renovasi') ?>"><i class="fa fa-circle-o"></i> Renovasi</a></li>
                        <li><a href="<?= base_url('status/pending/myhajat/sewa') ?>"><i class="fa fa-circle-o"></i>Sewa</a></li>
                        <li><a href="<?= base_url('status/pending/myhajat/wedding') ?>"><i class="fa fa-circle-o"></i>Wedding</a></li>
                        <li><a href="<?= base_url('status/pending/myhajat/franchise') ?>"><i class="fa fa-circle-o"></i>Franchise</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-check-square"></i>Approved
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?= site_url('status/approved/mytalim') ?>"><i class="fa fa-circle-o"></i>My Ta'lim</a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> My Hajat
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="<?= base_url('status/approved/myhajat/renovasi') ?>"><i class="fa fa-circle-o"></i> Renovasi</a></li>
                        <li><a href="<?= base_url('status/approved/myhajat/sewa') ?>"><i class="fa fa-circle-o"></i>Sewa</a></li>
                        <li><a href="<?= base_url('status/approved/myhajat/wedding') ?>"><i class="fa fa-circle-o"></i>Wedding</a></li>
                        <li><a href="<?= base_url('status/approved/myhajat/franchise') ?>"><i class="fa fa-circle-o"></i>Franchise</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-user-times"></i>Rejected
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?= site_url('status/rejected/mytalim') ?>"><i class="fa fa-circle-o"></i>My Ta'lim</a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> My Hajat
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="<?= base_url('status/rejected/myhajat/renovasi') ?>"><i class="fa fa-circle-o"></i> Renovasi</a></li>
                        <li><a href="<?= base_url('status/rejected/myhajat/sewa') ?>"><i class="fa fa-circle-o"></i>Sewa</a></li>
                        <li><a href="<?= base_url('status/rejected/myhajat/wedding') ?>"><i class="fa fa-circle-o"></i>Wedding</a></li>
                        <li><a href="<?= base_url('status/rejected/myhajat/franchise') ?>"><i class="fa fa-circle-o"></i>Franchise</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="header">LABELS</li>
            <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> <span>User</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('auth/daftar_akun') ?>"><i class="fa fa-circle-o"></i> <span>Pendaftaran User</span></a></li>
                <li><a href="<?= site_url('auth/list_user') ?>"><i class="fa fa-check-square"></i>List User</a></li>
              </ul>
            </li>
          <?php } ?>

          <!-- Menu untuk Admin 1 -->
          <?php if ($this->session->userdata('level') == 2) { ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-users"></i>
                <span>Review Ticket Admin 1</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= site_url('status/pending/mytalim') ?>"><i class="fa fa-circle-o"></i>My Ta'lim</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> My Hajat
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?= base_url('status/pending/myhajat/renovasi') ?>"><i class="fa fa-circle-o"></i> Renovasi</a></li>
                    <li><a href="<?= base_url('status/pending/myhajat/sewa') ?>"><i class="fa fa-circle-o"></i>Sewa</a></li>
                    <li><a href="<?= base_url('status/pending/myhajat/wedding') ?>"><i class="fa fa-circle-o"></i>Wedding</a></li>
                    <li><a href="<?= base_url('status/pending/myhajat/franchise') ?>"><i class="fa fa-circle-o"></i>Franchise</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> <span>Reviewed Tickets</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-check-square"></i>Approved
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?= site_url('status/approved/mytalim') ?>"><i class="fa fa-circle-o"></i>My Ta'lim</a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> My Hajat
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="<?= base_url('status/approved/myhajat/renovasi') ?>"><i class="fa fa-circle-o"></i> Renovasi</a></li>
                        <li><a href="<?= base_url('status/approved/myhajat/sewa') ?>"><i class="fa fa-circle-o"></i>Sewa</a></li>
                        <li><a href="<?= base_url('status/approved/myhajat/wedding') ?>"><i class="fa fa-circle-o"></i>Wedding</a></li>
                        <li><a href="<?= base_url('status/approved/myhajat/franchise') ?>"><i class="fa fa-circle-o"></i>Franchise</a></li>
                      </ul>
                    </li>
                  </ul>
                <li class="treeview">
                  <a href="#"><i class="fa fa-user-times"></i>Rejected
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?= site_url('status/rejected/mytalim') ?>"><i class="fa fa-circle-o"></i>My Ta'lim</a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> My Hajat
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="<?= base_url('status/rejected/myhajat/renovasi') ?>"><i class="fa fa-circle-o"></i> Renovasi</a></li>
                        <li><a href="<?= base_url('status/rejected/myhajat/sewa') ?>"><i class="fa fa-circle-o"></i>Sewa</a></li>
                        <li><a href="<?= base_url('status/rejected/myhajat/wedding') ?>"><i class="fa fa-circle-o"></i>Wedding</a></li>
                        <li><a href="<?= base_url('status/rejected/myhajat/franchise') ?>"><i class="fa fa-circle-o"></i>Franchise</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          <?php } ?>
          <!-- Menu untuk Admin 2 -->
          <?php if ($this->session->userdata('level') == 3) { ?>
            <li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Admin 2 Review
                <span class="pull-right-container">
                  <i class="fa fa-angle-left"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= site_url('status/approved/mytalim') ?>"><i class="fa fa-circle-o"></i>My Ta'lim</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> My Hajat
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?= base_url('status/approved/myhajat/renovasi') ?>"><i class="fa fa-circle-o"></i> Renovasi</a></li>
                    <li><a href="<?= base_url('status/approved/myhajat/sewa') ?>"><i class="fa fa-circle-o"></i>Sewa</a></li>
                    <li><a href="<?= base_url('status/approved/myhajat/wedding') ?>"><i class="fa fa-circle-o"></i>Wedding</a></li>
                    <li><a href="<?= base_url('status/approved/myhajat/franchise') ?>"><i class="fa fa-circle-o"></i>Franchise</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            </li>
            <li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Completed Tickets
                <span class="pull-right-container">
                  <i class="fa fa-angle-left"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= site_url('admin2/completed/mytalim') ?>"><i class="fa fa-circle-o"></i>My Ta'lim</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> My Hajat
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?= base_url('status/completed/myhajat/renovasi') ?>"><i class="fa fa-circle-o"></i> Renovasi</a></li>
                    <li><a href="<?= base_url('status/completed/myhajat/sewa') ?>"><i class="fa fa-circle-o"></i>Sewa</a></li>
                    <li><a href="<?= base_url('status/completed/myhajat/wedding') ?>"><i class="fa fa-circle-o"></i>Wedding</a></li>
                    <li><a href="<?= base_url('status/completed/myhajat/franchise') ?>"><i class="fa fa-circle-o"></i>Franchise</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            </li>
          <?php } ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?= $contents ?>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <!-- footer -->
    </footer>

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
  <!-- DataTable -->
  <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
</body>

</html>