<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_m');
        $this->load->model('data_m');
    }

    public function index()
    {
        $this->template->load('template2', 'api/daftar_token');
    }

    public function add_key()
    {
        $post = $this->input->post(NULL, TRUE);

        $data_user = [
            'email' => $post['email'],
            'partner' => $post['partner']
        ];

        $user_id = $this->api_m->addKey('tb_api_users', $data_user);

        if ($user_id) {
            $data_key = [
                'user_id' => $user_id,
                'key' => $post['apikey'],
                'level' => 0,
                'ignore_limits' => 0,
                'is_private_key' => 0
            ];
            $this->api_m->addKey('tb_api_keys', $data_key);

            $email = $post['email'];

            // Konfigurasi email
            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'srv50.niagahoster.com',
                'smtp_user' => 'administrator@bfisyariah.id',    // Ganti dengan email gmail kamu
                'smtp_pass' => 'Tralala1',      // Password gmail kamu
                'smtp_port' => 465,
                'crlf'      => "\r\n",
                'newline'   => "\r\n"
            ];

            // Load library email dan konfigurasinya
            $this->load->library('email', $config);

            // Email dan nama pengirim
            $this->email->from('administrator@bfisyariah.id', 'BFI Syariah Head Office');

            // Email penerima
            $this->email->to($email); // Ganti dengan email tujuan kamu	

            // Subject email
            $this->email->subject('API Key');

            // Isi email
            $this->email->message("Detail Info API Key:\n Email: $email \n  partner: {$post['partner']} \n API Key: <b>{$post['apikey']}</b>");

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                echo 'Sukses! email berhasil dikirim.';
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function list_token()
    {
        $data = [
            'data' => $this->api_m->getKey('tb_api_users')
        ];

        $this->template->load('template2', 'api/list_token', $data);
    }

    public function delete_key($id)
    {
        $this->data_m->delete('tb_api_users', ['user_id' => $id]);
        $this->session->set_flashdata("berhasil_delete_api_users", "<div class='alert alert-success'>Berhasil delete API User</div>");

        redirect('api/list_token');
    }
}
