<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin2 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aksi_Admin2_m');
		$this->load->model('data_m');
	}

	public function review($produk = NULL, $id = NULL)
	{
		check_not_login();
		check_access_level_admin2();

		//Produk My Ta'lim
		if ($produk == 'mytalim' && $id == NULL) {
			$data['pending'] = $this->data_m->get('tb_my_talim', 'approved_review')->result();
			$this->template->load('template', 'admin/my_talim/admin2_pending_mytalim', $data);
		}
		if ($produk == 'mytalim' && $id != NULL) {
			//Mengambil data tiket yang sudah disetujui oleh Admin 1
			$data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_approval' => 2])->row();
			$this->template->load('template', 'my_talim/detail_status_my_talim', $data);
		}
	}

	//halaman completed ticket (halaman data ticket yang sudah diselesaikan)
	public function completed($produk = NULL, $id = NULL)
	{
		//Produk My Ta'lim
		if ($produk == 'mytalim' && $id == NULL) {
			$data['pending'] = $this->data_m->get('tb_my_talim', 'completed_review')->result();
			$this->template->load('template', 'admin/my_talim/admin2_completed_mytalim', $data);
		}
		if ($produk == 'mytalim' && $id != NULL) {
			$data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_approval' => 3])->row();
			$this->template->load('template', 'my_talim/detail_status_my_talim', $data);
		}

		//

	}

	//menyelesaikan support ticket
	public function approve($produk = NULL, $id)
	{
		if ($produk == 'mytalim') {
			$this->Aksi_Admin2_m->approve('tb_my_talim', ['id_mytalim' => $id]);
			redirect('admin2/completed/');
		}
	}
}
