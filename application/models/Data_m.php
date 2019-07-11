<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_m extends CI_Model
{
    public function add($data)
    {
        $this->db->insert('data', $data);
    }

    public function get($where = NULL){
        $this->db->from('data');
        if ($where == 'status_admin1') {
            $this->db->where('id_approval', 0);
            $this->db->or_where('id_approval', 1);
        }
        if ($where == 'status_admin2') {
            $this->db->where('id_approval', 2);
            $this->db->or_where('id_approval', 3);
        }
        if($where == 'pending_review'){
            $this->db->where('id_approval', 0);
        }
        if($where == 'rejected_review'){
            $this->db->where('id_approval', 1);
        }
        if($where == 'approved_review'){
            $this->db->where('id_approval', 2);
        }
        if($where == 'completed_review'){
            $this->db->where('id_approval', 3);
        }
        $query = $this->db->get();

        return $query;
    }

   
}