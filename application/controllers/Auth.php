<?php
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('data_m');

		$this->load->library('form_validation');
	}

	// Halaman Login
	public function index()
	{
		check_already_login();
		$this->load->view('login');
	}

	// Halaman Daftar Akun
	public function daftar_akun()
	{
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$this->template->load('template2', 'user/daftar_akun', $data);
	}

	//method proses pendaftaran akun user
	public function process_daftar()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[6]|max_length[6]');
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('id_cabang', 'ID Cabang', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
			$this->template->load('template2', 'user/daftar_akun', $data);
		} else {
			// $this->load->view('formsuccess');
			$data = [
				'name' => $this->input->post('name'),
				'nik' => $this->input->post('nik'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'id_cabang' => $this->input->post('id_cabang'),
				'level' => 1
			];

			//process daftar akun user
			$success = $this->user_m->add($data);
			redirect('dashboard');
		}
	}

	//Halaman List para User
	public function list_user()
	{
		$data = [
			'list_user' => $this->user_m->get_cabang()
		];
		$this->template->load('template2', 'user/list_user', $data);
	}

	//Halaman reset password
	public function lupa_password()
	{
		$this->load->model('user_m');
		$post = $this->input->post(null, TRUE);


		if (isset($_POST['reset_password'])) {

			$email = $post['email'];
			$data = $this->user_m->get($email);

			if ($data->num_rows() > 0) {
				function generateMixedPassword($length = 8)
				{
					$base = 'abcdefghijklmnopqrstuvwxyz';
					$baseD = '0123456789';

					$r = array();

					for ($i = 0; $i < $length; $i += 2) {
						$r[] = substr($base, rand(0, strlen($base) - 1), 1);
					}
					for ($i = 0; $i < $length; $i += 2) {
						$r[] = substr($baseD, rand(0, strlen($baseD) - 1), 1);
					}
					shuffle($r);

					return implode('', $r);
				}
				$generate = generateMixedPassword();
				$random_password = $generate;
				// Script untuk ubah password random
				$this->user_m->update(['password' => $random_password], ['email' => $email]);

				$akun = $data->row();
				// Konfigurasi email
				$config = [
					'mailtype'  => 'html',
					'charset'   => 'utf-8',
					'protocol'  => 'smtp',
					'smtp_host' => 'srv50.niagahoster.com',
					'smtp_user' => 'administrator@bfisyariah.id',    // Ganti dengan email gmail kamu
					'smtp_pass' => 'Tralala1',      // Password gmail kamu
					'smtp_port' => 465,
					'crlf'      => "\r\n",
					'newline'   => "\r\n"
				];

				// Load library email dan konfigurasinya
				$this->load->library('email', $config);

				// Email dan nama pengirim
				$this->email->from('administrator@bfisyariah.id', 'BFI Syariah Head Office');

				// Email penerima
				$this->email->to($email); // Ganti dengan email tujuan kamu	

				// Subject email
				$this->email->subject('Lupa Password');

				// Isi email
				$this->email->message("Detail Akun Anda: \n NIK: $akun->nik \n Nama: $akun->name \n E-mail: $akun->email \n Password:" . $random_password);

				// Tampilkan pesan sukses atau error
				if ($this->email->send()) {
					echo 'Sukses! email berhasil dikirim.';
				} else {
					echo 'Error! email tidak dapat dikirim.';
				}
			} else {
				echo "akun tidak ditemukan";
			}
		} else {
			$this->load->view('lupa_password');
		}
	}

	//Proses Login
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('user_m');

			$nik = $post['username'];
			$password = $post['password'];

			$query = $this->user_m->login($nik, $password);
			//cek login
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = [
					'userid' => $row->nik,
					'level' => $row->level,
					'id_cabang' => $row->id_cabang
				];
				$this->session->set_userdata($params);
				echo "<script>alert('Selamat, login berhasil'); window.location='" . site_url("dashboard") . "'</script>";
			} else {
				echo "<script>alert('Akun tidak cocok/belum diaktivasi'); window.location='" . site_url("auth") . "'</script>";
			}
		}
	}

	//Update Aktivasi Akun
	public function update_user()
	{
		$post = $this->input->post(null, TRUE);

		$data = $post['is_active'];

		foreach ($data as $activate => $val) {
			$this->user_m->update(['is_active' => $val], ['id_user' => $activate]);
		}
		redirect('auth/list_user');
	}

	// Proses Logout
	public function logout()
	{
		$params = ['userid', 'level', 'id_cabang'];
		$this->session->unset_userdata($params);
		redirect('auth');
	}
}
