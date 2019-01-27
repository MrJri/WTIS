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
        //if(empty($_SESSION['ses_id'] && $_SESSION))
        /* $email=$this->input->post('email');
        $password=$this->input->post('password');
        $cek_akun=$this->model_login->auth_akun($email,$password);

        
        if($cek_akun->num_rows() > 0){ //cek jika ada data akun
                $data=$cek_akun->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['level']=='admin'){ //Akses admin
                    $this->session->set_userdata('akses','admin');
                    $this->session->set_userdata('ses_id',$data['id_akun']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    redirect('admin');
                }
                 else if($data['level']=='aspiran'){ //Akses aspiran
                    $this->session->set_userdata('akses','aspiran');
                    $this->session->set_userdata('ses_id',$data['id_akun']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    redirect('aspiran');
                }
                else if($data['level']=='guru'){ //Akses guru
                    $this->session->set_userdata('akses','guru');
                    $this->session->set_userdata('ses_id',$data['id_akun']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    redirect('guru');
                }
                else if($data['level']=='siswa'){ //Akses siswa
                    $this->session->set_userdata('akses','siswa');
                    $this->session->set_userdata('ses_id',$data['id_akun']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    redirect('siswa');
                }
        }
        else{ // jika username dan password tidak ditemukan atau salah
            $this->load->view("login");
            echo $this->session->set_flashdata('msg','Username Atau Password Salah');           
        }*/
    }
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
}
