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
							<h4>Belum Daftar?</h4>
							<h6 class="font-weight-light">Silahkan isi dengan data yang valid</h6>
							<form method="post" action="<?= base_url('Auth/process_daftar') ?>" class="pt-3">
								<div class="form-group">
									<label>Nomor Induk Karyawan</label>
									<?= form_error('nik') ?>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-briefcase-outline text-info"></i>
											</span>
										</div>
										<input name="nik" type="number" class="form-control form-control-lg border-left-0" id="nik" maxlength="7" placeholder="Nomor Induk Karyawan" value="<?= set_value('nik') ?>">
									</div>
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<?= form_error('name') ?>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-account-outline text-info"></i>
											</span>
										</div>
										<input name="name" type="text" class="form-control form-control-lg border-left-0" placeholder="Nama Lengkap" value="<?= set_value('name') ?>">
									</div>
								</div>
								<div class="form-group">
									<label>E-mail</label>
									<?= form_error('email') ?>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-email-outline text-info"></i>
											</span>
										</div>
										<input name="email" type="email" class="form-control form-control-lg border-left-0" placeholder="E-mail" value="<?= set_value('email') ?>">
									</div>
								</div>
								<div class="form-group">
									<label>Kata Sandi</label>
									<?= form_error('password') ?>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-lock-outline text-info"></i>
											</span>
										</div>
										<input name="password" type="password" class="form-control form-control-lg border-left-0" placeholder="Password" id="password">
									</div>
								</div>
								<div class="form-group">
									<label>Konfirmasi Kata Sandi</label>
									<?= form_error('passconf') ?>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-lock-outline text-info"></i>
											</span>
										</div>
										<input name="passconf" type="password" class="form-control form-control-lg border-left-0" placeholder="Konfirmasi Password" id="passwordconf">
									</div>
								</div>
								<div class="form-group">
									<label>Cabang</label>
									<?= form_error('id_cabang') ?>
									<select class="form-control form-control-lg" name="id_cabang" id="id_cabang">
										<option disabled selected value="">- Pilih Cabang -</option>
										<?php
										foreach ($pertanyaan as $p) {
											?>
											<option <?= $p->id_cabang == 46 ? 'disabled' : '' ?> value="<?= $p->id_cabang ?>"><?= $p->nama_cabang ?></option>
										<?php }  ?>
									</select>
								</div>
								<div class="mt-3">
									<button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
								</div>
								<div class="text-center mt-4 font-weight-light">
									Sudah punya akun? <a href="<?= base_url('auth') ?>" class="text-info">Login</a>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 d-flex flex-row pt-3" style="background: url('<?= base_url("assets2/img/register.jpg") ?>'); background-size: cover;">
						<p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018 All
							rights reserved.</p>
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
	$(document).ready(function {
		$('#password').on('keypress', function() {
			if ($(this).val() == '') {

			}
		})
	})
</script>

</html>