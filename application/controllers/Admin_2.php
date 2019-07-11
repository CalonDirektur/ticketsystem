<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_2 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Aksi_Admin2_m');
		$this->load->model('data_m');

	}

	public function index()
	{
		check_not_login(); check_access_level_admin2();

		//Ambil Data ticket yang sudah disetujui admin 1
		$data['records'] = $this->data_m->get('approved_review')->result_array();

		$this->template->load('template', 'admin/admin2', $data);
	}

	//halaman completed ticket (halaman data ticket yang sudah diselesaikan)
	public function completed(){
		$data['records'] = $this->data_m->get('completed_review')->result_array();

		$this->template->load('template', 'admin/admin2_completed', $data);

	}

	//menyelesaikan support ticket
	public function approve($id_data){
		$this->Aksi_Admin2_m->approve($id_data);	
		redirect('Admin_2/completed');
	}
}
