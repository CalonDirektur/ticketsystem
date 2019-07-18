<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin1 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aksi_Admin1_m');
		$this->load->model('data_m');
	}

	// Method untuk menampilkan data yang ingin direview tiketnya
	public function review($produk = NULL, $kategori = NULL, $id = NULL)
	{
		////////////////////////// Produk My Ta'lim ///////////////////////////////////////////////
		if ($produk == 'mytalim' && $id == NULL) {
			$data['pending'] = $this->data_m->get('tb_my_talim', 'pending_review')->result();
			$this->template->load('template', 'admin/my_talim/admin1_pending_mytalim', $data);
		}
		if ($produk == 'mytalim' && $id != NULL) {
			$data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_approval' => 0])->row();
			$this->template->load('template', 'my_talim/detail_status_my_talim', $data);
		}
		////////////////////////// Produk My Hajat ///////////////////////////////////////////////
		/////////////// Renovasi
		if ($produk == 'myhajat' && $kategori == 'renovasi' && $id == NULL) {
			$data['pending'] = $this->data_m->get('tb_my_talim', 'pending_review')->result();
			$this->template->load('template', 'admin/my_talim/admin1_pending_mytalim', $data);
		}
		if ($produk == 'hajat' && $kategori == 'renovasi' && $id != NULL) {
			$data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_approval' => 0])->row();
		}		
	}

	//Method untuk menampilkan tiket yang sudah direview
	public function reviewed($produk = NULL, $id = NULL)
	{
		//Produk My Ta'lim
		if ($produk == 'mytalim' && $id == NULL) {
			$data['pending'] = $this->data_m->get('tb_my_talim', 'pending_review')->result();
			$this->template->load('template', 'admin/my_talim/admin1_pending_mytalim', $data);
		}
		if ($produk == 'mytalim' && $id != NULL) {
			$data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_approval' => 0])->row();
			$this->template->load('template', 'my_talim/detail_status_my_talim', $data);
		}

	}

	public function approve($produk = NULL, $kategori, $id)
	{
		if ($produk == 'mytalim') {
			$this->Aksi_Admin1_m->approve('tb_my_talim', ['id_mytalim' => $id]);
			redirect('status/pending/mytalim');
		}
		if ($produk == 'myhajat' && $kategori == 'renovasi') {
			$this->Aksi_Admin1_m->approve('tb_my_hajat_renovasi', ['id_renovasi' => $id]);
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'sewa') {
			$this->Aksi_Admin1_m->approve('tb_my_hajat_sewa', ['id_sewa' => $id]);
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'wedding') {
			$this->Aksi_Admin1_m->approve('tb_my_hajat_wedding', ['id_wedding' => $id]);
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'franchise') {
			$this->Aksi_Admin1_m->approve('tb_my_hajat_franchise', ['id_franchise' => $id]);
			redirect('/');
		}
	}

	public function reject($produk = NULL, $kategori, $id)
	{
		if ($produk == 'mytalim') {
			$this->Aksi_Admin1_m->reject('tb_my_talim', ['id_mytalim' => $id]);
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'renovasi') {
			$this->Aksi_Admin1_m->reject('tb_my_hajat_renovasi', ['id_renovasi' => $id]);
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'sewa') {
			$this->Aksi_Admin1_m->reject('tb_my_hajat_sewa', ['id_sewa' => $id]);
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'wedding') {
			$this->Aksi_Admin1_m->reject('tb_my_hajat_wedding', ['id_wedding' => $id]);
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'franchise') {
			$this->Aksi_Admin1_m->reject('tb_my_hajat_franchise', ['id_franchise' => $id]);
			redirect('/');
		}
	}
}
