<?php

class M_Mahasiswa extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function get_mahasiswa(){				
		$query = $this->db->query("SELECT mhsw.nim, mhsw.nama, mhsw.umur, mhsw.foto, prodi.namaprodi FROM mhsw, prodi WHERE mhsw.idprodi= prodi.idprodi");
		return $query->result_array();
	}

	public function get_data_mahasiswa($nim){
		$query = $this->db->query("SELECT mhsw.nim, mhsw.nama, mhsw.umur, mhsw.foto, mhsw.idprodi, prodi.namaprodi FROM mhsw, prodi WHERE mhsw.idprodi= prodi.idprodi AND nim='$nim'");
		return $query->row_array();
	}

	public function insert_mahasiswa($data, $table){								
		$this->db->query("INSERT INTO $table(nim, nama, umur, foto, idprodi) VALUES('$data[nim]','$data[name]', $data[age], '$data[foto]', '$data[idprodi]')");
	}

	public function update_mahasiswa($nim, $data, $table){						
		$this->db->query("UPDATE $table SET nim='$data[nim]', nama='$data[name]', umur=$data[age], idprodi='$data[idprodi]' WHERE nim='$nim'");	
	}

	public function update_mahasiswa_with_foto($nim, $data, $table){						
		$this->db->query("UPDATE $table SET nim='$data[nim]', nama='$data[name]', umur=$data[age], idprodi='$data[idprodi]', foto='$data[foto]' WHERE nim='$nim'");	
	}

	public function delete_mahasiswa($nim, $table){						
		$this->db->query("DELETE FROM $table WHERE nim='$nim'");	
	}	

	public function get_mahasiswa_by_prodi($idprodi){
		$query = $this->db->query("SELECT mhsw.nim, mhsw.nama, mhsw.umur, mhsw.foto, prodi.namaprodi FROM mhsw, prodi WHERE mhsw.idprodi= prodi.idprodi AND mhsw.idprodi='$idprodi'");
		return $query->result_array();
	}
}
