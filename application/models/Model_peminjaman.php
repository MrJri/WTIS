<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peminjaman extends CI_Model
{
    private $_table = "peminjaman";

    public $id_peminjam;
    public $id_alat;
    public $id_penanggung;
    public $jumlah;

    public function rules(){
        return [
            ['field' => 'id_peminjam',
            
            'rules' => 'required'],

            ['field' => 'id_alat',
            
            'rules' => 'required'],

            ['field' => 'penanggungjawab',
            
            'rules' => 'required'],

            ['field' => 'jumlah',
            
            'rules' => 'required']
        ];
    }

    function tambah_pinjaman(){
        $post= $this->input->post();
        $this->id_peminjam = $post["id_peminjam"];
        $this->id_alat = $post["id_alat"];
        $this->id_penanggung = $post["penanggungjawab"];
        $this->jumlah_pinjam = $post["jumlah"];
        $this->db->insert($this->_table, $this);
        echo "<script>alert('Sukses !');
                </script>";
    }

    function edit_pinjaman(){
        $post = $this->input->post();
        $this->id_peminjaman = $post["id"];
        $this->ket = $post["keterangan"];
        $this->db->update($this->_table, $this, array('id_peminjaman' => $post['id']));
    }

    function hapus_pinjaman($id){
        return $this->db->delete($this->_table, array("id_peminjaman" => $id));
            echo "<script>alert('Sukses ! Data telah dihapus');
                </script>";
    }

    function listpinjamkan(){
        return $query1 = $this->db->query('SELECT nama_alat, jumlah_pinjam, tanggal_peminjaman, ket, status, id_peminjaman,
                                    A.nama siswa, B.nama guru from akun A,akun B,
                                    ((peminjaman INNER JOIN akun ON peminjaman.id_peminjam = akun.id_akun
                                    ) INNER JOIN alat ON peminjaman.id_alat = alat.id_alat) WHERE status="Menunggu Aspiran" 
                                    AND A.id_akun = id_peminjam AND B.id_akun = id_penanggung ')->result();
        
        //$this->db->where('status = "Menunggu Aspiran"');
        //return $this->db->get('peminjaman')->result();
    }
    
    function listpengembalian(){
        $this->db->where('status = "Pengembalian"');
        return $this->db->get('peminjaman')->result();
        /*$this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('akun', 'peminjaman.id_akun = akun.id_akun');
        $this->db->join('alat', 'peminjaman.id_alat = alat.id_alat');
        $this->db->join('tanggungan', 'peminjaman.id_peminjaman = tanggungan.id_peminjaman');
        */
        
        //return $query = $this->db->get()->result();   //OLD FUNCTION ALIAS GAGAL
    }

    function listpeminjaman(){

        return $query1 = $this->db->query('SELECT nama_alat, jumlah_pinjam, tanggal_peminjaman, ket,
                                    A.nama siswa, B.nama guru from akun A,akun B,
                                    ((peminjaman INNER JOIN akun ON peminjaman.id_peminjam = akun.id_akun
                                    ) INNER JOIN alat ON peminjaman.id_alat = alat.id_alat) WHERE status="Dipinjam" 
                                    AND A.id_akun = id_peminjam AND B.id_akun = id_penanggung ')->result();
        //$query2 = $this->db->query('SELECT nama nama_penanggung FROM peminjaman JOIN akun on
          //                          peminjaman.id_penanggung = akun.id_akun')->result();
        //return array_merge($query1);
        /*$this->db->select('nama as nama_penanggung');
        $this->db->from('peminjaman');
        $this->db->join('akun', 'peminjaman.id_penanggung = akun.id_akun');
        $array_2 = $this->db->get()->result();
        return array_merge($array_1, $array_2);
        //return $this->db->get($this->_tablepeminjaman)->result();
        /*$this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('akun', 'peminjaman.id_akun = akun.id_akun');
        $this->db->join('alat', 'peminjaman.id_alat = alat.id_alat');
        $this->db->join('tanggungan', 'peminjaman.id_peminjaman = tanggungan.id_peminjaman');
        return $query = $this->db->get()->result();
        */
    }

    function submit_pengembalian($id){
        return $this->db->delete($this->_table, array("id_peminjaman" => $id));
            echo "<script>alert('Sukses ! alat telah dikembalikan');
                </script>";
    }

    function submit_pinjamkan($id){
        $this->status = "Dipinjam";
        $this->db->update($this->_table, $this, array('id_peminjaman' => $id));
        redirect(site_url('admin/alat/pinjamkan'));
    }
}