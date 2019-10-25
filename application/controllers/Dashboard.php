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
		check_not_login();
		check_access_level_superuser();
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
			'penyelesaian_admin_nst_1'		=> $this->dashboard_m->penyelesaian_admin_nst("(produk = 'My Ihram' or produk = 'My Safar' or produk = 'My Talim' or produk = 'My Hajat')"),
			'penyelesaian_admin_nst_2'		=> $this->dashboard_m->penyelesaian_admin_nst("(produk = 'My Faedah' or produk = 'My Cars')"),
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

	public function stats()
	{ }
}
