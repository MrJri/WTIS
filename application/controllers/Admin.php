<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('isLoggedin') == FALSE){
            redirect('login');
        }
        else if($this->session->userdata('level') != 'admin'){
            redirect('login');
        }
        $this->load->model('model_akun');
        $this->load->model("model_alat");
        $this->load->model("model_peminjaman");
        $this->load->library('form_validation');
	}
    
    public function index(){
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
        if (!isset($id)) redirect('admin/daftar');       
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
        $this->model_peminjaman->edit_pinjaman();/*{
            echo "<script>alert('Sukses ! Keterangan telah diedit.');
                </script>";
            redirect(site_url('admin/pinjamkan'));
        }*/
    }

    public function hapus_pinjaman($id=null){       
        if (!isset($id)){echo 'no ID!';}
        else{
            $this->model_peminjaman->tambahstatusalat($id);
            $this->model_peminjaman->hapus_pinjaman($id);
            redirect('aspiran/pinjamkan');
        }
    }

    public function submit_pinjamkan($id=null){       
        if (!isset($id)) redirect('admin/pinjamkan');
        if($this->model_peminjaman->submit_pinjamkan($id));
    }

    public function pengembalian(){        
        $data["pengembalian"] = $this->model_peminjaman->listpengembalian();
        // load view admin/pengembalian.php
        $this->load->view("admin/pengembalian.php", $data);
    }

    public function submit_pengembalian($id=null){       
        if (!isset($id)) {echo 'no ID!';}
        else {
            $this->model_peminjaman->tambahstatusalat($id);
            $this->model_peminjaman->submit_pengembalian($id);
            redirect('aspiran/pengembalian');
        }
    }

    public function delete($id=null){
    if (!isset($id)) show_404();    
    if ($this->model_alat->delete($id)) {
            redirect(site_url('admin/daftar'));
        }
    }
    function history(){
        $data["history"] = $this->model_peminjaman->history();
        $this->load->view('admin/history', $data);
    }

  ###########################                  START CONTROLER AKUN               ##########################

  #           ================                     BUAT ADMIN                      ============
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
        $this->load->view("admin/edit_akun", $data);
    }

  #           ================                     END ADMIN                       =============


  #       =============================            START SISWA           ===============================
    public function siswa(){
        $data["siswa"] = $this->model_akun->getAllsiswa();
        // load view daftar_siswa
        $this->load->view("admin/daftar_siswa", $data);
    }

    public function delete_siswa($id=null){
        if (!isset($id)) show_404();    
        if ($this->model_akun->delete($id)) {
                redirect(site_url('admin/siswa'));
            }
    }

    public function edit_siswa($id = null){
        if (!isset($id)) redirect('admin/siswa');       
        $akun = $this->model_akun;
        $validation = $this->form_validation;
        $validation->set_rules($akun->rules_siswa());
        if ($validation->run()) {            
            $akun->update_siswa();
            $this->session->set_flashdata('success', 'Data Akun Siswa Berhasil Disimpan');
        }
        $data["akun"] = $akun->getById($id);
        if (!$data["akun"]) show_404();
        $this->load->view("admin/edit_siswa", $data);
    }

    public function tambah_siswa(){
        $akun = $this->model_akun;
        $validation = $this->form_validation;
        $validation->set_rules($akun->rules_siswa());
        if ($validation->run()) {
            $akun->save_siswa();
            $this->session->set_flashdata('success', 'Data Siswa Berhasil Disimpan');
        }
        // load view admin/tambah_siswa.php
        $this->load->view("admin/tambah_siswa.php");
    }

#       =============================                 END SISWA               ===============================


    #<---------------------------------------          START     GURU     -------------------------------------->
    public function guru(){
        $data["guru"] = $this->model_akun->getAllguru();
        // load view admin/daftar_guru.php
        $this->load->view("admin/daftar_guru", $data);
    }

    public function delete_guru($id=null){
        if (!isset($id)) show_404();    
        if ($this->model_akun->delete($id)) {
                redirect(site_url('admin/guru'));
            }
    }

    public function edit_guru($id = null){
        if (!isset($id)) redirect('admin/guru');       
        $akun = $this->model_akun;
        $validation = $this->form_validation;
        $validation->set_rules($akun->rules_guru());
        if ($validation->run()) {            
            $akun->update_guru();
            $this->session->set_flashdata('success', 'Data Akun Guru Berhasil Disimpan');
        }
        $data["akun"] = $akun->getById($id);
        if (!$data["akun"]) show_404();
        $this->load->view("admin/edit_guru", $data);
    }

    public function tambah_guru(){
        $akun = $this->model_akun;
        $validation = $this->form_validation;
        $validation->set_rules($akun->rules_guru());
        if ($validation->run()) {
            $akun->save_guru();
            $this->session->set_flashdata('success', 'Data Guru Berhasil Disimpan');
        }
        // load view admin/tambah_guru.php
        $this->load->view("admin/tambah_guru.php");
    }
    #<---------------------------------------          END     GURU     -------------------------------------->

    #<---------------------------------------          START     ASPIRAN     -------------------------------------->
    public function aspiran(){
        $data["aspiran"] = $this->model_akun->getAllaspiran();
        // load view admin/daftar_aspiran.php
        $this->load->view("admin/daftar_aspiran", $data);
    }

    public function delete_aspiran($id=null){
        if (!isset($id)) show_404();    
        if ($this->model_akun->delete($id)) {
                redirect(site_url('admin/aspiran'));
            }
    }

    public function edit_aspiran($id = null){
        if (!isset($id)) redirect('admin/aspiran');       
        $akun = $this->model_akun;
        $validation = $this->form_validation;
        $validation->set_rules($akun->rules_guru());
        if ($validation->run()) {            
            $akun->update_aspiran();
            $this->session->set_flashdata('success', 'Data Akun Aspiran Berhasil Disimpan');
        }
        $data["akun"] = $akun->getById($id);
        if (!$data["akun"]) show_404();
        $this->load->view("admin/edit_aspiran", $data);
    }

    public function tambah_aspiran(){
        $akun = $this->model_akun;
        $validation = $this->form_validation;
        $validation->set_rules($akun->rules_guru());
        if ($validation->run()) {
            $akun->save_aspiran();
            $this->session->set_flashdata('success', 'Data Aspiran Berhasil Disimpan');
        }
        // load view admin/tambah_aspiran.php
        $this->load->view("admin/tambah_aspiran.php");
    }
    #<---------------------------------------          END     ASPIRAN     -------------------------------------->


}