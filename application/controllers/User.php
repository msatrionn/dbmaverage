<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('M_Auth','model');
    $this->load->model('M_Karyawan','karyawan_model');
	}

	public function login()
	{
		if ($this->session->userdata('id_user') == null) {
			$this->load->view('layouts/head.php');
			$this->load->view('auth/login.php');
			$this->load->view('layouts/foot.php');
		}
		else{
			redirect('home/index');
		}
	}
	public function login_post(){
		
		if ($this->session->userdata('id_user') != null) {
			redirect('home/index');
		}
		$username    = $this->input->post('username');
		$password 	 = md5($this->input->post('password'));
		$validate= $this->model->validasi_login($username,$password,'m_user');
		if($validate->num_rows() > 0){
			$data  = $validate->row_array();
			$name  = $data['username'];
			$level = $data['level'];
					var_dump($data);
			$sesdata = array(
				'id_user'=> $data['id_user'],
				'username'  => $name,
				'level'     => $level,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
				redirect('home/index');
		}
			else{
			echo $this->session->set_flashdata('msg','Login gagal');
			redirect('user/login');
		}
	}
	public function register()
	{
		if ($this->session->userdata('id_user')!= null) {
			redirect('home/index');
		}
		$this->load->view('layouts/head.php');
		$this->load->view('auth/register.php');
		$this->load->view('layouts/foot.php');
	}
	public function register_post()
	{
		if ($this->session->userdata('id_user')!= null) {
			redirect('home/index');
		}
		$username=$this->input->post('username');
		$check_username=$this->db->where('username',$username)->get('m_user')->row();
		if ($check_username == null) {
			$id_user=$this->db->limit(1)->order_by('id_user',"DESC")->get('m_user')->row()->id_user+1;
			$data_user=[
				'id_user'=>$id_user,
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password')),
				'level'=>$this->input->post('level')
			];
			$data_karyawan=[
				'id_user'=>$id_user,
				'nama_karyawan'=>$this->input->post('nama_karyawan'),
				'alamat_karyawan'=>md5($this->input->post('alamat_karyawan')),
				'no_telp'=>$this->input->post('no_telp')
			];
			$this->model->insert_data('m_user',$data_user);		
			$this->model->insert_data('karyawan',$data_karyawan);		
	
			echo $this->session->set_flashdata('msg_success', '<p>Akun berhasil di daftarkan</p>' );
			return redirect('user/register');
		}
		elseif($check_username != null){
			echo $this->session->set_flashdata('msg', '<p>Username sudah terdaftar</p>' );
			return redirect('user/register');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
      	return redirect('user/login');
	}
	public function show_user(){
		if($this->session->userdata('level')=='admin'){
		$data['karyawan']=$this->karyawan_model->show_data()->result();
		$this->load->view('layouts/head.php');
		$this->load->view('layouts/nav_admin.php');
		$this->load->view('pages/user/index.php',$data);
		$this->load->view('layouts/foot.php');
		}
		else{
			$this->load->view('layouts/404.php');			
		}
	}
	public function edit($id){
		if($this->session->userdata('level')=='admin'){
			$data['user']=$this->karyawan_model->edit_data('karyawan',$id)->row();
			$this->load->view('layouts/head.php');
			$this->load->view('layouts/nav_admin.php');
			$this->load->view('pages/user/edit.php',$data);
			$this->load->view('layouts/foot.php');			
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function update($id){
		if($this->session->userdata('level')=='admin'){
			$data_user=[
				'username'=>$this->input->post('username'),
				'level'=>$this->input->post('level'),
				'password'=>md5($this->input->post('password')),
			];
			$data_karyawan=[
				'nama_karyawan'=>$this->input->post('nama_karyawan'),
				'alamat_karyawan'=>$this->input->post('alamat_karyawan'),
				'no_telp'=>$this->input->post('no_telp'),
			];
			$this->model->update_user($id,'m_user',$data_user);
			$this->karyawan_model->update_karyawan($id,'karyawan',$data_karyawan);
			return redirect('user/show_user');			
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	public function delete($id){
		if($this->session->userdata('level')=='admin'){
			$this->karyawan_model->delete_user($id,'m_user');
			return redirect('user/show_user');		
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
}
