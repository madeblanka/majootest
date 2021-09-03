    private function _uploadImage()
    {
        $config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']				= 2048;
		$config['file_name']            = $this->Id_Gambar.'-'.$this->Id_Barang;
        $config['overwrite']			= true;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('Gambar')) {
        return $this->upload->data("file_name");
    }
    return "default.jpg";
    }

      private function deleteGambar($Id_Gambar)
    {
        $gambar = $this->getById_Gambarrow($Id_Gambar);
        if ($gambar->Gambar != "default.jpg") {
	        $filename = explode(".", $gambar->Gambar)[0];
		    return array_map('unlink', glob(FCPATH."uploads/$filename.*"));
    
        }
    }
    public function delete($Id_Gambar)
    {
        $this->deleteGambar($Id_Gambar);
        return $this->db->delete($this->_table, array("Id_Gambar" => $Id_Gambar));
    }