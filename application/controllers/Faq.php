<?php
class Faq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('data_m');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['data'] = $this->data_m->get('tb_faq');
        $this->template->load('template2', 'faq/pertanyaan', $data);
    }

    public function add()
    {
        $post = $this->input->post(NULL, TRUE);

        $data = [
            'pertanyaan' => $post['pertanyaan'],
            'jawaban' => $post['content']
        ];

        $success = $this->data_m->add('tb_faq', $data);
        if ($success) {
            redirect('/');
        } else {
            $this->template->load('template2', 'faq/pertanyaan');
        }
    }

    public function upload()
    {
        //Konfigurasi Upload
        $config['upload_path']         = './uploads/faq';
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);

        $funcNum = $_GET['CKEditorFuncNum'];

        if (!$this->upload->do_upload('upload')) {
            echo json_encode(array('error' => $this->upload->display_errors()));
        } else {
            $url = site_url("uploads/faq/" . $this->upload->data('file_name'));
            $message = '';
            echo '<script>window.parent.CKEDITOR.tools.callFunction(' . $funcNum . ', "' . $url . '", "' . $message . '")</script>';
        }
    }
}
