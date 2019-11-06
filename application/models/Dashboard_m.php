<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    public function today_ticket()
    {
        $query = $this->db->query("SELECT COUNT(*) as today_ticket FROM tb_ticket WHERE DATE_FORMAT(tanggal_dibuat, '%Y-%m-%d') = CURDATE() AND id_lead IS NULL");
        $count = $query->row();
        return $count->today_ticket;
    }

    public function monthly_ticket()
    {
        $this->db->select("MONTHNAME(DATE_FORMAT(tanggal_dibuat, '%Y-%m-%d')) as bulan, count(*) as jumlah");
        $this->db->from("tb_ticket");
        $this->db->where("tanggal_dibuat IS NOT NULL AND tanggal_dibuat != '0000-00-00'");
        $this->db->group_by("MONTH(DATE_FORMAT(tanggal_dibuat, '%Y-%m-%d'))");

        $query = $this->db->get();
        return $query->result();
    }

    public function monthly_product()
    {

        $query = $this->db->query(
            "SELECT MONTHNAME(STR_TO_DATE(Months.m, '%m')) as bulan,
            COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya) as my_hajat,
            COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya) as my_faedah,
            COUNT(id_mytalim) as my_talim,
            COUNT(id_mysafar) as my_safar,
            COUNT(id_myihram) as my_ihram,
            COUNT(id_mycars) as my_cars,
            COUNT(id_nst) as nst,
            (DATE_FORMAT(tanggal_dibuat, '%b')) as bulan
            FROM
            (
                SELECT 1 as m 
                UNION SELECT 2 as m 
                UNION SELECT 3 as m 
                UNION SELECT 4 as m 
                UNION SELECT 5 as m 
                UNION SELECT 6 as m 
                UNION SELECT 7 as m 
                UNION SELECT 8 as m 
                UNION SELECT 9 as m 
                UNION SELECT 10 as m 
                UNION SELECT 11 as m 
                UNION SELECT 12 as m
                ) as Months
            LEFT JOIN tb_ticket on Months.m = MONTH(DATE_FORMAT(tanggal_dibuat, '%Y-%m-%d'))
                GROUP BY Months.m"
        );
        return $query->result();
    }

    public function ticket_weekly()
    {

        $query = $this->db->query(
            "SELECT DATE_FORMAT(tanggal_dibuat, '%a') as hari, COUNT(*) as jumlah 
            FROM tb_ticket 
            WHERE MONTH(tanggal_dibuat) = MONTH(NOW()) AND YEAR(tanggal_dibuat) = YEAR(NOW())
            AND id_lead IS NULL 
            GROUP BY DATE_FORMAT(tanggal_dibuat, '%a')
            ORDER BY WEEKDAY(tanggal_dibuat)
            "
        );

        return $query->result();
    }

    public function total_ticket()
    {
        $query = $this->db->query(
            "SELECT COUNT(*) as total_ticket 
            FROM tb_ticket 
            WHERE id_lead IS NULL AND MONTH(tanggal_dibuat) = MONTH(CURDATE()) AND YEAR(tanggal_dibuat) = YEAR(CURDATE())"
        );
        $count = $query->row();
        return $count->total_ticket;
    }

    public function monthly_leads()
    {
        $this->db->select("DATE_FORMAT(date_created, '%b') as bulan, count(*) as jumlah ");
        $this->db->from("tb_lead_management");
        $this->db->where("date_created IS NOT NULL AND date_created != '0000-00-00' AND YEAR(date_created) = YEAR(CURDATE())");
        $this->db->group_by("MONTH(DATE_FORMAT(date_created, '%Y-%m-%d'))");

        $query = $this->db->get();
        return $query->result();
    }

    public function avg_leads()
    {
        $query = $this->db->query(
            "SELECT AVG(jumlah_leads) as leads_average FROM 
        (SELECT COUNT(*) as jumlah_leads 
        FROM tb_lead_management 
        GROUP BY MONTH(date_created)) as average"
        );
        return $query->row()->leads_average;
    }

    public function total_leads()
    {
        $query = $this->db->query(
            "SELECT COUNT(*) as total_leads
            FROM tb_lead_management 
        "
        );
        $count = $query->row();
        return $count->total_leads;
    }

    public function sumber_leads()
    {
        $this->db->select(
            "sumber_lead, COUNT(*) as count_leads, (CASE
        WHEN sumber_lead = 'Tour & Travel / Penyedia Jasa' THEN 'info'
        WHEN sumber_lead = 'Agent' THEN 'primary'
        WHEN sumber_lead = 'Direct Selling' THEN 'danger'
        WHEN sumber_lead = 'Digital Marketing' THEN 'warning'
        WHEN sumber_lead = 'EGC' THEN 'success'
        WHEN sumber_lead = 'RO' THEN 'dark'
        WHEN sumber_lead = 'CGC' THEN 'success'
        WHEN sumber_lead = 'Walk-in' THEN 'secondary'
        WHEN sumber_lead = 'Website BFI Syariah' THEN 'warning'
        WHEN sumber_lead = 'Digital Partner' THEN 'warning'
      END)AS warna
      "
        );
        $this->db->from("tb_lead_management");
        $this->db->group_by("sumber_lead");
        $this->db->order_by("warna", "DESC");

        // $this->db->query("");

        $query = $this->db->get();
        return $query->result();
    }

    public function aktivitas_cabang()
    {
        $query = $this->db->query(
            "SELECT nama_cabang, COUNT(B.id_ticket) as tickets,
            (SELECT COUNT(*) 
            FROM tb_lead_management as C
            WHERE C.id_cabang = A.id_cabang
            ) as leads,
             COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya) as my_hajat,
             COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya) as my_faedah,
             COUNT(id_mytalim) as my_talim,
             COUNT(id_mysafar) as my_safar,
             COUNT(id_myihram) as my_ihram,
             COUNT(id_mycars) as my_cars,
             COUNT(id_nst) as nst,
             ( CASE
                WHEN ( 
                    COUNT(id_nst) >= COUNT(id_mytalim) AND
                    COUNT(id_nst) >= COUNT(id_mysafar) AND
                    COUNT(id_nst) >= COUNT(id_myihram) AND
                    COUNT(id_nst) >= COUNT(id_mycars) AND
                    COUNT(id_nst) >= (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) AND
                    COUNT(id_nst) >= (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya))
                    ) THEN 'NST'
                WHEN ( 
                    COUNT(id_mytalim) >= COUNT(id_nst) AND
                    COUNT(id_mytalim) >= COUNT(id_mysafar) AND
                    COUNT(id_mytalim) >= COUNT(id_myihram) AND
                    COUNT(id_mytalim) >= COUNT(id_mycars) AND
                    COUNT(id_mytalim) >= (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) AND
                    COUNT(id_mytalim) >= (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya))
                    ) THEN 'My Talim'
                WHEN(
                    COUNT(id_mysafar) >= COUNT(id_nst) AND
                    COUNT(id_mysafar) >= COUNT(id_mysafar) AND
                    COUNT(id_mysafar) >= COUNT(id_myihram) AND
                    COUNT(id_mysafar) >= COUNT(id_mycars) AND
                    COUNT(id_mysafar) >= (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) AND
                    COUNT(id_mysafar) >= (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya))
                    ) THEN 'My Safar'
                WHEN(
                    COUNT(id_myihram) >= COUNT(id_nst) AND
                    COUNT(id_myihram) >= COUNT(id_mysafar) AND
                    COUNT(id_myihram) >= COUNT(id_mytalim) AND
                    COUNT(id_myihram) >= COUNT(id_mycars) AND
                    COUNT(id_myihram) >= (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) AND
                    COUNT(id_myihram) >= (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya))
                    ) THEN 'My Ihram'
                WHEN(
                    COUNT(id_mycars) >= COUNT(id_nst) AND
                    COUNT(id_mycars) >= COUNT(id_mysafar) AND
                    COUNT(id_mycars) >= COUNT(id_myihram) AND
                    COUNT(id_mycars) >= COUNT(id_mytalim) AND
                    COUNT(id_mycars) >= (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) AND
                    COUNT(id_mycars) >= (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya))
                    ) THEN 'My Cars'
                WHEN(
                    (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) >= COUNT(id_nst) AND
                    (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) >= COUNT(id_mysafar) AND
                    (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) >= COUNT(id_myihram) AND
                    (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) >= COUNT(id_mytalim) AND
                    (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) >= COUNT(id_mycars) AND
                    (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) >= (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya))
                    ) THEN 'My Hajat'
                WHEN(
                    (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya)) >= COUNT(id_nst) AND
                    (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya)) >= COUNT(id_mysafar) AND
                    (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya)) >= COUNT(id_myihram) AND
                    (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya)) >= COUNT(id_mytalim) AND
                    (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya)) >= (COUNT(id_renovasi) + COUNT(id_sewa) + COUNT(id_wedding) + COUNT(id_franchise) + COUNT(id_myhajat_lainnya)) AND
                    (COUNT(id_bangunan) + COUNT(id_elektronik) + COUNT(id_modal) + COUNT(id_qurban) + COUNT(id_myfaedah_lainnya)) >= COUNT(id_mycars)
                    ) THEN 'My Faedah'
             END) AS top_request
            
            FROM tb_cabang A
            INNER JOIN tb_ticket B ON B.id_cabang = A.id_cabang
            WHERE id_lead IS NULL       
            GROUP BY nama_cabang
            ORDER BY COUNT(nama_cabang) desc
            LIMIT 5"
        );

        return $query->result();
    }

    public function penyelesaian_admin1()
    {
        $query = $this->db->query(
            "SELECT AVG(TIMESTAMPDIFF(SECOND, date_inprogress, date_approved)) as ratarata 
            FROM tb_ticket 
            WHERE( id_nst IS NULL) AND date_inprogress IS NOT NULL AND date_approved IS NOT NULL
            AND WEEKDAY(date_inprogress) < 5 AND HOUR(date_inprogress) BETWEEN 8 AND 17"
        );
        $data = $query->row();
        return $data->ratarata;
    }

    public function penyelesaian_admin2()
    {
        // $this->db->select("AVG(TIMESTAMPDIFF(SECOND, date_pending, date_completed)) as ratarata");
        // $this->db->from("tb_ticket");
        // $this->db->where($where);
        // $query = $this->db->get();

        $query = $this->db->query(
            "SELECT AVG(TIMESTAMPDIFF(SECOND, date_approved, date_completed)) as ratarata 
            FROM tb_ticket 
            WHERE (id_nst IS NULL) AND date_approved IS NOT NULL AND date_completed IS NOT NULL
            AND WEEKDAY(date_approved) < 5 AND HOUR(date_approved) BETWEEN 8 AND 17"
        );

        $data = $query->row();
        return $data->ratarata;
    }

    public function penyelesaian_admin_nst($where)
    {
        $query = $this->db->query(
            "SELECT AVG(TIMESTAMPDIFF(SECOND, date_inprogress, date_completed)) as ratarata, produk
            FROM tb_ticket A
            INNER JOIN tb_nst B ON B.id_nst = A.id_nst
            WHERE A.id_nst IS NOT NULL AND date_inprogress IS NOT NULL AND date_completed IS NOT NULL AND (produk IS NOT NULL AND produk != '') AND $where
            AND WEEKDAY(date_inprogress) < 5 AND HOUR(date_inprogress) BETWEEN 8 AND 17"
        );

        $data = $query->row();
        return $data->ratarata;
    }

    public function penyelesaian_ticket($where)
    {
        $this->db->select("AVG(TIMESTAMPDIFF(SECOND, date_inprogress, date_completed)) as ratarata");
        $this->db->from("tb_ticket");
        $this->db->where($where);
        $this->db->where("date_inprogress IS NOT NULL AND date_completed IS NOT NULL AND WEEKDAY(date_inprogress) < 5 AND HOUR(date_inprogress) BETWEEN 8 AND 17");
        $query = $this->db->get();

        $data = $query->row();
        return $data->ratarata;
    }

    public function status_ticket($id_approval, $nst = FALSE)
    {
        if (!$nst) {
            $query = $this->db->query("SELECT COUNT(*) as today_ticket from tb_ticket WHERE id_approval = $id_approval AND id_lead IS NULL");
        } else {
            $query = $this->db->query("SELECT COUNT(*) as today_ticket from tb_ticket WHERE id_approval = $id_approval AND id_lead IS NULL AND id_nst IS NOT NULL");
        }

        $count = $query->row();
        return $count->today_ticket;
    }

    public function alasan_reject_nst()
    {
        $this->db->select("alasan_reject, COUNT(*) as jumlah");
        $this->db->from("tb_nst");
        $this->db->where("alasan_reject IS NOT NULL");
        $this->db->group_by("alasan_reject");

        $query = $this->db->get();
        return $query->result();
    }
}
