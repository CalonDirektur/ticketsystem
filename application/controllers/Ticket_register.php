<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Aksi_Admin2_m');
		$this->load->model('data_m');
	}

	public function index(){
		check_not_login(); check_access_level_user();
		redirect('dashboard');
	}

	public function daftar()
	{		
		$this->template->load('template', 'user/ticket_register');
	}

	public function form_my_hajat()
	{
		$this->template->load('template', 'my_hajat/form_my_hajat');

	}

	public function form_my_talim()
	{
		$this->template->load('template', 'my_talim/form_my_talim');

	}
	///////////////////// PROSES LOGIC ///////////////////////////////////////////////
	public function pending(){
		$data['records'] = $this->data_m->get('pending_review')->result_array();		
		$this->template->load('template', 'user/ticket_pending', $data);
	}

	public function approved(){
		$data['records'] = $this->data_m->get('status_admin2')->result_array();		
		$this->template->load('template', 'user/ticket_approved', $data);
	}
	
	public function rejected(){
		
		$data['records'] = $this->data_m->get('rejected_review')->result_array();
		$this->template->load('template', 'user/ticket_rejected', $data);
	}

	public function add()
	{
		$this->load->model('data_m');

		$post = $this->input->post(NULL, TRUE);
		if(isset($_POST['submit'])){
			$data = [
				'nama' => $post['nama'],
				'alamat' => $post['alamat'],
				'hobi' => $post['hobi'],
				'id_approval' => 0
			];
			$this->data_m->add($data);
		}
		redirect('dashboard');
	}
}
