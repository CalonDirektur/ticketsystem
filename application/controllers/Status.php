<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Aksi_Admin2_m');
		$this->load->model('data_m');
    }

    public function pending($produk = NULL, $id = NULL){
        //Menampilkan semua ticket pending pada produk my ta'lim jika $id tidak diisi
        if($produk == 'mytalim' && $id == NULL){
            $data['data'] = $this->data_m->get('tb_my_talim', 'pending_review')->result_array();
            $this->template->load('template', 'my_talim/my_talim_pending', $data);
        }
        //Menampilkan ticket pending pada produk my ta'lim dengan $id tertentu
        if($produk == 'mytalim' && $id != NULL){
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 0])->row();
            $this->template->load('template', 'my_talim/detail_status_my_talim', $data);
        }
        
        //Menampilkan semua ticket pending pada produk my hajat jika $id tidak diisi
        if($produk == 'myhajat'){
            $data['data'] = $this->data_m->get('tb_my_hajat', 'pending_review')->result_array();
            $this->template->load('template', 'my_talim/my_hajat_pending', $data);
        }
         //Menampilkan ticket pending pada produk my hajat dengan $id tertentu
        if($produk == 'myhajat' && $id != NULL){
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id])->row();
            $this->template->load('template', 'my_talim/detail_status_my_talim', $data);
        }

        }
        
    public function approved($produk = NULL, $id = NULL){
        //menampilkan status tiket produk mytalim yang telah diapprove oleh admin 1 dan admin 2
        if($produk == 'mytalim' && $id == NULL){
            $data['data'] = $this->data_m->get('tb_my_talim', 'status_admin2')->result_array();
            $this->template->load('template', 'my_talim/my_talim_approved', $data);
        }
        //Menampilkan ticket apprvoed pada produk my ta'lim dengan $id tertentu
        if($produk == 'mytalim' && $id != NULL){
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 2]    )->row();
            $this->template->load('template', 'my_talim/detail_status_my_talim', $data);
        }

        //menampilkan status tiket produk hajat yang telah diapprove oleh admin 1 dan admin 2
        if($produk == 'myhajat' && $id == NULL){
            $data['data'] = $this->data_m->get('tb_my_hajat', 'status_admin2')->result_array();
            $this->template->load('template', 'my_talim/my_hajat_approved', $data);
        }
    }

    public function rejected($produk = NULL, $id = NULL){
        //menampilkan status tiket produk mytalim yang telah dtolak oleh admin 1 dan admin 2
        if($produk == 'mytalim' && $id == NULL){
            $data['data'] = $this->data_m->get('tb_my_talim', 'rejected_review')->result_array();
            $this->template->load('template', 'my_talim/my_talim_rejected', $data);
        }
        //Menampilkan ticket rejected pada produk my ta'lim dengan $id tertentu
        if($produk == 'mytalim' && $id != NULL){
            $data['data'] = $this->data_m->get_by_id('tb_my_talim', ['id_mytalim' => $id, 'id_approval' => 1])->row();
            $this->template->load('template', 'my_talim/detail_status_my_talim', $data);
        }
        //menampilkan status tiket produk myhajat yang telah dtolak oleh admin 1 dan admin 2
        if($produk == 'myhajat'){
            $data['data'] = $this->data_m->get('tb_my_hajat', 'rejected_review')->result_array();
            $this->template->load('template', 'my_talim/my_hajat_rejected', $data);
        }
    }
}
