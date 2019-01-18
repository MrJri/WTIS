<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peminjaman extends CI_Model
{
    private $_tablepeminjaman = "peminjaman";

    public $id_peminjaman;
    public $id_akun;
    public $id_alat;
    public $jumlah_pinjam;
    public $tanggal_peminjaman;
    public $batas_waktu;
    public $tanggal_pengembalian;
    public $denda;
    public $status;

    public function listpeminjaman()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('akun', 'peminjaman.id_akun = akun.id_akun');
        $this->db->join('alat', 'peminjaman.id_alat = alat.id_alat');
        return $query = $this->db->get()->result();
        
    }
}