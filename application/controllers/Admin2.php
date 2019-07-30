<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin2 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aksi_Admin2_m');
		$this->load->model('data_m');
	}

	//menyelesaikan support ticket
	public function complete($produk = NULL, $kategori = NULL, $id)
	{
		//Produk My Ta'lim
		if ($produk == 'mytalim') {
			$this->Aksi_Admin2_m->complete('tb_my_talim', ['id_mytalim' => $id]);
			redirect('/');
		}

		if ($produk == 'myhajat' && $kategori == 'renovasi') {
			$this->Aksi_Admin2_m->complete('tb_my_hajat_renovasi', ['id_renovasi' => $id]);
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'sewa') {
			$this->Aksi_Admin2_m->complete('tb_my_hajat_sewa', ['id_sewa' => $id]);
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'wedding') {
			$this->Aksi_Admin2_m->complete('tb_my_hajat_wedding', ['id_wedding' => $id]);
			redirect('/');
		}
		if ($produk == 'myhajat' && $kategori == 'franchise') {
			$this->Aksi_Admin2_m->complete('tb_my_hajat_franchise', ['id_franchise' => $id]);
			redirect('/');
		}

		if ($produk == 'myihram') {
			$this->Aksi_Admin2_m->complete('tb_my_ihram', ['id_myihram' => $id]);
			redirect('/');
		}

		if ($produk == 'mysafar') {
			$this->Aksi_Admin2_m->complete('tb_my_safar', ['id_mysafar' => $id]);
			redirect('/');
		}

		if ($produk == 'nst') {
			$this->Aksi_Admin2_m->complete('tb_nst', ['id_nst' => $id]);
			redirect('/');
		}

		if ($produk == 'lead_management') {
			$this->Aksi_Admin2_m->complete('tb_lead_management', ['id_lead' => $id]);
			redirect('/');
		}

		if ($produk == 'aktivasi_agent') {
			$this->Aksi_Admin2_m->complete('tb_aktivasi_agent', ['id_agent' => $id]);
			redirect('/');
		}
	}
}
