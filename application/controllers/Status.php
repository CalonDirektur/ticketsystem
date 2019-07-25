<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
    public $id_cabang;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aksi_Admin2_m');
        $this->load->model('data_m');
        $this->load->model('comment_m');

        $id_cabang = NULL;
        if($this->fungsi->user_login()->id_cabang != 46){
			$this->id_cabang = $this->fungsi->user_login()->id_cabang;
		} else {
			$this->id_cabang = NULL;
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
                $data['data'] = $this->data_m->get('tb_my_talim', 'pending_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_talim/my_talim_pending', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'pending_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/renovasi/my_hajat_renovasi_pending', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'pending_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/sewa/my_hajat_sewa_pending', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'pending_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/wedding/my_hajat_wedding_pending', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'pending_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/franchise/my_hajat_franchise_pending', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_lainnya', 'pending_review', $this->id_cabang)->result();
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
    }

    public function approved($produk = NULL, $kategori = NULL, $id = NULL)
    {
        ////////////////////////////// MY TA'LIM /////////////////////////////////////////

        //menampilkan status tiket produk mytalim yang telah diapprove oleh admin 1 dan admin 2
        if ($produk == 'mytalim' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_talim', 'approved_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_talim/my_talim_approved', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'approved_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/renovasi/my_hajat_renovasi_approved', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'approved_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/sewa/my_hajat_sewa_approved', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'approved_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/wedding/my_hajat_wedding_approved', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'approved_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/franchise/my_hajat_franchise_approved', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_lainnya', 'approved_review', $this->id_cabang)->result();
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
    }

    //MENAMPILKAN DATA TIKET YANG DITOLAK
    public function rejected($produk = NULL, $kategori = NULL, $id = NULL)
    {
        ////////////////////////////// MY TA'LIM /////////////////////////////////////////
        //menampilkan status tiket produk mytalim yang telah dtolak oleh admin 1 dan admin 2
        if ($produk == 'mytalim' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_talim', 'rejected_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_talim/my_talim_rejected', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'rejected_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/renovasi/my_hajat_renovasi_rejected', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'rejected_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/sewa/my_hajat_sewa_rejected', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'rejected_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/wedding/my_hajat_wedding_rejected', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'rejected_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/franchise/my_hajat_franchise_rejected', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_lainnya', 'rejected_review', $this->id_cabang)->result();
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
    }

    public function completed($produk = NULL, $kategori = NULL, $id = NULL)
    {
        ////////////////////////////// MY TA'LIM /////////////////////////////////////////
        //menampilkan status tiket produk mytalim yang telah COMPLETED oleh dan admin 2
        if ($produk == 'mytalim' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_talim', 'completed_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_talim/my_talim_completed', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'completed_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/renovasi/my_hajat_renovasi_completed', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'completed_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/sewa/my_hajat_sewa_completed', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'completed_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/wedding/my_hajat_wedding_completed', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'completed_review', $this->id_cabang)->result();
            $this->template->load('template2', 'my_hajat/franchise/my_hajat_franchise_completed', $data);
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
            $data['data'] = $this->data_m->get('tb_my_hajat_lainnya', 'completed_review', $this->id_cabang)->result();
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
    }
}
