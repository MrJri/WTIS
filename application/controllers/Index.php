<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("model_login");
    }
 
    function index(){
        $session = $this->session->userdata('isLoggedin');
        if($session == FALSE){
            redirect('login');
        }
        else{
            $session = $this->session->userdata('level');
            if($session == 'admin'){
                redirect('admin');
            }
            else if($session == 'aspiran'){
                redirect('aspiran');
            }
            else if($session == 'guru'){
                redirect('guru');
            }
            else if($session == 'siswa'){
                redirect('siswa');
            }
        }
    }
}