<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zip extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');

        // Load zip library
        $this->load->library('zip');
        $this->load->model('data_m');
    }

    public function index()
    {
        // Load view
        $this->load->view('index_view');
    }

    // Create zip
    public function createzip($table, $col, $folder, $id)
    {

        $data = $this->data_m->get_ticket_by_id($table, $col, $id);
        for ($i = 1; $i <= 10; $i++) {
            $upload = $data->{'upload_file' . $i};
            if ($upload != NULL || $upload != '') {
                ${'filepath' . $i} =  FCPATH . 'uploads/' . $folder . '/' . $upload;
                $this->zip->read_file(${"filepath" . $i});
            }
        }

        // Download
        $filename = "ID_Ticket_$data->id_ticket.zip";
        $this->zip->download($filename);
    }
}
