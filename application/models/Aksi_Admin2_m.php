<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_Admin2_m extends CI_Model
{
    public function approve($table, $where)
    {
        $query = $this->db->update($table, ['id_approval' => 3], $where);
        return $query;
    }
}
