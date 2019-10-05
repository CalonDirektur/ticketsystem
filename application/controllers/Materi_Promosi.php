<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi_Promosi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('data_m');
    }

    public function index()
    {
        $data['data'] = $this->data_m->get('tb_materi_promosi');
        $this->template->load('template2', 'materi_promosi', $data);
    }

    public function add()
    {
        $post = $this->input->post(NULL, TRUE);

        $data = [
            'judul'     => $post['judul'],
            'ukuran'    => $post['ukuran'],
            'link'      => $post['link']
        ];

        //Konfigurasi Upload
        $config['upload_path']         = './uploads/materi_promosi';
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('thumb')) {
            $this->session->set_flashdata("upload_error", "<div class='alert alert-danger'>" . $this->upload->display_errors() . "</div>");
        } else {
            $data['thumb'] = $this->upload->data('file_name');
        }

        $add = $this->data_m->add('tb_materi_promosi', $data);

        if ($add) {
            redirect('materi_promosi');
        } else {
            redirect('dashboard');
        }
    }
}
