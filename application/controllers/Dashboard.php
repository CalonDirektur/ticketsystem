<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_m');
	}

	public function index()
	{

		// Jika bukan admin maka tampilkan data sesuai dengan cabang masing-masing
		if ($this->fungsi->user_login()->id_cabang != 46) {
			$id = 'id_cabang = ' . $this->fungsi->user_login()->id_cabang;
			$id_cabang = 'AND id_cabang = ' . $this->fungsi->user_login()->id_cabang;
		} else {
			if ($this->fungsi->user_login()->level == 2) {
				$id = 'id_approval = 0';
			} else if ($this->fungsi->user_login()->level == 3) {
				$id = 'id_approval = 2';
			}
			$id_cabang = '';
		}

		if ($this->fungsi->user_login()->level == 2) {
			$id = 'id_approval = 0';
		} else if ($this->fungsi->user_login()->level == 3) {
			$id = 'id_approval = 2';
		}

		check_not_login();
		//Total Pending My'Talim
		$total_pending_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 0 $id_cabang");
		$total_approved_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 2 $id_cabang");
		$total_rejected_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 1 $id_cabang");

		//Total Pending My Hajat
		$total_pending_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 0 $id_cabang");
		$total_approved_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 2 $id_cabang");
		$total_rejected_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 1 $id_cabang");

		//Total Pending
		$total_pending = $total_pending_myhajat + $total_pending_mytalim;
		//Total Approved
		$total_approved = $total_approved_myhajat + $total_approved_mytalim;
		//Total Rejected
		$total_rejected = $total_rejected_myhajat + $total_rejected_mytalim;
		$data = [
			//Pending Status
			'pending_myhajat_renovasi' => $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 0 $id_cabang"),
			'pending_myhajat_sewa' => $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 0 $id_cabang"),
			'pending_myhajat_wedding' => $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 0 $id_cabang"),
			'pending_myhajat_franchise' => $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 0 $id_cabang"),
			'pending_myhajat_lainnya' => $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 0 $id_cabang"),
			'pending_mytalim' => $this->data_m->count_data("tb_my_talim", "id_approval = 0 $id_cabang"),
			'total_pending_myhajat' => $total_pending_myhajat,

			//Approved Status
			'approved_myhajat_renovasi' => $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 2 $id_cabang"),
			'approved_myhajat_sewa' => $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 2 $id_cabang"),
			'approved_myhajat_wedding' => $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 2 $id_cabang"),
			'approved_myhajat_franchise' => $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 2 $id_cabang"),
			'approved_myhajat_lainnya' => $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 2 $id_cabang"),
			'approved_mytalim' => $this->data_m->count_data("tb_my_talim", "id_approval = 2 $id_cabang"),
			'total_approved_myhajat' => $total_approved_myhajat,

			//Rejected Status
			'rejected_mytalim' => $this->data_m->count_data("tb_my_talim", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_renovasi' => $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_sewa' => $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_wedding' => $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_franchise' => $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 1 $id_cabang"),
			'rejected_myhajat_lainnya' => $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 1 $id_cabang"),
			'total_rejected_myhajat' => $total_rejected_myhajat,

			//Total Pending
			'total_pending' => $total_pending,
			'total_approved' => $total_approved,
			'total_rejected' => $total_rejected
		];

		$data['mytalim_records'] = $this->data_m->get_product('tb_my_talim', 'tb_my_talim.' . $id, 'id_mytalim DESC');
		$data['myhajat_renovasi_records'] = $this->data_m->get_product('tb_my_hajat_renovasi', 'tb_my_hajat_renovasi.' . $id, 'id_renovasi DESC');
		$data['myhajat_sewa_records'] = $this->data_m->get_product('tb_my_hajat_sewa', 'tb_my_hajat_sewa.' . $id, 'id_sewa DESC');
		$data['myhajat_wedding_records'] = $this->data_m->get_product('tb_my_hajat_wedding', 'tb_my_hajat_wedding.' . $id, 'id_wedding DESC');
		$data['myhajat_franchise_records'] = $this->data_m->get_product('tb_my_hajat_franchise', 'tb_my_hajat_franchise.' . $id, 'id_franchise DESC');
		$data['myhajat_lainnya_records'] = $this->data_m->get_product('tb_my_hajat_lainnya', 'tb_my_hajat_lainnya.' . $id, 'id_myhajat_lainnya DESC');

		$this->template->load('template2', 'dashboard', $data);
	}

	public function template()
	{
		$this->template->load('template2', 'dashboard');
	}
}
