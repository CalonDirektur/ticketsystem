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

    public function get_vendor_myhajat()
    {
        // $data = $this->data_m->get('tb_vendor');
        $keyword = $_GET['term'];

        $query = $this->data_m->query(
            "SELECT * 
            FROM 
            tb_vendor
        WHERE nama_vendor LIKE '%$keyword%' AND
        (jenis_vendor = 'Perorangan'
        OR jenis_vendor = 'Perusahaan/Badan Usaha'
        OR jenis_vendor = 'Badan Usaha')
        GROUP BY nama_vendor
        ORDER BY nama_vendor ASC"
        );

        $output = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $vendor) {
                $data['id'] = $vendor['id_vendor'];
                $data['value'] = $vendor['nama_vendor'];
                $data['jenis_vendor'] = $vendor['jenis_vendor'];
                array_push($output, $data);
            }
            echo json_encode($output);
        }
    }

    public function get_vendor_myfaedah()
    {
        // $data = $this->data_m->get('tb_vendor');
        $keyword = $_GET['term'];

        $query = $this->data_m->query("SELECT *
        FROM 
            tb_vendor
        WHERE nama_vendor
        LIKE '%$keyword%' AND 
        (jenis_vendor = 'Authorized Distributor'
        OR jenis_vendor = 'Toko/Agen'
        OR jenis_vendor = 'Penjual Perorangan'
        OR jenis_vendor = 'Modern Store/Supermarket')
        GROUP BY nama_vendor
        ORDER BY nama_vendor ASC");

        $output = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $vendor) {
                $data['id'] = $vendor['id_vendor'];
                $data['value'] = $vendor['nama_vendor'];
                $data['jenis_vendor'] = $vendor['jenis_vendor'];
                array_push($output, $data);
            }
            echo json_encode($output);
        }
    }

    public function test()
    {
        $this->template->load('template2', 'autocomplete');
    }

    // public function test()
    // {
    //     $end_date =  "2019-08-14 13:10:10";
    //     $now = date('Y-m-d H:i:s');

    //     $diff = strtotime($now) - strtotime($end_date);
    //     $fullDays    = floor($diff / (60 * 60 * 24));
    //     $fullHours   = floor(($diff - ($fullDays * 60 * 60 * 24)) / (60 * 60));
    //     $fullMinutes = floor(($diff - ($fullDays * 60 * 60 * 24) - ($fullHours * 60 * 60)) / 60);
    //     if ($fullDays == 0 && $fullHours == 0 && $fullMinutes == 0) {
    //         echo "Baru Saja.";
    //     } else if ($fullDays == 0 && $fullHours == 0) {
    //         echo "Difference is $fullMinutes minutes.";
    //     } else if ($fullDays == 0) {
    //         echo "Difference is $fullHours hours, $fullMinutes minutes .";
    //     } else if ($fullDays == 1) {
    //         echo "Difference is $fullDays days, $fullHours hours.";
    //     } else {
    //         echo "Difference is $fullDays days.";
    //     }

    //     echo "<button onclick='return window.history.back()'>back</button>";
    // }
}
