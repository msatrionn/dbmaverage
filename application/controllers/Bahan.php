<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Bahan','model');
		}
	public function index(){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' ){
			$data['bahan']=$this->model->load_data('m_bahan')->result();
			$this->load->view('layouts/head.php');
			$this->load->view('layouts/nav_admin.php');
			$this->load->view('pages/bahan/index.php',$data);
			$this->load->view('layouts/foot.php');			
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function create(){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' ){
			$this->load->view('layouts/head.php');
			$this->load->view('layouts/nav_admin.php');
			$this->load->view('pages/bahan/create.php');
			$this->load->view('layouts/foot.php');			
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function insert(){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' ){
			$data=[
				'nama_bahan'=>$this->input->post('nama_bahan'),
				'satuan'=>$this->input->post('satuan'),
				'harga_bahan'=>$this->input->post('harga')
			];

			$this->model->insert_bahan('m_bahan',$data);		
			return redirect('bahan/index');
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function edit($id){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' ){
			$data['bahan']=$this->model->edit_data('m_bahan',$id)->row();
			$this->load->view('layouts/head.php');
			$this->load->view('layouts/nav_admin.php');
			$this->load->view('pages/bahan/edit.php',$data);
			$this->load->view('layouts/foot.php');			
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function update($id){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' ){
			$data=[
				'nama_bahan'=>$this->input->post('nama_bahan'),
				'satuan'=>$this->input->post('satuan'),
				'harga_bahan'=>$this->input->post('harga')
			];
			$this->model->update_bahan($id,'m_bahan',$data);
			return redirect('bahan/index');			
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function delete($id){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' ){
			$this->model->delete_bahan($id,'m_bahan');
			return redirect('bahan/index');		
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
}
