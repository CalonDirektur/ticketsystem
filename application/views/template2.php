<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-T6V2FSM');
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129708943-5"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-129708943-5');
  </script>
  <!-- End Google Tag Manager -->
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BFI Syariah Helpdesk</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?= base_url('assets2/css/bootstrap.min.css') ?>">
  <link rel=" stylesheet" href="<?= base_url('assets2/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/css/responsive.dataTables.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/css/bootstrap-horizon.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/css/jquery-ui.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/mdi/css/materialdesignicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/feather/feather.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/base/vendor.bundle.base.css') ?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/flag-icon-css/css/flag-icon.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/jquery-bar-rating/fontawesome-stars-o.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/jquery-bar-rating/fontawesome-stars.css') ?>">

  <link rel="stylesheet" href="<?= base_url('assets2/css/owl.carousel.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/css/owl.theme.default.min.css') ?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->

  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets2/img/bfi.jpg') ?>" />

  <style>
    ::placeholder {
      /* Chrome, Firefox, Opera, Safari 10.1+ */
      color: #cccccc !important;
      opacity: 1 !important;
      /* Firefox */
    }

    :-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      color: red;
    }

    ::-ms-input-placeholder {
      /* Microsoft Edge */
      color: red;
    }

    #logout_sidebar_button {
      position: absolute;
      display: inline-block;
      bottom: 0;
      left: 15px;
    }

    table td {
      word-break: break-all;
      padding: 0;
    }

    .highlighted {
      background: red;
    }

    .nonhighlighted {
      background: white;
    }

    .form-rounded {
      border-radius: 1rem;
    }

    .disable {
      pointer-events: none;
      opacity: 0.5
    }

    select.form-control {
      border: 0px;
      outline: 0px;
    }

    /* } */
  </style>

