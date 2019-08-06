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

                                WHERE U.id_user = ' . $id_user . '
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
}
