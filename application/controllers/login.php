<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('loginModel');
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
	}

	function index(){
		$this->load->view('login');
		$this->session->sess_destroy();
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->loginModel->cek_login("usertable",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(site_url('user'));

		}else{
			echo "<script>alert('Incorrect Username/Password!');</script>";
			redirect('login', 'refresh');
		}
	}

	function registrasi(){
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[usertable.email]');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'confirm password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->view('login');
        }
        else
		{
			$data = array(
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'nama' => '',
				'jk' => '',
				'goldar' => '',
				'nohp' => '',
				'kota' => '',
				'point' => ''
			);
			if($this->loginModel->insert_user($data)){
				echo "<script>alert('You are Successfully Registered! Please login');</script>";
				redirect('login');
			}else{
				echo "<script>alert('Oops! Error. Please try again!');</script>";
				redirect('login', 'refresh');
			}
		}
		/*$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[usertable.email]');
		$this->form_validation->set_rules('username', 'Email ID', 'trim|required|valid_email|is_unique[usertable.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');

		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->view('login');
        }
        else
		{
			$data = array(
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'nama' => '',
				'jk' => '',
				'goldar' => '',
				'nohp' => '',
				'kota' => '',
				'point' => ''
			);
			
			if ($this->loginModel->insert_user($data))
			{
				echo "<script>alert('You are Successfully Registered! Please login to access your Profile!');</script>";
				//$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please login to access your Profile!</div>');
				redirect('login');
			}
			else
			{
				echo "<script>alert('Oops! Error.  Please try again later!!!');</script>";
				//$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
				redirect('login', 'refresh');
			}
			$data['user'] = $data;
		}*/
	}
}