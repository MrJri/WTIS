<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alat extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('isLoggedin') == FALSE){
            redirect('login');
        }
        else if($this->session->userdata('level') != 'admin'){
            redirect('login');
        }
        $this->load->model("model_alat");
        $this->load->model("model_peminjaman");
        $this->load->library('form_validation');
	}
    
    public function index(){
        $this->load->model("model_akun");
        $data["peminjaman"] = $this->model_peminjaman->listpeminjaman();
        $data["total_alat"] = $this->model_alat->hitung_alat();
        $data["total_guru"] = $this->model_akun->hitung_guru();
        $data["total_siswa"] = $this->model_akun->hitung_siswa();
	    $this->load->view("admin/dashboard", $data);// load view admin/dashboard.php dengan $data
    }
        
    public function daftar()
    {
        // load view alat
        $data["alat"] = $this->model_alat->getAll();
        $this->load->view("admin/daftar_alat", $data);
    }

    public function tambah()
	{
        $alat = $this->model_alat;
        $validation = $this->form_validation;
        $validation->set_rules($alat->rules());

        if ($validation->run()) {
            $alat->save();
            $this->session->set_flashdata('success', 'Data Alat Berhasil Disimpan');
        }
        // load view admin/tambah_alat.php
        $this->load->view("admin/tambah_alat");
    }

    public function edit($id = null){
        if (!isset($id)) redirect('admin/alat/daftar');       
        $alat = $this->model_alat;
        $validation = $this->form_validation;
        $validation->set_rules($alat->rules());
        if ($validation->run()) {            
            $alat->update();
            $this->session->set_flashdata('success', 'Data Alat Berhasil Disimpan');
        }
        $data["alat"] = $alat->getById($id);
        if (!$data["alat"]) show_404();
        $this->load->view("admin/edit_alat", $data);
    }

    public function pinjamkan(){
        $data["pinjamkan"] = $this->model_peminjaman->listpinjamkan();
        // load view admin/pinjamkan.php
        $this->load->view("admin/pinjamkan", $data);
    }

    public function edit_pinjaman(){       
        echo "<script>alert('sampe controller');
                </script>";
        if($this->model_peminjaman->edit_pinjaman()){
            echo "<script>alert('Sukses ! Keterangan telah diedit.');
                </script>";
            redirect(site_url('admin/alat/pinjamkan'));
        }
    }

    public function hapus_pinjaman($id=null){       
        if (!isset($id)) redirect('admin/alat/pinjamkan');
        if($this->model_peminjaman->hapus_pinjaman($id)){
            redirect('admin/alat/pinjamkan');
            }
    }

    public function submit_pinjamkan($id=null){       
        if (!isset($id)) redirect('admin/alat/pinjamkan');
        if($this->model_peminjaman->submit_pinjamkan($id)){
            redirect(site_url('admin/alat/pinjamkan'));
        }
    }

    public function pengembalian(){        
        $data["pengembalian"] = $this->model_peminjaman->listpengembalian();
        // load view admin/pengembalian.php
        $this->load->view("admin/pengembalian.php", $data);
    }

    public function submit_pengembalian($id=null){       
        if (!isset($id)) redirect('admin/alat/pengembalian');
        if($this->model_peminjaman->submit_pengembalian($id)){
            redirect('admin/alat/pengembalian');
            }
    }

    public function delete($id=null){
    if (!isset($id)) show_404();    
    if ($this->model_alat->delete($id)) {
            redirect(site_url('admin/alat/daftar'));
        }
    }
}