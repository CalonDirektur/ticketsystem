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
		if($this->fungsi->user_login()->id_cabang != 46){
			$id_cabang = 'AND id_cabang = '. $this->fungsi->user_login()->id_cabang;
		} else {
			$id_cabang = '';
		}

		check_not_login();
		//Total Pending My'Talim
		$total_pending_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 0 $id_cabang");
		$total_approved_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 2 $id_cabang");
		$total_rejected_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 1 $id_cabang");

		//Total Pending My Hajat
		$total_pending_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 0 $id_cabang");
		$total_approved_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 2 $id_cabang");
		$total_rejected_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 1 $id_cabang");
		
		//Total Pending
		$total_pending = $total_pending_myhajat + $total_pending_mytalim;
		//Total Approved
		$total_approved = $total_approved_myhajat + $total_approved_mytalim;
		//Total Rejected
		$total_rejected = $total_rejected_myhajat + $total_rejected_mytalim;
		$count = [
			//Pending Status
			'pending_myhajat_renovasi' => $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 0 $id_cabang"),
			'pending_myhajat_sewa' => $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 0 $id_cabang"),
			'pending_myhajat_wedding' => $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 0 $id_cabang"),
			'pending_myhajat_franchise' => $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 0 $id_cabang"),
			'pending_mytalim' => $this->data_m->count_data("tb_my_talim", "id_approval = 0 $id_cabang"),
			'total_pending_myhajat' => $total_pending_myhajat,

			//Approved Status
			'approved_myhajat_renovasi' => $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 2 $id_cabang"),
			'approved_myhajat_sewa' => $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 2 $id_cabang"),
			'approved_myhajat_wedding' => $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 2 $id_cabang"),
			'approved_myhajat_franchise' => $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 2 $id_cabang"),
			'approved_mytalim' => $this->data_m->count_data("tb_my_talim", "id_approval = 2 $id_cabang"),
			'total_approved_myhajat' => $total_approved_myhajat,

			//Rejected Status
			'rejected_mytalim' => $this->data_m->count_data("tb_my_talim", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_renovasi' => $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_sewa' => $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_wedding' => $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_franchise' => $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 1 $id_cabang"),
			'total_rejected_myhajat' => $total_rejected_myhajat,

			//Total Pending
			'total_pending' => $total_pending,
			'total_approved' => $total_approved,
			'total_rejected' => $total_rejected
		];
		$this->template->load('template', 'dashboard', $count);
	}
}
