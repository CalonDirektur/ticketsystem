<?php
class Auth extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('User_m');
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
		$this->load->model('data_m');		
		$data['pertanyaan'] = $this->data_m->get_cabang()->result();
		$this->template->load('template','user/daftar_akun', $data);
	}
	
	//method proses pendaftaran akun user
	public function process_daftar()
	{
		$data = [
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'id_cabang' => $this->input->post('id_cabang'),
			'level' => 1
		];

		//process daftar akun user
		$success = $this->User_m->add($data);
		redirect('dashboard');
	}

	//Halaman List para User
	public function list_user()
	{
		$data = [
			'list_user' => $this->User_m->get()->result_array()
		];
		$this->template->load('template','user/list_user', $data);
	}

	//Halaman reset password
    public function lupa_password()
    {
		if(isset($_POST['reset_password'])){
			// Konfigurasi email
        $config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'ibrahim.ahmad58@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'Speedog0g4',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
           ];

			// Load library email dan konfigurasinya
			$this->load->library('email', $config);

			// Email dan nama pengirim
			$this->email->from('ibrahim.ahmad58@gmail.com', 'MasRud.com | M. Rudianto');

			// Email penerima
			$this->email->to('ibrahim.ahmadd98@gmail.com'); // Ganti dengan email tujuan kamu	

			// Subject email
			$this->email->subject('Kirim Email dengan SMTP Gmail | MasRud.com');

			// Isi email
			$this->email->message("Ini adalah contoh email CodeIgniter yang dikirim menggunakan SMTP email Google (Gmail).<br><br> Klik <strong><a href='https://masrud.com/post/kirim-email-dengan-smtp-gmail' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

			// Tampilkan pesan sukses atau error
			if ($this->email->send()) {
				echo 'Sukses! email berhasil dikirim.';
			} else {
				echo 'Error! email tidak dapat dikirim.';
			}
			}else{
				$this->load->view('lupa_password');
			}
	}

	//Proses Login
    public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('user_m');
			
			$username = $post['username'];
			$password = $post['password'];

			$query = $this->user_m->login($username, $password);
			//cek login
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = [
					'userid' => $row->username,
					'level' => $row->level
				];
				$this->session->set_userdata($params);
				echo "<script>alert('Selamat, login berhasil'); window.location='" . site_url("dashboard") . "'</script>";
			} else {
				echo "<script>alert('Maaf, login gagal'); window.location='" . site_url("auth") . "'</script>";
			}
		}
	}

	// Proses Logout
	public function logout()
	{
		$params = ['userid', 'level'];
		$this->session->unset_userdata($params);
		redirect('auth');
	}
}