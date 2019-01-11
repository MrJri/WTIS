<?php

class Alat extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_alat");
        $this->load->library('form_validation');
	}
    
    public function index()
    {
        // load view alat
        $data["alat"] = $this->model_alat->getAll();
        $this->load->view("admin/daftar_alat", $data);
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

    public function daftar_alat()
	{
        // load view admin/daftar_alat.php
        $this->load->view("admin/daftar_alat");
    }

}