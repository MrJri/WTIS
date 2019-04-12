<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspiran extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('isLoggedin') == FALSE){
            redirect('login');
        }
        else if($this->session->userdata('level') != 'aspiran'){
            redirect('login');
        }
        $this->load->model('model_akun');
        $this->load->model("model_alat");
        $this->load->model("model_peminjaman");
        $this->load->library('form_validation');
    }

    function index(){
        $data["peminjaman"] = $this->model_peminjaman->listpeminjaman();
        $data["total_alat"] = $this->model_alat->hitung_alat();
        $data["total_guru"] = $this->model_akun->hitung_guru();
        $data["total_siswa"] = $this->model_akun->hitung_siswa();
	    $this->load->view("aspiran/dashboard", $data);// load view aspiran/dashboard.php dengan $data
    }

    function daftar()
    {
        // load view alat
        $data["alat"] = $this->model_alat->getAll();
        $this->load->view("aspiran/daftar_alat", $data);
    }

    function pinjamkan(){
        $data["pinjamkan"] = $this->model_peminjaman->listpinjamkan();
        $this->load->view("aspiran/pinjamkan", $data);
    }

    function edit_pinjaman(){       
        echo "<script>alert('sampe controller');
                </script>";
        $this->model_peminjaman->edit_pinjaman();
    }

    function hapus_pinjaman($id=null){       
        if (!isset($id)){echo 'no ID!';}
        else{
            $this->model_peminjaman->tambahstatusalat($id);
            $this->model_peminjaman->hapus_pinjaman($id);
            redirect('aspiran/pinjamkan');
        }
    }

    function submit_pinjamkan($id=null){       
        if (!isset($id)) redirect('aspiran/pinjamkan');
        if($this->model_peminjaman->submit_pinjamkan($id));
    }

    function pengembalian(){        
        $data["pengembalian"] = $this->model_peminjaman->listpengembalian();
        // load view aspiran/pengembalian.php
        $this->load->view("aspiran/pengembalian.php", $data);
    }

    function submit_pengembalian($id=null){       
        if (!isset($id)) {echo 'no ID!';}
        else {
            $this->model_peminjaman->tambahstatusalat($id);
            $this->model_peminjaman->submit_pengembalian($id);
            redirect('aspiran/pengembalian');
        }
    }

    function history(){
        $data["history"] = $this->model_peminjaman->history();
        $this->load->view('aspiran/history', $data);
    }

    #           ================                     BUAT ASPIRAN                      ============
    public function edit_akun(){
        $id= $this->session->userdata('ses_id');
        $akun = $this->model_akun;
        $validation = $this->form_validation;
        $validation->set_rules($akun->rules_guru());
        if ($validation->run()) {            
            $akun->update_akun($id);
            $this->session->set_flashdata('success', 'Data Aspiran Berhasil Disimpan');
        }
        $data["akun"] = $akun->getById($id);
        if (!$data["akun"]) show_404();
        $this->load->view("aspiran/edit_akun", $data);
    }

}