<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "user";

    public $id_user;
    public $username;
    public $password;
    public $nama;
    public $jabatan;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('username', $post["username"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if($user){
            // periksa password-nya
            $isPasswordTrue = $post["password"] == $user->password;
            // jika password benar dan dia admin
            if($isPasswordTrue){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->session->set_userdata(['role' => $user->jabatan]);
                return true;
            }

        }
        
        // login gagal
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    public function getByid_user($id_user)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id_user])->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->nama = $post["nama"];
        $this->jabatan = $post["jabatan"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->nama = $post["nama"];
        $this->jabatan = $post["jabatan"];
        return $this->db->update($this->_table, $this, array('id_user' => $post['id_user']));
    }

    public function delete($id_user)
    {
        return $this->db->delete($this->_table, array("id_user" => $id_user));
    }    
   
}