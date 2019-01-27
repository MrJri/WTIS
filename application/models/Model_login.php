<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Model_login extends CI_Model{
    //cek email dan password
    function auth_akun($email,$password){
        $query=$this->db->query("SELECT * FROM akun WHERE email='$email' AND password=MD5('$password') LIMIT 1");
        return $query;
        }
    }