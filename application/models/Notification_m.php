<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification_m extends CI_Model
{
     public function update_notif()
    {
       $query = $this->db->update('data', ['notif_status'] => 1, ['notif_status'] => 0);
        return $query;
    }

    public function status_query()
    {
        $query = $this->db->get_where('data', ['notif_status'] => 0);
        return $query->result_array();
    }
}