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
            redirect('/');
        }

        if ($produk == 'nst') {
            $this->Aksi_Admin_nst->approve('tb_nst', ['id_nst' => $id]);
            redirect('/');
        }
    }

    public function reject($produk, $kategori = NULL, $id)
    {
        if ($produk == 'lead_management') {
            $this->Aksi_Admin_nst->reject('tb_lead_management', ['id_lead' => $id]);
            redirect('/');
        }

        if ($produk == 'nst') {
            $this->Aksi_Admin_nst->reject('tb_nst', ['id_nst' => $id]);
            redirect('/');
        }
    }
}
