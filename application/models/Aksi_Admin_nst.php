<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_Admin_nst extends CI_Model
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

    public function complete($table, $where)
    {
        $query = $this->db->update($table, ['id_approval' => 3], $where);
        return $query;
    }
}
