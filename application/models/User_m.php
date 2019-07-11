<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    //Method Proses Login
    public function login($username, $password)
    {
        // $this->db->select('*');
        // $this->db->from('user');
        // $this->db->where('username', $post['username']);
        // $this->db->where('password', $post['password']);
        // $query = $this->db->get();

        // $query = $this->db->query("SELECT * FROM user WHERE (email = '".$email."' or username = '".$username."') AND password = '".$password."'' ");

        $this->db->where("email = '$username' OR username = '$username'");
        $this->db->where('password', $password);
        $query = $this->db->get('user');

        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('username', $id);
        }
        $query = $this->db->get();

        return $query;
    }

    public function add($data)
    {
        $this->db->insert('user', $data);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
    }
