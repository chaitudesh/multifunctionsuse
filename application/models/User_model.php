<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{



    public function signin($id, $p)
    {
        //$query = "select * from user_login where email='$id'";
//    $res = $this->db->query($query);
        $this->db->select('*');
        $this->db->from("users");
        $this->db->where('username', $id);
        $res = $this->db->get()->result();
        if ($res) {
            $this->db->select('*');
            $this->db->from("users");
            $this->db->where('username', $id);
            $this->db->where('password', sha1($p));
            $dt = $this->db->get()->result();
            //  print_r($dt);die;

            if ($dt) {
                return $dt[0];
            }
        } else {
            return "01";
        }
    }

    public function register($arr)
    {
        // echo 'hii';die;
        $s = $this->db->insert('users', $arr);
        // print_r($s);die;
        return $s;
    }



}


