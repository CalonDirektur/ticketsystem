<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aksi_Admin2_m');
        $this->load->model('data_m');
        $this->load->model('comment_m');
    }

    //PENDING TICKETS (WAITING TO BE REVIEWED)
    public function pending($produk = NULL, $kategori = NULL, $id = NULL)
    {
        ////////////////////////////// MY TA'LIM /////////////////////////////////////////
        //Menampilkan semua ticket pending pada produk my ta'lim jika $id tidak diisi
        if ($produk == 'mytalim' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_talim', 'pending_review')->result();
            $this->template->load('template', 'my_talim/my_talim_pending', $data);
        }
        //Menampilkan ticket pending pada produk my ta'lim dengan $id tertentu
        if ($produk == 'mytalim' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 0])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_talim','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_talim.id_mytalim AND id_mytalim = '.$id)->result();
            $this->template->load('template', 'my_talim/detail_status_my_talim', $data);
        }

        ////////////////////////////// MY HAJAT /////////////////////////////////////////

        ///////////////// RENOVASI //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori renovasi jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'pending_review')->result();
            $this->template->load('template', 'my_hajat/renovasi/my_hajat_renovasi_pending', $data);
        }
        //Menampilkan ticket pending pada produk my hajat dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_renovasi', ['id_renovasi' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_renovasi','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_renovasi.id_renovasi AND id_renovasi = '.$id)->result();
            $this->template->load('template', 'my_hajat/renovasi/detail_status_my_hajat_renovasi', $data);
        }

        ///////////////// SEWA //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori sewa jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'pending_review')->result();
            $this->template->load('template', 'my_hajat/sewa/my_hajat_sewa_pending', $data);
        }
        //Menampilkan halaman ticket pending pada produk my hajat kategori sewa dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_sewa', ['id_sewa' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_sewa','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_sewa.id_sewa AND id_sewa = '.$id)->result();
            $this->template->load('template', 'my_hajat/sewa/detail_status_my_hajat_sewa', $data);
        }

        ///////////////// WEDDING //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori wedding jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'pending_review')->result();
            $this->template->load('template', 'my_hajat/wedding/my_hajat_wedding_pending', $data);
        }
        //Menampilkan ticket pending pada produk my hajat kategori wedding dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_wedding', ['id_wedding' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_wedding','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_wedding.id_wedding AND id_wedding = '.$id)->result();
            $this->template->load('template', 'my_hajat/wedding/detail_status_my_hajat_wedding', $data);
        }

        ///////////////// FRANCHISE //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori franchise jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'pending_review')->result();
            $this->template->load('template', 'my_hajat/franchise/my_hajat_franchise_pending', $data);
        }
        //Menampilkan ticket pending pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_franchise', ['id_franchise' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_franchise','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_franchise.id_franchise AND id_franchise = '.$id)->result();
            $this->template->load('template', 'my_hajat/franchise/detail_status_my_hajat_franchise', $data);
        }
    }

    public function approved($produk = NULL, $kategori = NULL, $id = NULL)
    {
        ////////////////////////////// MY TA'LIM /////////////////////////////////////////

        //menampilkan status tiket produk mytalim yang telah diapprove oleh admin 1 dan admin 2
        if ($produk == 'mytalim' && $kategori == NULL && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_talim', 'approved_review')->result();
            $this->template->load('template', 'my_talim/my_talim_approved', $data);
        }
        //Menampilkan ticket apprvoed pada produk my ta'lim dengan $id tertentu
        if ($produk == 'mytalim' && $kategori != NULL && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 2])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_talim', 'parent_comment_id = 0 AND tb_comment.id_comment = tb_my_talim.id_mytalim AND id_mytalim = '.$id)->result();
            $this->template->load('template', 'my_talim/detail_status_my_talim', $data);
        }

        ////////////////////////////// MY HAJAT /////////////////////////////////////////

        ///////////////// RENOVASI //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori renovasi jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'approved_review')->result();
            $this->template->load('template', 'my_hajat/renovasi/my_hajat_renovasi_approved', $data);
        }
        //Menampilkan ticket pending pada produk my hajat dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_renovasi', ['id_renovasi' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_renovasi','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_renovasi.id_renovasi AND id_renovasi = '.$id)->result();
            $this->template->load('template', 'my_hajat/renovasi/detail_status_my_hajat_renovasi', $data);
        }

        ///////////////// SEWA //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori sewa jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'approved_review')->result();
            $this->template->load('template', 'my_hajat/sewa/my_hajat_sewa_approved', $data);
        }
        //Menampilkan halaman ticket pending pada produk my hajat kategori sewa dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_sewa', ['id_sewa' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_sewa','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_sewa.id_sewa AND id_sewa = '.$id)->result();
            $this->template->load('template', 'my_hajat/sewa/detail_status_my_hajat_sewa', $data);
        }

        ///////////////// WEDDING //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori wedding jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'approved_review')->result();
            $this->template->load('template', 'my_hajat/wedding/my_hajat_wedding_approved', $data);
        }
        //Menampilkan ticket pending pada produk my hajat kategori wedding dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_wedding', ['id_wedding' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_wedding','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_wedding.id_wedding AND id_wedding = '.$id)->result();
            $this->template->load('template', 'my_hajat/wedding/detail_status_my_hajat_wedding', $data);
        }

        ///////////////// FRANCHISE //////////////////
        //Menampilkan semua ticket pending pada produk my hajat kategori franchise jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'approved_review')->result();
            $this->template->load('template', 'my_hajat/franchise/my_hajat_franchise_approved', $data);
        }
        //Menampilkan ticket pending pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_franchise', ['id_franchise' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_franchise','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_franchise.id_franchise AND id_franchise = '.$id)->result();
            $this->template->load('template', 'my_hajat/franchise/detail_status_my_hajat_franchise', $data);
        }
    }

    //MENAMPILKAN DATA TIKET YANG DITOLAK
    public function rejected($produk = NULL, $kategori = NULL, $id = NULL)
    {
        ////////////////////////////// MY TA'LIM /////////////////////////////////////////
        //menampilkan status tiket produk mytalim yang telah dtolak oleh admin 1 dan admin 2
        if ($produk == 'mytalim' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_talim', 'rejected_review')->result();
            $this->template->load('template', 'my_talim/my_talim_rejected', $data);
        }
        //Menampilkan ticket rejected pada produk my ta'lim dengan $id tertentu
        if ($produk == 'mytalim' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 1])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_talim','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_talim.id_mytalim AND id_mytalim = '.$id)->result();
            $this->template->load('template', 'my_talim/detail_status_my_talim', $data);
        }

        ////////////////////////////// MY HAJAT /////////////////////////////////////////

        ///////////////// RENOVASI //////////////////
        //Menampilkan semua ticket yang ditolak pada produk my hajat kategori renovasi jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'rejected_review')->result();
            $this->template->load('template', 'my_hajat/renovasi/my_hajat_renovasi_rejected', $data);
        }
        //Menampilkan ticket yang ditolak pada produk my hajat dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_renovasi', ['id_renovasi' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_renovasi','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_renovasi.id_renovasi AND id_renovasi = '.$id)->result();
            $this->template->load('template', 'my_hajat/renovasi/detail_status_my_hajat_renovasi', $data);
        }

        ///////////////// SEWA //////////////////
        //Menampilkan semua ticket yang ditolak pada produk my hajat kategori sewa jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'rejected_review')->result();
            $this->template->load('template', 'my_hajat/sewa/my_hajat_sewa_rejected', $data);
        }
        //Menampilkan halaman ticket yang ditolak pada produk my hajat kategori sewa dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_sewa', ['id_sewa' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_sewa','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_sewa.id_sewa AND id_sewa = '.$id)->result();
            $this->template->load('template', 'my_hajat/sewa/detail_status_my_hajat_sewa', $data);
        }

        ///////////////// WEDDING //////////////////
        //Menampilkan semua ticket yang ditolak pada produk my hajat kategori wedding jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'rejected_review')->result();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_wedding','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_wedding.id_wedding AND id_wedding = '.$id)->result();
            $this->template->load('template', 'my_hajat/wedding/my_hajat_wedding_rejected', $data);
        }
        //Menampilkan ticket yang ditolak pada produk my hajat kategori wedding dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_wedding', ['id_wedding' => $id])->row();
            $this->template->load('template', 'my_hajat/wedding/detail_status_my_hajat_wedding', $data);
        }

        ///////////////// FRANCHISE //////////////////
        //Menampilkan semua ticket yang ditolak pada produk my hajat kategori franchise jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'rejected_review')->result();
            $this->template->load('template', 'my_hajat/franchise/my_hajat_franchise_rejected', $data);
        }
        //Menampilkan ticket yang ditolak pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_franchise', ['id_franchise' => $id])->row();
            $data['komentar'] = $this->comment_m->get_comment('tb_my_hajat_franchise','parent_comment_id = 0 AND tb_comment.id_comment = tb_my_hajat_franchise.id_franchise AND id_franchise = '.$id)->result();
            $this->template->load('template', 'my_hajat/franchise/detail_status_my_hajat_franchise', $data);
        }
    }

    public function completed($produk = NULL, $kategori = NULL, $id = NULL)
    {
        ////////////////////////////// MY TA'LIM /////////////////////////////////////////
        //menampilkan status tiket produk mytalim yang telah diselesaikan oleh dan admin 2
        if ($produk == 'mytalim' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_talim', 'completed_review')->result();
            $this->template->load('template', 'my_talim/my_talim_completed', $data);
        }
        //Menampilkan ticket yang telah diselesaikan pada produk my ta'lim dengan $id tertentu
        if ($produk == 'mytalim' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 3])->row();
            $data['komentar'] = $this->comment_m->get_comment('parent_comment_id = 0 AND tb_comment.id_comment = tb_my_talim.id_mytalim AND id_mytalim = '.$id)->result();
            $this->template->load('template', 'my_talim/detail_status_my_talim', $data);
        }

        ////////////////////////////// MY HAJAT /////////////////////////////////////////

        ///////////////// RENOVASI //////////////////
        //Menampilkan semua ticket yang diselesaikan pada produk my hajat kategori renovasi jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_renovasi', 'completed_review')->result();
            $this->template->load('template', 'my_hajat/renovasi/my_hajat_renovasi_completed', $data);
        }
        //Menampilkan ticket yang diselesaikan pada produk my hajat dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'renovasi' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_renovasi', ['id_renovasi' => $id])->row();
            $this->template->load('template', 'my_hajat/renovasi/detail_status_my_hajat_renovasi', $data);
        }

        ///////////////// SEWA //////////////////
        //Menampilkan semua ticket yang diselesaikan pada produk my hajat kategori sewa jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_sewa', 'completed_review')->result();
            $this->template->load('template', 'my_hajat/sewa/my_hajat_sewa_completed', $data);
        }
        //Menampilkan halaman ticket yang diselesaikan pada produk my hajat kategori sewa dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'sewa' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_sewa', ['id_sewa' => $id])->row();
            $this->template->load('template', 'my_hajat/sewa/detail_status_my_hajat_sewa', $data);
        }

        ///////////////// WEDDING //////////////////
        //Menampilkan semua ticket yang diselesaikan pada produk my hajat kategori wedding jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_wedding', 'completed_review')->result();
            $this->template->load('template', 'my_hajat/wedding/my_hajat_wedding_completed', $data);
        }
        //Menampilkan ticket yang diselesaikan pada produk my hajat kategori wedding dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'wedding' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_wedding', ['id_wedding' => $id])->row();
            $this->template->load('template', 'my_hajat/wedding/detail_status_my_hajat_wedding', $data);
        }

        ///////////////// FRANCHISE //////////////////
        //Menampilkan semua ticket yang diselesaikan pada produk my hajat kategori franchise jika $id tidak diisi
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id == NULL) {
            $data['data'] = $this->data_m->get('tb_my_hajat_franchise', 'completed_review')->result();
            $this->template->load('template', 'my_hajat/franchise/my_hajat_franchise_completed', $data);
        }
        //Menampilkan ticket yang diselesaikan pada produk my hajat kategori franchise dengan $id tertentu
        if ($produk == 'myhajat' && $kategori == 'franchise' && $id != NULL) {
            $data['data'] = $this->data_m->get_by_id('tb_my_hajat_franchise', ['id_franchise' => $id])->row();
            $this->template->load('template', 'my_hajat/franchise/detail_status_my_hajat_franchise', $data);
        }
    }
}
