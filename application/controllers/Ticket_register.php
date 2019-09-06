<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket_register extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aksi_Admin2_m');
		$this->load->model('data_m');

		$this->load->library('form_validation');
		check_not_login();
	}

	public function index()
	{
		check_access_level_user();
		redirect('dashboard');
	}

	public function form_my_hajat()
	{
		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$this->template->load('template2', 'my_hajat/form_my_hajat', $data);
	}

	public function form_my_talim()
	{
		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$this->template->load('template2', 'my_talim/form_my_talim', $data);
	}

	public function form_lead_management()
	{

		$id_user_tickets = '= ' . $this->fungsi->user_login()->id_user;
		$id_user_tickets = '= ' . $this->fungsi->user_login()->id_cabang;
		$approval_tickets = 'IS NOT NULL';

		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$data['ticket_records'] = $this->data_m->get_tickets($id_user_tickets, $approval_tickets);
		$data['get_tickets_head_syariah'] = $this->data_m->get_tickets_head_syariah($id_user_tickets, $approval_tickets);
		$this->template->load('template2', 'lead_management/form_lead_management', $data);
	}

	public function form_my_ihram()
	{
		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$this->template->load('template2', 'my_ihram/form_my_ihram', $data);
	}

	public function form_my_safar()
	{
		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$this->template->load('template2', 'my_safar/form_my_safar', $data);
	}

	public function form_aktivasi_agent()
	{
		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$this->template->load('template2', 'aktivasi_agent/form_aktivasi_agent', $data);
	}

	public function form_nst()
	{
		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$this->template->load('template2', 'nst/form_nst', $data);
	}

	public function form_input_produk()
	{
		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$this->template->load('template2', 'form_input_produk', $data);
	}

	public function form_mitra_kerjasama()
	{
		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$this->template->load('template2', 'mitra_kerjasama/form_mitra_kerjasama', $data);
	}
	///////////////////// PROSES LOGIC ///////////////////////////////////////////////


	public function add()
	{
		$this->load->model('data_m');

		//add data
		$post = $this->input->post(NULL, TRUE);

		//add form my ta'lim
		if (isset($_POST['submit_mytalim'])) {
			// $where = [
			// 	'nama_konsumen' 		=> $post['nama_konsumen'],
			// 	'jenis_konsumen' 		=> $post['jenis_konsumen'],
			// 	'pendidikan' 			=> $post['pendidikan'],
			// 	'nama_siswa' 			=> $post['nama_siswa'],
			// 	'tahun_berdiri' 		=> $post['tahun_berdiri'],
			// 	'akreditasi' 			=> $post['akreditasi'],
			// 	'periode' 				=> $post['periode'],
			// 	'tujuan_pembiayaan' 	=> $post['tujuan_pembiayaan'],
			// 	'nilai_pembiayaan'		=> $post['nilai_pembiayaan_mytalim']
			// ];

			// $duplikat = $this->data_m->cek_duplikat('tb_my_talim', $where);
			// $kolom = $duplikat->row();
			// if ($duplikat->num_rows() > 0 && $kolom->selisih_tanggal <= 7 && $kolom->selisih_tanggal > 0) {
			// 	$this->session->set_flashdata("duplikat_input", "sepertinya Anda sudah mengajukan request support seperti tiket <a href='" . base_url("status/detail/mytalim/id/$kolom->id_mytalim") . "'>disini</a><br>Mohon tunggu selama " . (7 - $kolom->selisih_tanggal) . " hari");
			// 	redirect("/");
			// }

			$data = [
				'nama_konsumen' 		=> $post['nama_konsumen'],
				'jenis_konsumen'	 	=> $post['jenis_konsumen'],
				'id_cabang' 			=> $post['cabang'],
				'nama_siswa' 			=> $post['nama_siswa'],
				'pendidikan' 			=> $post['pendidikan'],
				'nama_lembaga' 			=> $post['nama_lembaga'],
				'tahun_berdiri'			=> $post['tahun_berdiri'],
				'akreditasi'			=> $post['akreditasi'],
				'periode' 				=> $post['periode'],
				'tujuan_pembiayaan' 	=> $post['tujuan_pembiayaan'],
				'nilai_pembiayaan' 		=> $post['nilai_pembiayaan_mytalim'],
				'informasi_tambahan'	=> $post['informasi_tambahan_mytalim'],

				'date_created' 			=> date('Y-m-d H:i:s'),
				'date_modified' 		=> date('Y-m-d H:i:s'),
				'id_user' 				=> $post['id_user'],
				'id_approval' 			=> 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			//variabel untuk mengambil id data yg baru diinsert
			$id = $this->data_m->add('tb_my_talim', $data);

			$data2 = [
				'id_mytalim' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$success = $this->data_m->add('tb_ticket', $data2);

			if ($success && $id) {
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				$this->session->set_flashdata('failed_request_support', '<div class="alert alert-danger"><strong>Gagal menambahkan request support!</strong> Mohon cek kembali data yg baru saja diajukan <button class="btn" type="button" onclick="return window.history.back()">Klik disini</button>. </div>');
				redirect('/');
			}
		}

		// PROSES SUBMIT FORM MY HAJAT //
		// FORMULIR RENOVASI
		if (isset($_POST['submit_renovasi'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'jenis_pekerjaan' => $post['jenis_pekerjaan'],
				'bagian_bangunan' => $post['bagian_bangunan'],
				'luas_bangunan' => $post['luas_bangunan'],
				'jumlah_pekerja' => $post['jumlah_pekerja'],
				'estimasi_waktu' => $post['estimasi_waktu'],
				'nilai_pembiayaan' => $post['nilai_biaya'],
				'informasi_tambahan' => $post['informasi_tambahan_renovasi'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),

				'id_user' => $post['id_user'],
				'id_cabang' => $post['cabang'],

				'nama_vendor' => $post['nama_vendor'],
				'jenis_vendor' => $post['jenis_vendor'],
				'id_vendor' => $post['id_vendor_renovasi'],

				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			// Proses Upload File 1 - 10
			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			// Memasukkan data vendor ke dalam tb_vendor jika id vendor tidak diisi (tidak memilih auto select)
			if (!isset($post['id_vendor_renovasi']) || $post['id_vendor_renovasi'] == '' || $post['id_vendor_renovasi'] == NULL) {
				$data_vendor = [
					'nama_vendor' => $post['nama_vendor'],
					'jenis_vendor' => $post['jenis_vendor'],
					'kategori_vendor' => 'Renovasi Bangunan'
				];
				$data['id_vendor'] = $this->data_m->add('tb_vendor', $data_vendor); // Memasukkan data vendor ke dalam tb_vendor jika nama vendor belum ada di tb_vendor
			}

			//Memasukkan data my hajat renovasi ke dalam tabel tb_my_hajat_renovasi			
			$id = $this->data_m->add('tb_my_hajat_renovasi', $data);

			$data_tiket = [
				'id_renovasi' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];

			//Memasukkan data my hajat renovasi ke dalam antrian tiket request support
			$success = $this->data_m->add('tb_ticket', $data_tiket);



			// Jika data berhasil disubmit/masuk ke database maka tampil pesan berhasil di bagian dashboard
			if ($success && $id) {
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				$this->session->set_flashdata('failed_request_support', '<div class="alert alert-danger"><strong>Gagal menambahkan request support!</strong> Mohon cek kembali data yg baru saja diajukan <button class="btn" type="button" onclick="return window.history.back()">Klik disini</button>. </div>');
				redirect('/');
			}
			// redirect('dashboard');
		}
		// FORMULIR SEWA
		if (isset($_POST['submit_sewa'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'hubungan_pemohon' => $post['hubungan_pemohon'],
				'luas_panjang' => $post['luas_panjang'],
				'biaya_tahunan' => $post['biaya_pertahun'],
				'informasi_tambahan' => $post['informasi_tambahan_sewa'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),

				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user'],

				'id_vendor' => $post['id_vendor_sewa'],
				'nama_pemilik' => $post['nama_pemilik'],
				'jenis_pemilik' => $post['jenis_pemilik'],

				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			// Memasukkan data vendor ke dalam tb_vendor jika id vendor tidak diisi (tidak memilih auto select)
			if (!isset($post['id_vendor_sewa']) || $post['id_vendor_sewa'] == '' || $post['id_vendor_sewa'] == NULL) {
				$data_vendor = [
					'nama_vendor' => $post['nama_vendor'],
					'jenis_vendor' => $post['jenis_vendor'],
					'kategori_vendor' => 'Sewa Bangunan'
				];
				$data['id_vendor'] = $this->data_m->add('tb_vendor', $data_vendor); // Memasukkan data vendor ke dalam tb_vendor jika nama vendor belum ada di tb_vendor
			}

			//mmendapatkan id insert terakhir
			$id = $this->data_m->add('tb_my_hajat_sewa', $data);

			$data2 = [
				'id_sewa' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_my_hajat', $data2);

			$data_tiket = [
				'id_sewa' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_ticket', $data_tiket);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// FORMULIR WEDDING
		if (isset($_POST['submit_wedding'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'lama_berdiri' => $post['lama_berdiri'],
				'jumlah_biaya' => $post['jumlah_biaya'],
				'jumlah_undangan' => $post['jumlah_undangan'],
				'akun_sosmed' => $post['akun_sosmed'],
				'informasi_tambahan' => $post['informasi_tambahan_wedding'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),

				'id_user' => $post['id_user'],
				'id_cabang' => $post['cabang'],

				'id_vendor' => $post['id_vendor_wo'],
				'nama_wo' => $post['nama_wo'],
				'jenis_wo' => $post['jenis_wo'],

				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			// Memasukkan data vendor ke dalam tb_vendor jika id vendor tidak diisi (tidak memilih auto select)
			if (!isset($post['id_vendor_wo']) || $post['id_vendor_wo'] == '' || $post['id_vendor_wo'] == NULL) {
				$data_vendor = [
					'nama_vendor' => $post['nama_vendor'],
					'jenis_vendor' => $post['jenis_vendor'],
					'kategori_vendor' => 'My Hajat Wedding'
				];
				$data['id_vendor'] = $this->data_m->add('tb_vendor', $data_vendor); // Memasukkan data vendor ke dalam tb_vendor jika nama vendor belum ada di tb_vendor
			}

			$id = $this->data_m->add('tb_my_hajat_wedding', $data);

			$data2 = [
				'id_wedding' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_my_hajat', $data2);

			$data3 = [
				'id_wedding' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_ticket', $data3);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// FORMULIR FRANCHISE
		if (isset($_POST['submit_franchise'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'jumlah_cabang' => $post['jumlah_cabang'],
				'jenis_franchise' => $post['jenis_franchise'],
				'tahun_berdiri_franchise' => $post['tahun_berdiri_franchise'],
				'harga_franchise' => $post['harga_franchise'],
				'jangka_waktu_franchise' => $post['jangka_waktu_franchise'],
				'akun_sosmed_website' => $post['akun_sosmed_website'],
				'informasi_tambahan' => $post['informasi_tambahan_franchise'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),

				'id_user' => $post['id_user'],
				'id_cabang' => $post['cabang'],

				'id_vendor' => $post['id_vendor_franchise'],
				'nama_franchise' => $post['nama_franchise'],

				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			// Memasukkan data vendor ke dalam tb_vendor jika id vendor tidak diisi (tidak memilih auto select)
			if (!isset($post['id_vendor_franchise']) || $post['id_vendor_franchise'] == '' || $post['id_vendor_franchise'] == NULL) {
				$data_vendor = [
					'nama_vendor' => $post['nama_vendor'],
					'jenis_vendor' => $post['jenis_vendor'],
					'kategori_vendor' => 'My Hajat Franchise'
				];
				$data['id_vendor'] = $this->data_m->add('tb_vendor', $data_vendor); // Memasukkan data vendor ke dalam tb_vendor jika nama vendor belum ada di tb_vendor
			}

			$id = $this->data_m->add('tb_my_hajat_franchise', $data);

			$data2 = [
				'id_franchise' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_my_hajat', $data2);

			$data3 = [
				'id_franchise' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_ticket', $data3);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// FORMULIR PENYEDIA JASA
		if (isset($_POST['submit_lainnya'])) {

			$data = [
				'nama_konsumen' 		=> $post['nama_konsumen'],
				'jenis_konsumen' 		=> $post['jenis_konsumen'],

				'nilai_pembiayaan' 		=> $post['nilai_pembiayaan_lainnya'],
				'informasi_tambahan' 	=> $post['informasi_tambahan_lainnya'],

				'date_created' 			=> date('Y-m-d H:i:s'),
				'date_modified'			=> date('Y-m-d H:i:s'),

				'id_cabang' 			=> $post['cabang'],
				'id_user' 				=> $post['id_user'],

				'id_vendor' 			=> $post['id_vendor_lainnya'],
				'nama_penyedia_jasa' 	=> $post['nama_penyedia_jasa'],
				'jenis_penyedia_jasa' 	=> $post['jenis_penyedia_jasa'],

				'id_approval' 			=> 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			// Memasukkan data vendor ke dalam tb_vendor jika id vendor tidak diisi (tidak memilih auto select)
			if (!isset($post['id_vendor_lainnya']) || $post['id_vendor_lainnya'] == '' || $post['id_vendor_lainnya'] == NULL) {
				$data_vendor = [
					'nama_vendor' => $post['nama_vendor'],
					'jenis_vendor' => $post['jenis_vendor'],
					'kategori_vendor' => 'My Hajat Wedding'
				];
				$data['id_vendor'] = $this->data_m->add('tb_vendor', $data_vendor); // Memasukkan data vendor ke dalam tb_vendor jika nama vendor belum ada di tb_vendor
			}

			$id = $this->data_m->add('tb_my_hajat_lainnya', $data);

			$data2 = [
				'id_myhajat_lainnya' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_my_hajat', $data2);

			$data3 = [
				'id_myhajat_lainnya' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];

			$success = $this->data_m->add('tb_ticket', $data3);

			if ($success && $id) {
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			}
		}

		// PROSES SUBMIT FORM MY IHRAM //
		// FORMULIR MY IHRAM
		if (isset($_POST['submit_myihram'])) {

			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'nama_travel' => $post['nama_travel_myihram'],
				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myihram';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}


			$id = $this->data_m->add('tb_my_ihram', $data);

			$data2 = [
				'id_myihram' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_ticket', $data2);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// PROSES SUBMIT FORM MY SAFAR //
		// FORMULIR MY SAFAR
		if (isset($_POST['submit_mysafar'])) {

			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'nama_travel' => $post['nama_travel_mysafar'],
				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mysafar';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}


			$id = $this->data_m->add('tb_my_safar', $data);

			$data2 = [
				'id_mysafar' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_ticket', $data2);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// FORMULIR LEAD MANAGEMENT
		if (isset($_POST['submit_lead_management'])) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			$this->form_validation->set_rules('lead_id', 'Lead ID', 'required|is_unique[tb_lead_management.lead_id]', ['is_unique' => 'Lead ID sudah dipakai']);

			if ($this->form_validation->run() != FALSE) {

				$data = [
					'lead_id' 				=> $post['lead_id'],
					'no_ktp' 				=> $post['no_ktp'],
					'asal_leads' 			=> $post['asal_leads'],
					'cabang_tujuan'			=> $post['cabang_tujuan'],
					'surveyor'				=> $post['surveyor'],
					'ttd_pic'				=> $post['ttd_pic'],
					'nama_konsumen'			=> $post['nama_konsumen'],

					'id_cabang' 			=> $post['cabang'],
					'sumber_lead' 			=> $post['sumber_lead'],
					'nama_pemberi_lead' 	=> $post['nama_pemberi_lead'],
					'produk' 				=> $post['produk'],
					'object_price' 			=> $post['object_price'],
					'date_created' 			=> date('Y-m-d H:i:s'),
					'date_modified' 		=> date('Y-m-d H:i:s'),
					'id_user' 				=> $post['id_user'],
					'id_approval'			=> 0
				];

				$id = $this->data_m->add('tb_lead_management', $data);

				$data3 = [
					'id_lead' => $id,
					'id_cabang' => $post['cabang'],
					'id_user' => $post['id_user']
				];
				$this->data_m->add('tb_ticket', $data3);

				if ($id) {
					echo "Data berhasil disimpan";
					$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan data lead management.!</strong></div>');
					redirect('/');
				} else {
					echo "Data gagal disimpan";
				}
				redirect('dashboard');
			} else {
				// Mengambil list cabang2 
				$id_user_tickets = '= ' . $this->fungsi->user_login()->id_user;
				$approval_tickets = 'IS NOT NULL';

				$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
				$data['ticket_records'] = $this->data_m->get_tickets($id_user_tickets, $approval_tickets);
				$this->template->load('template2', 'lead_management/form_lead_management', $data);
			}
		}


		// PROSES SUBMIT FORM AKTIVASI AGENT //
		// FORMULIR AKTIVASI AGENT
		if (isset($_POST['submit_aktivasi_agent'])) {

			$data = [
				'nama_agent' => $post['nama_agent'],
				'jenis_agent' => $post['jenis_agent'],
				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/aktivasi_agent';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}


			$id = $this->data_m->add('tb_aktivasi_agent', $data);

			$data2 = [
				'id_agent' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_ticket', $data2);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// PROSES SUBMIT FORM NST //
		// FORMULIR NST
		if (isset($_POST['submit_nst'])) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			$this->form_validation->set_rules('lead_id', 'Lead ID', 'required|is_unique[tb_nst.lead_id]');

			if ($this->form_validation->run() != FALSE) {

				$data = [
					'lead_id' => $post['lead_id'],
					'nama_konsumen' => $post['nama_konsumen'],
					'produk' => $post['produk'],
					'date_created' => date('Y-m-d H:i:s'),
					'date_modified' => date('Y-m-d H:i:s'),
					'id_cabang' => $post['cabang'],
					'id_user' => $post['id_user'],
					'id_approval' => 0
				];

				//Konfigurasi Upload
				$config['upload_path']         = './uploads/nst';
				$config['allowed_types']        = '*';
				$config['max_size']             = 0;
				$config['max_width']            = 0;
				$config['max_height']           = 0;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('upload_file1')) {
					$data['upload_file1'] = $this->upload->data('file_name');
				}

				if ($this->upload->do_upload('upload_file2')) {
					$data['upload_file2'] = $this->upload->data('file_name');
				}

				if ($this->upload->do_upload('upload_file3')) {
					$data['upload_file3'] = $this->upload->data('file_name');
				}

				if ($this->upload->do_upload('upload_file4')) {
					$data['upload_file4'] = $this->upload->data('file_name');
				}

				if ($this->upload->do_upload('upload_file5')) {
					$data['upload_file5'] = $this->upload->data('file_name');
				}

				if ($this->upload->do_upload('upload_file6')) {
					$data['upload_file6'] = $this->upload->data('file_name');
				}

				if ($this->upload->do_upload('upload_file7')) {
					$data['upload_file7'] = $this->upload->data('file_name');
				}

				if ($this->upload->do_upload('upload_file8')) {
					$data['upload_file8'] = $this->upload->data('file_name');
				}

				if ($this->upload->do_upload('upload_file9')) {
					$data['upload_file9'] = $this->upload->data('file_name');
				}

				if ($this->upload->do_upload('upload_file10')) {
					$data['upload_file10'] = $this->upload->data('file_name');
				}


				$id = $this->data_m->add('tb_nst', $data);

				$data2 = [
					'id_nst' => $id,
					'id_cabang' => $post['cabang'],
					'id_user' => $post['id_user']
				];
				$this->data_m->add('tb_ticket', $data2);

				if ($id) {
					echo "Data berhasil disimpan";
					$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
					redirect('/');
				} else {
					echo "Data gagal disimpan";
				}
				redirect('dashboard');
			} else {
				$this->template->load('template2', 'nst/form_nst');
			}
		}

		// FORMULIR MITRA KERJA SAMA
		if (isset($_POST['submit_mitra_kerjasama'])) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$data = [
				'nama_mitra' => $post['nama_mitra'],
				'jenis_mitra' => $post['jenis_mitra'],
				'bidang_usaha' => $post['bidang_usaha'],
				'sosial_media' => $post['sosial_media'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mitra_kerjasama';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('upload_file1')) {
				$data['upload_file1'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('error_upload', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
			}

			if ($this->upload->do_upload('upload_file2')) {
				$data['upload_file2'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('error_upload', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
			}

			if ($this->upload->do_upload('upload_file3')) {
				$data['upload_file3'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('error_upload', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
			}

			if ($this->upload->do_upload('upload_file4')) {
				$data['upload_file4'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('error_upload', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
			}

			if ($this->upload->do_upload('upload_file5')) {
				$data['upload_file5'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('error_upload', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
			}

			if ($this->upload->do_upload('upload_file6')) {
				$data['upload_file6'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('error_upload', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
			}

			if ($this->upload->do_upload('upload_file7')) {
				$data['upload_file7'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('error_upload', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
			}

			if ($this->upload->do_upload('upload_file8')) {
				$data['upload_file8'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('error_upload', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
			}

			if ($this->upload->do_upload('upload_file9')) {
				$data['upload_file9'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('error_upload', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
			}

			if ($this->upload->do_upload('upload_file10')) {
				$data['upload_file10'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata('error_upload', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
			}


			$id = $this->data_m->add('tb_mitra_kerjasama', $data);

			$data2 = [
				'id_mitra_kerjasama' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_ticket', $data2);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// FORMULIR MY FAEDAH
		if (isset($_POST['submit_myfaedah'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'id_cabang' => $post['cabang'],

				'nama_vendor' => $post['nama_vendor_myfaedah'],
				'jenis_vendor' => $post['jenis_vendor_myfaedah'],
				'lama_usaha' => $post['lama_usaha_myfaedah'],
				'nama_barang' => $post['nama_barang'],
				'kondisi_barang' => $post['kondisi_barang'],
				'jumlah_barang' => $post['jumlah_barang'],
				'merek_barang' => $post['merek_barang'],
				'warna_barang' => $post['warna_barang'],
				'tahun' => $post['tahun_barang'],
				'harga_barang' => $post['harga_barang'],
				'tujuan_pembelian' => $post['tujuan_pembelian'],
				'informasi_tambahan' => $post['informasi_tambahan_myfaedah'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_user' => $post['id_user'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->add('tb_my_faedah', $data);

			$data2 = [
				'id_myfaedah' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$success = $this->data_m->add('tb_ticket', $data2);


			if ($id && $success) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		//////// KATEGORI FORMULIR MY FAEDAH //////////////////

		////////  FORMULIR MY FAEDAH BANGUNAN //////////////////
		if (isset($_POST['submit_bangunan'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				// 'id_vendor' => $post['id_vendor_franchise'],
				'nama_penyedia' => $post['nama_penyedia_bangunan'],
				'jenis_penyedia' => $post['jenis_penyedia_bangunan'],

				'tujuan_pembelian' => $post['tujuan_pembelian_bangunan'],
				'lokasi_pembangunan' => $post['lokasi_pembangunan'],
				'luas_bangunan' => $post['luas_bangunan_bangunan'],
				'waktu_pelaksanaan' => $post['waktu_pelaksanaan'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_bangunan'],
				'informasi_tambahan' => $post['informasi_tambahan_bangunan'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),

				'id_user' => $post['id_user'],
				'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			//variabel untuk mengambil ID insert
			$id = $this->data_m->add('tb_my_faedah_bangunan', $data);

			$data2 = [
				'id_bangunan' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$success = $this->data_m->add('tb_ticket', $data2);


			if ($id && $success) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		////////  FORMULIR MY FAEDAH ELEKTRONIK //////////////////
		if (isset($_POST['submit_elektronik'])) {
			if (isset($_POST['other_jenis_barang_elektronik'])) {
				$post_jenis_barang = $post['other_jenis_barang_elektronik'];
			} else {
				$post_jenis_barang = $post['jenis_barang_elektronik'];
			}

			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_elektronik'],
				'jenis_penyedia' => $post['jenis_penyedia_elektronik'],
				'tujuan_pembelian' => $post['tujuan_pembelian_elektronik'],
				'lama_usaha' => $post['lama_usaha_elektronik'],
				'jenis_barang' => $post_jenis_barang,
				'jumlah_barang' => $post['jumlah_barang_elektronik'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_elektronik'],
				'informasi_tambahan' => $post['informasi_tambahan_elektronik'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_user' => $post['id_user'],
				'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			//variabel untuk mengambil ID insert
			$id = $this->data_m->add('tb_my_faedah_elektronik', $data);

			$data2 = [
				'id_elektronik' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$success = $this->data_m->add('tb_ticket', $data2);


			if ($id && $success) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		////////  FORMULIR MY FAEDAH MODAL //////////////////
		if (isset($_POST['submit_qurban'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_qurban'],
				'jenis_penyedia' => $post['jenis_penyedia_qurban'],
				'lama_usaha' => $post['lama_usaha_qurban'],
				'tujuan_pembelian' => $post['tujuan_pembelian_qurban'],
				'jenis_hewan' => $post['jenis_hewan_qurban'],
				'jumlah_hewan' => $post['jumlah_hewan_qurban'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_qurban'],
				'informasi_tambahan' => $post['informasi_tambahan_qurban'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_user' => $post['id_user'],
				'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			//variabel untuk mengambil ID insert
			$id = $this->data_m->add('tb_my_faedah_qurban', $data);

			$data2 = [
				'id_qurban' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$success = $this->data_m->add('tb_ticket', $data2);


			if ($id && $success) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		////////  FORMULIR MY FAEDAH MODAL //////////////////
		if (isset($_POST['submit_modal'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_modal'],
				'jenis_penyedia' => $post['jenis_penyedia_modal'],
				'jenis_barang' => $post['jenis_barang_modal'],
				'tujuan_pembelian' => $post['tujuan_pembelian_modal'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_modal'],
				'informasi_tambahan' => $post['informasi_tambahan_modal'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_user' => $post['id_user'],
				'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			//variabel untuk mengambil ID insert
			$id = $this->data_m->add('tb_my_faedah_modal', $data);

			$data2 = [
				'id_modal' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$success = $this->data_m->add('tb_ticket', $data2);


			if ($id && $success) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		////////  FORMULIR MY FAEDAH LAINNYA //////////////////
		if (isset($_POST['submit_myfaedah_lainnya'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_myfaedah_lainnya'],
				'jenis_penyedia' => $post['jenis_penyedia_myfaedah_lainnya'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_myfaedah_lainnya'],
				'informasi_tambahan' => $post['informasi_tambahan_myfaedah_lainnya'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_user' => $post['id_user'],
				'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			//variabel untuk mengambil ID insert
			$id = $this->data_m->add('tb_my_faedah_lainnya', $data);

			$data2 = [
				'id_myfaedah_lainnya' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$success = $this->data_m->add('tb_ticket', $data2);


			if ($id && $success) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// FORMULIR MY CARS
		if (isset($_POST['submit_mycars'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_mycars'],
				'jenis_penyedia' => $post['jenis_penyedia_mycars'],
				'jenis_penyedia_detail' => $post['jenis_penyedia_detail_mycars'],
				'kategori_aset' => $post['kategori_aset_mycars'],
				'lama_usaha' => $post['lama_usaha_mycars'],
				'kepemilikan_tempat' => $post['kepemilikan_tempat_mycars'],
				'jumlah_stok' => $post['jumlah_stok_mycars'],
				'tipe_kendaraan' => $post['tipe_kendaraan_mycars'],
				'jenis_kendaraan' => $post['jenis_kendaraan_mycars'],
				'tahun' => $post['tahun_mobil_mycars'],
				'warna_kendaraan' => $post['warna_kendaraan_mycars'],
				// 'nama_mobil' => $post['nama_mobil'],
				// 'kondisi_mobil' => $post['kondisi_mobil'],
				// 'merek_mobil' => $post['merek_mobil'],
				// 'transmisi' => $post['transmisi'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_mycars'],
				'informasi_tambahan' => $post['informasi_tambahan_mycars'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_user' => $post['id_user'],
				'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mycars';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->add('tb_my_cars', $data);

			$data2 = [
				'id_mycars' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_ticket', $data2);

			if ($id > 0) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}
	}

	public function edit()
	{
		$post = $this->input->post(NULL, TRUE);

		//EDIT FORM MY'TALIM
		if (isset($_POST['edit_mytalim'])) {
			$data = [
				'nama_konsumen' 		=> $post['nama_konsumen'],
				'jenis_konsumen' 		=> $post['jenis_konsumen'],
				// 'id_cabang' 			=> $post['cabang'],
				'pendidikan' 			=> $post['pendidikan'],
				'nama_siswa' 			=> $post['nama_siswa'],
				'nama_lembaga' 			=> $post['nama_lembaga'],
				'tahun_berdiri'			=> $post['tahun_berdiri'],
				'akreditasi' 			=> $post['akreditasi'],
				'periode'				=> $post['periode'],
				'tujuan_pembiayaan'		=> $post['tujuan_pembiayaan'],
				'nilai_pembiayaan' 		=> $post['nilai_pembiayaan'],
				'informasi_tambahan' 	=> $post['informasi_tambahan'],
				'date_modified' 		=> date('Y-m-d H:i:s'),
				'id_approval' 			=> 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_talim', $data, ['id_mytalim' => $post['id_mytalim']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// EDIT FORM MY HAJAT //
		// FORMULIR RENOVASI
		if (isset($_POST['edit_renovasi'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'nama_vendor' => $post['nama_vendor'],
				'jenis_vendor' => $post['jenis_vendor'],
				'jenis_pekerjaan' => $post['jenis_pekerjaan'],
				'bagian_bangunan' => $post['bagian_bangunan'],
				'luas_bangunan' => $post['luas_bangunan'],
				'jumlah_pekerja' => $post['jumlah_pekerja'],
				'estimasi_waktu' => $post['estimasi_waktu'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan'],
				'informasi_tambahan' => $post['informasi_tambahan'],

				'date_modified' => date('Y-m-d H:i:s'),
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_hajat_renovasi', $data, ['id_renovasi' => $post['id_renovasi']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}
		// FORMULIR SEWA
		if (isset($_POST['edit_sewa'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_pemilik' => $post['nama_pemilik'],
				'jenis_pemilik' => $post['jenis_pemilik'],
				'hubungan_pemohon' => $post['hubungan_pemohon'],
				'luas_panjang' => $post['luas_panjang'],
				'biaya_tahunan' => $post['biaya_pertahun'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'date_modified' => date('Y-m-d H:i:s'),
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_hajat_sewa', $data, ['id_sewa' => $post['id_sewa']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		//FORMULIR WEDDING
		if (isset($_POST['edit_wedding'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_wo' => $post['nama_wo'],
				'jenis_wo' => $post['jenis_wo'],
				'lama_berdiri' => $post['lama_berdiri'],
				'jumlah_biaya' => $post['jumlah_biaya'],
				'jumlah_undangan' => $post['jumlah_undangan'],
				'akun_sosmed' => $post['akun_sosmed'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'date_modified' => date('Y-m-d H:i:s'),
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_hajat_wedding', $data, ['id_wedding' => $post['id_wedding']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		//FORMULIR FRANCHISE
		if (isset($_POST['edit_franchise'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_franchise' => $post['nama_franchise'],
				'jumlah_cabang' => $post['jumlah_cabang'],
				'jenis_franchise' => $post['jenis_franchise'],
				'tahun_berdiri_franchise' => $post['tahun_berdiri_franchise'],
				'harga_franchise' => $post['harga_franchise'],
				'jangka_waktu_franchise' => $post['jangka_waktu_franchise'],
				'akun_sosmed_website' => $post['akun_sosmed_website'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'date_modified' => date('Y-m-d H:i:s'),
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_hajat_franchise', $data, ['id_franchise' => $post['id_franchise']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		//FORMULIR LAINNYA
		if (isset($_POST['edit_lainnya'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_penyedia_jasa' => $post['nama_penyedia_jasa'],
				'jenis_penyedia_jasa' => $post['jenis_penyedia_jasa'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'date_modified' => date('Y-m-d H:i:s'),
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('upload_file1')) {
				$data['upload_file1'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
			}
			if ($this->upload->do_upload('upload_file2')) {
				$data['upload_file2'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
			}
			if ($this->upload->do_upload('upload_file3')) {
				$data['upload_file3'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
			}
			if ($this->upload->do_upload('upload_file4')) {
				$data['upload_file4'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
			}
			if ($this->upload->do_upload('upload_file5')) {
				$data['upload_file5'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
			}
			if ($this->upload->do_upload('upload_file6')) {
				$data['upload_file6'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
			}
			if ($this->upload->do_upload('upload_file7')) {
				$data['upload_file7'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
			}
			if ($this->upload->do_upload('upload_file8')) {
				$data['upload_file8'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
			}
			if ($this->upload->do_upload('upload_file9')) {
				$data['upload_file9'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
			}
			if ($this->upload->do_upload('upload_file10')) {
				$data['upload_file10'] = $this->upload->data('file_name');
			} else {
				$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
			}
			$id = $this->data_m->update('tb_my_hajat_lainnya', $data, ['id_myhajat_lainnya' => $post['id_myhajat_lainnya']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// EDIT FORM MY IHRAM //
		if (isset($_POST['edit_myihram'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_travel' => $post['nama_travel'],
				'date_modified' => date('Y-m-d H:i:s'),
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myihram';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_ihram', $data, ['id_myihram' => $post['id_myihram']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// EDIT FORM MY SAFAR //
		if (isset($_POST['edit_mysafar'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_travel' => $post['nama_travel'],
				'date_modified' => date('Y-m-d H:i:s'),
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mysafar';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_safar', $data, ['id_mysafar' => $post['id_mysafar']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// FORMULIR LEAD MANAGEMENT
		if (isset($_POST['edit_lead_management'])) {
			$this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('cabang', 'Cabang', 'required');
			$this->form_validation->set_rules('lead_id', 'Lead ID', 'required');
			$this->form_validation->set_rules('sumber_lead', 'Jenis Penyedia Jasa', 'required');
			$this->form_validation->set_rules('nama_pemberi_lead', 'Nilai Pengajuan Pembiayaan', 'required');
			$this->form_validation->set_rules('produk', 'Nilai Pengajuan Pembiayaan', 'required');
			$this->form_validation->set_rules('object_price', 'Nilai Pengajuan Pembiayaan', 'required');
			// $this->form_validation->set_rules('upload_file1', 'Upload File 1', 'required');

			$data = [
				'lead_id' 				=> $post['lead_id'],
				'no_ktp' 				=> $post['no_ktp'],
				'asal_leads' 			=> $post['asal_leads'],
				'cabang_tujuan'			=> $post['cabang_tujuan'],
				'surveyor'				=> $post['surveyor'],
				'ttd_pic'				=> $post['ttd_pic'],
				'nama_konsumen'			=> $post['nama_konsumen'],
				// 'id_cabang' 			=> $post['cabang'],
				'sumber_lead' 			=> $post['sumber_lead'],
				'nama_pemberi_lead' 	=> $post['nama_pemberi_lead'],
				'object_price' 			=> $post['object_price'],
				'produk' 				=> $post['produk'],

				// 'tahap_reject' 			=> $post['tahap_reject'],
				// 'tipe_pefindo' 			=> $post['tipe_pefindo'],
				// 'max_past_due' 			=> $post['max_past_due'],
				// 'dsr' 					=> $post['dsr'],
				// 'status' 				=> $post['status'],
				// 'sla_branch' 			=> $post['sla_branch'],
				// 'cabang_survey' 		=> $post['cabang_survey'],
				// 'informasi_tambahan'	=> $post['informasi_tambahan'],
				'date_modified' 		=> date('Y-m-d H:i:s'),
				// 'id_approval'			=> 3
			];

			$id = $this->data_m->update('tb_lead_management', $data, ['id_lead' => $post['id_lead']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil Update data request support!</strong></div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// EDIT FORM AKTIVASI AGENT //
		if (isset($_POST['edit_aktivasi_agent'])) {
			$data = [
				// 'id_cabang' => $post['cabang'],
				'nama_agent' => $post['nama_agent'],
				'jenis_agent' => $post['jenis_agent'],
				'date_modified' => date('Y-m-d H:i:s'),
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/aktivasi_agent';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_aktivasi_agent', $data, ['id_agent' => $post['id_agent']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// EDIT FORM NST //
		if (isset($_POST['edit_nst'])) {

			$data = [
				'lead_id' => $post['lead_id'],
				'nama_konsumen' => $post['nama_konsumen'],
				'produk' => $post['produk'],
				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_cabang' => $post['cabang'],
				// 'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/nst';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}


			$id = $this->data_m->update('tb_nst', $data, ['id_nst' => $post['id_nst']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// FORMULIR MITRA KERJA SAMA
		if (isset($_POST['edit_mitra_kerjasama'])) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$data = [
				'nama_mitra' => $post['nama_mitra'],
				'jenis_mitra' => $post['jenis_mitra'],
				'bidang_usaha' => $post['bidang_usaha'],
				'sosial_media' => $post['sosial_media'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_cabang' => $post['cabang'],
				// 'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mitra_kerjasama';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}


			$id = $this->data_m->update('tb_mitra_kerjasama', $data, ['id_mitra_kerjasama' => $post['id_mitra_kerjasama']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// FORMULIr MY FAEDAH
		if (isset($_POST['edit_myfaedah'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],

				'nama_vendor' => $post['nama_vendor_myfaedah'],
				'jenis_vendor' => $post['jenis_vendor_myfaedah'],
				'lama_usaha' => $post['lama_usaha_myfaedah'],
				'nama_barang' => $post['nama_barang'],
				'kondisi_barang' => $post['kondisi_barang'],
				'jumlah_barang' => $post['jumlah_barang'],
				'merek_barang' => $post['merek_barang'],
				'warna_barang' => $post['warna_barang'],
				'tahun' => $post['tahun_barang'],
				'harga_barang' => $post['harga_barang'],
				'tujuan_pembelian' => $post['tujuan_pembelian'],
				'informasi_tambahan' => $post['informasi_tambahan_myfaedah'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah', $data, ['id_myfaedah' => $post['id_myfaedah']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		/////// KATEGORI MY FAEDAH //////
		////////  FORMULIR MY FAEDAH BANGUNAN //////////////////
		if (isset($_POST['edit_bangunan'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_bangunan'],
				'jenis_penyedia' => $post['jenis_penyedia_bangunan'],
				'tujuan_pembelian' => $post['tujuan_pembelian_bangunan'],
				'lokasi_pembangunan' => $post['lokasi_pembangunan'],
				'luas_bangunan' => $post['luas_bangunan_bangunan'],
				'waktu_pelaksanaan' => $post['waktu_pelaksanaan'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_bangunan'],
				'informasi_tambahan' => $post['informasi_tambahan_bangunan'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah_bangunan', $data, ['id_bangunan' => $post['id_bangunan']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		////////  FORMULIR MY FAEDAH ELEKTRONIK //////////////////
		if (isset($_POST['edit_elektronik'])) {
			if (isset($_POST['other_jenis_barang_elektronik'])) {
				$post_jenis_barang = $post['other_jenis_barang_elektronik'];
			} else {
				$post_jenis_barang = $post['jenis_barang_elektronik'];
			}

			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_elektronik'],
				'jenis_penyedia' => $post['jenis_penyedia_elektronik'],
				'tujuan_pembelian' => $post['tujuan_pembelian_elektronik'],
				'lama_usaha' => $post['lama_usaha_elektronik'],
				'jenis_barang' => $post_jenis_barang,
				'jumlah_barang' => $post['jumlah_barang_elektronik'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_elektronik'],
				'informasi_tambahan' => $post['informasi_tambahan_elektronik'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah_elektronik', $data, ['id_elektronik' => $post['id_elektronik']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		////////  FORMULIR MY FAEDAH MODAL //////////////////
		if (isset($_POST['edit_qurban'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_qurban'],
				'jenis_penyedia' => $post['jenis_penyedia_qurban'],
				'lama_usaha' => $post['lama_usaha_qurban'],
				'tujuan_pembelian' => $post['tujuan_pembelian_qurban'],
				'jenis_hewan' => $post['jenis_hewan_qurban'],
				'jumlah_hewan' => $post['jumlah_hewan_qurban'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_qurban'],
				'informasi_tambahan' => $post['informasi_tambahan_qurban'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah_qurban', $data, ['id_qurban' => $post['id_qurban']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		////////  FORMULIR MY FAEDAH MODAL //////////////////
		if (isset($_POST['edit_modal'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_modal'],
				'jenis_penyedia' => $post['jenis_penyedia_modal'],
				'jenis_barang' => $post['jenis_barang_modal'],
				'tujuan_pembelian' => $post['tujuan_pembelian_modal'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_modal'],
				'informasi_tambahan' => $post['informasi_tambahan_modal'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah_modal', $data, ['id_modal' => $post['id_modal']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}



		////////  FORMULIR MY FAEDAH LAINNYA //////////////////
		if (isset($_POST['edit_myfaedah_lainnya'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_myfaedah_lainnya'],
				'jenis_penyedia' => $post['jenis_penyedia_myfaedah_lainnya'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_myfaedah_lainnya'],
				'informasi_tambahan' => $post['informasi_tambahan_myfaedah_lainnya'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah_lainnya', $data, ['id_myfaedah_lainnya' => $post['id_myfaedah_lainnya']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// FORMULIR MY CARS
		if (isset($_POST['edit_mycars'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_mycars'],
				'jenis_penyedia' => $post['jenis_penyedia_mycars'],
				'jenis_penyedia_detail' => $post['jenis_penyedia_detail_mycars'],
				'kategori_aset' => $post['kategori_aset_mycars'],
				'lama_usaha' => $post['lama_usaha_mycars'],
				'kepemilikan_tempat' => $post['kepemilikan_tempat_mycars'],
				'jumlah_stok' => $post['jumlah_stok_mycars'],
				'tipe_kendaraan' => $post['tipe_kendaraan_mycars'],
				'jenis_kendaraan' => $post['jenis_kendaraan_mycars'],
				'tahun' => $post['tahun_mobil_mycars'],
				'warna_kendaraan' => $post['warna_kendaraan_mycars'],
				// 'nama_mobil' => $post['nama_mobil'],
				// 'kondisi_mobil' => $post['kondisi_mobil'],
				// 'merek_mobil' => $post['merek_mobil'],
				// 'transmisi' => $post['transmisi'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_mycars'],
				'informasi_tambahan' => $post['informasi_tambahan_mycars'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mycars';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_cars', $data, ['id_mycars' => $post['id_mycars']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		//////////////////////////////// EDIT FROM UNTUK SUPERUSER //////////////////////////////

		//EDIT FORM MY'TALIM
		if (isset($_POST['edit_mytalim_superuser'])) {
			$data = [
				'nama_konsumen'         => $post['nama_konsumen'],
				'jenis_konsumen'         => $post['jenis_konsumen'],
				// 'id_cabang' 			=> $post['cabang'],
				'pendidikan'             => $post['pendidikan'],
				'nama_siswa'             => $post['nama_siswa'],
				'nama_lembaga'             => $post['nama_lembaga'],
				'tahun_berdiri'            => $post['tahun_berdiri'],
				'akreditasi'             => $post['akreditasi'],
				'periode'                => $post['periode'],
				'tujuan_pembiayaan'        => $post['tujuan_pembiayaan'],
				'nilai_pembiayaan'         => $post['nilai_pembiayaan'],
				'informasi_tambahan'     => $post['informasi_tambahan'],
				'date_modified'         => date('Y-m-d H:i:s'),
				// 'id_approval'             => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_talim', $data, ['id_mytalim' => $post['id_mytalim']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// EDIT FORM MY HAJAT //
		// FORMULIR RENOVASI
		if (isset($_POST['edit_renovasi_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'nama_vendor' => $post['nama_vendor'],
				'jenis_vendor' => $post['jenis_vendor'],
				'jenis_pekerjaan' => $post['jenis_pekerjaan'],
				'bagian_bangunan' => $post['bagian_bangunan'],
				'luas_bangunan' => $post['luas_bangunan'],
				'jumlah_pekerja' => $post['jumlah_pekerja'],
				'estimasi_waktu' => $post['estimasi_waktu'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'date_modified' => date('Y-m-d H:i:s'),
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_hajat_renovasi', $data, ['id_renovasi' => $post['id_renovasi']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}
		// FORMULIR SEWA
		if (isset($_POST['edit_sewa_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_pemilik' => $post['nama_pemilik'],
				'jenis_pemilik' => $post['jenis_pemilik'],
				'hubungan_pemohon' => $post['hubungan_pemohon'],
				'luas_panjang' => $post['luas_panjang'],
				'biaya_tahunan' => $post['biaya_pertahun'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'date_modified' => date('Y-m-d H:i:s'),

			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_hajat_sewa', $data, ['id_sewa' => $post['id_sewa']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		//FORMULIR WEDDING
		if (isset($_POST['edit_wedding_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_wo' => $post['nama_wo'],
				'jenis_wo' => $post['jenis_wo'],
				'lama_berdiri' => $post['lama_berdiri'],
				'jumlah_biaya' => $post['jumlah_biaya'],
				'jumlah_undangan' => $post['jumlah_undangan'],
				'akun_sosmed' => $post['akun_sosmed'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'date_modified' => date('Y-m-d H:i:s'),

			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_hajat_wedding', $data, ['id_wedding' => $post['id_wedding']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		//FORMULIR FRANCHISE
		if (isset($_POST['edit_franchise_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_franchise' => $post['nama_franchise'],
				'jumlah_cabang' => $post['jumlah_cabang'],
				'jenis_franchise' => $post['jenis_franchise'],
				'tahun_berdiri_franchise' => $post['tahun_berdiri_franchise'],
				'harga_franchise' => $post['harga_franchise'],
				'jangka_waktu_franchise' => $post['jangka_waktu_franchise'],
				'akun_sosmed_website' => $post['akun_sosmed_website'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'date_modified' => date('Y-m-d H:i:s'),

			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_hajat_franchise', $data, ['id_franchise' => $post['id_franchise']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		//FORMULIR LAINNYA
		if (isset($_POST['edit_lainnya_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_penyedia_jasa' => $post['nama_penyedia_jasa'],
				'jenis_penyedia_jasa' => $post['jenis_penyedia_jasa'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'date_modified' => date('Y-m-d H:i:s'),

			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_hajat_lainnya', $data, ['id_myhajat_lainnya' => $post['id_myhajat_lainnya']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// EDIT FORM MY IHRAM //
		if (isset($_POST['edit_myihram_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_travel' => $post['nama_travel'],
				'date_modified' => date('Y-m-d H:i:s'),

			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myihram';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_ihram', $data, ['id_myihram' => $post['id_myihram']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// EDIT FORM MY SAFAR //
		if (isset($_POST['edit_mysafar_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'nama_travel' => $post['nama_travel'],
				'date_modified' => date('Y-m-d H:i:s'),

			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mysafar';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_safar', $data, ['id_mysafar' => $post['id_mysafar']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// FORMULIR LEAD MANAGEMENT
		/* BELUM SELESAI */
		if (isset($_POST['edit_lead_management_superuser'])) {
			$this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('cabang', 'Cabang', 'required');
			$this->form_validation->set_rules('lead_id', 'Lead ID', 'required');
			$this->form_validation->set_rules('sumber_lead', 'Jenis Penyedia Jasa', 'required');
			$this->form_validation->set_rules('nama_pemberi_lead', 'Nilai Pengajuan Pembiayaan', 'required');
			$this->form_validation->set_rules('produk', 'Nilai Pengajuan Pembiayaan', 'required');
			$this->form_validation->set_rules('object_price', 'Nilai Pengajuan Pembiayaan', 'required');
			// $this->form_validation->set_rules('upload_file1', 'Upload File 1', 'required');

			$data = [
				'lead_id'                 => $post['lead_id'],
				'no_ktp' 				=> $post['no_ktp'],
				'asal_leads' 			=> $post['asal_leads'],
				'cabang_tujuan'			=> $post['cabang_tujuan'],
				'surveyor'				=> $post['surveyor'],
				'ttd_pic'				=> $post['ttd_pic'],
				'nama_konsumen'            => $post['nama_konsumen'],
				// 'id_cabang' 			=> $post['cabang'],
				// 'sumber_lead'             => $post['sumber_lead'],
				// 'nama_pemberi_lead'     => $post['nama_pemberi_lead'],
				// 'produk'                 => $post['produk'],
				// 'object_price'             => $post['object_price'],
				// 'tahap_reject'             => $post['tahap_reject'],
				// 'tipe_pefindo'             => $post['tipe_pefindo'],
				// 'max_past_due'             => $post['max_past_due'],
				// 'dsr'                     => $post['dsr'],
				// 'status'                 => $post['status'],
				// 'sla_branch'             => $post['sla_branch'],
				// 'cabang_survey'         => $post['cabang_survey'],
				// 'informasi_tambahan'    => $post['informasi_tambahan'],
				'date_modified'         => date('Y-m-d H:i:s'),
			];

			$id = $this->data_m->update('tb_lead_management', $data, ['id_lead' => $post['id_lead']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// EDIT FORM AKTIVASI AGENT //
		if (isset($_POST['edit_aktivasi_agent_superuser'])) {
			$data = [
				// 'id_cabang' => $post['cabang'],
				'nama_agent' => $post['nama_agent'],
				'jenis_agent' => $post['jenis_agent'],
				'date_modified' => date('Y-m-d H:i:s'),

			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/aktivasi_agent';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_aktivasi_agent', $data, ['id_agent' => $post['id_agent']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// EDIT FORM NST //
		if (isset($_POST['edit_nst_superuser'])) {

			$data = [
				'lead_id' => $post['lead_id'],
				'nama_konsumen' => $post['nama_konsumen'],
				'produk' => $post['produk'],
				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_cabang' => $post['cabang'],
				// 'id_user' => $post['id_user'],

			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/nst';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}


			$id = $this->data_m->update('tb_nst', $data, ['id_nst' => $post['id_nst']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		//////////// USER NST & LEAD MANAGEMENT
		// FORMULIR LEAD MANAGEMENT
		if (isset($_POST['edit_lead_management_user'])) {
			$this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('cabang', 'Cabang', 'required');
			$this->form_validation->set_rules('lead_id', 'Lead ID', 'required');
			$this->form_validation->set_rules('sumber_lead', 'Jenis Penyedia Jasa', 'required');
			$this->form_validation->set_rules('nama_pemberi_lead', 'Nilai Pengajuan Pembiayaan', 'required');
			$this->form_validation->set_rules('produk', 'Nilai Pengajuan Pembiayaan', 'required');
			$this->form_validation->set_rules('object_price', 'Nilai Pengajuan Pembiayaan', 'required');
			// $this->form_validation->set_rules('upload_file1', 'Upload File 1', 'required');

			$data = [
				'lead_id' 				=> $post['lead_id'],
				'asal_leads' 			=> $post['asal_leads'],
				'cabang_tujuan'			=> $post['cabang_tujuan'],
				'surveyor'				=> $post['surveyor'],
				'ttd_pic'				=> $post['ttd_pic'],
				'nama_konsumen'			=> $post['nama_konsumen'],

				// 'id_cabang' 			=> $post['cabang'],
				'sumber_lead' 			=> $post['sumber_lead'],
				'nama_pemberi_lead' 	=> $post['nama_pemberi_lead'],
				'produk' 				=> $post['produk'],
				'object_price' 			=> $post['object_price'],
				'date_modified' 		=> date('Y-m-d H:i:s')
			];

			$id = $this->data_m->update('tb_lead_management', $data, ['id_lead' => $post['id_lead']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// FORMULIR MITRA KERJA SAMA
		if (isset($_POST['edit_mitra_kerjasama_superuser'])) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$data = [
				'nama_mitra' => $post['nama_mitra'],
				'jenis_mitra' => $post['jenis_mitra'],
				'bidang_usaha' => $post['bidang_usaha'],
				'sosial_media' => $post['sosial_media'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_cabang' => $post['cabang'],
				// 'id_user' => $post['id_user'],
				// 'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mitra_kerjasama';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}


			$id = $this->data_m->update('tb_mitra_kerjasama', $data, ['id_mitra_kerjasama' => $post['id_mitra_kerjasama']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// FORMULIr MY FAEDAH
		if (isset($_POST['edit_myfaedah_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],

				'nama_vendor' => $post['nama_vendor_myfaedah'],
				'jenis_vendor' => $post['jenis_vendor_myfaedah'],
				'lama_usaha' => $post['lama_usaha_myfaedah'],
				'nama_barang' => $post['nama_barang'],
				'kondisi_barang' => $post['kondisi_barang'],
				'jumlah_barang' => $post['jumlah_barang'],
				'merek_barang' => $post['merek_barang'],
				'warna_barang' => $post['warna_barang'],
				'tahun' => $post['tahun_barang'],
				'harga_barang' => $post['harga_barang'],
				'tujuan_pembelian' => $post['tujuan_pembelian'],
				'informasi_tambahan' => $post['informasi_tambahan_myfaedah'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah', $data, ['id_myfaedah' => $post['id_myfaedah']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		/////// KATEGORI MY FAEDAH //////
		////////  FORMULIR MY FAEDAH BANGUNAN //////////////////
		if (isset($_POST['edit_bangunan_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_bangunan'],
				'jenis_penyedia' => $post['jenis_penyedia_bangunan'],
				'tujuan_pembelian' => $post['tujuan_pembelian_bangunan'],
				'lokasi_pembangunan' => $post['lokasi_pembangunan'],
				'luas_bangunan' => $post['luas_bangunan'],
				'waktu_pelaksanaan' => $post['waktu_pelaksanaan'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_bangunan'],
				'informasi_tambahan' => $post['informasi_tambahan_bangunan'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				// 'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah_bangunan', $data, ['id_bangunan' => $post['id_bangunan']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		////////  FORMULIR MY FAEDAH ELEKTRONIK //////////////////
		if (isset($_POST['edit_elektronik_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_elektronik'],
				'jenis_penyedia' => $post['jenis_penyedia_elektronik'],
				'tujuan_pembelian' => $post['tujuan_pembelian_elektronik'],
				'lama_usaha' => $post['lama_usaha_elektronik'],
				'jenis_barang' => $post['jenis_barang_elektronik'],
				'jumlah_barang' => $post['jumlah_barang_elektronik'],
				'waktu_pelaksanaan' => $post['waktu_pelaksanaan'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_elektronik'],
				'informasi_tambahan' => $post['informasi_tambahan_elektronik'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				// 'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah_elektronik', $data, ['id_elektronik' => $post['id_elektronik']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		////////  FORMULIR MY FAEDAH MODAL //////////////////
		if (isset($_POST['edit_qurban_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_qurban'],
				'jenis_penyedia' => $post['jenis_penyedia_qurban'],
				'jenis_barang' => $post['jenis_barang_qurban'],
				'lama_usaha' => $post['lama_usaha_qurban'],
				'tujuan_pembelian' => $post['tujuan_pembelian_qurban'],
				'jenis_barang' => $post['jenis_barang_qurban'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_qurban'],
				'informasi_tambahan' => $post['informasi_tambahan_qurban'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				// 'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah_qurban', $data, ['id_qurban' => $post['id_qurban']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		////////  FORMULIR MY FAEDAH MODAL //////////////////
		if (isset($_POST['edit_modal_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_modal'],
				'jenis_penyedia' => $post['jenis_penyedia_modal'],
				'jenis_barang' => $post['jenis_barang_modal'],
				'tujuan_pembelian' => $post['tujuan_pembelian_modal'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_modal'],
				'informasi_tambahan' => $post['informasi_tambahan_modal'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				// 'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah_modal', $data, ['id_modal' => $post['id_modal']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		////////  FORMULIR MY FAEDAH LAINNYA //////////////////
		if (isset($_POST['edit_myfaedah_lainnya_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_myfaedah_lainnya'],
				'jenis_penyedia' => $post['jenis_penyedia_myfaedah_lainnya'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_myfaedah_lainnya'],
				'informasi_tambahan' => $post['informasi_tambahan_myfaedah_lainnya'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				// 'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myfaedah';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_faedah_lainnya', $data, ['id_myfaedah_lainnya' => $post['id_myfaedah_lainnya']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}


		// FORMULIE MY CARS
		if (isset($_POST['edit_mycars_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],

				'nama_penyedia' => $post['nama_penyedia_mycars'],
				'jenis_penyedia' => $post['jenis_penyedia_mycars'],
				'lama_usaha' => $post['lama_usaha_mycars'],
				'kepemilikan_tempat' => $post['kepemilikan_tempat_mycars'],
				'jumlah_stok' => $post['jumlah_stok_mycars'],
				'tipe_kendaraan' => $post['tipe_kendaraan_mycars'],
				'jenis_kendaraan' => $post['jenis_kendaraan_mycars'],
				'tahun' => $post['tahun_mycars'],
				'warna_kendaraan' => $post['warna_kendaraan_mycars'],
				// 'nama_mobil' => $post['nama_mobil'],
				// 'kondisi_mobil' => $post['kondisi_mobil'],
				// 'merek_mobil' => $post['merek_mobil'],
				// 'transmisi' => $post['transmisi'],
				'tahun' => $post['tahun_mobil'],
				'harga_mobil' => $post['harga_mobil'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_mycars'],
				'informasi_tambahan' => $post['informasi_tambahan_mycars'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_cabang' => $post['cabang'],
				// 'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mycars';
			$config['allowed_types']        = '*';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);

			for ($i = 1; $i <= 10; $i++) {
				if (!$this->upload->do_upload('upload_file' . $i)) {
					$this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
				} else {
					$data['upload_file' . $i] = $this->upload->data('file_name');
				}
			}

			$id = $this->data_m->update('tb_my_cars', $data, ['id_mycars' => $post['id_mycars']]);

			if ($id) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_update_support', '<div class="alert alert-success"><strong>Berhasil mengubah data request support!</strong> Mohon tunggu respon dari Admin HO. </div>');

				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}
	}
}
