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

    public function approve($id)
    {
        $this->Aksi_m->approve(['id_ticket' => $id]);
        $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support ID Ticket #' . $id . '</div>');
        if ($this->session->userdata('level') == 8) {
            redirect('status/list/alokasi_dana_list');
        } else {
            redirect('status');
        }
    }

    public function reject($id)
    {
        $this->Aksi_m->reject(['id_ticket' => $id]);
        $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support ID Ticket #' . $id . '</div>');
        if ($this->session->userdata('level') == 8) {
            redirect('status/list/alokasi_dana_list');
        } else {
            redirect('status');
        }
    }

    public function reject_nst()
    {
        $post = $this->input->post(NULL, TRUE);

        $this->Aksi_m->reject(['id_ticket' => $post['id_ticket']]);
        $this->Aksi_m->reject(['id_nst' => $post['id_nst_reject']]);
        $this->data_m->update('tb_nst', ['alasan_reject' => $post['alasan_reject']], ['id_nst' => $post['id_nst_reject']]);
        $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support NST!</div>');

        redirect('status/');
    }

    //menyelesaikan support ticket
    public function complete($id)
    {
        $this->Aksi_m->complete(['id_ticket' => $id]);
        $this->session->set_flashdata('berhasil_complete', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support ID Ticket #' . $id . '</div>');
        if ($this->session->userdata('level') == 8) {
            redirect('status/list/alokasi_dana_list');
        } else {
            redirect('status');
        }
    }
}
