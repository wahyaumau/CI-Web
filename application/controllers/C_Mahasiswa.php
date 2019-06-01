<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Mahasiswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('username')==null) {
			$this->session->set_flashdata('message', "Login terlebih dahulu");
			redirect('login');
		}
	}

	public function show()
	{
		$idprodi = $this->input->get('idprodi');		
		if ($idprodi == null) {
			$data['mahasiswa'] = $this->M_Mahasiswa->get_mahasiswa();		
		}else{
			$data['mahasiswa'] = $this->M_Mahasiswa->get_mahasiswa_by_prodi($idprodi);
		}		
		$data['title'] = "Data Mahasiswa";		
		$data['prodi'] = $this->M_Prodi->get_prodi();	
		$data['view'] = $this->load->view('V_Mahasiswa', $data, true);					
		$this->load->view('V_Template', $data);	
	}	

	public function create()
	{
		$data['title'] = "Input Data Mahasiswa";				
		$data['prodi'] = $this->M_Prodi->get_prodi();
		$data['view'] = $this->load->view('V_Mahasiswa_Create', $data, true);	
		$this->load->view('V_Template', $data);		
	}	

	public function upload_file(){
		$config['upload_path']          = 'assets/images/mahasiswa';
		$config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('foto')){
			return $this->upload->data('file_name');
		}else{
			return FALSE;
		}
	}

	public function store(){		
		$this->form_validation->set_rules('nim', 'NIM', 'required|min_length[9]|is_unique[mhsw.nim]'); 
		$this->form_validation->set_rules('name', 'Nama', 'required'); 
		$this->form_validation->set_rules('age', 'Umur', 'required');
		$this->form_validation->set_rules('idprodi', 'Program Studi', 'required');
		if ($this->form_validation->run()) {			
			$data = array(
				'nim' => $this->input->post('nim'),
				'name' => $this->input->post('name'),			
				'age' => $this->input->post('age'),		
				'idprodi' => $this->input->post('idprodi'),						
			);
			if (!empty($_FILES['foto']['name'])) {
				$data['foto'] = $this->upload_file();
			}else{
				$data['foto'] = "default.png";
			}
			$this->M_Mahasiswa->insert_mahasiswa($data, 'mhsw');
			redirect('mahasiswa');			
		}else{
			$this->create();
		}						
	}

	public function display($nim){
		$data['mahasiswa'] = $this->M_Mahasiswa->get_data_mahasiswa($nim);			
		$data['view'] = $this->load->view('V_Mahasiswa_Show', $data, true);
		$this->load->view('V_Template', $data);
	}

	public function edit($nim){
		$data['title'] = "Edit Data Mahasiswa";
		$data['mahasiswa'] = $this->M_Mahasiswa->get_data_mahasiswa($nim);		
		$data['prodi'] = $this->M_Prodi->get_prodi();
		$data['view'] = $this->load->view('V_Mahasiswa_Edit', $data, true);
		$this->load->view('V_Template', $data);
	}

	public function update($nim){
		$this->form_validation->set_rules('nim', 'NIM', 'required|min_length[9]'); 
		$this->form_validation->set_rules('name', 'Nama', 'required'); 
		$this->form_validation->set_rules('age', 'Umur', 'required');
		$this->form_validation->set_rules('idprodi', 'Program Studi', 'required');		
		if ($this->form_validation->run()) {			
			$data = array(
				'nim' => $this->input->post('nim'),
				'name' => $this->input->post('name'),			
				'age' => $this->input->post('age'),		
				'idprodi' => $this->input->post('idprodi'),						
			);
			if (!empty($_FILES['foto']['name'])) {
				$deleted_mahasiswa = $this->M_Mahasiswa->get_data_mahasiswa($nim);
					if ($deleted_mahasiswa['foto'] != "default.png") {
					$file = '././assets/images/mahasiswa/'.$deleted_mahasiswa['foto'];
					unlink($file);
				}
				$data['foto'] = $this->upload_file();
				$this->M_Mahasiswa->update_mahasiswa_with_foto($nim, $data, 'mhsw');
			}else{				
				$this->M_Mahasiswa->update_mahasiswa($nim, $data, 'mhsw');
			}
			redirect('mahasiswa');
		}else{
			$this->edit($nim);
		}		
		
			
	}

	public function delete($nim){		
		$deleted_mahasiswa = $this->M_Mahasiswa->get_data_mahasiswa($nim);
		if ($deleted_mahasiswa['foto'] != "default.png") {
			$file = '././assets/images/mahasiswa/'.$deleted_mahasiswa['foto'];
			unlink($file);
		}
		$this->M_Mahasiswa->delete_mahasiswa($nim, 'mhsw');
		redirect('mahasiswa');		
	}

	public function search_by_prodi(){
		$idprodi = $this->input->post('idprodi');
		$data['prodi'] = $this->M_Prodi->get_prodi_by_id($idprodi);		
		$data['title'] = "Data Mahasiswa ";
		$data['mahasiswa'] = $this->M_Mahasiswa->get_mahasiswa_by_prodi($idprodi);		
		$data['view'] = $this->load->view('V_Mahasiswa', $data, true);				
		// $this->load->view('layouts/header');
		$this->load->view('V_Template', $data);
	}
}
