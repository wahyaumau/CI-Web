<?php

class M_Admin extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function register($data){
		$this->db->query("INSERT INTO admin(username, password) VALUES ('$data[username]','$data[password]')");
	}

	public function login($data){
		$query = $this->db->query("SELECT * from admin where username = '$data[username]' AND password = '$data[password]'");
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $result) {
				return $result;
			}
		}else{
			return 0;
		}
	}
}
