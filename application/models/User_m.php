<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    //Method Proses Login
    public function login($username, $password)
    {
        // $this->db->select('*');
        // $this->db->from('user');
        // $this->db->where('username', $post['username']);
        // $this->db->where('password', $post['password']);
        // $query = $this->db->get();

        // $query = $this->db->query("SELECT * FROM user WHERE (email = '".$email."' or username = '".$username."') AND password = '".$password."'' ");

        $this->db->where("(email = '$username' OR nik = '$username') AND password =  '$password'");
        // $this->db->where('password', $password);
        $this->db->where('is_active', 1);
        $query = $this->db->get('user');

        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            // $this->db->where(['username' => $id, 'user.id_cabang = tb_cabang.id_cabang']);
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
