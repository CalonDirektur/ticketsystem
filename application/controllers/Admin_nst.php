<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_nst extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aksi_Admin_nst');
        $this->load->model('data_m');
    }

    public function approve($produk, $kategori = NULL, $id)
    {
        if ($produk == 'lead_management') {
            $this->Aksi_Admin_nst->approve('tb_lead_management', ['id_lead' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Update request support Lead Management!</div>');
            redirect('/');
        }

        if ($produk == 'nst') {
            $this->Aksi_Admin_nst->approve('tb_nst', ['id_nst' => $id]);
            $this->session->set_flashdata('berhasil_approve', '<div class="alert alert-success" role="alert"> Berhasil Approve request support NST!</div>');
            redirect('/');
        }
    }

    public function reject($produk, $kategori = NULL, $id)
    {
        if ($produk == 'lead_management') {
            $this->Aksi_Admin_nst->reject('tb_lead_management', ['id_lead' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support Lead Management!</div>');
            redirect('/');
        }

        if ($produk == 'nst') {
            $this->Aksi_Admin_nst->reject('tb_nst', ['id_nst' => $id]);
            $this->session->set_flashdata('berhasil_reject', '<div class="alert alert-success" role="alert"> Berhasil Reject request support NST!</div>');
            redirect('/');
        }
    }

    public function complete($produk, $kategori = NULL, $id)
    {

        if ($produk == 'nst') {
            $this->Aksi_Admin_nst->complete('tb_nst', ['id_nst' => $id]);
            $this->session->set_flashdata('berhasil_completed', '<div class="alert alert-success" role="alert"> Berhasil Menyelesaikan request support NST!</div>');
            redirect('/');
        }
    }
}
