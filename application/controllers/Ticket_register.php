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
		$approval_tickets = 'IS NOT NULL';

		// Mengambil list cabang2 
		$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
		$data['ticket_records'] = $this->data_m->get_tickets($id_user_tickets, $approval_tickets);
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

	public function cek_duplikat()
	{
		$group_by = ['nama_konsumen', 'jenis_konsumen', 'pendidikan', 'nama_siswa', 'tahun_berdiri', 'akreditasi', 'periode', 'tujuan_pembiayaan', 'nilai_pembiayaan'];
		$having = ['COUNT(nama_konsumen) > 1'];
		$data = $this->data_m->cek_duplikat('tb_my_talim', $group_by, $having);
		echo $data;
	}

	public function add()
	{
		$this->load->model('data_m');

		//add data
		$post = $this->input->post(NULL, TRUE);

		//add form my ta'lim
		if (isset($_POST['submit_mytalim'])) {
			$where = [
				'nama_konsumen' 		=> $post['nama_konsumen'],
				'jenis_konsumen' 		=> $post['jenis_konsumen'],
				'pendidikan' 			=> $post['pendidikan'],
				'nama_siswa' 			=> $post['nama_siswa'],
				'tahun_berdiri' 		=> $post['tahun_berdiri'],
				'akreditasi' 			=> $post['akreditasi'],
				'periode' 				=> $post['periode'],
				'tujuan_pembiayaan' 	=> $post['tujuan_pembiayaan'],
				'nilai_pembiayaan'		=> $post['nilai_pembiayaan_mytalim']
			];

			$duplikat = $this->data_m->cek_duplikat('tb_my_talim', $where);
			$kolom = $duplikat->row();
			if ($duplikat->num_rows() > 0 && $kolom->selisih_tanggal <= 7) {
				echo "sepertinya Anda sudah mengajukan request support seperti tiket <a href='" . base_url("status/detail/mytalim/id/$kolom->id_mytalim") . "'>disini</a><br>Mohon tunggu selama " . (7 - $kolom->selisih_tanggal) . " hari";
			} else {
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
				$config['max_size']             = 25000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;
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

				$id = $this->data_m->add('tb_my_talim', $data);

				$data2 = [
					'id_mytalim' => $id,
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
			}
		}

		// PROSES SUBMIT FORM MY HAJAT //
		// FORMULIR RENOVASI
		if (isset($_POST['submit_renovasi'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'id_cabang' => $post['cabang'],
				'nama_vendor' => $post['nama_vendor'],
				'jenis_vendor' => $post['jenis_vendor'],
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
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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

			$id = $this->data_m->add('tb_my_hajat_renovasi', $data);

			$data2 = [
				'id_renovasi' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_my_hajat', $data2);

			$data3 = [
				'id_renovasi' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_ticket', $data3);


			if ($id > 0) {
				echo "Data berhasil disimpan";
				$this->session->set_flashdata('success_request_support', '<div class="alert alert-success"><strong>Berhasil menambahkan request support!</strong> Mohon tunggu respon dari Admin HO. </div>');
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
			redirect('dashboard');
		}
		// FORMULIR SEWA
		if (isset($_POST['submit_sewa'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'id_cabang' => $post['cabang'],
				'nama_pemilik' => $post['nama_pemilik'],
				'jenis_pemilik' => $post['jenis_pemilik'],
				'hubungan_pemohon' => $post['hubungan_pemohon'],
				'luas_panjang' => $post['luas_panjang'],
				'biaya_tahunan' => $post['biaya_pertahun'],
				'informasi_tambahan' => $post['informasi_tambahan_sewa'],
				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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

			//mmendapatkan id insert terakhir
			$id = $this->data_m->add('tb_my_hajat_sewa', $data);

			$data2 = [
				'id_sewa' => $id,
				'id_cabang' => $post['cabang'],
				'id_user' => $post['id_user']
			];
			$this->data_m->add('tb_my_hajat', $data2);

			$data3 = [
				'id_sewa' => $id,
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

		// FORMULIR WEDDING
		if (isset($_POST['submit_wedding'])) {
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
				'informasi_tambahan' => $post['informasi_tambahan_wedding'],
				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
				'id_cabang' => $post['cabang'],
				'nama_franchise' => $post['nama_franchise'],
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
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'id_cabang' => $post['cabang'],
				'nama_penyedia_jasa' => $post['nama_penyedia_jasa'],
				'jenis_penyedia_jasa' => $post['jenis_penyedia_jasa'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan_lainnya'],
				'informasi_tambahan' => $post['informasi_tambahan_lainnya'],
				'date_created' => date('Y-m-d H:i:s'),
				'id_user' => $post['id_user'],
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/myhajat';
			$config['allowed_types']        = '*';
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$this->form_validation->set_rules('lead_id', 'Lead ID', 'required|is_unique[tb_lead_management.lead_id]');

			if ($this->form_validation->run() != FALSE) {

				$data = [
					'lead_id' 				=> $post['lead_id'],
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

				//Konfigurasi Upload
				$config['upload_path']         = './uploads/lead_management';
				$config['allowed_types']        = '*';
				$config['max_size']             = 25000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;
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
				$data['pertanyaan'] = $this->data_m->get('tb_cabang')->result();
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
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
				$config['max_size']             = 25000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;
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
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;

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

		// FORMULIr MY FAEDAH
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
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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

			$id = $this->data_m->add('tb_my_faedah', $data);

			$data2 = [
				'id_myfaedah' => $id,
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
			redirect('dashboard');
		}

		// FORMULIE MY CARS
		if (isset($_POST['submit_mycars'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'id_cabang' => $post['cabang'],

				'nama_vendor' => $post['nama_vendor_mycars'],
				'jenis_vendor' => $post['jenis_vendor_mycars'],
				'lama_usaha' => $post['lama_usaha_vendor_mycars'],
				'nama_mobil' => $post['nama_mobil'],
				'kondisi_mobil' => $post['kondisi_mobil'],
				'merek_mobil' => $post['merek_mobil'],
				'transmisi' => $post['transmisi'],
				'tahun' => $post['tahun_mobil'],
				'harga_mobil' => $post['harga_mobil'],
				'informasi_tambahan' => $post['informasi_tambahan_mycars'],

				'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				'id_user' => $post['id_user'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mycars';
			$config['allowed_types']        = '*';
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			redirect('dashboard');
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
				'tahap_reject' 			=> $post['tahap_reject'],
				'tipe_pefindo' 			=> $post['tipe_pefindo'],
				'max_past_due' 			=> $post['max_past_due'],
				'dsr' 					=> $post['dsr'],
				'status' 				=> $post['status'],
				'sla_branch' 			=> $post['sla_branch'],
				'cabang_survey' 		=> $post['cabang_survey'],
				'informasi_tambahan'	=> $post['informasi_tambahan'],
				'date_modified' 		=> date('Y-m-d H:i:s'),
				'id_approval'			=> 3
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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

		// FORMULIE MY CARS
		if (isset($_POST['edit_mycars'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],

				'nama_vendor' => $post['nama_vendor_mycars'],
				'jenis_vendor' => $post['jenis_vendor_mycars'],
				'lama_usaha' => $post['lama_usaha_vendor_mycars'],
				'nama_mobil' => $post['nama_mobil'],
				'kondisi_mobil' => $post['kondisi_mobil'],
				'merek_mobil' => $post['merek_mobil'],
				'transmisi' => $post['transmisi'],
				'tahun' => $post['tahun_mobil'],
				'harga_mobil' => $post['harga_mobil'],
				'informasi_tambahan' => $post['informasi_tambahan_mycars'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mycars';
			$config['allowed_types']        = '*';
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
				'id_approval'             => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = '*';
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
				'asal_leads' 			=> $post['asal_leads'],
				'cabang_tujuan'			=> $post['cabang_tujuan'],
				'surveyor'				=> $post['surveyor'],
				'ttd_pic'				=> $post['ttd_pic'],
				'nama_konsumen'            => $post['nama_konsumen'],
				// 'id_cabang' 			=> $post['cabang'],
				'sumber_lead'             => $post['sumber_lead'],
				'nama_pemberi_lead'     => $post['nama_pemberi_lead'],
				'produk'                 => $post['produk'],
				'object_price'             => $post['object_price'],
				'tahap_reject'             => $post['tahap_reject'],
				'tipe_pefindo'             => $post['tipe_pefindo'],
				'max_past_due'             => $post['max_past_due'],
				'dsr'                     => $post['dsr'],
				'status'                 => $post['status'],
				'sla_branch'             => $post['sla_branch'],
				'cabang_survey'         => $post['cabang_survey'],
				'informasi_tambahan'    => $post['informasi_tambahan'],
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
			$config['max_size']             = 100000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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

		// FORMULIE MY CARS
		if (isset($_POST['edit_mycars_superuser'])) {
			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				// 'id_cabang' => $post['cabang'],

				'nama_vendor' => $post['nama_vendor_mycars'],
				'jenis_vendor' => $post['jenis_vendor_mycars'],
				'lama_usaha' => $post['lama_usaha_vendor_mycars'],
				'nama_mobil' => $post['nama_mobil'],
				'kondisi_mobil' => $post['kondisi_mobil'],
				'merek_mobil' => $post['merek_mobil'],
				'transmisi' => $post['transmisi'],
				'tahun' => $post['tahun_mobil'],
				'harga_mobil' => $post['harga_mobil'],
				'informasi_tambahan' => $post['informasi_tambahan_mycars'],

				// 'date_created' => date('Y-m-d H:i:s'),
				'date_modified' => date('Y-m-d H:i:s'),
				// 'id_user' => $post['id_user'],
				// 'id_approval' => 0,
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mycars';
			$config['allowed_types']        = '*';
			$config['max_size']             = 25000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
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
