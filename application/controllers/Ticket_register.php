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

		//add data
		$post = $this->input->post(NULL, TRUE);
		// if(isset($_POST['submit'])){
		// 	$data = [
		// 		'nama' => $post['nama'],
		// 		'alamat' => $post['alamat'],
		// 		'hobi' => $post['hobi'],
		// 		'id_approval' => 0
		// 	];
		// 	$this->data_m->add($data);
		// }

		//add form my ta'lim
		if(isset($_POST['submit_mytalim'])){
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'pendidikan' => $post['pendidikan'],
				'nama_lembaga' => $post['nama_lembaga'],
				'tahun_berdiri' => $post['tahun_berdiri'],
				'akreditasi' => $post['akreditasi'],
				'periode' => $post['periode'],
				'tujuan_pembiayaan' => $post['tujuan_pembiayaan'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 1000;
			$config['max_width']            = 2000;
			$config['max_height']           = 1600;
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('ktp')){
			echo $this->upload->display_errors();
			}else{
				$data['ktp'] = $this->upload->data('file_name');
			}

			if (!$this->upload->do_upload('kk')){
			echo $this->upload->display_errors();
			}else{
				$data['kk'] = $this->upload->data('file_name');
			}

			if (!$this->upload->do_upload('bukti_penghasilan')){
			echo $this->upload->display_errors();
			}else{
				$data['bukti_penghasilan'] = $this->upload->data('file_name');
			}

			if (!$this->upload->do_upload('npwp')){
			echo $this->upload->display_errors();
			}else{
				$data['npwp'] = $this->upload->data('file_name');
			}

			if (!$this->upload->do_upload('tambahan')){
			echo $this->upload->display_errors();
			}else{
				$data['tambahan'] = $this->upload->data('file_name');
			}

			$id = $this->data_m->add('tb_my_talim',$data);

			if($id){
				echo "Data berhasil disimpan";
				redirect('/');
			}else{
					echo "Data gagal disimpan";
			}
		}
		redirect('dashboard');
	}
}
