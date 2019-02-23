<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Model_akun extends CI_Model{

    private $_table = "akun";
    
    public function rules(){
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|trim'],

            ['field' => 'email',
            'label' => 'email',
            'rules' => 'required'],

            ['field' => 'nis',
            'label' => 'nis',
            'rules' => 'required|integer'],

            ['field' => 'tingkat',
            'label' => 'tingkat',
            'rules' => 'required'],

            ['field' => 'kelas',
            'label' => 'kelas',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required']
        ];
    }

    public function rules_guru(){
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|trim'],

            ['field' => 'email',
            'label' => 'email',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required']
        ];
    }
    
    public function getById($id){
        return $this->db->get_where($this->_table, ["id_akun" => $id])->row();
    }

    function hitung_guru(){
        //$sql = "select COUNT(*) from akun";
        //$query = $this->db->query('select COUNT(*) from akun WHERE level="guru"');
        $result = $this->db->query('select COUNT(*) from akun WHERE level="guru"')->row_array();
        $count = $result['COUNT(*)']; //convert array jadi string
        return $count;
    }
    function hitung_siswa(){
        //$sql = "select COUNT(*) from akun";
        //$query = $this->db->query('select COUNT(*) from akun WHERE level="siswa"');
        $result = $this->db->query('select COUNT(*) from akun WHERE level="siswa"')->row_array();
        $count = $result['COUNT(*)']; //convert array jadi string
        return $count;
    }
#<---------------------------------------          START     SISWA     -------------------------------------->
    public function getAllsiswa(){
        $this->db->where('level', 'siswa');
        return $this->db->get($this->_table)->result();
    }

    public function save_siswa(){
        $post = $this->input->post();
        $this->id_akun = uniqid();
        $this->nis = $post["nis"];
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->tingkat = $post["tingkat"];
        $this->kelas = $post["kelas"];
        $this->no_hp = $post["nohp"];
        $this->password = md5($this->input->post("password"));
        $this->level = "siswa";
        $this->db->insert($this->_table, $this);
    }

    public function update_siswa(){
        $post = $this->input->post();
        $this->id_akun = $post["id"];
        $this->nis = $post["nis"];
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->tingkat = $post["tingkat"];
        $this->kelas = $post["kelas"];
        $this->no_hp = $post["nohp"];
        $this->password = md5($this->input->post("password"));
        $this->db->update($this->_table, $this, array('id_akun' => $post['id']));
    }
    
#<---------------------------------------          START     GURU     -------------------------------------->
    public function getAllguru(){
        $this->db->where('level', 'guru');
        return $this->db->get($this->_table)->result();
    }

    public function getnamaguru(){
        $query=$this->db->query("SELECT id_akun,nama FROM akun WHERE level='guru' ")->result();
        return $query;
        //$this->db->select('id', 'nama');
        //$this->db->where('level', 'guru');
        //return $this->db->get($this->_table)->result();
    }

    public function save_guru(){
        $post = $this->input->post();
        $this->id_akun = uniqid();
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->password = md5($this->input->post("password"));
        $this->level = "guru";
        $this->db->insert($this->_table, $this);
    }

    public function update_guru(){
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->no_hp = $post["nohp"];
        $this->password = md5($this->input->post("password"));
        $this->db->update($this->_table, $this, array('id_akun' => $post['id']));
    }

    public function delete($id){
        return $this->db->delete($this->_table, array("id_akun" => $id));
    }
}