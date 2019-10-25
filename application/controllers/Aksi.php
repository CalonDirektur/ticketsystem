<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aksi_m');
        $this->load->model('data_m');
    }

    public function approve($produk = NULL, $kategori, $id)
    {
        if ($produk == 'mytalim') {
            $this->Aksi_m->approve('tb_my_talim', ['id_mytalim' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Talim ID!</div>');
            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'renovasi') {
            $this->Aksi_m->approve('tb_my_hajat_renovasi', ['id_renovasi' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Talim!</div>');
            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'sewa') {
            $this->Aksi_m->approve('tb_my_hajat_sewa', ['id_sewa' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Hajat!</div>');
            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'wedding') {
            $this->Aksi_m->approve('tb_my_hajat_wedding', ['id_wedding' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Hajat!</div>');
            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'franchise') {
            $this->Aksi_m->approve('tb_my_hajat_franchise', ['id_franchise' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Hajat!</div>');
            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'lainnya') {
            $this->Aksi_m->approve('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Hajat!</div>');
            redirect('status/');
        }

        if ($produk == 'myihram') {
            $this->Aksi_m->approve('tb_my_ihram', ['id_myihram' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Ihram!</div>');
            redirect('status/');
        }

        if ($produk == 'mysafar') {
            $this->Aksi_m->approve('tb_my_safar', ['id_mysafar' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Safar!</div>');
            redirect('status/');
        }

        if ($produk == 'nst') {
            $this->Aksi_m->approve('tb_nst', ['id_nst' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support NST!</div>');
            redirect('status/');
        }

        if ($produk == 'aktivasi_agent') {
            $this->Aksi_m->approve('tb_aktivasi_agent', ['id_agent' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support Aktivasi Agent!</div>');
            redirect('status/');
        }

        if ($produk == 'lead_interest') {
            $this->Aksi_m->approve('tb_lead_interest', ['id_lead_interest' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support Lead Interest!</div>');
            redirect('status/');
        }

        if ($produk == 'mitra_kerjasama') {
            $this->Aksi_m->approve('tb_mitra_kerjasama', ['id_mitra_kerjasama' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support Mitra Kerjasama!</div>');
            redirect('status/');
        }

        if ($produk == 'mycars') {
            $this->Aksi_m->approve('tb_my_cars', ['id_mycars' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My CarS!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'id') {
            $this->Aksi_m->approve('tb_my_faedah', ['id_myfaedah' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Faedah!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'bangunan') {
            $this->Aksi_m->approve('tb_my_faedah_bangunan', ['id_bangunan' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Faedah kategori bangunan!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'qurban') {
            $this->Aksi_m->approve('tb_my_faedah_qurban', ['id_qurban' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Faedah kategori qurban!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'elektronik') {
            $this->Aksi_m->approve('tb_my_faedah_elektronik', ['id_elektronik' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Faedah kategori elektronik!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'modal') {
            $this->Aksi_m->approve('tb_my_faedah_modal', ['id_modal' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Faedah kategori modal!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'lainnya') {
            $this->Aksi_m->approve('tb_my_faedah_lainnya', ['id_myfaedah_lainnya' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support My Faedah kategori lainnya!</div>');
            redirect('status/');
        }
    }

    public function reject($produk = NULL, $kategori, $id = NULL)
    {
        if ($produk == 'mytalim') {
            $this->Aksi_m->reject('tb_my_talim', ['id_mytalim' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Talim!</div>');
            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'renovasi') {
            $this->Aksi_m->reject('tb_my_hajat_renovasi', ['id_renovasi' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Hajat Renovasi!</div>');
            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'sewa') {
            $this->Aksi_m->reject('tb_my_hajat_sewa', ['id_sewa' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Hajat Sewa!</div>');
            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'wedding') {
            $this->Aksi_m->reject('tb_my_hajat_wedding', ['id_wedding' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Hajat Wedding!</div>');
            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'franchise') {
            $this->Aksi_m->reject('tb_my_hajat_franchise', ['id_franchise' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Hajat Franchise!</div>');
            redirect('status/');
        }

        if ($produk == 'myhajat' && $kategori == 'lainnya') {
            $this->Aksi_m->reject('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Hajat Lainnya!</div>');
            redirect('status/');
        }

        if ($produk == 'myihram') {
            $this->Aksi_m->reject('tb_my_ihram', ['id_myihram' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Ihram!</div>');
            redirect('status/');
        }

        if ($produk == 'mysafar') {
            $this->Aksi_m->reject('tb_my_safar', ['id_mysafar' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Safar!</div>');
            redirect('status/');
        }

        if ($produk == 'nst') {
            $post = $this->input->post(NULL, TRUE);

            $this->data_m->update('tb_nst', ['alasan_reject' => $post['alasan_reject']], ['id_nst' => $post['id_nst_reject']]);
            $this->Aksi_m->reject('tb_nst', ['id_nst' => $post['id_nst_reject']]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support NST!</div>');

            redirect('status/');
        }

        if ($produk == 'aktivasi_agent') {
            $this->Aksi_m->reject('tb_aktivasi_agent', ['id_agent' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support Aktivasi Agent!</div>');
            redirect('status/');
        }

        if ($produk == 'lead_management') {
            $this->Aksi_m->reject('tb_lead_management', ['id_lead' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support Lead Management!</div>');
            redirect('status/');
        }

        if ($produk == 'lead_interest') {
            $this->Aksi_m->reject('tb_lead_interest', ['id_lead_interest' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support Lead Interest!</div>');
            redirect('status/');
        }

        if ($produk == 'mitra_kerjasama') {
            $this->Aksi_m->reject('tb_mitra_kerjasama', ['id_mitra_kerjasama' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support Mitra Kerjasama!</div>');
            redirect('status/');
        }

        if ($produk == 'mycars') {
            $this->Aksi_m->reject('tb_my_cars', ['id_mycars' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My CarS!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'id') {
            $this->Aksi_m->reject('tb_my_faedah', ['id_myfaedah' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Faedah!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'bangunan') {
            $this->Aksi_m->reject('tb_my_faedah_bangunan', ['id_bangunan' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Faedah kategori bangunan!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'qurban') {
            $this->Aksi_m->reject('tb_my_faedah_qurban', ['id_qurban' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Faedah kategori qurban!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'elektronik') {
            $this->Aksi_m->reject('tb_my_faedah_elektronik', ['id_elektronik' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Faedah kategori elektronik!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'modal') {
            $this->Aksi_m->reject('tb_my_faedah_modal', ['id_modal' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Faedah kategori modal!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'lainnya') {
            $this->Aksi_m->reject('tb_my_faedah_lainnya', ['id_myfaedah_lainnya' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support My Faedah kategori lainnya!</div>');
            redirect('status/');
        }
    }

    //menyelesaikan support ticket
    public function complete($produk = NULL, $kategori = NULL, $id)
    {
        //Produk My Ta'lim
        if ($produk == 'mytalim') {
            $this->Aksi_m->complete('tb_my_talim', ['id_mytalim' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Talim ID <a href="' . base_url("status/completed/mytalim/id/" . $id) . '">#' . $id . '</a>!</div>');
            redirect('status/');
        }

        if ($produk == 'myhajat' && $kategori == 'renovasi') {
            $this->Aksi_m->complete('tb_my_hajat_renovasi', ['id_renovasi' => $id]);
            // $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat!</div>');
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat ID <a href="' . base_url("status/completed/myhajat/renovasi/" . $id) . '">#' . $id . '</a>!</div>');

            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'sewa') {
            $this->Aksi_m->complete('tb_my_hajat_sewa', ['id_sewa' => $id]);
            // $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat!</div>');
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat ID <a href="' . base_url("status/completed/myhajat/renovasi/" . $id) . '">#' . $id . '</a>!</div>');
            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'wedding') {
            $this->Aksi_m->complete('tb_my_hajat_wedding', ['id_wedding' => $id]);
            // $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat!</div>');
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat ID <a href="' . base_url("status/completed/myhajat/renovasi/" . $id) . '">#' . $id . '</a>!</div>');
            redirect('status/');
        }
        if ($produk == 'myhajat' && $kategori == 'franchise') {
            $this->Aksi_m->complete('tb_my_hajat_franchise', ['id_franchise' => $id]);
            // $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat!</div>');
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat ID <a href="' . base_url("status/completed/myhajat/renovasi/" . $id) . '">#' . $id . '</a>!</div>');
            redirect('status/');
        }

        if ($produk == 'myhajat' && $kategori == 'lainnya') {
            $this->Aksi_m->complete('tb_my_hajat_lainnya', ['id_myhajat_lainnya' => $id]);
            // $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat!</div>');
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Hajat ID <a href="' . base_url("status/completed/myhajat/renovasi/" . $id) . '">#' . $id . '</a>!</div>');
            redirect('status/');
        }

        if ($produk == 'myihram') {
            $this->Aksi_m->complete('tb_my_ihram', ['id_myihram' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Ihram!</div>');
            redirect('status/');
        }

        if ($produk == 'mysafar') {
            $this->Aksi_m->complete('tb_my_safar', ['id_mysafar' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Safar!</div>');
            redirect('status/');
        }

        if ($produk == 'nst') {
            $this->Aksi_m->complete('tb_nst', ['id_nst' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support NST!</div>');
            redirect('status/');
        }

        if ($produk == 'lead_management') {
            $this->Aksi_m->complete('tb_lead_management', ['id_lead' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support Lead Management!</div>');
            redirect('status/');
        }

        if ($produk == 'lead_interest') {
            $this->Aksi_m->complete('tb_lead_interest', ['id_lead_interest' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support Lead Interest!</div>');
            redirect('status/');
        }

        if ($produk == 'aktivasi_agent') {
            $this->Aksi_m->complete('tb_aktivasi_agent', ['id_agent' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support Aktivasi Agent!</div>');
            redirect('status/');
        }

        if ($produk == 'mitra_kerjasama') {
            $this->Aksi_m->complete('tb_mitra_kerjasama', ['id_mitra_kerjasama' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support Mitra Kerjasama!</div>');
            redirect('status/');
        }

        if ($produk == 'mycars') {
            $this->Aksi_m->complete('tb_my_cars', ['id_mycars' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My CarS!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'id') {
            $this->Aksi_m->complete('tb_my_faedah', ['id_myfaedah' => $id]);
            $this->session->set_flashdata('berhasil_completed', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support My Faedah!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'bangunan') {
            $this->Aksi_m->complete('tb_my_faedah_bangunan', ['id_bangunan' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil menyelesaikan request support My Faedah kategori bangunan!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'qurban') {
            $this->Aksi_m->complete('tb_my_faedah_qurban', ['id_qurban' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil menyelesaikan request support My Faedah kategori qurban!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'elektronik') {
            $this->Aksi_m->complete('tb_my_faedah_elektronik', ['id_elektronik' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil menyelesaikan request support My Faedah kategori elektronik!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'modal') {
            $this->Aksi_m->complete('tb_my_faedah_modal', ['id_modal' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil menyelesaikan request support My Faedah kategori modal!</div>');
            redirect('status/');
        }

        if ($produk == 'myfaedah' && $kategori == 'lainnya') {
            $this->Aksi_m->complete('tb_my_faedah_lainnya', ['id_myfaedah_lainnya' => $id]);
            $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil menyelesaikan request support My Faedah kategori lainnya!</div>');
            redirect('status/');
        }
    }
}
