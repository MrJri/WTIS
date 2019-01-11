<?php

class Users extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}
    
    public function index()
    {
        // load view daftar_siswa
        $this->load->view("admin/daftar_siswa");
    }

    public function daftar_siswa()
    {
        // load view daftar_siswa
        $this->load->view("admin/daftar_siswa");
    }

    public function guru()
	{
        // load view admin/daftar_guru.php
        $this->load->view("admin/daftar_guru");
    }

    public function tambah_guru()
	{
        // load view admin/tambah_guru.php
        $this->load->view("admin/tambah_guru.php");
    }

}