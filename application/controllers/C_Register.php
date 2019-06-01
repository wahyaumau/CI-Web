<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Register extends CI_Controller {	

	public function create()
	{
		$data['title'] = "Register";						
		$data['view'] = $this->load->view('V_Register', $data, true);	
		$this->load->view('V_Template', $data);		
	}	

	public function store(){				
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[admin.username]', );
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		if ($this->form_validation->run()) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
			);	
			$this->M_Admin->register($data);
			$data_session = array(
				'username' => $data['username'],
				'password' => $data['password'],
				'status' => "login",
				);
			$this->session->set_userdata($data_session);
			redirect('mahasiswa');
		}else{
			$this->create();
		}					
	}

}
