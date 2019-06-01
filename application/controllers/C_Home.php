<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {

	public function show()
	{
		$data['title'] = "Home Page";
		$data['message'] = "Selamat Datang di Home Page";		
		$data['view'] = $this->load->view('V_Home', $data, true);
		// $this->load->view('layouts/header');
		$this->load->view('V_Template', $data);
		// $this->load->view('layouts/footer');
	}	
}
