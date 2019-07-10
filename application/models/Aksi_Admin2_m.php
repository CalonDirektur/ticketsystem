<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_Admin2_m extends CI_Model
{
    public function approve($id_data)
    {
        $query = $this->db->update('data', ['id_approval' => 3], ['id_data' => $id_data]);
        return $query;
    }
}