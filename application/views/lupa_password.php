<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lupa Password</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

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
            <h5 class="card-title text-center">Lupa Password</h5>
            <form id="form-signin" action="<?= site_url('Auth/lupa_password') ?>" method="post" class="form-signin">
              <!-- Email Address/Username -->
              <div class="form-group">
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Masukkan Email" required autofocus>
              </div>
              <button id="submit" name="reset_password" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Kirim</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  // button loading input form request support
  $("#form-signin").on("submit", function() {
    $("#submit").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading... ');
    $("#submit").css("pointer-events", "none")
  })
</script>

</html>