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

    function tes(){
        $this->model_peminjaman->tes();
        //$this->load->view('siswa/tes',$data);
    }
    
    function index(){
        $data['data'] = $this->model_alat->getAll();
        $this->load->view('siswa/dashboard',$data);
    }

    function add_to_cart(){ 
        $data = array(
            'id' => $this->input->post('id'), 
            'name' => $this->input->post('nama'), 
            'price' => 0, 
            'qty' => $this->input->post('quantity'), 
        );
        $this->cart->insert($data);
        $data['guru'] = $this->model_akun->getnamaguru();
        $this->load->view('siswa/content', $data);
    }

    function sub_cart(){
        $hitung = $this->input->post();
        $total = $hitung["jumlah_alat"]; // Get the total number of items in cart
        $id_siswa = $this->session->userdata('ses_id');
        $this->model_peminjaman->tambah_pinjaman($total, $id_siswa);
    }

    function destroy_cart(){
        $this->cart->destroy(); // destroy all cart item
        $this->index();
        redirect('');
    }
 
    function load_content(){
        $data['guru'] = $this->model_akun->getnamaguru();
        $this->load->view('siswa/content', $data);
    }
    
    function load_cart(){ 
        echo $this->show_cart();
    }

    function load_guru(){
        echo $this->show_guru();
    }

    function show_cart(){ 
        $output = '';
        $a=0; $b=0;
        foreach ($this->cart->contents() as $items) {
            $output .='
                <tr>
                    <td>
                        <input type="hidden" name="rowid['.$a.']" value="'.$items['rowid'].'">
                        '.$items['name'].'
                    </td>
                    <td>
                        <input type="text" name="qty['.$a.']" value="'.$items['qty'].'" maxlength="2" class="form-control form-control-sm">
                    </td>
                    <td>
                        <input type="submit" value="Update" class="btn btn-primary btn-sm">
                    ';
                    $b=$a+1; 
                    $output .='
                </tr>
            ';
            $a++;
        }
        $output .='<input type="hidden" name ="jumlah_alat" value="'.$b.'"';
        echo $output;

    }
 
    function show_guru(){
         $hitung=0; $b=0;
         foreach($this->cart->contents() as $items):
         echo form_hidden('id_alat'.$hitung.'', $items['id']); 
         echo form_hidden('jumlah_pinjam'.$hitung.'', $items['qty']); 
         $b=$hitung+1; 
         $hitung++; 
         endforeach; 
         echo form_hidden('jumlah_alat', $b); 
         echo anchor('siswa/destroy_cart', 'Hapus Semua', 'class="btn btn-danger btn-sm col-sm-5"'); 
         //echo anchor('siswa/destroy_cart', 'Hapus Semua', 'class="btn btn-danger btn-sm col-sm-5"'); 
         echo form_submit('', 'Pinjam!', 'class="btn btn-primary btn-sm col-sm-5"');
         //echo form_submit('', 'Pinjam!', 'class="btn btn-primary btn-sm col-sm-5"');
    }

    function update_cart(){
        $hitung = $this->input->post();
        $total_alat = $hitung["jumlah_alat"]; // Get the total number of items in cart
		$this->model_alat->validate_update_cart($total_alat);
		redirect('siswa');
	}

    /*function daftar_siswa(){
        $data["siswa"] = $this->model_akun->getAllsiswa();
        // load view daftar_siswa
        $this->load->view("siswa/daftar_siswa", $data);
    }*/

    function daftarpinjam(){
        $data["peminjaman"] = $this->model_peminjaman->daftar_pinjam();
        $this->load->view('siswa/peminjaman', $data);   
    }

    function hapuspinjam($id=null){       
        if (!isset($id)){
            echo '404 ERROR NO ID!';
        }
        $this->model_peminjaman->tambahstatusalat($id);
        $this->model_peminjaman->hapus_pinjaman($id);
        redirect('siswa/daftarpinjam');
    }

    public function edit_akun($id){
        $id= $this->session->userdata('ses_id');
        $akun = $this->model_akun;
        $validation = $this->form_validation;
        $validation->set_rules($akun->rules_siswa());
        if ($validation->run()) {         
            $akun->updateby_siswa($id);
            $this->session->set_flashdata('success', 'Data Admin Berhasil Disimpan');
        }
        $data["akun"] = $akun->getById($id);
        if (!$data["akun"]) show_404();
        $this->load->view("siswa/edit_akun", $data);
    }
    
}