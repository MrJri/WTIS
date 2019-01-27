<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peminjaman extends CI_Model
{
    private $_table = "peminjaman";

    public function edit_pinjaman(){
        $post = $this->input->post();
        $this->id_peminjaman = $post["id"];
        $this->ket = $post["keterangan"];
        $this->db->update($this->_table, $this, array('id_peminjaman' => $post['id']));
    }

    public function hapus_pinjaman($id){
        return $this->db->delete($this->_table, array("id_peminjaman" => $id));
            echo "<script>alert('Sukses ! Data telah dihapus');
                </script>";
    }

    public function listpinjamkan(){
        $this->db->where('status = "Menunggu Aspiran"');
        return $this->db->get('peminjaman')->result();
    }
    
    public function listpengembalian(){
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

    public function listpeminjaman(){
        $this->db->where('status = "Dipinjam"');
        return $this->db->get('peminjaman')->result();
        //return $this->db->get($this->_tablepeminjaman)->result();
        /*$this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('akun', 'peminjaman.id_akun = akun.id_akun');
        $this->db->join('alat', 'peminjaman.id_alat = alat.id_alat');
        $this->db->join('tanggungan', 'peminjaman.id_peminjaman = tanggungan.id_peminjaman');
        return $query = $this->db->get()->result();
        */
    }

    public function submit_pengembalian($id){
        return $this->db->delete($this->_table, array("id_peminjaman" => $id));
            echo "<script>alert('Sukses ! alat telah dikembalikan');
                </script>";
    }

    public function submit_pinjamkan($id){
        $this->status = "Dipinjam";
        $this->db->update($this->_table, $this, array('id_peminjaman' => $id));
        echo "<script>alert('Sukses ! alat dipinjamkan');
                </script>";
    }
}