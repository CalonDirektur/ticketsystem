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
  <link rel="stylesheet" href="<?= base_url('assets2/css/rowReorder.dataTables.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/css/responsive.dataTables.min.css') ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets2/css/jquery-ui.min.css') ?>">

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
                  <?php } else if ($komentar->id_renovasi != NULL) { ?>
                    <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myhajat/renovasi/' . $komentar->id_renovasi . '?id=' . $komentar->id) ?>">
                    <?php } else if ($komentar->id_sewa != NULL) { ?>
                      <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myhajat/sewa/' . $komentar->id_sewa . '?id=' . $komentar->id) ?>">
                      <?php } else if ($komentar->id_wedding != NULL) { ?>
                        <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myhajat/wedding/' . $komentar->id_wedding . '?id=' . $komentar->id) ?>">
                        <?php } else if ($komentar->id_franchise != NULL) { ?>
                          <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myhajat/franchise/' . $komentar->id_franchise . '?id=' . $komentar->id) ?>">
                          <?php } else if ($komentar->id_myhajat_lainnya != NULL) { ?>
                            <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myhajat/lainnya/' . $komentar->id_myhajat_lainnya . '?id=' . $komentar->id) ?>">
                            <?php } else if ($komentar->id_mysafar != NULL) { ?>
                              <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/mysafar/id/' . $komentar->id_mysafar . '?id=' . $komentar->id) ?>">
                              <?php } else if ($komentar->id_myihram != NULL) { ?>
                                <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myihram/id/' . $komentar->id_myihram . '?id=' . $komentar->id) ?>">
                                <?php } else if ($komentar->id_mycars != NULL) { ?>
                                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/mycars/id/' . $komentar->id_mycars . '?id=' . $komentar->id) ?>">
                                  <?php } else if ($komentar->id_agent != NULL) { ?>
                                    <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/aktivasi_agent/id/' . $komentar->id_agent . '?id=' . $komentar->id) ?>">
                                    <?php } else if ($komentar->id_nst != NULL) { ?>
                                      <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/nst/id/' . $komentar->id_nst . '?id=' . $komentar->id) ?>">
                                      <?php } else if ($komentar->id_mitra_kerjasama != NULL) { ?>
                                        <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/mitra_kerjasama/id/' . $komentar->id_mitra_kerjasama . '?id=' . $komentar->id) ?>">
                                        <?php } else if ($komentar->id_myfaedah != NULL) { ?>
                                          <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myfaedah/id/' . $komentar->id_myfaedah . '?id=' . $komentar->id) ?>">
                                          <?php } else if ($komentar->id_bangunan != NULL) { ?>
                                            <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myfaedah/bangunan/' . $komentar->id_bangunan . '?id=' . $komentar->id) ?>">
                                            <?php } else if ($komentar->id_elektronik != NULL) { ?>
                                              <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myfaedah/elektronik/' . $komentar->id_elektronik . '?id=' . $komentar->id) ?>">
                                              <?php } else if ($komentar->id_qurban != NULL) { ?>
                                                <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myfaedah/qurban/' . $komentar->id_qurban . '?id=' . $komentar->id) ?>">
                                                <?php } else if ($komentar->id_modal != NULL) { ?>
                                                  <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myfaedah/modal/' . $komentar->id_modal . '?id=' . $komentar->id) ?>">
                                                  <?php } else if ($komentar->id_myfaedah_lainnya != NULL) { ?>
                                                    <a class="dropdown-item preview-item <?= ($komentar->has_read == 0) ? 'bg-secondary' : '' ?>" href="<?= base_url('status/detail/myfaedah/lainnya/' . $komentar->id_myfaedah_lainnya . '?id=' . $komentar->id) ?>">
                                                    <?php } ?>
                                                    <div class="preview-item-content flex-grow">
                                                      <h6 class="preview-subject ellipsis font-weight-normal mt-0">
                                                        <?= $komentar->name ?> <br>(<?= $komentar->nama_cabang ?>)
                                                      </h6>
                                                      <small>ID Ticket #<?= $komentar->id_ticket ?></small>
                                                      <p class="font-weight-light small-text text-muted mb-0">
                                                        <?= $komentar->comment ?>
                                                      </p>
                                                    </div>
                                                    </a>
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
              <img src="<?= base_url('assets2/img/profile-pic.jpg') ?>">
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
                  echo "Admin NST";
                } else if ($this->fungsi->user_login()->level == 5) {
                  echo "Superuser";
                } else if ($this->fungsi->user_login()->level == 6) {
                  echo ucfirst($this->fungsi->user_login()->nama_cabang) . "<br>";
                  echo ucfirst($this->fungsi->user_login()->jabatan);
                }
                ?>
            </div>
          </div>
        <?php } ?>
        <ul class="nav">
          <?php if ($this->session->userdata('userid') != NULL) { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('dashboard') ?>">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <?php if ($this->session->userdata('level') == 1) { ?>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#datatabel" aria-expanded="false" aria-controls="datatabel">
                  <i class="icon-head menu-icon"></i>
                  <span class="menu-title">Data Tabel</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="datatabel">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/lead_management_list') ?>">Lead Management</a></li>
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
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_aktivasi_agent') ?>">Aktivasi Agent</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_nst') ?>">NST</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_mitra_kerjasama') ?>">Mitra Kerja sama</a></li>
                  </ul>
                </div>
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

            <?php if ($this->session->userdata('level') == 4) { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('status/list/lead_management_list/') ?>">
                  <i class="icon-box menu-icon"></i>
                  <span class="menu-title">Lead Management</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('status/list/nst_list') ?>">
                  <i class="icon-box menu-icon"></i>
                  <span class="menu-title">NST</span>
                </a>
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
                  <i class="icon-head menu-icon"></i>
                  <span class="menu-title">Data Tabel</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="datatabel">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/lead_management_list') ?>">Lead Management</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/nst_list') ?>">NST</a></li>
                  </ul>
                </div>
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
            <?php } ?>

            <?php if ($this->session->userdata('level') == 6) { ?>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#datatabel" aria-expanded="false" aria-controls="datatabel">
                  <i class="icon-head menu-icon"></i>
                  <span class="menu-title">Data Tabel</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="datatabel">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('status/list/lead_management_list') ?>">Lead Management</a></li>
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
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_aktivasi_agent') ?>">Aktivasi Agent</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_nst') ?>">NST</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('ticket_register/form_mitra_kerjasama') ?>">Mitra Kerja sama</a></li>
                  </ul>
                </div>
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
                    <li class="nav-item"><a class="nav-link" href="#">Input Pertanyaan</a></li>
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
  <script src="<?= base_url('assets2/vendors/base/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('assets2/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('assets2/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('assets2/js/template.js') ?>"></script>
  <script src="<?= base_url('assets2/vendors/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('assets2/vendors/jquery-bar-rating/jquery.barrating.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/dashboard.js') ?>"></script>
  <script src="<?= base_url('assets2/js/file-upload.js') ?>"></script>

  <!-- ANEKA JAVASCRIPT IBRAHIM -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="<?= base_url('assets2/js/jquery-3.4.1.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/dataTables.rowReorder.min.js') ?>"></script>
  <script src="<?= base_url('assets2/js/myJs.js') ?>"></script>
  <script src="//code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <!-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> -->
  <script src="<?= base_url('assets2/plugin/ckeditor/ckeditor.js') ?>"></script>
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

      // Memasang form autocomplete untuk form input produk my faedah yang terhubung ke MYSQL
      $(".nama_vendor_myfaedah").autocomplete({
        delay: 0,
        source: "<?= base_url('data_json/get_vendor_myfaedah') ?>",
        select: function(event, ui) {
          // event.preventDefault();
          $(".id_vendor").val(ui.item.id);
          $(".clear-nama-vendor").show();
          $(".nama_vendor_myfaedah").attr('readonly', 'readonly');

          // Untuk pertanyaan vendor My Faedah
          if (ui.item.jenis_vendor == "Toko/Agen") {
            $(".jenis-penyedia").val("Toko/Agen").addClass('disable');

          } else if (ui.item.jenis_vendor == "Authorized Distributor") {
            $(".jenis-penyedia").val("Authorized Distributor").addClass('disable');

          } else if (ui.item.jenis_vendor == "Penjual Perorangan") {
            $(".jenis-penyedia").val("Penjual Perorangan").addClass('disable');

          } else if (ui.item.jenis_vendor == "Modern Store/Supermarket") {
            $(".jenis-penyedia").val("Modern Store/Supermarket").addClass('disable');

          }
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
    })
  </script>
</body>

</html>