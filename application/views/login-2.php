<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Helpdesk BFI Syariah</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/mdi/css/materialdesignicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/feather/feather.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets2/vendors/base/vendor.bundle.base.css') ?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets2/css/style.css') ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets2/img/bfi.jpg') ?>" />
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="<?= base_url('assets2/img/logo-bfi-syariah.png') ?>" alt="logo">
              </div>
              <h4>Selamat datang kembali di Helpdesk BFI Syariah!</h4>
              <h6 class="font-weight-light">Masuk untuk melanjutkan!</h6>
              <form action="<?= base_url('auth/process') ?>" method="post" class="pt-3">
                <div class="form-group">
                  <label for="exampleInputEmail">Email/NIK</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-info"></i>
                      </span>
                    </div>
                    <input name="username" type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Email/NIK">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-info"></i>
                      </span>
                    </div>
                    <input name="password" type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <!-- <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label> -->
                  </div>
                  <a href="<?= base_url('auth/lupa_password') ?>" class="auth-link text-black">Klik disini jika lupa password</a>
                </div>
                <div class="my-3">
                  <button name="login" type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Belum mempunyai akun? <a href="<?= base_url('auth/daftar_akun') ?>" class="text-info">Buat Akun</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 d-flex flex-row" style="background: url('<?= base_url("assets2/img/login.jpg") ?>'); background-size: cover;">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018 All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="<?= base_url('assets2/vendors/base/vendor.bundle.base.js') ?>"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= base_url('assets2/js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('assets2/js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('assets2/js/template.js') ?>"></script>
  <!-- endinject -->
</body>
<script>

</script>

</html>