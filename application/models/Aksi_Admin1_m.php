<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_Admin1_m extends CI_Model
{
    public function approve($id_data)
    {
        $query = $this->db->update('data', ['id_approval' => 2], ['id_data' => $id_data]);
        return $query;
    }

    public function reject($id_data)
    {
       $query = $this->db->update('data', ['id_approval' => 1], ['id_data' => $id_data]);
        return $query;
    }
}