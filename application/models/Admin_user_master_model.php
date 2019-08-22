<?php

Class Admin_user_master_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function user_login($username,$password)
    {
        $sql = "SELECT * FROM users WHERE username=".$this->db->escape($username)."AND password=".$this->db->escape($password);
        $result = $this->db->query($sql);

        if($result->num_rows())
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}

