<?php

class M_Prodi extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function get_prodi(){				
		$query = $this->db->query("SELECT * FROM prodi");
		return $query->result_array();
	}	

	public function get_prodi_by_id($idprodi){
		$query = $this->db->query("SELECT * FROM prodi WHERE idprodi='$idprodi'");
		return $query->result_array();
	}
}
