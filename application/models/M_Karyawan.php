<?php
class M_Karyawan extends CI_Model 
{
	public function show_data(){
		return $this->db->join('m_user','m_user.id_user=karyawan.id_user')->get('karyawan');
	}
	public function edit_data($table, $id){
		return $this->db
		->join('m_user','m_user.id_user=karyawan.id_user')->where('m_user.id_user',$id)->get($table);
	}
	public function update_karyawan($id,$table, $data){
		return $this->db->where('id_user',$id)->update($table, $data);
	}
	public function delete_user($id,$table){
		return $this->db->where('id_user',$id)->delete($table);
	}
}
