<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Akun extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_akun');
	}
    
    public function index()
    {
        redirect('');
    }

    public function siswa(){
        $data["siswa"] = $this->model_akun->getAllsiswa();
        // load view daftar_siswa
        $this->load->view("admin/daftar_siswa", $data);
    }

    public function delete_siswa($id=null){
        if (!isset($id)) show_404();    
        if ($this->model_akun->delete($id)) {
                redirect(site_url('admin/akun/siswa'));
            }
    }

    public function edit_siswa($id = null){
        if (!isset($id)) redirect('admin/akun/siswa');       
        $akun = $this->model_akun;
        $validation = $this->form_validation;
        $validation->set_rules($akun->rules());
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
        $validation->set_rules($akun->rules());
        if ($validation->run()) {
            $akun->save_siswa();
            $this->session->set_flashdata('success', 'Data Siswa Berhasil Disimpan');
        }
        // load view admin/tambah_siswa.php
        $this->load->view("admin/tambah_siswa.php");
    }

    #<---------------------------------------          START     GURU     -------------------------------------->
    public function guru(){
        $data["guru"] = $this->model_akun->getAllguru();
        // load view admin/daftar_guru.php
        $this->load->view("admin/daftar_guru", $data);
    }

    public function delete_guru($id=null){
        if (!isset($id)) show_404();    
        if ($this->model_akun->delete($id)) {
                redirect(site_url('admin/akun/guru'));
            }
    }

    public function edit_guru($id = null){
        if (!isset($id)) redirect('admin/akun/guru');       
        $akun = $this->model_akun;
        $validation = $this->form_validation;
        $validation->set_rules($akun->rules());
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
        $validation->set_rules($akun->rules());
        if ($validation->run()) {
            $akun->save_guru();
            $this->session->set_flashdata('success', 'Data Guru Berhasil Disimpan');
        }
        // load view admin/tambah_guru.php
        $this->load->view("admin/tambah_guru.php");
    }

}