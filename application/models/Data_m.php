<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_m extends CI_Model
{
    public function add($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function get($table, $where = NULL){
        $this->db->from($table);
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

   public function get_by_id($table, $where)
   {
        // $this->db->from($table1);
        // $this->db->join($table2, '$table1.')
        $query = $this->db->get_where($table, $where);
        return $query;
   }

   public function count_data($table, $where)
   {
        $this->db->from($table);
        $this->db->where($where);

        $query = $this->db->count_all_results();
        return $query;
   }    
}