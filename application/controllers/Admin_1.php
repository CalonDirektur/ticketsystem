<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_1 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Aksi_Admin1_m');
		$this->load->model('data_m');
	}

	public function index()
	{
		check_not_login(); check_access_level_admin1();

		

		//Ambil Data
		$data['records'] = $this->data_m->get('pending_review')->result_array();

		$this->template->load('template', 'admin/admin1', $data);
	}

	public function approved(){
		$data['records'] = $this->data_m->get('approved_review')->result_array();		
		$this->template->load('template', 'admin/admin1_approved', $data);
	}
	
	public function rejected(){
		
		$data['records'] = $this->data_m->get('rejected_review')->result_array();
		$this->template->load('template', 'admin/admin1_rejected', $data);
	}

	public function approve($id_data){
		$this->Aksi_Admin1_m->approve($id_data);		
		redirect('dashboard');
	}
	
	public function reject($id_data){
		
		$this->Aksi_Admin1_m->reject($id_data);
		redirect('dashboard');
	}
}
