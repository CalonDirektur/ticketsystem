<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_Admin1_m extends CI_Model
{
    public function approve($table, $where)
    {
        $query = $this->db->update($table, ['id_approval' => 2], $where);
        return $query;
    }

    public function reject($table, $where)
    {
        $query = $this->db->update($table, ['id_approval' => 1], $where);
        return $query;
    }
}
