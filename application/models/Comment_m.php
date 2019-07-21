<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment_m extends CI_Model
{
    public function add_comment($data)
    {
        $query = $this->db->insert('tb_comment', $data);
        return $this->db->affected_rows();
    }

    public function get_comment($table, $where)
    {
        $this->db->from('tb_comment, user, tb_cabang, ' . $table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
}
