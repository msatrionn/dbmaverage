<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Transaksi','model');
		$this->load->model('M_Bahan','model_bahan');
		}
	public function index(){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai'  ){
			$data['transaksi']=$this->model->show_data('transaksi')->result();
			$this->load->view('layouts/head.php');
			$this->load->view('layouts/nav_admin.php');
			$this->load->view('pages/transaksi/index.php',$data);
			$this->load->view('layouts/foot.php');			
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	
	public function create(){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' ){
			$data['bahan']=$this->model_bahan->load_data('m_bahan')->result();
			$this->load->view('layouts/head.php');
			$this->load->view('layouts/nav_admin.php');
			$this->load->view('pages/transaksi/create.php',$data);
			$this->load->view('layouts/foot.php');			
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function insert(){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' ){
			$data=[
				'id_bahan'=>$this->input->post('nama_bahan'),
				'id_karyawan'=>$this->session->userdata('id_user'),
				'jumlah'=>$this->input->post('jumlah'),
				'total_harga'=>$this->input->post('total_harga')
			];

			$this->model->insert_transaksi('transaksi',$data);		
			return redirect('transaksi/index');
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function edit($id){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' ){
			$data['transaksi']=$this->model->edit_data('transaksi',$id)->row();
			$data['bahan']=$this->model_bahan->load_data('m_bahan',$id)->result();
			$this->load->view('layouts/head.php');
			$this->load->view('layouts/nav_admin.php');
			$this->load->view('pages/transaksi/edit.php',$data);
			$this->load->view('layouts/foot.php');			
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function update($id){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' ){
			$data=[
				'id_bahan'=>$this->input->post('nama_bahan'),
				'id_karyawan'=>$this->session->userdata('id_user'),
				'jumlah'=>$this->input->post('jumlah'),
				'total_harga'=>$this->input->post('total_harga'),
			];
			$this->model->update_transaksi($id,'transaksi',$data);
			return redirect('transaksi/index');			
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function delete($id){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' ){
			$this->model->delete_transaksi($id,'transaksi');
			return redirect('transaksi/index');		
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function laporan(){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai'  or $this->session->userdata('level')=='owner' ){
			$filter=$this->input->get('filter_tgl_awal');
			$filter2=$this->input->get('filter_tgl_akhir');
			if ($filter == null or $filter2 == null) {
				$data['transaksi']=$this->model->laporan('transaksi')->result();
				$this->load->view('layouts/head.php');
				$this->load->view('layouts/nav_admin.php');
				$this->load->view('pages/transaksi/laporan.php',$data);
				$this->load->view('layouts/foot.php');			
			}
			else{
				$data['transaksi']=$this->model->laporan_filter($filter,$filter2)->result();
				$this->load->view('layouts/head.php');
				$this->load->view('layouts/nav_admin.php');
				$this->load->view('pages/transaksi/laporan.php',$data);
				$this->load->view('layouts/foot.php');			

			}
		}
		else{
			$this->load->view('layouts/404.php');			
		}

	}
	public function laporan_detail($date){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai'  or $this->session->userdata('level')=='owner'  ){
			$filter=$this->input->get('nama_bahan');
			if ($filter == null ) {
			$data['tgl']=$date;
			$data['bahan']=$this->model->laporan_detail_bahan($date)->result();
			$data['transaksi']=$this->model->laporan_detail($date)->result();
			$this->load->view('layouts/head.php');
			$this->load->view('layouts/nav_admin.php');
			$this->load->view('pages/transaksi/laporan_detail.php',$data);
			$this->load->view('layouts/foot.php');		
			}elseif($filter=='all'){
			$data['tgl']=$date;
			$data['bahan']=$this->model_bahan->load_data('m_bahan')->result();
			$data['transaksi']=$this->model->laporan_detail($date)->result();
			$this->load->view('layouts/head.php');
			$this->load->view('layouts/nav_admin.php');
			$this->load->view('pages/transaksi/laporan_detail.php',$data);
			$this->load->view('layouts/foot.php');		
			}
			else{
				$data['tgl']=$date;
				$data['bahan']=$this->model->laporan_detail_bahan($date)->result();
				$data['transaksi']=$this->model->laporan_detail_filter($date,$filter)->result();
				$this->load->view('layouts/head.php');
				$this->load->view('layouts/nav_admin.php');
				$this->load->view('pages/transaksi/laporan_detail.php',$data);
				$this->load->view('layouts/foot.php');		

			}
		}
		else{
			$this->load->view('layouts/404.php');			
		}

	}
}
