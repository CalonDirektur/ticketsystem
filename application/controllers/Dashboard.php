<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_m');
	}

	public function index()
	{
		check_not_login();
		//Total Pending My'Talim
		$total_pending_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 0");
		$total_approved_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 2");
		$total_rejected_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 1");

		//Total Pending My Hajat
		$total_pending_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 0") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 0") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 0") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 0");
		$total_approved_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 2") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 2") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 2") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 2");
		$total_rejected_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 1") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 1") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 1") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 1");
		
		//Total Pending
		$total_pending = $total_pending_myhajat + $total_pending_mytalim;
		//Total Approved
		$total_approved = $total_approved_myhajat + $total_approved_mytalim;
		//Total Rejected
		$total_rejected = $total_rejected_myhajat + $total_rejected_mytalim;
		$count = [
			//Pending Status
			'pending_myhajat_renovasi' => $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 0"),
			'pending_myhajat_sewa' => $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 0"),
			'pending_myhajat_wedding' => $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 0"),
			'pending_myhajat_franchise' => $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 0"),
			'pending_mytalim' => $this->data_m->count_data("tb_my_talim", "id_approval = 0"),
			'total_pending_myhajat' => $total_pending_myhajat,

			//Approved Status
			'approved_myhajat_renovasi' => $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 2"),
			'approved_myhajat_sewa' => $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 2"),
			'approved_myhajat_wedding' => $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 2"),
			'approved_myhajat_franchise' => $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 2"),
			'approved_mytalim' => $this->data_m->count_data("tb_my_talim", "id_approval = 2"),
			'total_approved_myhajat' => $total_approved_myhajat,

			//Rejected Status
			'rejected_mytalim' => $this->data_m->count_data("tb_my_talim", "id_approval = 1"),
			'rejected_myhajat_renovasi' => $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 1"),
			'rejected_myhajat_sewa' => $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 1"),
			'rejected_myhajat_wedding' => $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 1"),
			'rejected_myhajat_franchise' => $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 1"),
			'total_rejected_myhajat' => $total_rejected_myhajat,

			//Total Pending
			'total_pending' => $total_pending,
			'total_approved' => $total_approved,
			'total_rejected' => $total_rejected
		];
		$this->template->load('template', 'dashboard', $count);
	}
}
