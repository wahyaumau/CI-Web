<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {	

	public function login_form()
	{
		$data['title'] = "Login";						
		$data['view'] = $this->load->view('V_Login', $data, true);	
		$this->load->view('V_Template', $data);		
	}	

	public function login_submit(){				
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);		
		$user_data = $this->M_Admin->login($data);		

		if ($user_data) {
			$data_session = array(
				'username' => $user_data['username'],
				'password' => $user_data['password'],
				'status' => "login",
				);
			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('message', "Welcome ".$data_session['username']);
			redirect('mahasiswa');
		}else{
			$this->session->set_flashdata('message', "No Credentials");
			redirect('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
