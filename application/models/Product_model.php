<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "tabel_dokter";

    public $id_dokter;
    public $nama;
    public $alamat;
    public $no_telpon;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
            
            ['field' => 'no_telpon',
            'label' => 'No_telpon',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_dokter = uniqid();
        $this->Nama = $post["nama"];
        $this->Alamat = $post["alamat"];
        $this->No_telpon = $post["no_telpon"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_dokter = $post["id_dokter"];
        $this->Nama = $post["nama"];
        $this->Alamat = $post["alamat"];
        $this->No_telpon = $post["no_telpon"];
        return $this->db->update($this->_table, $this, array('id_dokter' => $post['id_dokter']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_dokter" => $id_dokter));
    }
}