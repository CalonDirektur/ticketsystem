<?php
class Data_json extends CI_Controller
{

    public $id_cabang;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_m');

        date_default_timezone_set('Asia/Jakarta');

        $this->id_cabang =  $this->fungsi->user_login()->id_cabang;
    }

    public function get_lead_id()
    {
        // $data = $this->data_m->get('tb_vendor');
        $keyword = $_GET['term'];

        $query = $this->data_m->query(
            "SELECT * 
            FROM 
                tb_lead_management
            INNER JOIN user ON user.id_user = tb_lead_management.id_user
            INNER JOIN tb_cabang ON tb_cabang.id_cabang = tb_lead_management.id_cabang
            WHERE tb_lead_management.lead_id LIKE '%$keyword%'
            ORDER BY lead_id ASC
            LIMIT 5
        "
        );

        $output = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $vendor) {
                $data['id'] = $vendor['id_lead'];
                $data['value'] = $vendor['lead_id'];
                $data['nama_konsumen'] = $vendor['nama_konsumen'];
                $data['produk'] = $vendor['produk'];
                $data['name'] = $vendor['name'];
                $data['nama_cabang'] = $vendor['nama_cabang'];
                array_push($output, $data);
            }
            echo json_encode($output);
        }
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

    public function anually_leads_ajax($year)
    {
        $this->db->select("DATE_FORMAT(date_created, '%b') as bulan, count(*) as jumlah ");
        $this->db->from("tb_lead_management");
        $this->db->where("date_created IS NOT NULL AND date_created != '0000-00-00' AND YEAR(date_created) = YEAR('$year')");
        $this->db->group_by("MONTH(DATE_FORMAT(date_created, '%Y-%m-%d'))");

        $query = $this->db->get();
        echo json_encode($query->result());
    }

    public function monthly_tickets_ajax($month = null)
    {
        $query = $this->db->query(
            "SELECT DATE_FORMAT(tanggal_dibuat, '%a') as hari, COUNT(*) as jumlah 
            FROM tb_ticket 
            WHERE MONTH(tanggal_dibuat) = MONTH('$month') AND YEAR(tanggal_dibuat) = YEAR(NOW())
            AND id_lead IS NULL 
            GROUP BY DATE_FORMAT(tanggal_dibuat, '%a')
            ORDER BY WEEKDAY(tanggal_dibuat)"
        );
        echo json_encode($query->result());
    }

    public function total_ticket_ajax($month)
    {
        $query = $this->db->query(
            "SELECT COUNT(*) as total_ticket 
            FROM tb_ticket 
            WHERE id_lead IS NULL AND MONTH(tanggal_dibuat) = MONTH('$month') AND YEAR(tanggal_dibuat) = YEAR(CURDATE())"
        );
        $count = $query->result();
        echo json_encode($count);
    }
}
