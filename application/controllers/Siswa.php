<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Siswa extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('isLoggedin') == FALSE){
            redirect('login');
        }
        else if($this->session->userdata('level') != 'siswa'){
            redirect('login');
        }
        $this->load->model('model_akun');
        $this->load->model('model_alat');
        $this->load->model('model_peminjaman');
    }

    function index(){
        $data['guru'] = $this->model_akun->getnamaguru();
        $data['data']=$this->model_alat->getAll();
        $this->load->view('siswa/dashboard',$data);
    }

    function addcart(){ 
        if($this->model_alat->validate_add_cart_item() == TRUE){
			// Check if user has javascript enabled
			if($this->input->post('ajax') != '1'){
				redirect('siswa'); // If javascript is not enabled, reload the page with new data
			}else{
				echo 'true'; // If javascript is enabled, return true, so the cart gets updated
			}
		}
    }

    function sub_cart(){
        $hitung = $this->input->post();
        $total = $hitung["jumlah_alat"]; // Get the total number of items in cart
        $this->model_peminjaman->tambah_pinjaman($total);
    }

    function show_cart(){
		$this->load->view('siswa/cart');
    }
    
    function update_cart(){
        $hitung = $this->input->post();
        $total = $hitung["jumlah_alat"]; // Get the total number of items in cart
		$this->model_alat->validate_update_cart($total);
		redirect('siswa');
	}

    function daftar_siswa(){
        $data["siswa"] = $this->model_akun->getAllsiswa();
        // load view daftar_siswa
        $this->load->view("siswa/daftar_siswa", $data);
    }   
    
}