<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('Barang_model');
	}
	public function index()
	{
		$data["barang"] = $this->Barang_model->getAll();
		$this->load->view('dashboard',$data);
	}
}
