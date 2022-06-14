<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('id_user') != null) {
			$query_user = $this->db->get('m_user');
			$query_bahan = $this->db->get('m_bahan');
			$query_transaksi = $this->db->get('transaksi');
			$data["user"]=$query_user->num_rows();
			$data["bahan"]=$query_bahan->num_rows();
			$data["transaksi"]=$query_transaksi->num_rows();
			$this_year=date("Y");
			$data["thn"]=date("Y");
			$data["transaksi_chart"]=$this->db->query("select sum(jumlah) as transaksi,monthname(tanggal_transaksi) as bulan ,month(tanggal_transaksi) as monthnumber, year(tanggal_transaksi) as tahun from transaksi where tanggal_transaksi like '%".$this_year."%' group by jumlah,tanggal_transaksi order by tahun asc, monthnumber asc")->result();
			$data["transaksi_year"]=$this->db->query("select distinct year(tanggal_transaksi) as tahun from transaksi order by tahun asc")->result();
			// print_r($data["transaksi_chart"]);			
			$this->load->view('layouts/head.php');
			$this->load->view('layouts/nav_admin.php',$data);
			$this->load->view('pages/index.php');
		}
		else{
			redirect('user/login');
		}
		
	}
	public function filter_chart(){
		$thn=$this->input->get('tahun');
		$data["thn"]=$this->input->get('tahun');
		$query_user = $this->db->get('m_user');
		$query_bahan = $this->db->get('m_bahan');
		$query_transaksi = $this->db->get('transaksi');
		$data["user"]=$query_user->num_rows();
		$data["bahan"]=$query_bahan->num_rows();
		$data["transaksi"]=$query_transaksi->num_rows();
		$data["transaksi_chart"]=$this->db->query("select sum(jumlah) as transaksi,monthname(tanggal_transaksi) as bulan ,month(tanggal_transaksi) as monthnumber, year(tanggal_transaksi) as tahun from transaksi where tanggal_transaksi like '%".$thn."%' group by jumlah,tanggal_transaksi order by tahun asc, monthnumber asc")->result();
		$data["transaksi_year"]=$this->db->query("select distinct year(tanggal_transaksi) as tahun from transaksi order by tahun asc")->result();
		// print_r($data["transaksi_chart"]);			
		$this->load->view('layouts/head.php');
		$this->load->view('layouts/nav_admin.php',$data);
		$this->load->view('pages/index.php');
	}
	
}
