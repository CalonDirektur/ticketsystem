<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_m extends CI_Model
{
    public function add($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update($table, $data, $where)
    {
        $query = $this->db->update($table, $data, $where);
        return $query;
    }

    public function get($table, $where = NULL, $id_user = NULL)
    {
        $this->db->select('*');
        $this->db->from($table);

        if ($where == 'status_admin1') {
            $this->db->join('tb_cabang', $table . '.id_cabang = tb_cabang.id_cabang', 'inner');
            $this->db->join('user', $table . '.id_user = user.id_user', 'inner');

            if ($id_user != NULL) {
                $this->db->where($table . '.id_user', $id_user);
            }
            $this->db->where('id_approval', 0);
            $this->db->or_where('id_approval', 1);
        }
        if ($where == 'status_admin2') {
            if ($id_user != NULL) {
                $this->db->where($table . '.id_user', $id_user);
            }
            $this->db->where('id_approval', 2);
            $this->db->or_where('id_approval', 3);
        }
        if ($where == 'pending_review') {
            $this->db->join('tb_cabang', $table . '.id_cabang = tb_cabang.id_cabang', 'inner');
            $this->db->join('user', $table . '.id_user = user.id_user', 'inner');

            $this->db->where('id_approval', 0);
            if ($id_user != NULL) {
                $this->db->where($table . '.id_user', $id_user);
            }
        }
        if ($where == 'rejected_review') {
            $this->db->join('tb_cabang', $table . '.id_cabang = tb_cabang.id_cabang', 'inner');
            $this->db->join('user', $table . '.id_user = user.id_user', 'inner');

            $this->db->where('id_approval', 1);
            if ($id_user != NULL) {
                $this->db->where($table . '.id_user', $id_user);
            }
        }
        if ($where == 'approved_review') {
            $this->db->join('tb_cabang', $table . '.id_cabang = tb_cabang.id_cabang', 'inner');
            $this->db->join('user', $table . '.id_user = user.id_user', 'inner');

            $this->db->where('id_approval', 2);
            if ($id_user != NULL) {
                $this->db->where($table . '.id_user', $id_user);
            }
        }
        if ($where == 'completed_review') {
            $this->db->join('tb_cabang', $table . '.id_cabang = tb_cabang.id_cabang', 'inner');
            $this->db->join('user', $table . '.id_user = user.id_user', 'inner');

            $this->db->where('id_approval', 3);
            if ($id_user != NULL) {
                $this->db->where($table . '.id_user', $id_user);
            }
        }

        $query = $this->db->get();

        return $query;
    }

    public function get_by_id($table, $where)
    {
        $this->db->from($table);
        $this->db->join('tb_cabang', $table . '.id_cabang = tb_cabang.id_cabang', 'inner');
        $this->db->where($where);

        $query = $this->db->get();
        return $query;
    }

    public function get_product($table, $where = NULL, $order_by)
    {
        $this->db->select('*, DATE_FORMAT(date_created, "%d %M %Y %H:%i:%s") AS tanggal_dibuat, DATE_FORMAT(date_modified, "%d %M %Y %H:%i:%s") AS tanggal_diubah');
        $this->db->from($table);
        $this->db->join('tb_cabang', $table . '.id_cabang = tb_cabang.id_cabang', 'inner');
        $this->db->order_by('date_modified', 'DESC');
        if ($where != NULL) {
            $this->db->where($where);
        }
        $this->db->order_by($order_by);

        $query = $this->db->get();
        return $query;
    }

    public function count_data($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->count_all_results();
        return $query;
    }

    // PENGECUALIAN xD
    public function get_myhajat($id_user, $id_approval)
    {
        $query = $this->db->query('SELECT *,
                                A.id_my_hajat,
                                U.name as nama,
                                CBG.nama_cabang as nama_cabang,
                                B.nama_konsumen as nama_konsumen_renovasi,
                                C.nama_konsumen as nama_konsumen_sewa,
                                D.nama_konsumen as nama_konsumen_wedding,
                                E.nama_konsumen as nama_konsumen_franchise,
                                F.nama_konsumen as nama_konsumen_lainnya,
                                
                                B.jenis_konsumen as jenis_konsumen_renovasi,
                                C.jenis_konsumen as jenis_konsumen_sewa,
                                D.jenis_konsumen as jenis_konsumen_wedding,
                                E.jenis_konsumen as jenis_konsumen_franchise,
                                F.jenis_konsumen as jenis_konsumen_lainnya,

                                B.id_approval as id_approval_renovasi,
                                C.id_approval as id_approval_sewa,
                                D.id_approval as id_approval_wedding,
                                E.id_approval as id_approval_franchise,
                                F.id_approval as id_approval_lainnya,

                                CASE
                                    WHEN A.id_renovasi IS NOT NULL THEN "My Hajat Renovasi"
                                    WHEN A.id_sewa IS NOT NULL THEN "My Hajat Sewa"
                                    WHEN A.id_wedding IS NOT NULL THEN "My Hajat Wedding"
                                    WHEN A.id_franchise IS NOT NULL THEN "My Hajat Franchise"
                                    WHEN A.id_myhajat_lainnya IS NOT NULL THEN "My Hajat Lainnya"
                                END AS produk

                                FROM tb_my_hajat as A

                                LEFT JOIN tb_my_hajat_renovasi as B
                                ON A.id_renovasi = B.id_renovasi

                                LEFT JOIN tb_my_hajat_sewa as C
                                ON A.id_sewa = C.id_sewa

                                LEFT JOIN tb_my_hajat_wedding as D
                                ON A.id_wedding = D.id_wedding

                                LEFT JOIN tb_my_hajat_franchise as E
                                ON A.id_franchise = E.id_franchise

                                LEFT JOIN tb_my_hajat_lainnya as F
                                ON A.id_myhajat_lainnya = F.id_myhajat_lainnya

                                LEFT JOIN user as U
                                ON U.id_user = A.id_user

                                LEFT JOIN tb_cabang as CBG
                                ON CBG.id_cabang = A.id_cabang

                                WHERE U.id_user ' . $id_user . '
                                AND CASE 
                                WHEN B.id_approval IS NOT NULL THEN B.id_approval ' . $id_approval . '
                                WHEN C.id_approval IS NOT NULL THEN C.id_approval ' . $id_approval . '
                                WHEN D.id_approval IS NOT NULL THEN D.id_approval ' . $id_approval . '
                                WHEN E.id_approval IS NOT NULL THEN E.id_approval ' . $id_approval . '
                                WHEN F.id_approval IS NOT NULL THEN F.id_approval ' . $id_approval . '
                                END
                                ');

        return $query;
    }

    public function get_myhajat_by_id($table, $col, $id)
    {
        $this->db->from('tb_my_hajat A');
        $this->db->join($table . ' B', 'A.' . $col . ' = B.' . $col, 'inner');
        $this->db->join('tb_cabang T', 'T.id_cabang = A.id_cabang', 'inner');
        $this->db->join('user U', 'U.id_user = A.id_user', 'inner');
        $this->db->where('B.' . $col . ' = ' . $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_tickets($id_user, $id_approval)
    {
        $query = $this->db->query("
      SELECT *, 
      A.id_ticket as id_ticket,
        BA.nama_konsumen as nama_konsumen_renovasi,
        BB.nama_konsumen as nama_konsumen_sewa,
        BC.nama_konsumen as nama_konsumen_wedding,
        BD.nama_konsumen as nama_konsumen_franchise,
        BE.nama_konsumen as nama_konsumen_lainnya,
        C.nama_konsumen as nama_konsumen_mytalim,
        D.nama_konsumen as nama_konsumen_mysafar,
        E.nama_agent as nama_aktivasi_agent,
        F.nama_konsumen as nama_konsumen_nst,
        G.nama_konsumen as nama_konsumen_lead_management,
        H.nama_konsumen as nama_konsumen_myihram,
        I.nama_mitra as nama_mitra_kerjasama,
        J.nama_konsumen as nama_konsumen_myfaedah,
        K.nama_konsumen as nama_konsumen_mycars,

        BA.id_approval as id_approval_renovasi,
        BB.id_approval as id_approval_sewa,
        BC.id_approval as id_approval_wedding,
        BD.id_approval as id_approval_franchise,
        BE.id_approval as id_approval_lainnya,
        C.id_approval as id_approval_mytalim,
        D.id_approval as id_approval_mysafar,
        E.id_approval as id_approval_aktivasi_agent,
        F.id_approval as id_approval_nst,
        G.id_approval as id_approval_lead_management,
        H.id_approval as id_approval_myihram,
        I.id_approval as id_approval_mitra_kerjasama,
        J.id_approval as id_approval_myfaedah,
        K.id_approval as id_approval_mycars,
        
        
        CASE
        WHEN A.id_renovasi IS NOT NULL THEN 'My Hajat Renovasi'
        WHEN A.id_sewa IS NOT NULL THEN 'My Hajat Sewa'
        WHEN A.id_wedding IS NOT NULL THEN 'My Hajat Wedding'
        WHEN A.id_franchise IS NOT NULL THEN 'My Hajat Franchise'
        WHEN A.id_myhajat_lainnya IS NOT NULL THEN 'My Hajat Lainnya'
        WHEN A.id_mytalim IS NOT NULL THEN 'My Talim'
        WHEN A.id_mysafar IS NOT NULL THEN 'My Safar'
        WHEN A.id_agent IS NOT NULL THEN 'Aktivasi Agent'
        WHEN A.id_nst IS NOT NULL THEN 'NST'
        WHEN A.id_lead IS NOT NULL THEN 'Lead Management'
        WHEN A.id_myihram IS NOT NULL THEN 'My Ihram'
        WHEN A.id_mitra_kerjasama IS NOT NULL THEN 'Mitra Kerja sama'
        WHEN A.id_myfaedah IS NOT NULL THEN 'My Faedah'
        WHEN A.id_mycars IS NOT NULL THEN 'My Cars'
        END AS produk
        
        FROM tb_ticket as A
        LEFT JOIN tb_my_hajat_renovasi as BA
        ON A.id_renovasi = BA.id_renovasi
        
        LEFT JOIN tb_my_hajat_sewa as BB
        ON A.id_sewa = BB.id_sewa
        
        LEFT JOIN tb_my_hajat_wedding as BC
        ON A.id_wedding = BC.id_wedding
        
        LEFT JOIN tb_my_hajat_franchise as BD
        ON A.id_franchise = BD.id_franchise
        
        LEFT JOIN tb_my_hajat_lainnya as BE
        ON A.id_myhajat_lainnya = BE.id_myhajat_lainnya
        
        LEFT JOIN tb_my_talim as C
        ON A.id_mytalim = C.id_mytalim
        
        LEFT JOIN tb_my_safar as D
        ON A.id_mysafar = D.id_mysafar
        
        LEFT JOIN tb_aktivasi_agent as E
        ON A.id_agent = E.id_agent
        
        LEFT JOIN tb_nst as F
        ON A.id_nst = F.id_nst
        
        LEFT JOIN tb_lead_management as G
        ON A.id_lead = G.id_lead
        
        LEFT JOIN tb_my_ihram as H
        ON A.id_myihram = H.id_myihram

        LEFT JOIN tb_mitra_kerjasama as I
        ON A.id_mitra_kerjasama = I.id_mitra_kerjasama

        LEFT JOIN tb_my_faedah as J
        ON A.id_myfaedah = J.id_myfaedah

        LEFT JOIN tb_my_cars as K
        ON A.id_mycars = K.id_mycars
        
        LEFT JOIN user as U
        ON U.id_user = A.id_user
        
        LEFT JOIN tb_cabang as CBG
        ON CBG.id_cabang = A.id_cabang
        
        WHERE U.id_user $id_user  AND
        (CASE 
        WHEN BA.id_approval IS NOT NULL THEN BA.id_approval $id_approval
        WHEN BB.id_approval IS NOT NULL THEN BB.id_approval $id_approval
        WHEN BC.id_approval IS NOT NULL THEN BC.id_approval $id_approval
        WHEN BD.id_approval IS NOT NULL THEN BD.id_approval $id_approval
        WHEN BE.id_approval IS NOT NULL THEN BE.id_approval $id_approval
        WHEN C.id_approval IS NOT NULL THEN C.id_approval $id_approval
        WHEN D.id_approval IS NOT NULL THEN D.id_approval $id_approval
        WHEN E.id_approval IS NOT NULL THEN E.id_approval $id_approval
        WHEN F.id_approval IS NOT NULL THEN F.id_approval $id_approval
        WHEN G.id_approval IS NOT NULL THEN G.id_approval $id_approval
        WHEN H.id_approval IS NOT NULL THEN H.id_approval $id_approval
        WHEN I.id_approval IS NOT NULL THEN I.id_approval $id_approval
        WHEN J.id_approval IS NOT NULL THEN J.id_approval $id_approval
        WHEN K.id_approval IS NOT NULL THEN K.id_approval $id_approval
        END
        )
        ");
        return $query;
    }

    public function get_ticket_by_id($table, $col, $id)
    {
        $this->db->select("*,
                            DATE_FORMAT(date_created, '%d %M %Y %H:%i:%s') AS tanggal_dibuat,
                            DATE_FORMAT(date_approved, '%d %M %Y %H:%i:%s') AS tanggal_disetujui,
                            DATE_FORMAT(date_rejected, '%d %M %Y %H:%i:%s') AS tanggal_ditolak,
                            DATE_FORMAT(date_completed, '%d %M %Y %H:%i:%s') AS tanggal_diselesaikan,
                            DATE_FORMAT(date_modified, '%d %M %Y %H:%i:%s') AS tanggal_diubah,
                            ");
        $this->db->from('tb_ticket A');
        $this->db->join($table . ' B', 'A.' . $col . ' = B.' . $col, 'inner');
        $this->db->join('tb_cabang T', 'T.id_cabang = A.id_cabang', 'inner');
        $this->db->join('user U', 'U.id_user = A.id_user', 'inner');
        $this->db->where('B.' . $col . ' = ' . $id);
        $query = $this->db->get();

        return $query->row();
    }

    //CUSTOM QUERY
    public function query($query)
    {
        $query = $this->db->query($query);
        return $query;
    }
}
