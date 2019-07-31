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
	}

	public function index()
	{
		check_not_login();
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
		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
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

	///////////////////// PROSES LOGIC ///////////////////////////////////////////////


	public function add()
	{
		$this->load->model('data_m');

		//add data
		$post = $this->input->post(NULL, TRUE);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="padding: 4px">', '</div>');

		//add form my ta'lim
		if (isset($_POST['submit_mytalim'])) {
			$this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('jenis_konsumen', 'Jenis Konsumen', 'required');
			$this->form_validation->set_rules('cabang', 'Cabang', 'required');
			$this->form_validation->set_rules('pendidikan', 'Nama Vendor', 'required');
			$this->form_validation->set_rules('nama_lembaga', 'Jenis Vendor', 'required');
			$this->form_validation->set_rules('tahun_berdiri', 'Bagian Bangunan', 'required');
			$this->form_validation->set_rules('akreditasi', 'Luas Bangunan', 'required');
			$this->form_validation->set_rules('periode', 'Jumlah Pekerja', 'required');
			$this->form_validation->set_rules('tujuan_pembiayaan', 'Estimasi Waktu', 'required');
			$this->form_validation->set_rules('nilai_pembiayaan', 'Nilai Pembiayaan', 'required');
			$this->form_validation->set_rules('id_user', 'ID User', 'required');

			if ($this->form_validation->run() != FALSE) {
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
					'informasi_tambahan' => $post['informasi_tambahan'],
					'date_created' => date('Y-m-d H:i:s'),
					'date_modified' => date('Y-m-d H:i:s'),
					'id_user' => $post['id_user'],
					'id_approval' => 0
				];

				//Konfigurasi Upload
				$config['upload_path']         = './uploads/mytalim';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;
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

				$id = $this->data_m->add('tb_my_talim', $data);

				if ($id) {
					echo "Data berhasil disimpan";
					redirect('/');
				} else {
					echo "Data gagal disimpan";
				}
			} else {
				$this->form_my_hajat();
			}
		}

		// PROSES SUBMIT FORM MY HAJAT //
		// FORMULIR RENOVASI
		if (isset($_POST['submit_renovasi'])) {
			$this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('jenis_konsumen', 'Jenis Konsumen', 'required');
			$this->form_validation->set_rules('cabang', 'Cabang', 'required');
			$this->form_validation->set_rules('nama_vendor', 'Nama Vendor', 'required');
			$this->form_validation->set_rules('jenis_vendor', 'Jenis Vendor', 'required');
			$this->form_validation->set_rules('jenis_pekerjaan', 'Jenis Pekerjaan', 'required');
			$this->form_validation->set_rules('bagian_bangunan', 'Bagian Bangunan', 'required');
			$this->form_validation->set_rules('luas_bangunan', 'Luas Bangunan', 'required');
			$this->form_validation->set_rules('jumlah_pekerja', 'Jumlah Pekerja', 'required');
			$this->form_validation->set_rules('estimasi_waktu', 'Estimasi Waktu', 'required');
			$this->form_validation->set_rules('nilai_biaya', 'Nilai Biaya', 'required|integer');
			// $this->form_validation->set_rules('upload_file1', 'Upload File 1', 'required');

			if ($this->form_validation->run() != FALSE) {
				$data = [
					'nama_konsumen' => $post['nama_konsumen'],
					'jenis_konsumen' => $post['jenis_konsumen'],
					'id_cabang' => $post['cabang'],
					'nama_vendor' => $post['nama_vendor'],
					'jenis_vendor' => $post['jenis_vendor'],
					'jenis_pekerjaan' => $post['jenis_vendor'],
					'bagian_bangunan' => $post['bagian_bangunan'],
					'luas_bangunan' => $post['luas_bangunan'],
					'jumlah_pekerja' => $post['jumlah_pekerja'],
					'estimasi_waktu' => $post['estimasi_waktu'],
					'nilai_pembiayaan' => $post['nilai_biaya'],
					'informasi_tambahan' => $post['informasi_tambahan'],
					'date_created' => date('Y-m-d H:i:s'),
					'date_modified' => date('Y-m-d H:i:s'),
					'id_user' => $post['id_user'],
					'id_approval' => 0
				];

				//Konfigurasi Upload
				$config['upload_path']         = './uploads/myhajat';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;
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

				$id = $this->data_m->add('tb_my_hajat_renovasi', $data);

				if ($id > 0) {
					echo "Data berhasil disimpan";
					redirect('/');
				} else {
					echo "Data gagal disimpan";
				}
			} else {
				$this->form_my_hajat();
			}
		}
		// FORMULIR SEWA
		if (isset($_POST['submit_sewa'])) {
			$this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('jenis_konsumen', 'Jenis Konsumen', 'required');
			$this->form_validation->set_rules('cabang', 'Cabang', 'required');
			$this->form_validation->set_rules('nama_pemilik', 'Nama Vendor', 'required');
			$this->form_validation->set_rules('jenis_pemilik', 'Jenis Vendor', 'required');
			$this->form_validation->set_rules('hubungan_pemohon', 'Bagian Bangunan', 'required');
			$this->form_validation->set_rules('luas_panjang', 'Luas Bangunan', 'required');
			$this->form_validation->set_rules('biaya_pertahun', 'Jumlah Pekerja', 'required');
			// $this->form_validation->set_rules('upload_file1', 'Upload File 1', 'required');

			if ($this->form_validation->run() != FALSE) {
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
					'date_created' => date('Y-m-d H:i:s'),
					'date_modified' => date('Y-m-d H:i:s'),
					'id_user' => $post['id_user'],
					'id_approval' => 0
				];

				//Konfigurasi Upload
				$config['upload_path']         = './uploads/myhajat';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;
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

				$id = $this->data_m->add('tb_my_hajat_sewa', $data);

				if ($id) {
					echo "Data berhasil disimpan";
					redirect('/');
				} else {
					echo "Data gagal disimpan";
				}
			} else {
				$this->form_my_hajat();
			}
		}

		// FORMULIR WEDDING
		if (isset($_POST['submit_wedding'])) {
			$this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('jenis_konsumen', 'Jenis Konsumen', 'required');
			$this->form_validation->set_rules('cabang', 'Cabang', 'required');
			$this->form_validation->set_rules('nama_wo', 'Nama WO', 'required');
			$this->form_validation->set_rules('jenis_wo', 'Jenis WO', 'required');
			$this->form_validation->set_rules('lama_berdiri', 'Lama Usaha berdiri', 'required');
			$this->form_validation->set_rules('jumlah_biaya', 'Jumlah Biaya', 'required');
			$this->form_validation->set_rules('jumlah_undangan', 'Jumlah Undangan', 'required');
			$this->form_validation->set_rules('akun_sosmed', 'Akun Sosial Media', 'required');
			// $this->form_validation->set_rules('upload_file1', 'Upload File 1', 'required');

			if ($this->form_validation->run() != FALSE) {
				$data = [
					'nama_konsumen' => $post['nama_konsumen'],
					'jenis_konsumen' => $post['jenis_konsumen'],
					'id_cabang' => $post['cabang'],
					'nama_wo' => $post['nama_wo'],
					'jenis_wo' => $post['jenis_wo'],
					'lama_berdiri' => $post['lama_berdiri'],
					'jumlah_biaya' => $post['jumlah_biaya'],
					'jumlah_undangan' => $post['jumlah_undangan'],
					'akun_sosmed' => $post['akun_sosmed'],
					'informasi_tambahan' => $post['informasi_tambahan'],
					'date_created' => date('Y-m-d H:i:s'),
					'date_modified' => date('Y-m-d H:i:s'),
					'id_user' => $post['id_user'],
					'id_approval' => 0
				];

				//Konfigurasi Upload
				$config['upload_path']         = './uploads/myhajat';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;
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

				$id = $this->data_m->add('tb_my_hajat_wedding', $data);

				if ($id) {
					echo "Data berhasil disimpan";
					redirect('/');
				} else {
					echo "Data gagal disimpan";
				}
				redirect('dashboard');
			} else {
				$this->form_my_hajat();
				// redirect('Ticket_register/form_my_hajat');
				// echo '<script>window.location.href = "'.base_url('ticket_register/form_my_hajat').'";</script>';
			}
		}

		// FORMULIR FRANCHISE
		if (isset($_POST['submit_franchise'])) {
			$this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('jenis_konsumen', 'Jenis Konsumen', 'required');
			$this->form_validation->set_rules('cabang', 'Cabang', 'required');
			$this->form_validation->set_rules('nama_franchise', 'Nama Franchise', 'required');
			$this->form_validation->set_rules('jenis_franchise', 'Jenis Franchise', 'required');
			$this->form_validation->set_rules('tahun_berdiri_franchise', 'Lama Usaha berdiri', 'required');
			$this->form_validation->set_rules('harga_franchise', 'Jumlah Biaya', 'required');
			$this->form_validation->set_rules('jangka_waktu_franchise', 'Jumlah Undangan', 'required');
			$this->form_validation->set_rules('akun_sosmed_website', 'Akun Sosial Media', 'required');
			// $this->form_validation->set_rules('upload_file1', 'Upload File 1', 'required');

			if ($this->form_validation->run() != FALSE) {
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
					'date_created' => date('Y-m-d H:i:s'),
					'date_modified' => date('Y-m-d H:i:s'),
					'id_user' => $post['id_user'],
					'id_approval' => 0
				];

				//Konfigurasi Upload
				$config['upload_path']         = './uploads/myhajat';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000;
				$config['max_width']            = 5000;
				$config['max_height']           = 5000;
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

				$id = $this->data_m->add('tb_my_hajat_franchise', $data);

				if ($id) {
					echo "Data berhasil disimpan";
					redirect('/');
				} else {
					echo "Data gagal disimpan";
				}
				redirect('dashboard');
			} else {
				$this->form_my_hajat();
			}
		}

		// FORMULIR PENYEDIA JASA
		if (isset($_POST['submit_lainnya'])) {

			$this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('jenis_konsumen', 'Jenis Konsumen', 'required');
			$this->form_validation->set_rules('cabang', 'Cabang', 'required');
			$this->form_validation->set_rules('nama_penyedia_jasa', 'Nama Penyedia Jasa', 'required');
			$this->form_validation->set_rules('jenis_penyedia_jasa', 'Jenis Penyedia Jasa', 'required');
			$this->form_validation->set_rules('nilai_pembiayaan', 'Nilai Pengajuan Pembiayaan', 'required');
			// $this->form_validation->set_rules('upload_file1', 'Upload File 1', 'required');

			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'id_cabang' => $post['cabang'],
				'nama_penyedia_jasa' => $post['nama_penyedia_jasa'],
				'jenis_penyedia_jasa' => $post['jenis_penyedia_jasa'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'date_created' => date('Y-m-d H:i:s'),
				'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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

			$id = $this->data_m->add('tb_my_hajat_lainnya', $data);

			if ($id) {
				echo "Data berhasil disimpan";
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// PROSES SUBMIT FORM MY IHRAM //
		// FORMULIR MY IHRAM
		if (isset($_POST['submit_myihram'])) {

			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'nama_travel' => $post['nama_travel'],
				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myihram';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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


			$id = $this->data_m->add('tb_my_ihram', $data);

			if ($id) {
				echo "Data berhasil disimpan";
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
				'nama_travel' => $post['nama_travel'],
				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mysafar';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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


			$id = $this->data_m->add('tb_my_safar', $data);

			if ($id) {
				echo "Data berhasil disimpan";
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// FORMULIR LEAD MANAGEMENT
		/* BELUM SELESAI */
		if (isset($_POST['submit_lead_management'])) {
			$this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('ktp_konsumen', 'Jenis Konsumen', 'required');
			$this->form_validation->set_rules('cabang', 'Cabang', 'required');
			$this->form_validation->set_rules('lead_id', 'Lead ID', 'required');
			$this->form_validation->set_rules('sumber_lead', 'Jenis Penyedia Jasa', 'required');
			$this->form_validation->set_rules('nama_pemberi_lead', 'Nilai Pengajuan Pembiayaan', 'required');
			// $this->form_validation->set_rules('upload_file1', 'Upload File 1', 'required');

			$data = [
				'lead_id' 				=> $post['lead_id'],
				'nama_konsumen'			=> $post['nama_konsumen'],
				'ktp_konsumen' 			=> $post['ktp_konsumen'],
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

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/lead_management';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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


			$id = $this->data_m->add('tb_lead_management', $data);

			if ($id) {
				echo "Data berhasil disimpan";
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
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
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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


			$id = $this->data_m->add('tb_aktivasi_agent', $data);

			if ($id) {
				echo "Data berhasil disimpan";
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}

		// PROSES SUBMIT FORM NST //
		// FORMULIR NST
		if (isset($_POST['submit_nst'])) {

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
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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

			if ($id) {
				echo "Data berhasil disimpan";
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}
	}

	public function edit()
	{
		$post = $this->input->post(NULL, TRUE);

		//EDIT FORM MY'TALIM
		if (isset($_POST['edit_mytalim'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],
				'pendidikan' => $post['pendidikan'],
				'nama_lembaga' => $post['nama_lembaga'],
				'tahun_berdiri' => $post['tahun_berdiri'],
				'akreditasi' => $post['akreditasi'],
				'periode' => $post['periode'],
				'tujuan_pembiayaan' => $post['tujuan_pembiayaan'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'date_modified' => date('Y-m-d H:i:s'),
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 100000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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

			$id = $this->data_m->update('tb_my_talim', $data, ['id_mytalim' => $post['id_mytalim']]);

			if ($id) {
				echo "Data berhasil disimpan";
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
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 100000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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

			$id = $this->data_m->update('tb_my_hajat_renovasi', $data, ['id_renovasi' => $post['id_renovasi']]);

			if ($id) {
				echo "Data berhasil disimpan";
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
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 100000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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

			$id = $this->data_m->update('tb_my_hajat_sewa', $data, ['id_sewa' => $post['id_sewa']]);

			if ($id) {
				echo "Data berhasil disimpan";
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
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 100000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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

			$id = $this->data_m->update('tb_my_hajat_wedding', $data, ['id_wedding' => $post['id_wedding']]);

			if ($id) {
				echo "Data berhasil disimpan";
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
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 100000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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

			$id = $this->data_m->update('tb_my_hajat_franchise', $data, ['id_franchise' => $post['id_franchise']]);

			if ($id) {
				echo "Data berhasil disimpan";
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
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 100000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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

			$id = $this->data_m->update('tb_my_hajat_lainnya', $data, ['id_myhajat_lainnya' => $post['id_myhajat_lainnya']]);

			if ($id) {
				echo "Data berhasil disimpan";
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
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 100000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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

			$id = $this->data_m->update('tb_my_ihram', $data, ['id_myihram' => $post['id_myihram']]);

			if ($id) {
				echo "Data berhasil disimpan";
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
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 100000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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

			$id = $this->data_m->update('tb_my_safar', $data, ['id_mysafar' => $post['id_mysafar']]);

			if ($id) {
				echo "Data berhasil disimpan";
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		// FORMULIR LEAD MANAGEMENT
		/* BELUM SELESAI */
		if (isset($_POST['edit_lead_management'])) {
			$this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required');
			$this->form_validation->set_rules('ktp_konsumen', 'Jenis Konsumen', 'required');
			$this->form_validation->set_rules('cabang', 'Cabang', 'required');
			$this->form_validation->set_rules('lead_id', 'Lead ID', 'required');
			$this->form_validation->set_rules('sumber_lead', 'Jenis Penyedia Jasa', 'required');
			$this->form_validation->set_rules('nama_pemberi_lead', 'Nilai Pengajuan Pembiayaan', 'required');
			$this->form_validation->set_rules('produk', 'Nilai Pengajuan Pembiayaan', 'required');
			$this->form_validation->set_rules('object_price', 'Nilai Pengajuan Pembiayaan', 'required');
			// $this->form_validation->set_rules('upload_file1', 'Upload File 1', 'required');

			$data = [
				'lead_id' 				=> $post['lead_id'],
				'nama_konsumen'			=> $post['nama_konsumen'],
				'ktp_konsumen' 			=> $post['ktp_konsumen'],
				// 'id_cabang' 			=> $post['cabang'],
				'sumber_lead' 			=> $post['sumber_lead'],
				'nama_pemberi_lead' 	=> $post['nama_pemberi_lead'],
				'produk' 				=> $post['produk'],
				'object_price' 			=> $post['object_price'],
				'tahap_reject' 			=> $post['tahap_reject'],
				'tipe_pefindo' 			=> $post['tipe_pefindo'],
				'max_past_due' 			=> $post['max_past_due'],
				'dsr' 					=> $post['dsr'],
				'status' 				=> $post['status'],
				'sla_branch' 			=> $post['sla_branch'],
				'cabang_survey' 		=> $post['cabang_survey'],
				'informasi_tambahan'	=> $post['informasi_tambahan'],
				'date_modified' 		=> date('Y-m-d H:i:s'),
				'id_approval'			=> 2
			];

			$id = $this->data_m->update('tb_lead_management', $data, ['id_lead' => $post['id_lead']]);

			if ($id) {
				echo "Data berhasil disimpan";
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
				'lead_id' => $post['lead_id'],
				'nama_agent' => $post['nama_agent'],
				'jenis_agent' => $post['jenis_agent'],
				'date_modified' => date('Y-m-d H:i:s'),
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/aktivasi_agent';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 100000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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

			$id = $this->data_m->update('tb_aktivasi_agent', $data, ['id_agent' => $post['id_agent']]);

			if ($id) {
				echo "Data berhasil disimpan";
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
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
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


			$id = $this->data_m->update('tb_nst', $data, ['id_nst' => $post['id_nst']]);

			if ($id) {
				echo "Data berhasil disimpan";
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}
	}
}
