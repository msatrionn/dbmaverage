<?php
class M_Transaksi extends CI_Model 
{
	public function show_data(){
		return $this->db->join('m_bahan','m_bahan.id_bahan=transaksi.id_bahan')
		->join('karyawan','karyawan.id_karyawan=transaksi.id_karyawan')
		->get('transaksi');
	}
	public function insert_transaksi($table, $data){
		return $this->db->insert($table, $data);
	}
	public function edit_data($table, $id){
		return $this->db
		->join('m_bahan','m_bahan.id_bahan=transaksi.id_bahan')
		->join('karyawan','karyawan.id_karyawan=transaksi.id_karyawan')
		->where('transaksi.id_transaksi',$id)->get($table);
	}
	public function update_transaksi($id,$table, $data){
		return $this->db->where('id_transaksi',$id)->update($table, $data);
	}
	public function delete_user($id,$table){
		return $this->db->where('id_transaksi',$id)->delete($table);
	}
	public function laporan(){
		return $this->db->query('select year(transaksi.tanggal_transaksi) as tahun, monthname(transaksi.tanggal_transaksi) as bulan, sum(transaksi.jumlah) as jumlah, sum(transaksi.total_harga) as total_harga from transaksi group by year(tanggal_transaksi), monthname(tanggal_transaksi)');
	}
	public function laporan_detail_bahan_all(){
		return $this->db->query('select distinct m_bahan.id_bahan, m_bahan.nama_bahan from transaksi join m_bahan on m_bahan.id_bahan=transaksi.id_bahan');
	}
	public function laporan_detail_bahan($date){
		return $this->db->query('select distinct m_bahan.id_bahan, m_bahan.nama_bahan from transaksi join m_bahan on m_bahan.id_bahan=transaksi.id_bahan where tanggal_transaksi like'. '"%'.$date.'%"');
	}
	public function laporan_detail($date){
		return $this->db->query('select * from transaksi join m_bahan on m_bahan.id_bahan=transaksi.id_bahan where tanggal_transaksi like'. '"%'.$date.'%"');
	}
	public function laporan_detail_filter($date,$filter){
		return $this->db->query('select * from transaksi join m_bahan on m_bahan.id_bahan=transaksi.id_bahan where transaksi.tanggal_transaksi like'. '"%'.$date.'%" and m_bahan.id_bahan like'. '"%'.$filter.'%"');
	}
	public function transaksi_ramal($awal,$akhir,$filter){
		return $this->db->query("select year(transaksi.tanggal_transaksi) as tahun, monthname(transaksi.tanggal_transaksi) as bulan, month(transaksi.tanggal_transaksi) as monthnumber, sum(transaksi.jumlah) as jumlah, sum(transaksi.total_harga) as total_harga from transaksi where tanggal_transaksi between" ." '". "$awal"."'"."and"." '" ."$akhir" ."' "  ." and transaksi.id_bahan=".$filter." group by year(tanggal_transaksi), monthname(tanggal_transaksi),  month(tanggal_transaksi) order by tahun asc, monthnumber asc");
	}
	public function laporan_filter($filter,$filter2){
		return $this->db->query("select year(transaksi.tanggal_transaksi) as tahun, monthname(transaksi.tanggal_transaksi) as bulan, sum(transaksi.jumlah) as jumlah, sum(transaksi.total_harga) as total_harga from transaksi where tanggal_transaksi between" ." '". "$filter"."'"."and"." '" ."$filter2" ."' "  ."group by year(tanggal_transaksi), monthname(tanggal_transaksi)");
	}
}
