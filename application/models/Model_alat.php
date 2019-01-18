<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_alat extends CI_Model
{
    private $_table = "alat";

    public $id_alat;
    public $nama_alat;
    public $jumlah;
    public $kondisi;
    public $jenis;
    public $status;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric'],

            ['field' => 'kondisi',
            'label' => 'Kondisi'],

            ['field' => 'jenis',
            'label' => 'Jenis',
            'rules' => 'required'],
            
            ['field' => 'status',
            'label' => 'status']

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_alat" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_alat = uniqid();
        $this->nama_alat = $post["nama"];
        $this->jumlah = $post["jumlah"];
        $this->kondisi = $post["kondisi"];
        $this->jenis = $post["jenis"];
        $this->status = $post["status"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_alat = $post["id"];
        $this->nama_alat = $post["nama"];
        $this->jumlah = $post["jumlah"];
        $this->kondisi = $post["kondisi"];
        $this->jenis = $post["jenis"];
        $this->status = $post["status"];
        $this->db->update($this->_table, $this, array('id_alat' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_alat" => $id));
    }  
}