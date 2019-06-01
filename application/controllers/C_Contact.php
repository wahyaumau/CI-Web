<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Contact extends CI_Controller {

	public function show()
	{
		$data['title'] = "Contact Page";
		$data['name'] = "Muhamad Wahyu Maulana Akbar";
		$data['phone'] = "087744412441";
		$data['address'] = "Kostan Pondok Haturan Ds. Ciwaruga";
		$data['view'] = $this->load->view('V_Contact', $data, true);
		// $this->load->view('layouts/header');
		$this->load->view('V_Template', $data);
		// $this->load->view('layouts/footer');
	}	
}
