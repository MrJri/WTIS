<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_alat extends CI_Model
{
    private $_table = "alat";

    public $id_alat;
    public $nama_alat;
    public $jumlah;
    public $kondisi;
    public $jenis;
    public $status_alat;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'required'],

            ['field' => 'kondisi',
            'label' => 'Kondisi'],

            ['field' => 'jenis',
            'label' => 'Jenis',
            'rules' => 'required'],
            
            ['field' => 'status',
            'label' => 'Status']

        ];
    }

    public function getAll(){
        return $this->db->get($this->_table)->result();
    }

    function validate_add_cart_item(){
		
		$id = $this->input->post('id_alat'); // Assign posted id_alat to $id
		$cty = $this->input->post('quantity'); // Assign posted quantity to $cty
		//$this->db->where('id_alat', $id); // Select where id matches the posted id
		$query = $this->db->query('select * from alat where id_alat="'.$id.'"')->result(); // Select the products where a match is found and limit the query by 1
        //$ss = $this->input->post('ajax');
        //echo $query['id_alat'];
        //echo "<script>alert(".$cty.");
         //       </script>";
        
		// Check if a row has been found
		if($query > 0){
			foreach ($query as $row){
			    $data = array(
               		'id'      => $id,
               		'qty'     => $cty,
               		'price'   => 0,
               		'name'    => $row->nama_alat
            	);

				
			}
            $this->cart->insert($data); 
				
            return TRUE;
		// Nothing found! Return FALSE!	
		}else{
            echo "<script>alert('FALSE no rows :(');</script>";
            
			return FALSE;
		}
    }
    
    function validate_update_cart($total_alat){
		// Cycle true all items and update them
		for($i=0;$i < $total_alat;$i++){
            // Retrieve the posted information
            $item = $this->input->post('rowid['.$i.']');
            $qty = $this->input->post('qty['.$i.']');
			// Create an array with the products rowid's and quantities. 
			$data = array(
               'rowid' => $item,
               'qty'   => $qty
            );
            // Update the cart with the new information
			$this->cart->update($data);
		}

	}

    public function hitung_alat(){
        //$sql = "select COUNT(*) from alat";
        //$query = $this->db->query('select COUNT(*) from alat');
        $result = $this->db->query('select COUNT(*) from alat')->row_array();
        $count = $result['COUNT(*)']; //convert array jadi string
        return $count;
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
        $this->status_alat = $post["jumlah"];
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
        $this->status_alat = $post["status"];
        $this->db->update($this->_table, $this, array('id_alat' => $post['id']));
        //disini tambahin kode buat update status_alat kalo jumlah alatnya nambah/kurang
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_alat" => $id));
    }  
}