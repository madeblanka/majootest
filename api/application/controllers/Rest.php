<?php 
defined('BASEPATH') OR exit('No Direct Script Access Allowed !');

use chriskacerguis\RestServer\RestController;

class Rest extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model','Barang');
        $this->load->model('User_model','User');
    }

    public function barang_get()
    {
        $id_barang = $this->get('id_barang');

        if($id_barang == null)
            {
                $data = $this->barang->getAll();
            }
        else
            {
                $data = $this->barang->getByid_barangrow($id_barang);
            }

        if($data)
            {
                $this->response($data, RestController::HTTP_OK);
            }
        else
            {
                $this->response(['status'=>false,'message'=>'barang not found !'], RestController::HTTP_NOT_FOUND);
            }
    }
     public function barang_delete()
    {
        $id_barang = $this->delete('id_barang');

        if($id_barang == null)
            {
                $this->response(['status'=>false,'message'=>'barang not inputed !'], RestController::HTTP_BAD_REQUEST);
            }
        else
            {
                if($this->barang->delete($id_barang) >0)
                    {
                         $this->response(
                             ['status'=> true,
                             'id_barang'=>$id_barang,
                             'message','Deleted!'], 
                             RestController::HTTP_OK);
                    }
                else
                    {
                         $this->response(['status'=>false,'message'=>'barang not found !'], RestController::HTTP_BAD_REQUEST);
                    }
            }
    }

    public function barang_post()
    {
        $data = 
        [
            'nama' => $this->post('nama'),
            'deskripsi' => $this->post('deskripsi'),
            'harga' => $this->post('harga'),
            'gambar' => $this->post()->_uploadImage(),
        ];

        if($this->barang->save($data)>0)
        {
            $this->response(
            ['status'=> true,
            'message','Barang Telah Di Simpan !'], 
            RestController::HTTP_CREATED);
        }
        else
        {
            $this->response(
            ['status'=> false,
            'message','Oops , Barang Tidak Disimpan! Mohon Coba Kembali !'], 
            RestController::HTTP_BAD_REQUEST);
        }
    }    

    public function barang_put()
    {
        $id_barang = $this->put('id_barang');
        if (!empty($_FILES["gambar"]["name"])) {
            $gambar = $this->put()->_uploadImage();
        } else {
            $gambar = $this->put('old_image');
        }
        $data = 
        [
            'nama' => $this->put('nama'),
            'deskripsi' => $this->put('deskripsi'),
            'harga' => $this->put('harga'),
            'gambar' => $gambar,
        ];
        
        if($this->barang->update($data,$id_barang)>0)
        {
            $this->response(
            ['status'=> true,
            'message','barang Has Been Changed !'], 
            RestController::HTTP_OK);
        }
        else
        {
            $this->response(
            ['status'=> false,
            'message','Oops , barang Been Failed To Change Their Profile !'], 
            RestController::HTTP_BAD_REQUEST);
        }
    }
    
    private function _uploadImage()
    {
        $config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']				= 2048;
		$config['file_name']            = $this->post('nama');
        $config['overwrite']			= true;
        $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
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

}
