<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    function __construct() {
        parent::__construct(); 
        $this->load->model('Barang_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
	}
	
    public function index()
	{
       $this->load->view('admin/login');
	}
    
    public function login()
    {
        		  // jika form login disubmit
        $post = $this->input->post();
       
            $this->db->select("*");
            $this->db->from("user");
            $this->db->where('username', $post["username"]);
            $this->db->where('password', $post["password"]);
            $user = $this->db->get()->row();


        // jika user terdaftar
        if(isset($user)){
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->session->set_userdata(['id_user' => $user->id_user]);
				echo "<script>
				alert('Selamat Datang !');
				window.location.href='../user/barang';
				</script>";

        }else{
			 echo "<script>
                    alert('Username atau Password yang anda masukan Salah!');
                    </script>";

            $this->load->view('admin/login');
		}

    }
        // public function ubahuser($id_user)
        // {

        //     $this->form_validation->set_rules('nama', 'nama', 'required');
        //     $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        //     $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
        //     if($this->form_validation->run() == false)
        //     {
        //         $data["user"] = $this->User_model->getByid_user($id_user);
        //         $this->load->view('admin/user/edit',$data);
        //     } 
        //         else
        //     {
        //         if($this->User_model->update($nama)->run)
        //         {
        //             redirect(site_url('admin/user/dashboard'));
        //         }else{
        //             redirect(site_url(''));
        //         }
        //     }
        // }

        //     public function deleteuser($id_user)
        //     {
        //         if (!isset($id_user)) show_404();
        //             if ($this->User_model->delete($id_user)) {
        //             redirect(site_url('admin/user/index'));
        //         }
        //     }

        public function barang()
        {
            if($this->session->userdata('id_user')!= null)
            {
                $data["barang"] = $this->Barang_model->getALl();
                $this->load->view('admin/barang/index',$data);    
            }
            else
            {
                $this->load->view('admin/login');
            }
        }
        public function formtambahbarang()
        {
            if($this->session->userdata('id_user')!= null)
            {
            $this->load->view('admin/barang/tambah');
            }
            else
            {
                $this->load->view('admin/login');
            }
        }
        public function tambahbarang()
        {
              if($this->session->userdata('id_user')!= null)
            {
            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
            $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
            $this->Barang_model->save();
            redirect(site_url('user/barang'));
            } else
            {
                $this->load->view('admin/login');
            }
        }

        public function formeditbarang($nama)
        {
            if($this->session->userdata('id_user')!= null)
            {
                $data["barang"] = $this->Barang_model->getBynama($nama);
                $this->load->view('admin/barang/edit',$data);
            }
            else
            {
                $this->load->view('admin/login');
            }
        }
        public function editbarang()
        {
            if($this->session->userdata('id_user')!= null)
            {
            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
            $this->form_validation->set_rules('harga', 'harga', 'required|numeric');

            $this->Barang_model->update();
            redirect(site_url('user/barang'));
            }
            else
            {
                $this->load->view('admin/login');
            }
        }

        public function deletebarang($nama)
        {
            if($this->session->userdata('id_user')!= null)
            {
            if (!isset($nama)) show_404();
            if ($this->Barang_model->delete($nama)) {
                redirect(site_url('user/barang'));
            }
            }
            else
            {
                $this->load->view('admin/login');
            }
        }
    public function logout()
    {
        $this->session->sess_destroy();
        // hancurkan semua sesi
        echo "<script>
        alert('Terimakasih !');
        window.location.href='../user/';
        </script>";

    }

}
