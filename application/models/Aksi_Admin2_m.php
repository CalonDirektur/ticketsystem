<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_Admin2_m extends CI_Model
{
    public function complete($table, $where)
    {
        $query = $this->db->update($table, ['id_approval' => 3], $where);
        return $query;
    }

    public function reject($table, $where)
    {
        $query = $this->db->update($table, ['id_approval' => 1], $where);
        return $query;
    }
}
