<?php

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_peminjaman");
		$this->load->library('form_validation');
		}

	public function index()
	{
	// load view admin/dashboard.php
	$data["peminjaman"] = $this->model_peminjaman->listpeminjaman();
	$this->load->view("admin/dashboard", $data);
		}
}