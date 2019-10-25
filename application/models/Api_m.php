<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_m extends CI_Model
{
    public function addKey($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function getKey($table)
    {
        $this->db->from($table);
        $this->db->join("tb_api_keys", "tb_api_keys.user_id = $table.user_id");
        $query = $this->db->get();
        return $query;
    }

    public function deleteKey($table, $where)
    {
        $this->db->delete("$table, tb_api_keys", $where);
        $query = $this->db->join("tb_api_keys", "tb_api_keys.key = $table.key", "inner");
        return $query;
    }
}
