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

    public function query($query)
    {
        $query = $this->db->query($query);

        return $query;
    }
}
