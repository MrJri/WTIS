<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("model_login");
    }

    function index(){
        $this->load->view('register');
    }
    
    function reg(){
        $this->form_validation->set_rules('nis', 'Nis', 'required|trim|');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if($this->form_validation->run()==FALSE){
            $session = $this->session->userdata('isLoggedin');
            if($session == FALSE){
                $this->load->view('login');
            }
            else{
                redirect('');
            }
        }
        else{            
            if($this->model_login->save_siswa()){
                echo "<script>alert('Sukses!');
                </script>";
            }
            else{
                echo "<script>alert('Gagal!');
                </script>";
            }
        }
    }
}
