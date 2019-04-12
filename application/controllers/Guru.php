<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('isLoggedin') == FALSE){
            redirect('login');
        }
        else if($this->session->userdata('level') != 'guru'){
            redirect('login');
        }
        $this->load->model("model_peminjaman");
        $this->load->model("model_akun");
    }

    function index(){
        $data['request'] = $this->model_peminjaman->daftar_request();
        $this->load->view('guru/request', $data);
    }

    function izinkan($id=null){
        if(!isset($id)){
            echo '404 ERROR NO ID!';
        }
        $this->model_peminjaman->izinkan($id, $id_guru);
    }

    function tolak($id=null){
        if(!isset($id)){
            echo '404 ERROR NO ID!';
        }
        $this->model_peminjaman->tambahstatusalat($id);
        $this->model_peminjaman->tolak($id);
        redirect('guru');
    }

    function tanggung_jawab(){
        $data["list"] = $this->model_peminjaman->daftar_tanggung();
        $this->load->view('guru/tanggung_jawab', $data);
    }

    public function edit_akun(){
        $id= $this->session->userdata('ses_id');
        $akun = $this->model_akun;
        $validation = $this->form_validation;
        $validation->set_rules($akun->rules_guru());
        if ($validation->run()) {            
            $akun->update_akun($id);
            $this->session->set_flashdata('success', 'Data Admin Berhasil Disimpan');
        }
        $data["akun"] = $akun->getById($id);
        if (!$data["akun"]) show_404();
        $this->load->view("guru/edit_akun", $data);
    }
}