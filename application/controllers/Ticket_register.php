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
					'id_approval' => 0
				];

				//Konfigurasi Upload
				$config['upload_path']         = './uploads/mytalim';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 1000;
				$config['max_width']            = 2000;
				$config['max_height']           = 1600;
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('ktp')) {
					echo $this->upload->display_errors();
				} else {
					$data['ktp'] = $this->upload->data('file_name');
				}

				if (!$this->upload->do_upload('kk')) {
					echo $this->upload->display_errors();
				} else {
					$data['kk'] = $this->upload->data('file_name');
				}

				if (!$this->upload->do_upload('bukti_penghasilan')) {
					echo $this->upload->display_errors();
				} else {
					$data['bukti_penghasilan'] = $this->upload->data('file_name');
				}

				if (!$this->upload->do_upload('npwp')) {
					echo $this->upload->display_errors();
				} else {
					$data['npwp'] = $this->upload->data('file_name');
				}

				if (!$this->upload->do_upload('tambahan')) {
					echo $this->upload->display_errors();
				} else {
					$data['tambahan'] = $this->upload->data('file_name');
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
			$this->form_validation->set_rules('bagian_bangunan', 'Bagian Bangunan', 'required');
			$this->form_validation->set_rules('luas_bangunan', 'Luas Bangunan', 'required');
			$this->form_validation->set_rules('jumlah_pekerja', 'Jumlah Pekerja', 'required');
			$this->form_validation->set_rules('estimasi_waktu', 'Estimasi Waktu', 'required');
			$this->form_validation->set_rules('nilai_biaya', 'Nilai Biaya', 'required|integer');

			if ($this->form_validation->run() != FALSE) {
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
					'nilai_pembiayaan' => $post['nilai_biaya'],
					'informasi_tambahan' => $post['informasi_tambahan'],
					'id_approval' => 0
				];

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
					'id_approval' => 0
				];

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
					'id_approval' => 0
				];

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
					'id_approval' => 0
				];

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

			$data = [
				'nama_konsumen' => $post['nama_konsumen'],
				'jenis_konsumen' => $post['jenis_konsumen'],
				'id_cabang' => $post['cabang'],
				'nama_penyedia_jasa' => $post['nama_penyedia_jasa'],
				'jenis_penyedia_jasa' => $post['jenis_penyedia_jasa'],
				'nilai_pembiayaan' => $post['nilai_pembiayaan'],
				'informasi_tambahan' => $post['informasi_tambahan'],
				'id_approval' => 0
			];

			$id = $this->data_m->add('tb_my_hajat_lainnya', $data);

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
				'id_approval' => 0
			];

			//Konfigurasi Upload
			$config['upload_path']         = './uploads/mytalim';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 1000;
			$config['max_width']            = 2000;
			$config['max_height']           = 1600;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('ktp')) {
				echo $this->upload->display_errors();
			} else {
				$data['ktp'] = $this->upload->data('file_name');
			}

			if (!$this->upload->do_upload('kk')) {
				echo $this->upload->display_errors();
			} else {
				$data['kk'] = $this->upload->data('file_name');
			}

			if (!$this->upload->do_upload('bukti_penghasilan')) {
				echo $this->upload->display_errors();
			} else {
				$data['bukti_penghasilan'] = $this->upload->data('file_name');
			}

			if (!$this->upload->do_upload('npwp')) {
				echo $this->upload->display_errors();
			} else {
				$data['npwp'] = $this->upload->data('file_name');
			}

			if (!$this->upload->do_upload('tambahan')) {
				echo $this->upload->display_errors();
			} else {
				$data['tambahan'] = $this->upload->data('file_name');
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
				'informasi_tambahan' => $post['informasi_tambahan']
			];

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
				'informasi_tambahan' => $post['informasi_tambahan']
			];

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
				'informasi_tambahan' => $post['informasi_tambahan']
			];

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
				'informasi_tambahan' => $post['informasi_tambahan']
			];

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
				'id_approval' => 0
			];

			$id = $this->data_m->update('tb_my_hajat_lainnya', $data, ['id_myhajat_lainnya' => $post['id_myhajat_lainnya']]);

			if ($id) {
				echo "Data berhasil disimpan";
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}
	}
}
