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
  <link rel="stylesheet" href="<?= base_url('assets2/') ?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets2/img/bfi.jpg') ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= base_url('assets2/img/logo-bfi-syariah.png') ?>" alt="logo">
              </div>
              <h4>Selamat datang di Helpdesk BFI Syariah</h4>
              <h6 class="font-weight-light">Masuk untuk melanjutkan.</h6>
              <form action="<?= base_url('auth/process') ?>" method="post" class="pt-3">
                <div class="form-group">
                  <input name="username" type="email" class="form-control form-control-lg" id="inputEmail" placeholder="Email/NIK" required autofocus>
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg" id="inputPassword" placeholder="Kata Sandi">
                </div>
                <div class="mt-3">
                  <button type="submit" name="login" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" href="">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <!-- <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label> -->
                  </div>
                  <a href="<?= base_url('auth/lupa_password') ?>" class="auth-link text-black">Forgot password?</a>
                </div>
                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook mr-2"></i> Connect using facebook
                  </button>
                </div> -->
                <div class="text-center mt-4 font-weight-light">
                  Belum mempunyai akun? <a href="<?= base_url('auth/daftar_akun') ?>" class=" text-primary">Buat</a>
                </div>
              </form>
            </div>
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

</html>