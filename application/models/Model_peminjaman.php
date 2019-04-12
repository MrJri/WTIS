<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peminjaman extends CI_Model
{
    private $_table = "peminjaman";
    private $_tablealat = "alat";

//    public $id_peminjam;
//  public $id_alat;
//    public $id_penanggung;
//    public $jumlah_pinjam;
    

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

    function tambah_pinjaman($total, $id_siswa){
        // Cycle true all cart items and insert them to db
        for($i=0;$i<$total;$i++){
            $post = $this->input->post();                        
            $id_alat = $post["id_alat".$i.""];
            $jumlah_pinjam = $post["jumlah_pinjam".$i.""];
            $this->id_peminjaman = uniqid();
            $this->id_peminjam = $id_siswa;
            $this->id_penanggung = $post["id_guru"];
            $this->id_alat = $id_alat;
            $this->jumlah_pinjam = $jumlah_pinjam;
            $this->db->insert($this->_table, $this);
            $hitung = mysqli_query(mysqli_connect('localhost:3306','root','','wtis'),'SELECT status_alat FROM alat where id_alat = "'.$id_alat.'"');
            $jumlah_total = mysqli_fetch_array($hitung);
            $jumlah_alat = $jumlah_total['status_alat'];
            $status = $jumlah_alat-$jumlah_pinjam;
            $query = mysqli_query(mysqli_connect('localhost:3306','root','','wtis'),'UPDATE alat set status_alat='.$status.' where id_alat = "'.$id_alat.'"');
        }
        $this->cart->destroy(); // destroy all cart item
        redirect('');
    }

    function tambahstatusalat($id_peminjaman){
            $query = $this->db->query('select alat.id_alat , alat.status_alat , jumlah_pinjam from alat, peminjaman where id_peminjaman = "'.$id_peminjaman.'" and alat.id_alat = peminjaman.id_alat')->row();
            if (isset($query)){
                $id_alat = $query->id_alat;
                $status = $query->status_alat;
                $jumlah_pinjam = $query->jumlah_pinjam;
                $statuss = $status+$jumlah_pinjam;
                $query = $this->db->query('update alat set status_alat='.$statuss.' where id_alat="'.$id_alat.'"');
            }
    }

    function tes(){
        $alats = mysqli_query(mysqli_connect('localhost:3306','root','','wtis'),'SELECT status_alat FROM alat where id_alat = "5c6fadb26040d"');
        $baba = mysqli_fetch_array($alats);
        //$alats = $this->db->query('SELECT status_alat FROM alat where id_alat = "5c6fadb26040d"')->result();
        //    foreach ($alats as $alatss):
        //        $jumlah_alat = $alatss->status_alat;    
        //    endforeach;
        $jumlah_alat = $baba['status_alat'];
        
        $jumlah_pinjam = '1';
            $jumlah = $jumlah_alat-$jumlah_pinjam;
            //$this->status_alat = $jumlah;
            mysqli_query(mysqli_connect('localhost:3306','root','','wtis'),'UPDATE alat set status_alat='.$jumlah.' where id_alat = "5c6fadb26040d"');
            //$this->db->update($this->_tablealat, $this, array('id_alat' => '5c6fadb26040d'));
    }

    function edit_pinjaman(){
        $post = $this->input->post();
        $this->id_peminjaman = $post["id_pinjam"];
        $this->ket = $post["keterangan"];
        $this->db->update($this->_table, $this, array('id_peminjaman' => $post['id_pinjam']));
    }

    function hapus_pinjaman($id){
        return $this->db->delete($this->_table, array("id_peminjaman" => $id));
    }

    function listpinjamkan(){
        return $query1 = $this->db->query('SELECT nama_alat, jumlah_pinjam, tanggal_peminjaman, ket, status, id_peminjaman,
                                    A.nama siswa, B.nama guru from akun A,akun B,
                                    ((peminjaman INNER JOIN akun ON peminjaman.id_peminjam = akun.id_akun
                                    ) INNER JOIN alat ON peminjaman.id_alat = alat.id_alat) WHERE (status="Menunggu Aspiran" OR status="Menunggu Guru")
                                    AND A.id_akun = id_peminjam AND B.id_akun = id_penanggung ')->result();
    }
    
    function listpengembalian(){
        return $query = $this->db->query('SELECT nama_alat, jumlah_pinjam, tanggal_peminjaman, ket, status, id_peminjaman,
                                    A.nama siswa, B.nama guru from akun A,akun B,
                                    ((peminjaman INNER JOIN akun ON peminjaman.id_peminjam = akun.id_akun
                                    ) INNER JOIN alat ON peminjaman.id_alat = alat.id_alat) WHERE status="Dipinjam" 
                                    AND A.id_akun = id_peminjam AND B.id_akun = id_penanggung ')->result();
        //$this->db->where('status = "Dipinjam"');
        //return $this->db->get('peminjaman')->result();
    }

    function listpeminjaman(){

        return $query1 = $this->db->query('SELECT nama_alat, jumlah_pinjam, tanggal_peminjaman, ket,
                                    A.nama siswa, B.nama guru from akun A,akun B,
                                    ((peminjaman INNER JOIN akun ON peminjaman.id_peminjam = akun.id_akun
                                    ) INNER JOIN alat ON peminjaman.id_alat = alat.id_alat) WHERE status="Dipinjam" 
                                    AND A.id_akun = id_peminjam AND B.id_akun = id_penanggung ')->result();
    }

    function submit_pengembalian($id){
        $this->status = "history";
        $this->tanggal_pengembalian = date("Y-m-d H:i:s");
        $this->db->update($this->_table, $this, array('id_peminjaman' => $id));
            echo "<script>alert('Sukses ! alat telah dikembalikan');
                </script>";
    }

    function submit_pinjamkan($id){
        $this->status = "Dipinjam";
        $this->db->update($this->_table, $this, array('id_peminjaman' => $id));
        redirect(site_url('admin/pinjamkan'));
    }

    function history(){
        return $query = $this->db->query('SELECT nama_alat, jumlah_pinjam, tanggal_peminjaman, status, id_peminjaman,
                                        A.nama siswa, B.nama guru, ket, tanggal_pengembalian from akun A,akun B,
                                        ((peminjaman INNER JOIN akun ON peminjaman.id_peminjam = akun.id_akun
                                        ) INNER JOIN alat ON peminjaman.id_alat = alat.id_alat) WHERE status="history" 
                                        AND A.id_akun = id_peminjam AND B.id_akun = id_penanggung order by tanggal_pengembalian')->result();
    }

    #------------------                 GURU                ---------------------------#
    function daftar_request(){
        $id_akun = $this->session->userdata["ses_id"];
        return $query = $this->db->query('SELECT nama_alat, jumlah_pinjam, tanggal_peminjaman, status, id_peminjaman,
                                        A.nama siswa from akun A,akun B,
                                        ((peminjaman INNER JOIN akun ON peminjaman.id_peminjam = akun.id_akun
                                        ) INNER JOIN alat ON peminjaman.id_alat = alat.id_alat) WHERE status="Menunggu Guru" 
                                        AND A.id_akun = id_peminjam AND B.id_akun = id_penanggung
                                        AND id_penanggung = "'.$id_akun.'"')->result();
    }

    function daftar_tanggung(){
        $id_guru = $this->session->userdata('ses_id');
        return $query = $this->db->query('SELECT nama_alat, jumlah_pinjam, tanggal_peminjaman, status, id_peminjaman, ket,
                                        A.nama siswa from akun A,akun B,
                                        ((peminjaman INNER JOIN akun ON peminjaman.id_peminjam = akun.id_akun
                                        ) INNER JOIN alat ON peminjaman.id_alat = alat.id_alat) WHERE status="Dipinjam" 
                                        AND A.id_akun = id_peminjam AND B.id_akun = id_penanggung
                                        AND id_penanggung = "'.$id_guru.'"
                                        OR status="Menunggu Aspiran" 
                                        AND A.id_akun = id_peminjam AND B.id_akun = id_penanggung
                                        AND id_penanggung = "'.$id_guru.'"')->result();
    }

    function izinkan($id){
        $id_guru = $this->session->userdata('ses_id');
        $this->status = "Menunggu Aspiran";
        $this->db->update($this->_table, $this, array('id_peminjaman' => $id, 'id_penanggung' => $id_guru));
        redirect(site_url('guru'));
    }
    
    function tolak($id){
        return $this->db->delete($this->_table, array("id_peminjaman" => $id));
        redirect(site_url('guru'));
    }
    
    #------------------                 SISWA                ---------------------------#
    function daftar_pinjam(){
        $id_akun = $this->session->userdata["ses_id"];
        return $query = $this->db->query('SELECT id_peminjaman, nama_alat, jumlah_pinjam, tanggal_peminjaman, ket, status,
                                        B.nama guru, tanggal_pengembalian from akun A,akun B,
                                        ( 
                                        (peminjaman INNER JOIN akun ON peminjaman.id_peminjam = akun.id_akun) 
                                        INNER JOIN alat ON peminjaman.id_alat = alat.id_alat
                                        ) 
                                        WHERE A.id_akun = id_peminjam AND B.id_akun = id_penanggung 
                                        AND id_peminjam = "'.$id_akun.'"')->result();
    }
}