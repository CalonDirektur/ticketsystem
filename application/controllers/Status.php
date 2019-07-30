<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
    public $id_user;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aksi_Admin2_m');
        $this->load->model('data_m');
        $this->load->model('comment_m');

        $id_user = NULL;
        if ($this->fungsi->user_login()->id_cabang != 46) {
            $this->id_user = $this->fungsi->user_login()->id_user;
        } else {
            $this->id_user = NULL;
        }

        check_not_login();
    }

    //PENDING TICKETS (WAITING TO BE REVIEWED)
    public function pending($produk = NULL, $kategori = NULL, $id = NULL)
    {
        ////////////////////////////// MY TA'LIM /////////////////////////////////////////
        //Menampilkan semua ticket pending pada produk my ta'lim jika $id tidak diisi
        if ($produk == 'mytalim' && $id == NULL) {
            // $data['data'] = $this->data_m->get('tb_my_talim', 'pending_review')->result();
            $data['data'] = $this->data_m->get('tb_my_talim', 'pending_review', $this->id_user)->result();
            $this->template->load('template2', 'my_talim/my_talim_list', $data);
        }
        //Menampilkan ticket pending pada produk my ta'lim dengan $id tertentu
        if ($produk == 'mytalim' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 0])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_talim', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mytalim = tb_my_talim.id_mytalim AND 
                                                                tb_my_talim.id_mytalim = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_talim/detail_status_my_talim', $data);
        }

        ////////////////////////////// MY HAJAT /////////////////////////////////////////

        ///////////////// RENOVASI //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori renovasi jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'pending_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/renovasi/my_hajat_renovasi_list', $data);
        }
        //Menampilkan ticket pending pada produk my hajat dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_renovasi', ['id_renovasi' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_renovasi', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_renovasi = tb_my_hajat_renovasi.id_renovasi AND 
                                                                tb_my_hajat_renovasi.id_renovasi = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/renovasi/detail_status_my_hajat_renovasi', $data);
        }

        ///////////////// SEWA //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori sewa jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'pending_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/sewa/my_hajat_sewa_list', $data);
        }
        //Menampilkan halaman ticket pending pada produk my hajat kategori sewa dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_sewa', ['id_sewa' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_sewa', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_sewa = tb_my_hajat_sewa.id_sewa AND 
                                                                tb_my_hajat_sewa.id_sewa = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/sewa/detail_status_my_hajat_sewa', $data);
        }

        ///////////////// WEDDING //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori wedding jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'pending_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/wedding/my_hajat_wedding_list', $data);
        }
        //Menampilkan ticket pending pada produk my hajat kategori wedding dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_wedding', ['id_wedding' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_wedding', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_wedding = tb_my_hajat_wedding.id_wedding AND 
                                                                tb_my_hajat_wedding.id_wedding = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/wedding/detail_status_my_hajat_wedding', $data);
        }

        ///////////////// FRANCHISE //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori franchise jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'pending_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/franchise/my_hajat_franchise_list', $data);
        }
        //Menampilkan ticket pending pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_franchise', ['id_franchise' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_franchise', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_franchise = tb_my_hajat_franchise.id_franchise AND 
                                                                tb_my_hajat_franchise.id_franchise = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/franchise/detail_status_my_hajat_franchise', $data);
        }

        ///////////////// LAINNYA //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori lainnya jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'lainnya' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_lainnya', 'pending_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/lainnya/my_hajat_lainnya_list', $data);
        }
        //Menampilkan ticket pending pada produk my hajat kategori lainnya dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'lainnya' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_lainnya', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myhajat_lainnya = tb_my_hajat_lainnya.id_myhajat_lainnya AND 
                                                                tb_my_hajat_lainnya.id_myhajat_lainnya = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/lainnya/detail_status_my_hajat_lainnya', $data);
        }

        ////////////////////////////// MY IHRAM /////////////////////////////////////////

        //menampilkan status tiket produk Ihram yang telah PENDIGN oleh admin 1 dan admin 2
        if ($produk == 'myihram' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_ihram', 'pending_review', $this->id_user)->result();
            $this->template->load('template2', 'my_ihram/my_ihram_list', $data);
        }
        //Menampilkan ticket apprvoed pada produk Ihram dengan $id tertentu
        if ($produk == 'myihram' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_ihram', ['id_myihram' => $id, 'id_approval' => 0])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_ihram', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myihram = tb_my_ihram.id_myihram AND 
                                                                tb_my_ihram.id_myihram = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();

            $this->template->load('template2', 'my_ihram/detail_status_my_ihram', $data);
        }

        ////////////////////////////// MY Safar /////////////////////////////////////////

        //menampilkan status tiket produk Safar yang telah PENDIGN oleh admin 1 dan admin 2
        if ($produk == 'mysafar' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_safar', 'pending_review', $this->id_user)->result();
            $this->template->load('template2', 'my_safar/my_safar_list', $data);
        }
        //Menampilkan ticket apprvoed pada produk safar dengan $id tertentu
        if ($produk == 'mysafar' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_safar', ['id_mysafar' => $id, 'id_approval' => 0])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_safar', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mysafar = tb_my_safar.id_mysafar AND 
                                                                tb_my_safar.id_mysafar = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_safar/detail_status_my_safar', $data);
        }

        ////////////////////////////// Aktivasi Agent /////////////////////////////////////////
        if ($produk == 'aktivasi_agent' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_aktivasi_agent', 'pending_review', $this->id_user)->result();
            $this->template->load('template2', 'aktivasi_agent/aktivasi_agent_list', $data);
        }

        if ($produk == 'aktivasi_agent' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_aktivasi_agent', ['id_agent' => $id, 'id_approval' => 0])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_aktivasi_agent', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_agent = tb_aktivasi_agent.id_agent AND 
                                                                tb_aktivasi_agent.id_agent = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'aktivasi_agent/detail_status_aktivasi_agent', $data);
        }

        ////////////////////////////// NST /////////////////////////////////////////
        if ($produk == 'nst' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_nst', 'pending_review', $this->id_user)->result();
            $this->template->load('template2', 'nst/nst_list', $data);
        }
        if ($produk == 'nst' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_nst', ['id_nst' => $id, 'id_approval' => 0])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_nst', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_nst = tb_nst.id_nst AND 
                                                                tb_nst.id_nst = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'nst/detail_status_nst', $data);
        }

        ////////////////////////////// LEAD MANAGEMENT /////////////////////////////////////////
        if ($produk == 'lead_management' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_lead_management', 'pending_review', $this->id_user)->result();
            $this->template->load('template2', 'lead_management/lead_management_list', $data);
        }
        if ($produk == 'lead_management' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_lead_management', ['id_lead' => $id, 'id_approval' => 0])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_lead_management', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_lead = tb_lead_management.id_lead AND 
                                                                tb_lead_management.id_lead = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'lead_management/detail_status_lead_management', $data);
        }
    }
    public function approved($produk = NULL, $kategori = NULL, $id = NULL)
    {
        ////////////////////////////// MY TA'LIM /////////////////////////////////////////

        //menampilkan status tiket produk mytalim yang telah diapprove oleh admin 1 dan admin 2
        if ($produk == 'mytalim' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_talim', 'approved_review', $this->id_user)->result();
            $this->template->load('template2', 'my_talim/my_talim_list', $data);
        }
        //Menampilkan ticket apprvoed pada produk my ta'lim dengan $id tertentu
        if ($produk == 'mytalim' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 2])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_talim', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mytalim = tb_my_talim.id_mytalim AND 
                                                                tb_my_talim.id_mytalim = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();

            $this->template->load('template2', 'my_talim/detail_status_my_talim', $data);
        }

        ////////////////////////////// MY HAJAT /////////////////////////////////////////

        ///////////////// RENOVASI //////////////////
        //Menampilkan semua ticket APPROVED pada produk my hajat kategori renovasi jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'approved_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/renovasi/my_hajat_renovasi_list', $data);
        }
        //Menampilkan ticket APPROVED pada produk my hajat dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_renovasi', ['id_renovasi' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_renovasi', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_renovasi = tb_my_hajat_renovasi.id_renovasi AND 
                                                                tb_my_hajat_renovasi.id_renovasi = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/renovasi/detail_status_my_hajat_renovasi', $data);
        }

        ///////////////// SEWA //////////////////
        //Menampilkan semua ticket APPROVED pada produk my hajat kategori sewa jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'approved_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/sewa/my_hajat_sewa_list', $data);
        }
        //Menampilkan halaman ticket APPROVED pada produk my hajat kategori sewa dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_sewa', ['id_sewa' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_sewa', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_sewa = tb_my_hajat_sewa.id_sewa AND 
                                                                tb_my_hajat_sewa.id_sewa = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/sewa/detail_status_my_hajat_sewa', $data);
        }

        ///////////////// WEDDING //////////////////
        //Menampilkan semua ticket APPROVED pada produk my hajat kategori wedding jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'approved_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/wedding/my_hajat_wedding_list', $data);
        }
        //Menampilkan ticket APPROVED pada produk my hajat kategori wedding dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_wedding', ['id_wedding' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_wedding', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_wedding = tb_my_hajat_wedding.id_wedding AND 
                                                                tb_my_hajat_wedding.id_wedding = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/wedding/detail_status_my_hajat_wedding', $data);
        }

        ///////////////// FRANCHISE //////////////////
        //Menampilkan semua ticket APPROVED pada produk my hajat kategori franchise jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'approved_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/franchise/my_hajat_franchise_list', $data);
        }
        //Menampilkan ticket APPROVED pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_franchise', ['id_franchise' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_franchise', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_franchise = tb_my_hajat_franchise.id_franchise AND 
                                                                tb_my_hajat_franchise.id_franchise = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/franchise/detail_status_my_hajat_franchise', $data);
        }

        ///////////////// LAINNYA //////////////////
        //Menampilkan semua ticket APPROVED pada produk my hajat kategori lainnya jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'lainnya' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_lainnya', 'approved_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/lainnya/my_hajat_lainnya_list', $data);
        }
        //Menampilkan ticket APPROVED pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'lainnya' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_lainnya', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myhajat_lainnya = tb_my_hajat_lainnya.id_myhajat_lainnya AND 
                                                                tb_my_hajat_lainnya.id_myhajat_lainnya = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/lainnya/detail_status_my_hajat_lainnya', $data);
        }

        ////////////////////////////// MY IHRAM /////////////////////////////////////////

        //menampilkan status tiket produk Ihram yang telah APPROVED oleh admin 1 dan admin 2
        if ($produk == 'myihram' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_ihram', 'approved_review', $this->id_user)->result();
            $this->template->load('template2', 'my_ihram/my_ihram_list', $data);
        }
        //Menampilkan ticket apprvoed pada produk Ihram dengan $id tertentu
        if ($produk == 'myihram' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_ihram', ['id_myihram' => $id, 'id_approval' => 2])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_ihram', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myihram = tb_my_ihram.id_myihram AND 
                                                                tb_my_ihram.id_myihram = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_ihram/detail_status_my_ihram', $data);
        }

        ////////////////////////////// MY Safar /////////////////////////////////////////

        //menampilkan status tiket produk Safar yang telah APPROVED oleh admin 1 dan admin 2
        if ($produk == 'mysafar' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_safar', 'approved_review', $this->id_user)->result();
            $this->template->load('template2', 'my_safar/my_safar_list', $data);
        }
        //Menampilkan ticket apprvoed pada produk safar dengan $id tertentu
        if ($produk == 'mysafar' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_safar', ['id_mysafar' => $id, 'id_approval' => 2])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_safar', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mysafar = tb_my_safar.id_mysafar AND 
                                                                tb_my_safar.id_mysafar = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_safar/detail_status_my_safar', $data);
        }

        ////////////////////////////// Aktivasi Agent /////////////////////////////////////////
        if ($produk == 'aktivasi_agent' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_aktivasi_agent', 'approved_review', $this->id_user)->result();
            $this->template->load('template2', 'aktivasi_agent/aktivasi_agent_list', $data);
        }

        if ($produk == 'aktivasi_agent' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_aktivasi_agent', ['id_agent' => $id, 'id_approval' => 2])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_aktivasi_agent', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_agent = tb_aktivasi_agent.id_agent AND 
                                                                tb_aktivasi_agent.id_agent = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'aktivasi_agent/detail_status_aktivasi_agent', $data);
        }

        ////////////////////////////// NST /////////////////////////////////////////
        if ($produk == 'nst' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_nst', 'approved_review', $this->id_user)->result();
            $this->template->load('template2', 'nst/nst_list', $data);
        }
        if ($produk == 'nst' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_nst', ['id_nst' => $id, 'id_approval' => 2])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_nst', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_nst = tb_nst.id_nst AND 
                                                                tb_nst.id_nst = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'nst/detail_status_nst', $data);
        }

        ////////////////////////////// LEAD MANAGEMENT /////////////////////////////////////////
        if ($produk == 'lead_management' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_lead_management', 'approved_review', $this->id_user)->result();
            $this->template->load('template2', 'lead_management/lead_management_list', $data);
        }
        if ($produk == 'lead_management' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_lead_management', ['id_lead' => $id, 'id_approval' => 2])->row();

            $data['komentar'] = $this->comment_m->get_comment('tb_lead_management', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_lead = tb_lead_management.id_lead AND 
                                                                tb_lead_management.id_lead = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'lead_management/detail_status_lead_management', $data);
        }
    }

    //MENAMPILKAN DATA TIKET YANG DITOLAK
    public function rejected($produk = NULL, $kategori = NULL, $id = NULL)
    {
        ////////////////////////////// MY TA'LIM /////////////////////////////////////////
        //menampilkan status tiket produk mytalim yang telah dtolak oleh admin 1 dan admin 2
        if ($produk == 'mytalim' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_talim', 'rejected_review', $this->id_user)->result();
            $this->template->load('template2', 'my_talim/my_talim_list', $data);
        }
        //Menampilkan ticket rejected pada produk my ta'lim dengan $id tertentu
        if ($produk == 'mytalim' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 1])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_talim', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mytalim = tb_my_talim.id_mytalim AND 
                                                                tb_my_talim.id_mytalim = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_talim/detail_status_my_talim', $data);
        }

        ////////////////////////////// MY HAJAT /////////////////////////////////////////

        ///////////////// RENOVASI //////////////////
        //Menampilkan semua ticket yang REJECTED pada produk my hajat kategori renovasi jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'rejected_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/renovasi/my_hajat_renovasi_list', $data);
        }
        //Menampilkan ticket yang REJECTED pada produk my hajat dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_renovasi', ['id_renovasi' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_renovasi', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_renovasi = tb_my_hajat_renovasi.id_renovasi AND 
                                                                tb_my_hajat_renovasi.id_renovasi = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/renovasi/detail_status_my_hajat_renovasi', $data);
        }

        ///////////////// SEWA //////////////////
        //Menampilkan semua ticket yang REJECTED pada produk my hajat kategori sewa jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'rejected_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/sewa/my_hajat_sewa_list', $data);
        }
        //Menampilkan halaman ticket yang REJECTED pada produk my hajat kategori sewa dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_sewa', ['id_sewa' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_sewa', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_sewa = tb_my_hajat_sewa.id_sewa AND 
                                                                tb_my_hajat_sewa.id_sewa = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/sewa/detail_status_my_hajat_sewa', $data);
        }

        ///////////////// WEDDING //////////////////
        //Menampilkan semua ticket yang REJECTED pada produk my hajat kategori wedding jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'rejected_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/wedding/my_hajat_wedding_list', $data);
        }
        //Menampilkan ticket yang REJECTED pada produk my hajat kategori wedding dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_wedding', ['id_wedding' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_wedding', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_wedding = tb_my_hajat_wedding.id_wedding AND 
                                                                tb_my_hajat_wedding.id_wedding = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/wedding/detail_status_my_hajat_wedding', $data);
        }

        ///////////////// FRANCHISE //////////////////
        //Menampilkan semua ticket yang REJECTED pada produk my hajat kategori franchise jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'rejected_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/franchise/my_hajat_franchise_list', $data);
        }
        //Menampilkan ticket yang REJECTED pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_franchise', ['id_franchise' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_franchise', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_franchise = tb_my_hajat_franchise.id_franchise AND 
                                                                tb_my_hajat_franchise.id_franchise = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/franchise/detail_status_my_hajat_franchise', $data);
        }

        ///////////////// LAINNYA //////////////////
        //Menampilkan semua ticket REJECTED pada produk my hajat kategori lainnya jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'lainnya' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_lainnya', 'rejected_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/lainnya/my_hajat_lainnya_list', $data);
        }
        //Menampilkan ticket REJECTED pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'lainnya' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_lainnya', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myhajat_lainnya = tb_my_hajat_lainnya.id_myhajat_lainnya AND 
                                                                tb_my_hajat_lainnya.id_myhajat_lainnya = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/lainnya/detail_status_my_hajat_lainnya', $data);
        }

        ////////////////////////////// MY IHRAM /////////////////////////////////////////

        //menampilkan status tiket produk Ihram yang telah REJECTED oleh admin 1 dan admin 2
        if ($produk == 'myihram' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_ihram', 'rejected_review', $this->id_user)->result();
            $this->template->load('template2', 'my_ihram/my_ihram_list', $data);
        }
        //Menampilkan ticket apprvoed pada produk Ihram dengan $id tertentu
        if ($produk == 'myihram' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_ihram', ['id_myihram' => $id, 'id_approval' => 1])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_ihram', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myihram = tb_my_ihram.id_myihram AND 
                                                                tb_my_ihram.id_myihram = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();

            $this->template->load('template2', 'my_ihram/detail_status_my_ihram', $data);
        }

        ////////////////////////////// MY Safar /////////////////////////////////////////

        //menampilkan status tiket produk Safar yang telah REJECTED oleh admin 1 dan admin 2
        if ($produk == 'mysafar' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_safar', 'rejected_review', $this->id_user)->result();
            $this->template->load('template2', 'my_safar/my_safar_list', $data);
        }
        //Menampilkan ticket apprvoed pada produk safar dengan $id tertentu
        if ($produk == 'mysafar' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_safar', ['id_mysafar' => $id, 'id_approval' => 1])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_safar', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mysafar = tb_my_safar.id_mysafar AND 
                                                                tb_my_safar.id_mysafar = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_safar/detail_status_my_safar', $data);
        }

        ////////////////////////////// Aktivasi Agent /////////////////////////////////////////
        if ($produk == 'aktivasi_agent' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_aktivasi_agent', 'rejected_review', $this->id_user)->result();
            $this->template->load('template2', 'aktivasi_agent/aktivasi_agent_list', $data);
        }
        if ($produk == 'aktivasi_agent' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_aktivasi_agent', ['id_mysafar' => $id, 'id_approval' => 1])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_aktivasi_agent', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mysafar = tb_aktivasi_agent.id_mysafar AND 
                                                                tb_aktivasi_agent.id_mysafar = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'aktivasi_agent/detail_status_aktivasi_agent', $data);
        }

        ////////////////////////////// NST /////////////////////////////////////////
        if ($produk == 'nst' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_nst', 'rejected_review', $this->id_user)->result();
            $this->template->load('template2', 'nst/nst_list', $data);
        }
        if ($produk == 'nst' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_nst', ['id_nst' => $id, 'id_approval' => 1])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_nst', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_nst = tb_nst.id_nst AND 
                                                                tb_nst.id_nst = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'nst/detail_status_nst', $data);
        }

        ////////////////////////////// LEAD MANAGEMENT /////////////////////////////////////////
        if ($produk == 'lead_management' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_lead_management', 'rejected_review', $this->id_user)->result();
            $this->template->load('template2', 'lead_management/lead_management_list', $data);
        }
        if ($produk == 'lead_management' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_lead_management', ['id_lead' => $id, 'id_approval' => 1])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_lead_management', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_lead = tb_lead_management.id_lead AND 
                                                                tb_lead_management.id_lead = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'lead_management/detail_status_lead_management', $data);
        }
    }

    public function completed($produk = NULL, $kategori = NULL, $id = NULL)
    {
        ////////////////////////////// MY TA'LIM /////////////////////////////////////////
        //menampilkan status tiket produk mytalim yang telah COMPLETED oleh dan admin 2
        if ($produk == 'mytalim' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_talim', 'completed_review', $this->id_user)->result();
            $this->template->load('template2', 'my_talim/my_talim_list', $data);
        }
        //Menampilkan ticket yang telah COMPLETED pada produk my ta'lim dengan $id tertentu
        if ($produk == 'mytalim' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 3])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_talim', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mytalim = tb_my_talim.id_mytalim AND 
                                                                tb_my_talim.id_mytalim = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_talim/detail_status_my_talim', $data);
        }

        ////////////////////////////// MY HAJAT /////////////////////////////////////////

        ///////////////// RENOVASI //////////////////
        //Menampilkan semua ticket yang COMPLETED pada produk my hajat kategori renovasi jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'completed_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/renovasi/my_hajat_renovasi_list', $data);
        }
        //Menampilkan ticket yang COMPLETED pada produk my hajat dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_renovasi', ['id_renovasi' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_renovasi', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_renovasi = tb_my_hajat_renovasi.id_renovasi AND 
                                                                tb_my_hajat_renovasi.id_renovasi = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/renovasi/detail_status_my_hajat_renovasi', $data);
        }

        ///////////////// SEWA //////////////////
        //Menampilkan semua ticket yang COMPLETED pada produk my hajat kategori sewa jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'completed_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/sewa/my_hajat_sewa_list', $data);
        }
        //Menampilkan halaman ticket yang COMPLETED pada produk my hajat kategori sewa dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_sewa', ['id_sewa' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_sewa', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_sewa = tb_my_hajat_sewa.id_sewa AND 
                                                                tb_my_hajat_sewa.id_sewa = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/sewa/detail_status_my_hajat_sewa', $data);
        }

        ///////////////// WEDDING //////////////////
        //Menampilkan semua ticket yang COMPLETED pada produk my hajat kategori wedding jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'completed_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/wedding/my_hajat_wedding_list', $data);
        }
        //Menampilkan ticket yang COMPLETED pada produk my hajat kategori wedding dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_wedding', ['id_wedding' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_wedding', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_wedding = tb_my_hajat_wedding.id_wedding AND 
                                                                tb_my_hajat_wedding.id_wedding = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/wedding/detail_status_my_hajat_wedding', $data);
        }

        ///////////////// FRANCHISE //////////////////
        //Menampilkan semua ticket yang COMPLETED pada produk my hajat kategori franchise jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'completed_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/franchise/my_hajat_franchise_list', $data);
        }
        //Menampilkan ticket yang COMPLETED pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_franchise', ['id_franchise' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_franchise', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_franchise = tb_my_hajat_franchise.id_franchise AND 
                                                                tb_my_hajat_franchise.id_franchise = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/franchise/detail_status_my_hajat_franchise', $data);
        }

        ///////////////// LAINNYA //////////////////
        //Menampilkan semua ticket COMPLETED pada produk my hajat kategori lainnya jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'lainnya' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_lainnya', 'completed_review', $this->id_user)->result();
            $this->template->load('template2', 'my_hajat/franchise/my_hajat_lainnya_list', $data);
        }
        //Menampilkan ticket COMPLETED pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'lainnya' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_lainnya', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myhajat_lainnya = tb_my_hajat_lainnya.id_myhajat_lainnya AND 
                                                                tb_my_hajat_lainnya.id_myhajat_lainnya = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_hajat/lainnya/detail_status_my_hajat_lainnya', $data);
        }

        ////////////////////////////// MY IHRAM /////////////////////////////////////////

        //menampilkan status tiket produk Ihram yang telah diapprove oleh admin 1 dan admin 2
        if ($produk == 'myihram' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_ihram', 'completed_review', $this->id_user)->result();
            $this->template->load('template2', 'my_ihram/my_ihram_list', $data);
        }
        //Menampilkan ticket apprvoed pada produk Ihram dengan $id tertentu
        if ($produk == 'myihram' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_ihram', ['id_myihram' => $id, 'id_approval' => 3])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_ihram', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_myihram = tb_my_ihram.id_myihram AND 
                                                                tb_my_ihram.id_myihram = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();

            $this->template->load('template2', 'my_ihram/detail_status_my_ihram', $data);
        }

        ////////////////////////////// MY Safar /////////////////////////////////////////

        //menampilkan status tiket produk Safar yang telah diapprove oleh admin 1 dan admin 2
        if ($produk == 'mysafar' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_safar', 'completed_review', $this->id_user)->result();
            $this->template->load('template2', 'my_safar/my_safar_list', $data);
        }
        //Menampilkan ticket apprvoed pada produk safar dengan $id tertentu
        if ($produk == 'mysafar' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_safar', ['id_mysafar' => $id, 'id_approval' => 3])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_safar', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mysafar = tb_my_safar.id_mysafar AND 
                                                                tb_my_safar.id_mysafar = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'my_safar/detail_status_my_safar', $data);
        }

        ////////////////////////////// Aktivasi Agent /////////////////////////////////////////
        if ($produk == 'aktivasi_agent' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_aktivasi_agent', 'completed_review', $this->id_user)->result();
            $this->template->load('template2', 'aktivasi_agent/aktivasi_agent_list', $data);
        }
        if ($produk == 'aktivasi_agent' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_aktivasi_agent', ['id_mysafar' => $id, 'id_approval' => 3])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_aktivasi_agent', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_mysafar = tb_aktivasi_agent.id_mysafar AND 
                                                                tb_aktivasi_agent.id_mysafar = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'aktivasi_agent/detail_status_aktivasi_agent', $data);
        }

        ////////////////////////////// NST /////////////////////////////////////////
        if ($produk == 'nst' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_nst', 'completed_review', $this->id_user)->result();
            $this->template->load('template2', 'nst/nst_list', $data);
        }
        if ($produk == 'nst' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_nst', ['id_nst' => $id, 'id_approval' => 3])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_nst', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_nst = tb_nst.id_nst AND 
                                                                tb_nst.id_nst = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'nst/detail_status_nst', $data);
        }

        ////////////////////////////// LEAD MANAGEMENT /////////////////////////////////////////
        if ($produk == 'lead_management' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_lead_management', 'completed_review', $this->id_user)->result();
            $this->template->load('template2', 'lead_management/lead_management_list', $data);
        }
        if ($produk == 'lead_management' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_lead_management', ['id_lead' => $id, 'id_approval' => 3])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_lead_management', 'parent_comment_id = 0 AND 
                                                                tb_comment.id_lead = tb_lead_management.id_lead AND 
                                                                tb_lead_management.id_lead = ' . $id . ' AND
                                                                tb_comment.id_user = user.id_user AND
                                                                user.id_cabang = tb_cabang.id_cabang')->result();
            $this->template->load('template2', 'lead_management/detail_status_lead_management', $data);
        }
    }
}
