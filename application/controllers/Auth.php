<?php
class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function daftar_akun()
    {
        $this->load->view('daftar_akun');
    }

    public function lupa_password()
    {
        $this->load->view('lupa_password');
    }

    public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('user_m');


			$query = $this->user_m->login('user', ['username' => $post['username'], 'password' => $post['password']]);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = [
					'userid' => $row->user_id,
					'level' => $row->level
				];
				$this->session->set_userdata($params);
				echo "<script>alert('Selamat, login berhasil'); window.location='" . site_url("dashboard") . "'</script>";
			} else {
				echo "<script>alert('Maaf, login gagal'); window.location='" . site_url("auth/login") . "'</script>";
			}
		}
	}

	public function logout()
	{
		$params = ['userid', 'level'];
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}