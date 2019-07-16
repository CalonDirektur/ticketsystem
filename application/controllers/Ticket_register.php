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

	public function form_my_hajat()
	{
		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$this->template->load('template', 'my_hajat/form_my_hajat', $data);
	}

	public function form_my_talim()
	{
		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$this->template->load('template', 'my_talim/form_my_talim', $data);
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
				'id_cabang' => $post['cabang'],
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

		// PROSES SUBMIT FORM MY HAJAT //
		// FORMULIR RENOVASI
		if(isset($_POST['submit_renovasi'])){
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'id_cabang' => $post['cabang'],
				'nama_vendor' => $post['nama_vendor'],
				'jenis_vendor' => $post['jenis_vendor'],
				'bagian_bangunan' => $post['bagian_bangunan'],
				'luas_bangunan' => $post['luas_bangunan'],
				'jumlah_pekerja' => $post['jumlah_pekerja'],
				'estimasi_waktu' => $post['estimasi_waktu'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'id_approval' => 0
			];
			
			$id = $this->data_m->add('tb_my_hajat_renovasi',$data);

			if($id > 0){
				echo "Data berhasil disimpan";
				redirect('/');
			}else{
					echo "Data gagal disimpan";
			}
		}
		// FORMULIR SEWA
		if(isset($_POST['submit_sewa'])){
		$data = [
			'nama_konsumen' => $post['nama_konsumen'],
			'jenis_konsumen' => $post['jenis_konsumen'],
			'id_cabang' => $post['cabang'],
			'nama_pemilik' => $post['nama_pemilik'],
			'jenis_pemilik' => $post['jenis_pemilik'],
			'hubungan_pemohon' => $post['hubungan_pemohon'],
			'luas_panjang' => $post['luas_panjang'],
			'biaya_tahunan' => $post['biaya_pertahun'],
			'informasi_tambahan' => $post['informasi_tambahan'],
			'id_approval' => 0
		];
		
		$id = $this->data_m->add('tb_my_hajat_sewa',$data);

		if($id){
			echo "Data berhasil disimpan";
			redirect('/');
		}else{
				echo "Data gagal disimpan";
		
		}
			redirect('dashboard');
		}

		// FORMULIR WEDDING
		if(isset($_POST['submit_wedding'])){
		$data = [
			'nama_konsumen' => $post['nama_konsumen'],
			'jenis_konsumen' => $post['jenis_konsumen'],
			'id_cabang' => $post['cabang'],
			'nama_wo' => $post['nama_wo'],
			'jenis_wo' => $post['jenis_wo'],
			'lama_berdiri' => $post['lama_berdiri'],
			'jumlah_biaya' => $post['jumlah_biaya'],
			'jumlah_undangan' => $post['jumlah_undangan'],
			'informasi_tambahan' => $post['informasi_tambahan'],
			'akun_sosmed' => $post['akun_sosmed'],
			'id_approval' => 0
		];
		
		$id = $this->data_m->add('tb_my_hajat_wedding',$data);

		if($id){
			echo "Data berhasil disimpan";
			redirect('/');
		}else{
				echo "Data gagal disimpan";
		
		}
			redirect('dashboard');
		}

		// FORMULIR FRANCHISE
		if(isset($_POST['submit_franchise'])){
		$data = [
			'nama_konsumen' => $post['nama_konsumen'],
			'jenis_konsumen' => $post['jenis_konsumen'],
			'id_cabang' => $post['cabang'],
			'nama_franchise' => $post['nama_franchise'],
			'jumlah_cabang' => $post['jumlah_cabang'],
			'jenis_franchise' => $post['jenis_franchise'],
			'tahun_berdiri_franchise' => $post['tahun_berdiri_franchise'],
			'harga_franchise' => $post['harga_franchise'],
			'jangka_waktu_franchise' => $post['jangka_waktu_franchise'],
			'akun_sosmed_website' => $post['akun_sosmed_website'],
			'informasi_tambahan' => $post['informasi_tambahan'],
			'id_approval' => 0
		];
		
		$id = $this->data_m->add('tb_my_hajat_franchise',$data);

		if($id){
			echo "Data berhasil disimpan";
			redirect('/');
		}else{
				echo "Data gagal disimpan";
		
		}
			redirect('dashboard');
		}

		// FORMULIR PENYEDIA JASA
		if(isset($_POST['submit_penyedia_jasa'])){
		$data = [
			'nama_konsumen' => $post['nama_konsumen'],
			'jenis_konsumen' => $post['jenis_konsumen'],
			'id_cabang' => $post['cabang'],
			'nama_penyedia_jasa' => $post['nama_penyedia_jasa'],
			'jenis_penyedia_jasa' => $post['jenis_penyedia_jasa'],
			'informasi_tambahan' => $post['informasi_tambahan'],
			'id_approval' => 0
		];
		
		$id = $this->data_m->add('tb_my_hajat',$data);

		if($id){
			echo "Data berhasil disimpan";
			redirect('/');
		}else{
				echo "Data gagal disimpan";
		
		}
			redirect('dashboard');
		}
}
	}