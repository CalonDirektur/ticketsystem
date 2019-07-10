<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function login($table, $where)
    {
        // $this->db->select('*');
        // $this->db->from('user');
        // $this->db->where('username', $post['username']);
        // $this->db->where('password', $post['password']);
        // $query = $this->db->get();

        $query = $this->db->get_where($table, $where);

        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('username', $id);
        }
        $query = $this->db->get();

        return $query;
    }

    public function add($data)
    {
        $this->db->insert('user', $data);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
}
