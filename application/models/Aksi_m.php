<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_m extends CI_Model
{
    public function reject($table, $where)
    {
        $this->db->update('tb_ticket', ['date_rejected' => date('Y-m-d H:i:s'), 'id_approval' => 1], $where);
        $query = $this->db->update($table, ['id_approval' => 1], $where);
        return $query;
    }
    public function approve($table, $where)
    {
        $this->db->update('tb_ticket', ['date_approved' => date('Y-m-d H:i:s'), 'id_approval' => 2], $where);
        $query = $this->db->update($table, ['id_approval' => 2], $where);
        return $query;
    }


    public function complete($table, $where)
    {
        $this->db->update('tb_ticket', ['date_completed' => date('Y-m-d H:i:s'), 'id_approval' => 3], $where);
        $query = $this->db->update($table, ['id_approval' => 3], $where);
        return $query;
    }

    public function in_progress($table, $where)
    {
        $this->db->update('tb_ticket', ['date_inprogress' => date('Y-m-d H:i:s'), 'id_approval' => 4], $where);
        $query = $this->db->update($table, ['id_approval' => 4], $where);
        return $query;
    }
}
