<?php
class M_Bahan extends CI_Model 
{

	public function load_data($table){
		return $this->db->get($table);
	}
	public function insert_bahan($table, $data){
		return $this->db->insert($table, $data);
	}
	public function edit_data($table, $id){
		return $this->db->where('id_bahan',$id)->get($table);
	}
	public function update_bahan($id,$table, $data){
		return $this->db->where('id_bahan',$id)->update($table, $data);
	}
	public function delete_bahan($id,$table){
		return $this->db->where('id_bahan',$id)->delete($table);
	}
} 
