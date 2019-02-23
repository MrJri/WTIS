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
        $data['data']=$this->model_alat->getAll();
        $this->load->view('siswa/dashboard',$data);
    }

    function add_to_cart(){ 
        $data = array(
            'id' => $this->input->post('id'), 
            'name' => $this->input->post('nama'), 
            'price' => $this->input->post('product_price'), 
            'qty' => $this->input->post('quantity'), 
        );
        $this->cart->insert($data);
        echo $this->show_cart(); 
    }
 
    function load_cart(){ 
        echo $this->show_cart();
    }

    function show_cart(){ 
        
        $pinjam = $this->model_peminjaman;
        $validation = $this->form_validation;
        $validation->set_rules($pinjam->rules());
        if ($validation->run()) {
            echo "<script>alert(' YEAY POST!');
            </script>')";
            $this->model_peminjaman->tambah_pinjaman();
            $this->cart->destroy();
        }

        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <input type="hidden" id="id_peminjam" name="id_peminjam" value="'.$this->session->userdata('ses_id').'"/>
                    <input type="hidden" id="id_alat" name="id_alat" value="'.$items['id'].'"/>
                    <input type="hidden" id="jumlah" name="jumlah" value="'.$items['qty'].'"/>
                    <td>'.$items['name'].'</td>
                    <td>'.$items['qty'].'</td>
                    
                    <td><button type="button" id="'.$items['rowid'].'" class="romove_cart btn btn-danger btn-sm">Cancel</button></td>
                </tr>
            ';
        }
        
        $nama = $this->model_akun->getnamaguru();
        $output .= '
            <tr>
                <th >Penanggung Jawab</th>
                <th ><select id="penanggungjawab" name="penanggungjawab" class="form-control col-light">
                        <option>-</option>
                        '; foreach($nama as $guru): $output .= '<option value='.$guru->id_akun.'>'. $guru->nama .'</option>'; endforeach;
                        $output .='
                    </select> </th>
                <th >
                <button class="pinjam btn btn-primary btn-sm">Pinjam</button>
            </tr>
          
        ';
        return $output;
    }
 
    function pinjam(){
        
    }
 
    function delete_cart(){ 
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }

    function daftar_siswa(){
        $data["siswa"] = $this->model_akun->getAllsiswa();
        // load view daftar_siswa
        $this->load->view("siswa/daftar_siswa", $data);
    }

    
    
}