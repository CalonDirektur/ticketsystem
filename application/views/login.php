<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Login</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/login-css.css') ?>">
</head>

<body style="background-image: url(<?= base_url('assets2/img/ho.jpg') ?>); background-size: cover">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-header text-center">
            <h3>Helpdesk BFI Syariah</h3>
          </div>
          <div class="card-body">
            <div class="mx-auto text-center">
              <img class="rounded img-fluid m-2 mb-4" src="<?= base_url('assets2/img/logo-bfi-syariah.png') ?>">
            </div>

            <form action="<?= base_url('auth/process') ?>" method="post" class="form-signin">

              <!-- Email Address/NIK -->
              <div class="form-group">
                <label for="inputEmail">NIK/E-mail</label>
                <input name="username" type="text" id="inputEmail" class="form-control" placeholder="Masukkan Email" required autofocus>
              </div>

              <!-- Password -->
              <div class="form-group">
                <label for="inputPassword">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Masukkan Password" required>
              </div>

              <!-- <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div> -->

              <button name="login" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
              <p>Belum daftar? <a href="<?= base_url('auth/daftar_akun') ?>">Register</a></p>
              <p>Lupa Password? <a href="<?= base_url('auth/lupa_password') ?>">Reset Password</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>