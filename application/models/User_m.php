<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    //Method Proses Login
    public function login($username, $password)
    {
        $this->db->where("(email = '$username' OR nik = '$username') AND password =  '$password'");
        $this->db->where('is_active', 1);
        $query = $this->db->get('user');

        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->join('tb_cabang', 'user.id_cabang = tb_cabang.id_cabang', 'inner');
            $this->db->where("nik = '$id' or email = '$id'");
        }
        $query = $this->db->get();

        return $query;
    }

    public function get_cabang()
    {
        $this->db->from('user');
        $this->db->join('tb_cabang', 'user.id_cabang = tb_cabang.id_cabang', 'inner');
        $this->db->order_by('tanggal_daftar', 'DESC');
        $query = $this->db->get();

        return $query;
    }

    public function add($data)
    {
        $this->db->insert('user', $data);
    }

    public function update($data, $where)
    {
        $this->db->update('user', $data, $where);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
}
