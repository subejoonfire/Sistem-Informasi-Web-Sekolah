<?php
class M_login extends CI_Model{
    function cekadmin($u,$p){
        $hasil=$this->db->query("SELECT * FROM admin WHERE username_admin='$u' AND password_admin=md5('$p')");
        return $hasil;
    }

}
