<?php
class M_Auth extends CI_Model 
{
    
	public function validasi_login($username,$password,$table){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get($table);
	}
	public function insert_data($table,$data){
		return $this->db->insert($table, $data);
	}
	public function update_user($id,$table, $data){
		return $this->db->where('id_user',$id)->update($table, $data);
	}
}
