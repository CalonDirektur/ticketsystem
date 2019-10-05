<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
    public $id_user;
    public $id_cabang;

    //Variabel memilih Data my hajat milik user 
    public $id_user_myhajat;
    public $approval_myhajat;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_m');
        $this->load->model('aksi_m');
        $this->load->model('comment_m');

        $id_user = NULL;
        if ($this->fungsi->user_login()->id_cabang != 46) {
            $this->id_user = $this->fungsi->user_login()->id_user;
            $this->id_cabang = '= ' . $this->fungsi->user_login()->id_cabang;

            $this->id_user_myhajat = '= ' . $this->fungsi->user_login()->id_user;
            $this->approval_myhajat = 'IS NOT NULL';
        } else if ($this->fungsi->user_login()->level == 6) {
            $this->id_cabang = '= ' . $this->fungsi->user_login()->id_cabang;
        } else {
            $this->id_user = NULL;
            $this->id_cabang = 'IS NOT NULL';

            $this->id_user_myhajat = 'IS NOT NULL';
            $this->approval_myhajat = 'IS NOT NULL';
        }

        check_not_login();
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
                    $produk = "produk = 'My Ihram' OR produk = 'My Safar' OR produk = 'My Talim' OR produk = 'My Hajat' OR produk = ''";
                } else if ($this->fungsi->user_login()->level == 7) {
                    $produk = "produk = 'My Cars' OR produk = 'My Faedah' OR produk = ''";
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

    public function list($produk, $kategori = NULL, $id = NULL)
    {
        if ($produk == "lead_management_list") {
            // Menampilkan data lead management untuk CMS
            if ($this->fungsi->user_login()->level == 1) {
                $data['data'] = $this->data_m->get('tb_lead_management', 'list', $this->id_user);
            }
            // Menampilkan data lead management untuk Head Syariah/Manager
            else if ($this->fungsi->user_login()->level == 6) {
                $data['data'] = $this->data_m->query("SELECT * 
                                                    FROM 
                                                tb_lead_management as A
                                                INNER JOIN user as C ON C.id_user = A.id_user
                                                INNER JOIN tb_cabang as D ON D.id_cabang = A.id_cabang
                                                WHERE A.id_cabang " . $this->id_cabang . "
                                                ");
            } else {
                $data['data'] = $this->data_m->query("SELECT * 
                                                        FROM 
                                                    tb_lead_management as A
                                                    INNER JOIN user as C ON C.id_user = A.id_user
                                                    INNER JOIN tb_cabang as D ON D.id_cabang = A.id_cabang
                                                    ");
            }
            $this->template->load('template2', 'request_support_list/lead_management_list', $data);
        }

        if ($produk == "nst_list") {
            // Menampilkan data lead management untuk CMS
            if ($this->fungsi->user_login()->level == 1) {
                // $data['data'] = $this->data_m->get('tb_nst', 'list', $this->id_user);
                $data['data'] = $this->data_m->query("SELECT * 
                FROM 
            tb_nst as A
            INNER JOIN tb_ticket as B ON B.id_nst = A.id_nst
            INNER JOIN user as C ON C.id_user = A.id_user
            INNER JOIN tb_cabang as D ON D.id_cabang = A.id_cabang
            WHERE A.id_user = " . $this->id_user . "
            ");
            } else if ($this->fungsi->user_login()->level == 4) {
                // Menampilkan data lead management untuk Admin NST 1
                $data['data'] = $this->data_m->query("SELECT * 
                                                        FROM 
                                                    tb_nst as A
                                                    INNER JOIN tb_ticket as B ON B.id_nst = A.id_nst
                                                    INNER JOIN user as C ON C.id_user = B.id_user
                                                    INNER JOIN tb_cabang as D ON D.id_cabang = B.id_cabang
                                                    WHERE produk = 'My Ihram' OR produk = 'My Safar' OR produk = 'My Talim' OR produk = 'My Hajat' OR produk = ''
                                            ");
                // Menampilkan data lead management untuk Superuser
            } else if ($this->fungsi->user_login()->level == 6) {
                // Menampilkan data lead management untuk Cabang Head/Manager
                $data['data'] = $this->data_m->query("SELECT * 
                                                    FROM 
                                                tb_nst as A
                                                INNER JOIN tb_ticket as B ON B.id_nst = A.id_nst
                                                INNER JOIN user as C ON C.id_user = A.id_user
                                                INNER JOIN tb_cabang as D ON D.id_cabang = A.id_cabang
                                                WHERE A.id_cabang " . $this->id_cabang . " 
                                                ");
                // Menampilkan data lead management untuk Admin NST 2
            } else if ($this->fungsi->user_login()->level == 7) {
                $data['data'] = $this->data_m->query("SELECT * 
                                                        FROM 
                                                    tb_nst as A
                                                    INNER JOIN tb_ticket as B ON B.id_nst = A.id_nst
                                                    INNER JOIN user as C ON C.id_user = B.id_user
                                                    INNER JOIN tb_cabang as D ON D.id_cabang = B.id_cabang
                                                    WHERE produk = 'My Cars' OR produk = 'My Faedah' OR produk = ''
            ");
            } else {
                $data['data'] = $this->data_m->query("SELECT * 
                                                        FROM 
                                                    tb_nst as A
                                                    INNER JOIN tb_ticket as B ON B.id_nst = A.id_nst
                                                    INNER JOIN user as C ON C.id_user = B.id_user
                                                    INNER JOIN tb_cabang as D ON D.id_cabang = B.id_cabang
                                            ");
            }
            // $data['data'] = $this->data_m->query("SELECT * 
            //                                      FROM 
            //                                     tb_nst as A
            //                                     INNER JOIN tb_ticket as B
            //                                     ON A.id_nst = B.id_nst 
            //                                     WHERE A.id_cabang " . $this->id_cabang . "
            //                                     ");
            $this->template->load('template2', 'request_support_list/nst_list', $data);
        }
    }

    public function detail($produk, $kategori, $id)
    {
        //Menampilkan ticket yang telah COMPLETED pada produk my ta'lim dengan $id tertentu
        if (isset($_GET['id'])) {
            $id_komentar =  $_GET['id'];
        } else {
            $id_komentar = '';
        }

        if ($produk == 'mytalim' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 3])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_talim', 'id_mytalim', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_talim', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mytalim = tb_my_talim.id_mytalim AND 
                                                                tb_my_talim.id_mytalim = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_talim', 'id_mytalim', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_talim', ['id_mytalim' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_talim', $data);
        }

        //Menampilkan ticket yang COMPLETED pada produk my hajat dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_hajat_renovasi', ['id_renovasi' => $id])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_hajat_renovasi', 'id_renovasi', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_renovasi', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_renovasi = tb_my_hajat_renovasi.id_renovasi AND 
                                                                tb_my_hajat_renovasi.id_renovasi = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_hajat_renovasi', 'id_renovasi', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_hajat_renovasi', ['id_renovasi' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_hajat_renovasi', $data);
        }

        //Menampilkan halaman ticket yang COMPLETED pada produk my hajat kategori sewa dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_hajat_sewa', ['id_sewa' => $id])->row();
            // $data['data'] = $this->data_m->get_myhajat_by_id('tb_my_hajat_sewa', 'id_sewa', $id);
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_hajat_sewa', 'id_sewa', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_sewa', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_sewa = tb_my_hajat_sewa.id_sewa AND 
                                                                tb_my_hajat_sewa.id_sewa = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_hajat_sewa', 'id_sewa', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_hajat_sewa', ['id_sewa' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_hajat_sewa', $data);
        }

        //Menampilkan ticket yang COMPLETED pada produk my hajat kategori wedding dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_hajat_wedding', ['id_wedding' => $id])->row();
            // $data['data'] = $this->data_m->get_myhajat_by_id('tb_my_hajat_wedding', 'id_wedding', $id);
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_hajat_wedding', 'id_wedding', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_wedding', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_wedding = tb_my_hajat_wedding.id_wedding AND 
                                                                tb_my_hajat_wedding.id_wedding = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_hajat_wedding', 'id_wedding', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_hajat_wedding', ['id_wedding' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_hajat_wedding', $data);
        }

        //Menampilkan ticket yang COMPLETED pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_hajat_franchise', ['id_franchise' => $id])->row();
            // $data['data'] = $this->data_m->get_myhajat_by_id('tb_my_hajat_franchise', 'id_franchise', $id);
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_hajat_franchise', 'id_franchise', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_franchise', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_franchise = tb_my_hajat_franchise.id_franchise AND 
                                                                tb_my_hajat_franchise.id_franchise = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_hajat_franchise', 'id_franchise', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_hajat_franchise', ['id_franchise' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_hajat_franchise', $data);
        }

        //Menampilkan ticket COMPLETED pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'lainnya' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id])->row();
            // $data['data'] = $this->data_m->get_myhajat_by_id('tb_my_hajat_lainnya', 'id_myhajat_lainnya', $id);
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_hajat_lainnya', 'id_myhajat_lainnya', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_lainnya', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myhajat_lainnya = tb_my_hajat_lainnya.id_myhajat_lainnya AND 
                                                                tb_my_hajat_lainnya.id_myhajat_lainnya = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_hajat_lainnya', 'id_myhajat_lainnya', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_hajat_lainnya', $data);
        }

        //Menampilkan ticket apprvoed pada produk Ihram dengan $id tertentu
        if ($produk == 'myihram' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_ihram', ['id_myihram' => $id, 'id_approval' => 3])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_ihram', 'id_myihram', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_ihram', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myihram = tb_my_ihram.id_myihram AND 
                                                                tb_my_ihram.id_myihram = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');

            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_ihram', 'id_myihram', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_ihram', ['id_myihram' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya            
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_ihram', $data);
        }

        //Menampilkan ticket apprvoed pada produk safar dengan $id tertentu
        if ($produk == 'mysafar' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_safar', ['id_mysafar' => $id, 'id_approval' => 3])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_safar', 'id_mysafar', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_safar', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mysafar = tb_my_safar.id_mysafar AND 
                                                                tb_my_safar.id_mysafar = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_safar', 'id_mysafar', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_safar', ['id_mysafar' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_safar', $data);
        }

        if ($produk == 'aktivasi_agent' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_aktivasi_agent', ['id_agent' => $id, 'id_approval' => 3])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_aktivasi_agent', 'id_agent', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_aktivasi_agent', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_agent = tb_aktivasi_agent.id_agent AND 
                                                                tb_aktivasi_agent.id_agent = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_aktivasi_agent', 'id_agent', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_aktivasi_agent', ['id_agent' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_aktivasi_agent', $data);
        }
        if ($produk == 'nst' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_nst', ['id_nst' => $id, 'id_approval' => 3])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_nst', 'id_nst', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_nst', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_nst = tb_nst.id_nst AND 
                                                                tb_nst.id_nst = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');

            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_nst', 'id_nst', $id);
            if (($this->fungsi->user_login()->level == 4 || $this->fungsi->user_login()->level == 7) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_nst', ['id_nst' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_nst', $data);
        }

        // Detail Lead Management 
        if ($produk == 'lead_management' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_lead_management', ['id_lead' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->query("SELECT *, C.nama_cabang as cabang_tujuan, B.nama_cabang as cabang_user, B.id_cabang as id_cabang_user, C.id_cabang as id_cabang_tujuan                                             
                            FROM tb_lead_management A
                                                INNER JOIN tb_cabang as B ON B.id_cabang = A.id_cabang
                                                LEFT JOIN tb_cabang as C ON A.cabang_tujuan = C.id_cabang
                                                INNER JOIN user as D ON D.id_user = A.id_user
                                                WHERE A.id_lead = $id
            ")->row();

            $data['cabang_tujuan'] = $this->data_m->get('tb_cabang');

            $data['komentar'] = $this->comment_m->get_comment('tb_lead_management', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_lead = tb_lead_management.id_lead AND 
                                                                tb_lead_management.id_lead = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            //ketika detail status request support di klik maka mark as read notifikasinya            
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_lead_management', $data);
        }

        if ($produk == 'mitra_kerjasama' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_mitra_kerjasama', ['id_mitra_kerjasama' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_mitra_kerjasama', 'id_mitra_kerjasama', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_mitra_kerjasama', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mitra_kerjasama = tb_mitra_kerjasama.id_mitra_kerjasama AND 
                                                                tb_mitra_kerjasama.id_mitra_kerjasama = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_mitra_kerjasama', 'id_mitra_kerjasama', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_mitra_kerjasama', ['id_mitra_kerjasama' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_mitra_kerjasama', $data);
        }

        if ($produk == 'myfaedah' && $kategori == 'id' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_faedah', ['id_myfaedah' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_faedah', 'id_myfaedah', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_faedah', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myfaedah = tb_my_faedah.id_myfaedah AND 
                                                                tb_my_faedah.id_myfaedah = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_faedah', 'id_myfaedah', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_faedah', ['id_myfaedah' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_faedah', $data);
        }

        if ($produk == 'myfaedah' && $kategori == 'bangunan' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_faedah', ['id_myfaedah' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_faedah_bangunan', 'id_bangunan', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_faedah_bangunan', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_bangunan = tb_my_faedah_bangunan.id_bangunan AND 
                                                                tb_my_faedah_bangunan.id_bangunan = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_faedah_bangunan', 'id_bangunan', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_faedah_bangunan', ['id_bangunan' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_faedah_bangunan', $data);
        }

        if ($produk == 'myfaedah' && $kategori == 'qurban' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_faedah', ['id_myfaedah' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_faedah_qurban', 'id_qurban', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_faedah_qurban', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_qurban = tb_my_faedah_qurban.id_qurban AND 
                                                                tb_my_faedah_qurban.id_qurban = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_faedah_qurban', 'id_qurban', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_faedah_qurban', ['id_qurban' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_faedah_qurban', $data);
        }

        if ($produk == 'myfaedah' && $kategori == 'elektronik' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_faedah', ['id_myfaedah' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_faedah_elektronik', 'id_elektronik', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_faedah_elektronik', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_elektronik = tb_my_faedah_elektronik.id_elektronik AND 
                                                                tb_my_faedah_elektronik.id_elektronik = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_faedah_elektronik', 'id_elektronik', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_faedah_elektronik', ['id_elektronik' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_faedah_elektronik', $data);
        }

        if ($produk == 'myfaedah' && $kategori == 'modal' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_faedah', ['id_myfaedah' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_faedah_modal', 'id_modal', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_faedah_modal', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_modal = tb_my_faedah_modal.id_modal AND 
                                                                tb_my_faedah_modal.id_modal = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_faedah_modal', 'id_modal', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_faedah_modal', ['id_modal' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_faedah_modal', $data);
        }

        if ($produk == 'myfaedah' && $kategori == 'lainnya' && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_faedah', ['id_myfaedah' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_faedah_lainnya', 'id_myfaedah_lainnya', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_faedah_lainnya', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myfaedah_lainnya = tb_my_faedah_lainnya.id_myfaedah_lainnya AND 
                                                                tb_my_faedah_lainnya.id_myfaedah_lainnya = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_faedah_lainnya', 'id_myfaedah_lainnya', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_faedah_lainnya', ['id_myfaedah_lainnya' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_faedah_lainnya', $data);
        }

        if ($produk == 'mycars' && $kategori != NULL && $id != NULL) {
            // $data['data'] = $this->data_m->get_by_id('tb_my_cars', ['id_mycars' => $id, 'id_approval' => 0])->row();
            $data['data'] = $this->data_m->get_ticket_by_id('tb_my_cars', 'id_mycars', $id);
            $data['komentar'] = $this->comment_m->get_comment('tb_my_cars', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mycars = tb_my_cars.id_mycars AND 
                                                                tb_my_cars.id_mycars = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang');
            // Jika Admin NST membuka detail request support maka status tiket berubah menjadi in progress dan tanggal in progress tercatat
            $ticket = $this->data_m->get_ticket_by_id('tb_my_cars', 'id_mycars', $id);
            if (($this->fungsi->user_login()->level == 2) && $ticket->id_approval == 0) {
                $this->aksi_m->in_progress('tb_my_cars', ['id_mycars' => $id]);
            }
            //ketika detail status request support di klik maka mark as read notifikasinya
            $this->data_m->update('tb_comment', ['has_read' => 1], ['id' => $id_komentar]);
            $this->template->load('template2', 'request_support_detail/detail_status_my_cars', $data);
        }
    }
}
