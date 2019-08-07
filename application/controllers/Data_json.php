<?php
class Data_json extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_m');

        date_default_timezone_set('Asia/Jakarta');
    }

    public function get_lead_management()
    {
        $data = $this->data_m->get('tb_lead_management');
        echo json_encode($data->result());
    }
}
