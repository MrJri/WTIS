<?php

class Alat extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_alat");
        $this->load->library('form_validation');
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
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        // load view admin/tambah_alat.php
        $this->load->view("admin/tambah_alat");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/alat/daftar');
       
        $alat = $this->model_alat;
        $validation = $this->form_validation;
        $validation->set_rules($alat->rules());

        if ($validation->run()) {
            $alat->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["alat"] = $alat->getById($id);
        if (!$data["alat"]) show_404();
        
        $this->load->view("admin/edit_alat", $data);
    }

    public function pinjamkan()
	{
        // load view admin/pinjamkan.php
        $this->load->view("admin/pinjamkan");
    }

    public function pengembalian()
	{
        // load view admin/pengembalian.php
        $this->load->view("admin/pengembalian.php");
    }

    public function delete($id=null)
    {
    if (!isset($id)) show_404();    
        if ($this->model_alat->delete($id)) {
            redirect(site_url('admin/alat/daftar'));
        }
    }
}