</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T6V2FSM" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center bg-info">
        <a class="navbar-brand brand-logo text-white" href="<?= base_url('dashboard') ?>"><i class="icon-heart"></i> <span style="font-size: 20px">HELPDESK</span> </a>
        <a class="navbar-brand brand-logo-mini text-white" href="<?= base_url('dashboard') ?>"><i class="icon-heart"></i></a>

      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <!-- <i class="icon-cog"></i> -->
            </a>
          </li>
          <li class="nav-item dropdown d-flex">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="icon-air-play mx-0 mr-1"></i><?php if ($this->fungsi->comments($this->fungsi->user_login()->id_user)->num_rows() > 0) { ?><span class="badge badge-info"><?= $this->fungsi->comments($this->fungsi->user_login()->id_user)->num_rows() ?></span><?php } ?>
            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notification</p>
              <?php foreach ($this->fungsi->comments($this->fungsi->user_login()->id_user)->result() as $komentar) { ?>
                <?php if ($komentar->id_mytalim != NULL) { ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/mytalim/id/' . $komentar->id_mytalim . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_renovasi != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myhajat/renovasi/' . $komentar->id_renovasi . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_sewa != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myhajat/sewa/' . $komentar->id_sewa . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_wedding != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myhajat/wedding/' . $komentar->id_wedding . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_franchise != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myhajat/franchise/' . $komentar->id_franchise . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_myhajat_lainnya != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myhajat/lainnya/' . $komentar->id_myhajat_lainnya . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_bangunan != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myfaedah/bangunan/' . $komentar->id_bangunan . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_modal != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myfaedah/modal/' . $komentar->id_modal . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_qurban != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myfaedah/qurban/' . $komentar->id_qurban . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_elektronik != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myfaedah/elektronik/' . $komentar->id_elektronik . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_myfaedah_lainnya != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myfaedah/lainnya/' . $komentar->id_myfaedah_lainnya . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_mysafar != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/mysafar/id/' . $komentar->id_mysafar . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_myihram != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myihram/id/' . $komentar->id_myihram . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_agent != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/aktivasi_agent/id/' . $komentar->id_agent . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_nst != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/nst/id/' . $komentar->id_nst . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php
                  }
                  if ($komentar->id_mitra_kerjasama != NULL) {
                    ?>
                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/mitra_kerjasama/id/' . $komentar->id_mitra_kerjasama . '?id=' . $komentar->id) ?>">
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                      </h6>
                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                      <p class="font-weight-light small-text text-muted mb-0">
                        <?= substr($komentar->comment, 0, 100) ?>...
                      </p>
                    </div>
                  </a>
                <?php } ?>

              <?php } ?>
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
        <?php if ($this->session->userdata('userid') != NULL) { ?>
          <div class="user-profile">
            <div class="user-image">
              <img src="<?= $this->fungsi->user_login()->foto != NULL ? base_url('uploads/foto_profil/' . $this->fungsi->user_login()->foto) : base_url('assets2/img/profile-pic.jpg') ?>">
            </div>
            <div class="user-name">
              <?= ucfirst($this->fungsi->user_login()->name) ?>
            </div>
            <div class="user-designation">
              <?php
                if ($this->fungsi->user_login()->level == 1) {
                  echo ucfirst($this->fungsi->user_login()->nama_cabang);
                } else if ($this->fungsi->user_login()->level == 2) {
                  echo "Admin level 1";
                } else if ($this->fungsi->user_login()->level == 3) {
                  echo "Admin level 2";
                } else if ($this->fungsi->user_login()->level == 4) {
                  echo "PIC NST Ijarah";
                } else if ($this->fungsi->user_login()->level == 5) {
                  echo "Superuser";
                } else if ($this->fungsi->user_login()->level == 6) {
                  echo ucfirst($this->fungsi->user_login()->nama_cabang) . "<br>";
                  echo ucfirst($this->fungsi->user_login()->jabatan);
                } else if ($this->fungsi->user_login()->level == 7) {
                  echo ucfirst($this->fungsi->user_login()->nama_cabang) . "<br>";
                  echo "PIC NST Murabahah";
                }
                ?>
            </div>
          </div>
        <?php } ?>
        <ul class="nav">
          <?php if ($this->session->userdata('userid') != NULL) { ?>
            <?php if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 4 || $this->session->userdata('level') == 5 || $this->session->userdata('level') == 7) { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('dashboard') ?>">
                  <i class="icon-bar-graph menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 6) { ?>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#datatabel" aria-expanded="false" aria-controls="datatabel">
                  <i class="icon-box menu-icon"></i>
                  <span class="menu-title">Data Tabel</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="datatabel">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status') ?>">Daftar Tiket</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/lead_management_list') ?>">Lead Management</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/lead_interest_list') ?>">Lead Interest</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/nst_list') ?>">NST</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#daftar-tiket" aria-expanded="false" aria-controls="daftar-tiket">
                  <i class="icon-disc menu-icon"></i>
                  <span class="menu-title">Request Ticket</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="daftar-tiket">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_input_produk') ?>">Input Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_lead_management') ?>">Lead Management</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_lead_interest') ?>">Lead Interest</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_aktivasi_agent') ?>">Aktivasi Agent</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_nst') ?>">NST</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_mitra_kerjasama') ?>">Mitra Kerja sama</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Materi_Promosi') ?>">
                  <i class="icon-paper menu-icon"></i>
                  <span class="menu-title">Materi Promosi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#faq" aria-expanded="false" aria-controls="faq">
                  <i class="icon-disc menu-icon"></i>
                  <span class="menu-title">Bantuan</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="faq">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('faq') ?>">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('faq/input_pertanyaan') ?>">Input Pertanyaan</a></li>
                  </ul>
                </div>
              </li>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 4 || $this->session->userdata('level') == 7) { ?>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#datatabel" aria-expanded="false" aria-controls="datatabel">
                  <i class="icon-box menu-icon"></i>
                  <span class="menu-title">Data Tabel</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="datatabel">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status') ?>">Daftar Tiket</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/lead_management_list') ?>">Lead Management</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/lead_interest_list') ?>">Lead Interest</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/nst_list') ?>">NST</a></li>
                  </ul>
                </div>
              </li>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 5) { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('auth/list_user') ?>">
                  <i class="icon-head menu-icon"></i>
                  <span class="menu-title">List User Akun</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#datatabel" aria-expanded="false" aria-controls="datatabel">
                  <i class="icon-box menu-icon"></i>
                  <span class="menu-title">Data Tabel</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="datatabel">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status') ?>">Daftar Tiket</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/lead_management_list') ?>">Lead Management</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/lead_interest_list') ?>">Lead Interest</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/nst_list') ?>">NST</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Materi_Promosi') ?>">
                  <i class="icon-paper menu-icon"></i>
                  <span class="menu-title">Materi Promosi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#faq" aria-expanded="false" aria-controls="faq">
                  <i class="icon-disc menu-icon"></i>
                  <span class="menu-title">Bantuan</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="faq">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('faq') ?>">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('faq/input_pertanyaan') ?>">Pesan</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#api" aria-expanded="false" aria-controls="api">
                  <i class="icon-ribbon menu-icon"></i>
                  <span class="menu-title">API</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="api">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('api') ?>">Daftar Token</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('api/list_token') ?>">List Token</a></li>
                  </ul>
                </div>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('Auth/profile') ?>">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Profile</span>
              </a>
            </li>
            <li class="nav-item" id="logout-sidebar">
              <a id="logout" class="nav-link" href="<?= base_url('Auth/logout') ?>">
                <i class="icon-esc menu-icon"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>
        </ul>
      <?php } ?>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper p-0">
          <?= $contents; ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer text-center">
          Helpdesk BFI Syariah
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="<?= base_url('assets2/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets2/vendors/base/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('assets2/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('assets2/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('assets2/js/template.js') ?>"></script>
  <script src="<?= base_url('assets2/vendors/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('assets2/vendors/jquery-bar-rating/jquery.barrating.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/file-upload.js') ?>"></script>

  <!-- ANEKA JAVASCRIPT IBRAHIM -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="<?= base_url('assets2/js/dataTables.responsive.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/dataTables.rowReorder.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/myJs.js') ?>"></script>
  <script src="<?= base_url('assets2/js/jquery-ui.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/responsive.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('assets2/plugin/ckeditor/ckeditor.js') ?>"></script>
  <script src="<?= base_url('assets2/js/owl.carousel.js') ?>"></script>
  <script>
    $(document).ready(function() {
      // Script untuk plugin CKEditor di halaman FAQ
      CKEDITOR.replace('content', {
        height: 500,
        filebrowserUploadUrl: "<?= base_url('faq/upload') ?>",
        filebrowserUploadMethod: 'form'
      });

      $("img").addClass("img-fluid");

      // Menyembunyikan tombol reset input text nama vendor
      $(".clear-nama-vendor").hide();
      // if ($(".nama_vendor_myhajat, .nama_vendor_myfaedah").val('') != '') {
      $(".clear-nama-vendor").show();
      // }
      // alert($(".nama_vendor_myhajat, .nama_vendor_myfaedah").val(''))
      // Smart search cari nama vendor
      // Memasang form autocomplete untuk form input produk my hajat yang terhubung ke MYSQL
      $(".nama_vendor_myhajat").autocomplete({
        delay: 0,
        source: "<?= base_url('data_json/get_vendor_myhajat') ?>",
        select: function(event, ui) {
          // event.preventDefault();
          $(".id_vendor").val(ui.item.id);
          $(".clear-nama-vendor").show();
          $(".nama_vendor_myhajat").attr('readonly', 'readonly');

          // Untuk pertanyaan vendor My Hajat
          if (ui.item.jenis_vendor == "Perorangan") {
            $(".perorangan").prop("checked", true);
            $(".badan_usaha").prop("checked", false);
            $("div.jenis-vendor").addClass('disable'); // ini untuk radio button jenis vendor my hajat
          } else if (ui.item.jenis_vendor == "Badan Usaha") {
            $(".perorangan").prop("checked", false);
            $(".badan_usaha").prop("checked", true);
            $("div.jenis-vendor").addClass('disable'); // ini untuk radio button jenis vendor my hajat
          }
          console.log(ui.item.id);
        }
      });

      // Memasang form autocomplete untuk form lead management mengganti nama requester di cabang itu sendiri yang terhubung ke MYSQL
      var id_cabang = $("#id_cabang").val();
      $("#requester").autocomplete({
        delay: 0,
        source: "<?= base_url('data_json/get_user_cabang/') ?>" + id_cabang,
        select: function(event, ui) {
          // event.preventDefault();
          $("#id_requester").val(ui.item.id);
          console.log(ui.item.id);
        }
      });

      // ketika tombol clear nama vendor di click, maka
      $(".clear-nama-vendor").on("click", function() {
        $(".nama_vendor_myfaedah, .nama_vendor_myhajat, .id_vendor, .jenis-penyedia").val('').removeAttr('readonly disabled');
        $("div.jenis-vendor, .jenis-penyedia").removeClass('disable');
        $(".perorangan, .badan_usaha").prop("checked", false).removeAttr('disabled');
        $(".clear-nama-vendor").hide();
      })

      // $("[name='submit_nst']").attr("disabled", "disabled");
      $("#lead_id").autocomplete({
        delay: 0,
        source: "<?= base_url('data_json/get_lead_id') ?>",
        select: function(event, ui) {
          $("#lead_id").val(ui.item.value).attr("readonly", "readonly");
          $("#nama_konsumen").val(ui.item.nama_konsumen).attr("readonly", "readonly");
          $("#nama_user").val(ui.item.name).attr("readonly", "readonly");
          $("#nama_cabang").val(ui.item.nama_cabang).attr("readonly", "readonly");
          $("#submit_nst").removeAttr("disabled");
          // $("#lead_id").attr("disabled", "disabled");

          $(".clear-lead-id").fadeIn();
          if (ui.item.produk == "My Ihram") {
            $("#produk").val("My Ihram").attr('disabled', 'disabled');
            $("#nama_produk").val("My Ihram");

          } else if (ui.item.produk == "My Safar") {
            $("#produk").val("My Safar").attr('disabled', 'disabled');
            $("#nama_produk").val("My Safar");

          } else if (ui.item.produk == "My Talim") {
            $("#produk").val("My Talim").attr('disabled', 'disabled');
            $("#nama_produk").val("My Talim");

          } else if (ui.item.produk == "My Hajat") {
            $("#produk").val("My Hajat").attr('disabled', 'disabled');
            $("#nama_produk").val("My Hajat");

          } else if (ui.item.produk == "My CarS") {
            $("#produk").val("My CarS").attr('disabled', 'disabled');
            $("#nama_produk").val("My CarS");

          } else if (ui.item.produk == "My Faedah") {
            $("#produk").val("My Faedah").attr('disabled', 'disabled');
            $("#nama_produk").val("My Faedah");

          }
        }
      });

      $("#lead_id").on('keypress focusout', function(e) {
        // if (e.keyCode == 13) {
        var lead_id = $("#lead_id").val();
        // alert(lead_id);
        $.ajax({
          url: "<?= base_url('data_json/get_leads_id/') ?>" + lead_id,
          method: 'POST',
          dataType: 'JSON',
          data: {
            lead_id: lead_id
          },
          async: true,
          success: function(data) {
            console.log(lead_id);
            $.each(data, function(i, val) {
              $("#lead_id").val(data.lead_id).attr("readonly", "readonly");
              $("#nama_konsumen").val(data.nama_konsumen).attr("readonly", "readonly");
              $("#nama_user").val(data.name).attr("readonly", "readonly");
              $("#nama_cabang").val(data.nama_cabang).attr("readonly", "readonly");
              $("#submit_nst").removeAttr("disabled");
              // $("#lead_id").attr("disabled", "disabled");

              $(".clear-lead-id").fadeIn();
              if (data.produk == "My Ihram") {
                $("#produk").val("My Ihram").attr('disabled', 'disabled');
                $("#nama_produk").val("My Ihram");

              } else if (data.produk == "My Safar") {
                $("#produk").val("My Safar").attr('disabled', 'disabled');
                $("#nama_produk").val("My Safar");

              } else if (data.produk == "My Talim") {
                $("#produk").val("My Talim").attr('disabled', 'disabled');
                $("#nama_produk").val("My Talim");

              } else if (data.produk == "My Hajat") {
                $("#produk").val("My Hajat").attr('disabled', 'disabled');
                $("#nama_produk").val("My Hajat");

              } else if (data.produk == "My CarS") {
                $("#produk").val("My CarS").attr('disabled', 'disabled');
                $("#nama_produk").val("My CarS");

              } else if (data.produk == "My Faedah") {
                $("#produk").val("My Faedah").attr('disabled', 'disabled');
                $("#nama_produk").val("My Faedah");

              }
            })
          }
        })
        // }
      });

      $(".clear-lead-id").show();
      $(".clear-lead-id").on("click", function() {
        $("#submit_nst").attr("disabled", "disabled");
        $("#lead_id").removeAttr("readonly").val("");
        $("#nama_konsumen, #nama_user, #nama_cabang, #produk").val("");
        $(".clear-lead-id").fadeOut("fast");
      })



    })
  </script>

  <script>
    (function($) {
      'use strict';
      $(function() {
        if ($("#customers").length) {
          var barChartCanvas = $("#customers").get(0).getContext("2d");
          // This will get the first returned node in the jQuery collection.
          var ctx = document.getElementById("customers");
          ctx.height = 60;
          var monthlyTickets = new Chart(barChartCanvas, {
            type: 'bar',
            data: {
              labels: [<?php foreach ($ticket_weekly as $weekly) echo "'$weekly->hari'" . ","; ?>],
              datasets: [{
                label: 'Ticket',
                data: [<?php foreach ($ticket_weekly as $weekly) echo $weekly->jumlah . ","; ?>],
                backgroundColor: [<?php foreach ($ticket_weekly as $weekly) echo $weekly->hari == date("D") ? "'#2196f3'," : "'#dee5ef',";; ?>],
                borderColor: [<?php foreach ($ticket_weekly as $weekly) echo $weekly->hari == date("D") ? "'#2196f3'," : "'#dee5ef',";; ?>],
                borderWidth: 3,
                fill: false
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true,
                    display: false,

                  },
                  gridLines: {
                    display: false,
                    drawBorder: false
                  }
                }],
                xAxes: [{
                  ticks: {
                    beginAtZero: true,
                    display: true,
                  },
                  gridLines: {
                    display: false,
                    drawBorder: false
                  }
                }]
              },
              legend: {
                display: false
              },
              elements: {
                point: {
                  radius: 0
                }
              },
              tooltips: {
                enabled: true
              }

            }
          });
        }

        $("#monthly-tickets").change(function() {
          var totalTiket = $("#total-tiket");
          var id = $(this).val();

          $.ajax({
            url: "<?= site_url('data_json/monthly_tickets_ajax/') ?>" + id,
            method: 'POST',
            dataType: 'JSON',
            data: {
              id: id
            },
            async: true,
            success: function(value) {
              var total = 0;
              monthlyTickets.data.labels = [];
              monthlyTickets.data.datasets[0].data = [];
              for (var i = 0; i < value.length; i++) {
                monthlyTickets.data.labels.push(value[i].hari);
                monthlyTickets.data.datasets[0].data.push(value[i].jumlah);
                monthlyTickets.data.datasets[0].backgroundColor.push(("#2196f3"));
                monthlyTickets.data.datasets[0].borderColor.push(("#2196f3"));
                total = total + parseInt(value[i].jumlah);
              }
              totalTiket.text(total);
              monthlyTickets.update();
            }
          })
          monthlyTickets.update();
        })

        if ($("#orders").length) {
          var barChartCanvas = $("#orders").get(0).getContext("2d");
          // This will get the first returned node in the jQuery collection.
          var ctx = document.getElementById("orders");
          ctx.height = 60;
          var LeadsChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: [<?php foreach ($monthly_leads as $leads) echo "'$leads->bulan'" . ","; ?>],
              datasets: [{
                label: 'Leads',
                data: [<?php foreach ($monthly_leads as $leads) echo "'$leads->jumlah'" . ","; ?>],
                backgroundColor: [<?php foreach ($monthly_leads as $leads) echo $leads->bulan == date("M") ? "'#2196f3'," : "'#dee5ef',";; ?>],
                borderColor: [<?php foreach ($monthly_leads as $leads) echo $leads->bulan == date("M") ? "'#2196f3'," : "'#dee5ef',";; ?>],
                borderWidth: 1,
                fill: false
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true,
                    display: false,

                  },
                  gridLines: {
                    display: false,
                    drawBorder: true
                  }
                }],
                xAxes: [{
                  ticks: {
                    beginAtZero: true,
                    display: true,
                  },
                  gridLines: {
                    display: false,
                    drawBorder: false
                  }
                }]
              },
              legend: {
                display: false
              },
              elements: {
                point: {
                  radius: 0
                }
              },
              tooltips: {
                enabled: true
              }
            }
          });
        }
        // alert(barChart.data.datasets[0].label);

        $("#tahun-leads").change(function() {
          var id = $(this).val();
          // alert(id)
          // var getAnnuallyLeads = function() {
          $.ajax({
            url: "<?= site_url('data_json/anually_leads_ajax/') ?>" + id,
            method: 'POST',
            dataType: 'JSON',
            data: {
              id: id
            },
            async: true,
            success: function(value) {
              LeadsChart.data.labels = [];
              LeadsChart.data.datasets[0].data = [];
              for (var i = 0; i < value.length; i++) {
                LeadsChart.data.labels.push(value[i].bulan);
                LeadsChart.data.datasets[0].data.push(value[i].jumlah);
                LeadsChart.data.datasets[0].backgroundColor.push(("#2196f3"));
                LeadsChart.data.datasets[0].borderColor.push(("#2196f3"));
                // arr.push(value[i].jumlah);
              }
              // alert(dataBarOrder.labels);
              // alert(LeadsChart.data.datasets[0].data);
              LeadsChart.update();
            }
          })
        })

        $("#anually-product").change(function() {
          var id = $(this).val();
          // alert(id)
          // var getAnnuallyLeads = function() {
          $.ajax({
            url: "<?= site_url('data_json/anually_product_ajax/') ?>" + id,
            method: 'POST',
            dataType: 'JSON',
            data: {
              id: id
            },
            async: true,
            success: function(value) {
              for (var i = 0; i < AnuallyProduct.data.datasets.length; i++) {
                AnuallyProduct.data.labels = [];
                AnuallyProduct.data.datasets[i].data = [];
                AnuallyProduct.data.datasets[i].backgroundColor = [];
                AnuallyProduct.data.datasets[i].borderColor = [];
              }
              for (var i = 0; i < value.length; i++) {
                // AnuallyProduct.data.labels.push(value[i].bulan);
                // alert(value[i].nama_bulan);
                AnuallyProduct.data.labels.push(value[i].nama_bulan);

                AnuallyProduct.data.datasets[0].data.push(value[i].my_talim);
                AnuallyProduct.data.datasets[0].backgroundColor.push(("#3794fc"));
                AnuallyProduct.data.datasets[0].borderColor.push(("#3794fc"));

                AnuallyProduct.data.datasets[1].data.push(value[i].my_hajat);
                AnuallyProduct.data.datasets[1].backgroundColor.push(("#a037fc"));
                AnuallyProduct.data.datasets[1].borderColor.push(("#a037fc"));

                AnuallyProduct.data.datasets[2].data.push(value[i].my_cars);
                AnuallyProduct.data.datasets[2].backgroundColor.push(("#cddc39"));
                AnuallyProduct.data.datasets[2].borderColor.push(("#cddc39"));

                AnuallyProduct.data.datasets[3].data.push(value[i].my_ihram);
                AnuallyProduct.data.datasets[3].backgroundColor.push(("#607d8b"));
                AnuallyProduct.data.datasets[3].borderColor.push(("#607d8b"));

                AnuallyProduct.data.datasets[4].data.push(value[i].my_safar);
                AnuallyProduct.data.datasets[4].backgroundColor.push(("#f44336"));
                AnuallyProduct.data.datasets[4].borderColor.push(("#f44336"));

                AnuallyProduct.data.datasets[5].data.push(value[i].my_faedah);
                AnuallyProduct.data.datasets[5].backgroundColor.push(("#8bc34a"));
                AnuallyProduct.data.datasets[5].borderColor.push(("#8bc34a"));
                // arr.push(value[i].jumlah);
              }
              // alert(dataBarOrder.labels);
              // alert(AnuallyProduct.data.datasets[0].data);
              AnuallyProduct.update();
            }
          })

        })

        // Produk Yang Paling Banyak Disupport
        if ($("#web-audience-metrics-satacked").length) {
          var barChartCanvas = $("#web-audience-metrics-satacked").get(0).getContext("2d");
          // This will get the first returned node in the jQuery collection.
          var ctx = document.getElementById("web-audience-metrics-satacked");
          ctx.height = 88;
          var AnuallyProduct = new Chart(barChartCanvas, {
            type: 'bar',
            height: '200',
            data: {
              labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
              datasets: [{
                  label: 'My Talim',
                  data: [<?php foreach ($monthly_product as $monthly) echo $monthly->my_talim . ","; ?>],
                  backgroundColor: [<?php foreach ($monthly_product as $monthly) echo "'#3794fc'" . ","; ?>],
                  borderColor: [<?php foreach ($monthly_product as $monthly) echo "'#3794fc'" . ","; ?>],
                  borderWidth: 1,
                  fill: false
                },
                {
                  label: 'My Hajat',
                  data: [<?php foreach ($monthly_product as $monthly) echo "'$monthly->my_hajat'" . ","; ?>],
                  backgroundColor: [<?php foreach ($monthly_product as $monthly) echo "'#a037fc'" . ","; ?>],
                  borderColor: [<?php foreach ($monthly_product as $monthly) echo "'#a037fc'" . ","; ?>],
                  borderWidth: 1,
                  fill: false
                },
                {
                  label: 'My Cars',
                  data: [<?php foreach ($monthly_product as $monthly) echo "'$monthly->my_cars'" . ","; ?>],
                  backgroundColor: [<?php foreach ($monthly_product as $monthly) echo "'#cddc39'" . ","; ?>],
                  borderColor: [<?php foreach ($monthly_product as $monthly) echo "'#cddc39'" . ","; ?>],
                  borderWidth: 1,
                  fill: false
                },
                {
                  label: 'My Ihram',
                  data: [<?php foreach ($monthly_product as $monthly) echo "'$monthly->my_ihram'" . ","; ?>],
                  backgroundColor: [<?php foreach ($monthly_product as $monthly) echo "'#607d8b'" . ","; ?>],
                  borderColor: [<?php foreach ($monthly_product as $monthly) echo "'#607d8b'" . ","; ?>],
                  borderWidth: 1,
                  fill: false
                },
                {
                  label: 'My Safar',
                  data: [<?php foreach ($monthly_product as $monthly) echo "'$monthly->my_safar'" . ","; ?>],
                  backgroundColor: [<?php foreach ($monthly_product as $monthly) echo "'#f44336'" . ","; ?>],
                  borderColor: [<?php foreach ($monthly_product as $monthly) echo "'#f44336'" . ","; ?>],
                  borderWidth: 1,
                  fill: false
                },
                {
                  label: 'My Faedah',
                  data: [<?php foreach ($monthly_product as $monthly) echo "'$monthly->my_faedah'" . ","; ?>],
                  backgroundColor: [<?php foreach ($monthly_product as $monthly) echo "'#8bc34a'" . ","; ?>],
                  borderColor: [<?php foreach ($monthly_product as $monthly) echo "'#8bc34a'" . ","; ?>],
                  borderWidth: 1,
                  fill: false
                },
              ]
            },
            options: {
              scales: {
                xAxes: [{
                  barPercentage: 1.0,
                  stacked: true,
                  gridLines: {
                    display: false, //this will remove only the label
                    drawBorder: false,
                    color: "#e5e9f2",
                  },
                }],
                yAxes: [{
                  stacked: true,
                  display: false,
                  gridLines: {
                    display: false, //this will remove only the label
                    drawBorder: false
                  },
                }]
              },
              legend: {
                display: false,
                position: "bottom"
              },
              legendCallback: function(chart) {
                var text = [];
                text.push('<div class="row">');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                  text.push('<div class="col-lg-4"><div class="row"><div class="col-sm-12"><h5 class="font-weight-bold text-dark mb-1">' + chart.data.datasets[i].data[1].toLocaleString() + '</h5></div></div><div class="row align-items-center"><div class="col-2"><span class="legend-label" style="background-color:' + chart.data.datasets[i].backgroundColor[i] + '"></span></div><div class="col-9 pl-0"><p class="text-muted m-0 ml-1">' + chart.data.datasets[i].label + '</p></div></div>');
                  text.push('</div>');
                }
                text.push('</div>');
                return text.join("");
              },
              elements: {
                point: {
                  radius: 0
                }
              }
            }
          });
          document.getElementById('chart-legends').innerHTML = barChart.generateLegend();
        }



      });
    })(jQuery);
  </script>
  <script>
    // Google Maps Script
    var map;

    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {
          lat: -34.397,
          lng: 150.644
        },
        zoom: 8
      });
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAVxLb_WQntXfKVk9fodF_8uVEA_MHrXs&callback=initMap" async defer></script>
</body>

</html>