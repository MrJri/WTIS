<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('isLoggedin') == FALSE){
            redirect('login');
        }
        else if($this->session->userdata('level') != 'siswa'){
            redirect('login');
        }
    }

    function index(){
        $this->load->view('siswa/index');
    }
}