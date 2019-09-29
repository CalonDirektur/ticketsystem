<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_m');
		$this->load->model('dashboard_m');

		$this->load->helper('dashboard');
	}

	public function index()
	{
		// Jika bukan admin maka tampilkan data sesuai dengan cabang masing-masing
		if ($this->fungsi->user_login()->id_cabang != 46) {
			$where = 'id_user = ' . $this->fungsi->user_login()->id_user;

			if ($this->fungsi->user_login()->level == 6) { // Jika Cabang Head/Manager, maka akan menampilkan ticket yang dicabangnya saja
				$id_cabang = 'AND id_cabang = ' . $this->fungsi->user_login()->id_cabang;
			} else { // Jika CMS, maka akan menampilkan pengjuan ticket yang CMS nya saja
				$id_cabang = 'AND id_user = ' . $this->fungsi->user_login()->id_user;
			}
			$id_user_tickets = '= ' . $this->fungsi->user_login()->id_user;
			$id_cabang_tickets = '= ' . $this->fungsi->user_login()->id_cabang;
			$approval_tickets = 'IS NOT NULL';
		} else {
			if ($this->fungsi->user_login()->level == 2) {
				$where = 'id_approval IS NOT NULL';
				$approval_tickets = 'IS NOT NULL';
				$id_user_tickets = 'IS NOT NULL';
				$id_cabang_tickets = 'IS NOT NULL';
			} else if ($this->fungsi->user_login()->level == 3) {
				$where = 'id_approval = 2';
				$approval_tickets = 'IS NOT NULL';
				$id_user_tickets = 'IS NOT NULL';
				$id_cabang_tickets = 'IS NOT NULL';
			} else if ($this->fungsi->user_login()->level == 4 || $this->fungsi->user_login()->level == 5 || $this->fungsi->user_login()->level == 7) {
				$where = 'id_approval IS NOT NULL ';
				$approval_tickets = 'IS NOT NULL';
				$id_user_tickets = 'IS NOT NULL';
				$id_cabang_tickets = 'IS NOT NULL';

				if ($this->fungsi->user_login()->level == 4) {
					$produk = "produk = 'My Ihram' OR produk = 'My Safar' OR Produk = 'My Talim' OR Produk = 'My Hajat'";
				} else if ($this->fungsi->user_login()->level == 7) {
					$produk = "produk = 'My Cars' OR produk = 'My Faedah'";
				}
			}
			$id_cabang = '';
		}

		// if ($this->fungsi->user_login()->level == 2) {
		// 	$where = 'id_approval = 0';
		// } else if ($this->fungsi->user_login()->level == 3) {
		// 	$where = 'id_approval = 2';
		// }

		check_not_login();
		//Total Status My'Talim
		$total_pending_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 0 $id_cabang");
		$total_approved_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 2 $id_cabang");
		$total_rejected_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 1 $id_cabang");
		$total_completed_mytalim = $this->data_m->count_data("tb_my_talim", "id_approval = 3 $id_cabang");

		//Total Status My Hajat
		$total_pending_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 0 $id_cabang");
		$total_approved_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 2 $id_cabang");
		$total_rejected_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 1 $id_cabang");
		$total_completed_myhajat = $this->data_m->count_data("tb_my_hajat_renovasi", "id_approval = 3 $id_cabang") + $this->data_m->count_data("tb_my_hajat_sewa", "id_approval = 3 $id_cabang") + $this->data_m->count_data("tb_my_hajat_wedding", "id_approval = 3 $id_cabang") + $this->data_m->count_data("tb_my_hajat_franchise", "id_approval = 3 $id_cabang") + $this->data_m->count_data("tb_my_hajat_lainnya", "id_approval = 3 $id_cabang");

		//Total Status My'ihram
		$total_pending_myihram = $this->data_m->count_data("tb_my_ihram", "id_approval = 0 $id_cabang");
		$total_approved_myihram = $this->data_m->count_data("tb_my_ihram", "id_approval = 2 $id_cabang");
		$total_rejected_myihram = $this->data_m->count_data("tb_my_ihram", "id_approval = 1 $id_cabang");
		$total_completed_myihram = $this->data_m->count_data("tb_my_ihram", "id_approval = 3 $id_cabang");

		//Total Status My Safar
		$total_pending_mysafar = $this->data_m->count_data("tb_my_safar", "id_approval = 0 $id_cabang");
		$total_approved_mysafar = $this->data_m->count_data("tb_my_safar", "id_approval = 2 $id_cabang");
		$total_rejected_mysafar = $this->data_m->count_data("tb_my_safar", "id_approval = 1 $id_cabang");
		$total_completed_mysafar = $this->data_m->count_data("tb_my_safar", "id_approval = 3 $id_cabang");

		//Total Status My faedah
		$total_pending_myfaedah = $this->data_m->count_data("tb_my_faedah", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_faedah_bangunan", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_faedah_elektronik", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_faedah_qurban", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_faedah_modal", "id_approval = 0 $id_cabang") + $this->data_m->count_data("tb_my_faedah_lainnya", "id_approval = 0 $id_cabang");
		$total_approved_myfaedah = $this->data_m->count_data("tb_my_faedah", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_faedah_bangunan", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_faedah_elektronik", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_faedah_qurban", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_faedah_modal", "id_approval = 2 $id_cabang") + $this->data_m->count_data("tb_my_faedah_lainnya", "id_approval = 2 $id_cabang");
		$total_rejected_myfaedah = $this->data_m->count_data("tb_my_faedah", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_faedah_bangunan", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_faedah_elektronik", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_faedah_qurban", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_faedah_modal", "id_approval = 1 $id_cabang") + $this->data_m->count_data("tb_my_faedah_lainnya", "id_approval = 1 $id_cabang");
		$total_completed_myfaedah = $this->data_m->count_data("tb_my_faedah", "id_approval = 3 $id_cabang") + $this->data_m->count_data("tb_my_faedah_bangunan", "id_approval = 3 $id_cabang") + $this->data_m->count_data("tb_my_faedah_elektronik", "id_approval = 3 $id_cabang") + $this->data_m->count_data("tb_my_faedah_qurban", "id_approval = 3 $id_cabang") + $this->data_m->count_data("tb_my_faedah_modal", "id_approval = 3 $id_cabang") + $this->data_m->count_data("tb_my_faedah_lainnya", "id_approval = 3 $id_cabang");

		//Total Status My cars
		$total_pending_mycars = $this->data_m->count_data("tb_my_cars", "id_approval = 0 $id_cabang");
		$total_approved_mycars = $this->data_m->count_data("tb_my_cars", "id_approval = 2 $id_cabang");
		$total_rejected_mycars = $this->data_m->count_data("tb_my_cars", "id_approval = 1 $id_cabang");
		$total_completed_mycars = $this->data_m->count_data("tb_my_cars", "id_approval = 3 $id_cabang");

		//Total Status My Safar
		$total_pending_mitra_kerjasama = $this->data_m->count_data("tb_mitra_kerjasama", "id_approval = 0 $id_cabang");
		$total_approved_mitra_kerjasama = $this->data_m->count_data("tb_mitra_kerjasama", "id_approval = 2 $id_cabang");
		$total_rejected_mitra_kerjasama = $this->data_m->count_data("tb_mitra_kerjasama", "id_approval = 1 $id_cabang");
		$total_completed_mitra_kerjasama = $this->data_m->count_data("tb_mitra_kerjasama", "id_approval = 3 $id_cabang");

		//Total Status Aktivasi Agent
		$total_pending_aktivasi_agent = $this->data_m->count_data("tb_aktivasi_agent", "id_approval = 0 $id_cabang");
		$total_approved_aktivasi_agent = $this->data_m->count_data("tb_aktivasi_agent", "id_approval = 2 $id_cabang");
		$total_rejected_aktivasi_agent = $this->data_m->count_data("tb_aktivasi_agent", "id_approval = 1 $id_cabang");
		$total_completed_aktivasi_agent = $this->data_m->count_data("tb_aktivasi_agent", "id_approval = 3 $id_cabang");

		//Total Status NST
		$total_pending_nst = $this->data_m->count_data("tb_nst", "id_approval = 0 $id_cabang");
		$total_approved_nst = $this->data_m->count_data("tb_nst", "id_approval = 2 $id_cabang");
		$total_rejected_nst = $this->data_m->count_data("tb_nst", "id_approval = 1 $id_cabang");
		$total_completed_nst = $this->data_m->count_data("tb_nst", "id_approval = 3 $id_cabang");

		//Total Status Lead Management
		$total_pending_lead_management = $this->data_m->count_data("tb_lead_management", "id_approval = 0 $id_cabang");
		$total_approved_lead_management = $this->data_m->count_data("tb_lead_management", "id_approval = 2 $id_cabang");
		$total_rejected_lead_management = $this->data_m->count_data("tb_lead_management", "id_approval = 1 $id_cabang");
		$total_completed_lead_management = $this->data_m->count_data("tb_lead_management", "id_approval = 3 $id_cabang");

		//Total Pending
		if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 6) {
			$total_pending = $total_pending_myhajat + $total_pending_mytalim + $total_pending_myihram + $total_pending_mysafar + $total_pending_aktivasi_agent + $total_pending_nst + $total_pending_mitra_kerjasama + $total_pending_mycars + $total_pending_myfaedah;
			//Total Approved
			$total_approved = $total_approved_myhajat + $total_approved_mytalim + $total_approved_myihram + $total_approved_mysafar + $total_approved_aktivasi_agent + $total_approved_nst + $total_approved_mitra_kerjasama + $total_approved_mycars + $total_approved_myfaedah;
			//Total Rejected
			$total_rejected = $total_rejected_myhajat + $total_rejected_mytalim + $total_rejected_myihram + $total_rejected_mysafar + $total_rejected_aktivasi_agent + $total_rejected_nst + $total_rejected_mitra_kerjasama + $total_rejected_mycars + $total_rejected_myfaedah;
			//Total Completed
			$total_completed = $total_completed_myhajat + $total_completed_mytalim + $total_completed_myihram + $total_completed_mysafar + $total_completed_aktivasi_agent + $total_completed_nst + $total_completed_mitra_kerjasama + $total_completed_mycars + $total_completed_myfaedah;
		} else if ($this->session->userdata('level') == 5) {
			$total_pending = $total_pending_myhajat + $total_pending_mytalim + $total_pending_myihram + $total_pending_mysafar + $total_pending_aktivasi_agent + $total_pending_nst + $total_pending_mitra_kerjasama + $total_pending_mycars + $total_pending_myfaedah;
			//Total Approved
			$total_approved = $total_approved_myhajat + $total_approved_mytalim + $total_approved_myihram + $total_approved_mysafar + $total_approved_aktivasi_agent + $total_approved_nst + $total_approved_mitra_kerjasama + $total_approved_mycars + $total_approved_myfaedah;
			//Total Rejected
			$total_rejected = $total_rejected_myhajat + $total_rejected_mytalim + $total_rejected_myihram + $total_rejected_mysafar + $total_rejected_aktivasi_agent + $total_rejected_nst + $total_rejected_mitra_kerjasama + $total_rejected_mycars + $total_rejected_myfaedah;
			//Total Completed
			$total_completed = $total_completed_myhajat + $total_completed_mytalim + $total_completed_myihram + $total_completed_mysafar + $total_completed_aktivasi_agent + $total_completed_nst + $total_completed_mitra_kerjasama + $total_completed_mycars + $total_completed_myfaedah;
		} else if ($this->session->userdata('level') == 4 || $this->session->userdata('level') == 7) {
			$total_pending = $total_pending_nst;
			//Total Approved
			$total_approved = $total_approved_nst;
			//Total Rejected
			$total_rejected = $total_rejected_nst;
			//Total Completed
			$total_completed = $total_completed_nst + $total_completed_lead_management;
		} else if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 3) {
			$total_pending = $total_pending_myhajat + $total_pending_mytalim + $total_pending_myihram + $total_pending_mysafar + $total_pending_aktivasi_agent + $total_pending_mitra_kerjasama + $total_pending_mycars + $total_pending_myfaedah;
			//Total Approved
			$total_approved = $total_approved_myhajat + $total_approved_mytalim + $total_approved_myihram + $total_approved_mysafar + $total_approved_aktivasi_agent + $total_approved_mitra_kerjasama + $total_approved_mycars + $total_approved_myfaedah;
			//Total Rejected
			$total_rejected = $total_rejected_myhajat + $total_rejected_mytalim + $total_rejected_myihram + $total_rejected_mysafar + $total_rejected_aktivasi_agent + $total_rejected_mitra_kerjasama + $total_rejected_mycars + $total_rejected_myfaedah;
			//Total Completed
			$total_completed = $total_completed_myhajat + $total_completed_mytalim + $total_completed_myihram + $total_completed_mysafar + $total_completed_aktivasi_agent + $total_completed_mitra_kerjasama + $total_completed_mycars + $total_completed_myfaedah;
		}

		$data = [
			//Total
			'total_pending' => $total_pending,
			'total_approved' => $total_approved,
			'total_rejected' => $total_rejected,
			'total_completed' => $total_completed
		];

		// $data['mytalim_records'] 			= $this->data_m->get_product('tb_my_talim', 'tb_my_talim.' . $where, 'id_mytalim DESC');
		// $data['myhajat_records']			= $this->data_m->get_myhajat($id_user_tickets, $approval_tickets);
		// $data['myhajat_renovasi_records'] 	= $this->data_m->get_product('tb_my_hajat_renovasi', 'tb_my_hajat_renovasi.' . $where, 'id_renovasi DESC');
		// $data['myhajat_sewa_records'] 		= $this->data_m->get_product('tb_my_hajat_sewa', 'tb_my_hajat_sewa.' . $where, 'id_sewa DESC');
		// $data['myhajat_wedding_records'] 	= $this->data_m->get_product('tb_my_hajat_wedding', 'tb_my_hajat_wedding.' . $where, 'id_wedding DESC');
		// $data['myhajat_franchise_records'] 	= $this->data_m->get_product('tb_my_hajat_franchise', 'tb_my_hajat_franchise.' . $where, 'id_franchise DESC');
		// $data['myhajat_lainnya_records'] 	= $this->data_m->get_product('tb_my_hajat_lainnya', 'tb_my_hajat_lainnya.' . $where, 'id_myhajat_lainnya DESC');
		// $data['myihram_records'] 			= $this->data_m->get_product('tb_my_ihram', 'tb_my_ihram.' . $where, 'id_myihram DESC');
		// $data['mysafar_records'] 			= $this->data_m->get_product('tb_my_safar', 'tb_my_safar.' . $where, 'id_mysafar DESC');
		// $data['aktivasi_agent_records'] 	= $this->data_m->get_product('tb_aktivasi_agent', 'tb_aktivasi_agent.' . $where, 'id_agent DESC');
		// $data['nst_records'] 				= $this->data_m->get_product('tb_nst', 'tb_nst.' . $where, 'id_nst DESC');
		// $data['lead_management_records'] 	= $this->data_m->get_product('tb_lead_management', 'tb_lead_management.' . $where, 'id_lead DESC');

		$data['ticket_records'] = $this->data_m->get_tickets($id_user_tickets, $approval_tickets);
		if ($this->fungsi->user_login()->level == 4 || $this->fungsi->user_login()->level == 7) {
			$data['ticket_records_nst'] = $this->data_m->get_tickets_nst($id_user_tickets, $approval_tickets, $produk);
		}
		$data['ticket_records_head_syariah'] = $this->data_m->get_tickets_head_syariah($id_cabang_tickets, $approval_tickets);

		// $data['ticket_records_pending'] = $this->data_m->get_tickets($id_user_tickets, ' = 0');
		// $data['ticket_records_rejected'] = $this->data_m->get_tickets($id_user_tickets, ' = 1');
		// $data['ticket_records_approved'] = $this->data_m->get_tickets($id_user_tickets, ' = 2');
		// $data['ticket_records_completed'] = $this->data_m->get_tickets($id_user_tickets, ' = 3');



		$this->template->load('template2', 'dashboard', $data);
	}

	public function stats()
	{
		// rata2 waktu penyelesaian ticket dari awal hingga akhir
		$myihram = "(id_myihram IS NOT NULL)";
		$penyelesaian_myihram = $this->dashboard_m->penyelesaian_ticket($myihram);
		// rata2 waktu penyelesaian ticket dari awal hingga akhir
		$mysafar = "(id_mysafar IS NOT NULL)";
		$penyelesaian_mysafar = $this->dashboard_m->penyelesaian_ticket($mysafar);
		// rata2 waktu penyelesaian ticket dari awal hingga akhir
		$mytalim = "(id_mytalim IS NOT NULL)";
		$penyelesaian_mytalim = $this->dashboard_m->penyelesaian_ticket($mytalim);
		// rata2 waktu penyelesaian ticket dari awal hingga akhir
		$myhajat = "(id_renovasi IS NOT NULL OR id_franchise IS NOT NULL OR id_wedding IS NOT NULL OR id_sewa IS NOT NULL OR id_myhajat_lainnya IS NOT NULL)";
		$penyelesaian_myhajat = $this->dashboard_m->penyelesaian_ticket($myhajat);
		// rata2 waktu penyelesaian ticket dari awal hingga akhir
		$myfaedah = "(id_bangunan IS NOT NULL OR id_elektronik IS NOT NULL OR id_modal IS NOT NULL OR id_qurban IS NOT NULL OR id_myfaedah_lainnya IS NOT NULL)";
		$penyelesaian_myfaedah = $this->dashboard_m->penyelesaian_ticket($myfaedah);
		// rata2 waktu penyelesaian ticket dari awal hingga akhir
		$mycars = "(id_mycars IS NOT NULL)";
		$penyelesaian_mycars = $this->dashboard_m->penyelesaian_ticket($mycars);
		// rata2 waktu penyelesaian ticket dari awal hingga akhir
		$nst = "(id_nst IS NOT NULL)";
		$penyelesaian_nst = $this->dashboard_m->penyelesaian_ticket($nst);
		// rata2 waktu penyelesaian ticket dari awal hingga akhir
		$mitra_kerjasama = "(id_mitra_kerjasama IS NOT NULL)";
		$penyelesaian_mitra_kerjasama = $this->dashboard_m->penyelesaian_ticket($mitra_kerjasama);
		// rata2 waktu penyelesaian ticket dari awal hingga akhir
		$aktivasi_agent = "(id_agent IS NOT NULL)";
		$penyelesaian_aktivasi_agent = $this->dashboard_m->penyelesaian_ticket($aktivasi_agent);

		$data = [
			'today_tickets' 				=> $this->dashboard_m->today_ticket(),
			'ticket_weekly' 				=> $this->dashboard_m->ticket_weekly(),
			'total_tickets' 				=> $this->dashboard_m->total_ticket(),
			'monthly_tickets' 				=> $this->dashboard_m->monthly_ticket(),
			'monthly_product' 				=> $this->dashboard_m->monthly_product(),
			'monthly_leads' 				=> $this->dashboard_m->monthly_leads(),
			'total_leads' 					=> $this->dashboard_m->total_leads(),
			'avg_leads' 					=> $this->dashboard_m->avg_leads(),
			'aktivitas_cabang' 				=> $this->dashboard_m->aktivitas_cabang(),
			'penyelesaian_admin1' 			=> $this->dashboard_m->penyelesaian_admin1(),
			'penyelesaian_admin2' 			=> $this->dashboard_m->penyelesaian_admin2(),
			'penyelesaian_admin_nst'		=> $this->dashboard_m->penyelesaian_admin_nst(),
			'penyelesaian_myihram' 			=> $penyelesaian_myihram,
			'penyelesaian_mysafar' 			=> $penyelesaian_mysafar,
			'penyelesaian_mytalim' 			=> $penyelesaian_mytalim,
			'penyelesaian_myhajat' 			=> $penyelesaian_myhajat,
			'penyelesaian_myfaedah' 		=> $penyelesaian_myfaedah,
			'penyelesaian_myihram' 			=> $penyelesaian_myihram,
			'penyelesaian_mycars' 			=> $penyelesaian_mycars,
			'penyelesaian_nst' 				=> $penyelesaian_nst,
			'penyelesaian_mitra_kerjasama' 	=> $penyelesaian_mitra_kerjasama,
			'penyelesaian_aktivasi_agent' 	=> $penyelesaian_aktivasi_agent,
			'sumber_leads' 					=> $this->dashboard_m->sumber_leads(),
			'alasan_reject_nst'				=> $this->dashboard_m->alasan_reject_nst(),
			// 'color' => $color,
			'status_pending' 				=> $this->dashboard_m->status_ticket(0, FALSE),
			'status_rejected' 				=> $this->dashboard_m->status_ticket(1, FALSE),
			'status_reviewed' 				=> $this->dashboard_m->status_ticket(2, FALSE),
			'status_completed' 				=> $this->dashboard_m->status_ticket(3, FALSE),
			'status_inprogress' 			=> $this->dashboard_m->status_ticket(4, FALSE),
			'status_pending_nst' 			=> $this->dashboard_m->status_ticket(0, TRUE),
			'status_rejected_nst' 			=> $this->dashboard_m->status_ticket(1, TRUE),
			'status_reviewed_nst' 			=> $this->dashboard_m->status_ticket(2, TRUE),
			'status_completed_nst' 			=> $this->dashboard_m->status_ticket(3, TRUE),
			'status_inprogress_nst' 		=> $this->dashboard_m->status_ticket(4, TRUE)

		];
		$this->template->load('template2', 'stats', $data);
	}
}
