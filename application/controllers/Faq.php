<?php
class Faq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_m');

        $this->load->library('form_validation');
        check_not_login();
    }

    public function index()
    {
        $data['data'] = $this->data_m->get('tb_faq');
        $data['kategori'] = $this->data_m->get('tb_faq_kategori');
        $this->template->load('template2', 'faq/pertanyaan', $data);
    }

    public function input_pertanyaan()
    {
        $data['data'] = $this->data_m->get('tb_input_pertanyaan');
        $this->template->load('template2', 'faq/input_pertanyaan', $data);
    }

    public function add_pertanyaan()
    {
        $post = $this->input->post(NULL, TRUE);

        $data = [
            'pertanyaan' => $post['pertanyaan'],
            'id_faq_kategori' => $post['id_faq_kategori'],
            'jawaban' => $post['content']
        ];

        $success = $this->data_m->add('tb_faq', $data);

        if ($success) {
            redirect('faq');
        } else {
            $this->template->load('template2', 'faq/pertanyaan');
        }
    }

    public function add_input_pertanyaan()
    {
        $post = $this->input->post(NULL, TRUE);

        $data = [
            'jenis_pesan' => $post['jenis_pesan'],
            'isi_pesan' => $post['isi_pesan'],

            'id_cabang' => $post['id_cabang'],
            'id_user' => $post['id_user']
        ];

        $success = $this->data_m->add('tb_input_pertanyaan', $data);

        if ($success) {
            redirect('faq');
        } else {
            $this->template->load('template2', 'faq/pertanyaan');
        }
    }

    public function delete_pertanyaan($id)
    {
        $id =  $this->data_m->query("DELETE FROM tb_faq WHERE id_faq = $id");
        if ($id) {
            redirect('faq');
        }
    }

    public function add_kategori()
    {
        $post = $this->input->post(NULL, TRUE);

        $data = [
            'kategori_faq' => $post['kategori_faq'],
        ];

        $success = $this->data_m->add('tb_faq_kategori', $data);

        if ($success) {
            redirect('faq');
        } else {
            $this->template->load('template2', 'faq/pertanyaan');
        }
    }

    public function delete_kategori($id)
    {
        $id = $this->data_m->query("DELETE FROM tb_faq_kategori WHERE id_faq_kategori = $id");
        if ($id) {
            redirect('faq');
        }
    }

    public function jawaban($id)
    {
        $query = $this->data_m->query("SELECT * FROM tb_faq WHERE id_faq = $id");
        $data['faq'] = $query->row();
        $this->template->load('template2', 'faq/jawaban', $data);
    }

    public function upload()
    {
        //Konfigurasi Upload
        $config['upload_path']         = './uploads/faq';
        $config['allowed_types']        = 'jpg|gif|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);

        // chmod('upload', 0777);
        $funcNum = $_GET['CKEditorFuncNum'];

        if (!$this->upload->do_upload('upload')) {
            echo json_encode(array('error' => $this->upload->display_errors()));
        } else {
            $url = site_url("uploads/faq/" . $this->upload->data('file_name'));
            $message = '';
            echo "<script>window.parent.CKEDITOR.tools.callFunction($funcNum, ' $url', '$message');</script>";
        }
    }
}
