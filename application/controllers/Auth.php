<?php
class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
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
        $this->load->view('daftar_akun');
    }

	//Halaman reset password
    public function lupa_password()
    {
		//Jika tombol
		if(isset($_POST['reset_password'])){
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

		$this->load->library('email', $config);

		$from_email = "ibrahim.ahmad58@gmail.com";
        $to_email = $this->input->post('email');
        $this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject('Reset Password');
        $this->email->message('The email send using codeigniter library');
        //Send mail
        if($this->email->send())
            $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
        else
            $this->session->set_flashdata("email_sent","You have encountered an error");
		}

		$this->load->view('lupa_password');
	}

	//Proses Login
    public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('user_m');

			$query = $this->user_m->login('user', ['email' => $post['email'], 'password' => $post['password']]);
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