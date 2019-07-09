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
<body>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Daftar Akun</h5>
            <form class="form-signin">
            
            <!-- Nama Lengkap -->
            <div class="form-group">
                <input type="text" id="inputNama" class="form-control" placeholder="Masukkan Nama" required autofocus>
              </div>

            <!-- Email Address/Username -->
              <div class="form-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Masukkan Email" required>
              </div>

            <!-- Password -->
              <div class="form-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Masukkan Password" required>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Daftar</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>