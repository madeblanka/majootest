<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    private $_table = "barang";

    public $nama;
    public $deskripsi;
    public $harga;
    public $gambar;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getBynama($nama)
    {
        return $this->db->get_where($this->_table, ["nama" => $nama])->result();
    }
    public function getBynamarow($nama)
    {
        return $this->db->get_where($this->_table, ["nama" => $nama])->row();
    }
    public function getBynamaaja()
    {
        return $this->db->query("SELECT nama FROM barang");
    }

    public function save()
    {
        $post = $this->input->post();
        $a = $this->nama = $post["nama"];
        // var_dump($this->_uploadImage($a));die;
        $this->nama = $post["nama"];
        $this->harga = $post["harga"];
        $this->deskripsi = $post["deskripsi"];
        $this->gambar = $this->_uploadImage($a);
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
         $a = $this->nama = $post["nama"];
        $this->nama = $post["nama"];
        $this->harga = $post["harga"];
        $this->deskripsi =$post["deskripsi"];
        if(!empty($_FILES["gambar"]["name"]))
        {
            $this->gambar = $this->_uploadImage($a);
        }else
        {
            $this->gambar = $post["gambarlama"];
        }
        return $this->db->update($this->_table, $this, array('nama' => $post['namalama']));
    }

    private function _uploadImage($a)
    {
        $config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']				= 2048;
		$config['file_name']            = $a;
        // $config['encrypt_name']			= true;
        $config['overwrite']			= true;
        $this->load->library('upload', $config);
        // var_dump($this->upload->do_upload('gambar'));die;
    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    }
    return "default.jpg";
    }

    private function deleteGambar($nama)
    {
        $gambar = $this->getBynamarow($nama);
        if ($gambar->gambar != "default.jpg") {
	        $filename = explode(".", $gambar->gambar)[0];
		    return array_map('unlink', glob(FCPATH."uploads/$filename.*"));
    
        }
    }
    public function delete($nama)
    {
        $this->deleteGambar($nama);
        return $this->db->delete($this->_table, array("nama" => $nama));
    }
}
