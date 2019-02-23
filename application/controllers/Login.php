<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("model_login");
    }

    function index(){
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
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $cek_akun=$this->model_login->auth_akun($email,$password);
            if($cek_akun->num_rows() > 0){
                $user_data=$cek_akun->row_array();
                $this->session->set_userdata('isLoggedin',TRUE);
                $this->session->set_userdata('ses_id',$user_data['id_akun']);
                $this->session->set_userdata('ses_nama',$user_data['nama']);
                 if($user_data['level']=='admin'){ //level admin
                    $this->session->set_userdata('level','admin');
                    redirect('admin');
                }
                 else if($user_data['level']=='aspiran'){ //level aspiran
                    $this->session->set_userdata('level','aspiran');
                    redirect('aspiran');
                }
                else if($user_data['level']=='guru'){ //level guru
                    $this->session->set_userdata('level','guru');
                    redirect('guru');
                }
                else if($user_data['level']=='siswa'){ //level siswa
                    $this->session->set_userdata('level','siswa');
                    redirect('siswa');
                }
            }
            else{
                $this->load->view('login');
                echo "<script>alert('Failed Login: Check your username and password!');
                </script>";
            }
        }
    }
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
}
