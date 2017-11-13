<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','html'));
        $this->load->library('session');
        $this->load->database();

        if ($this->session->userdata('status') != 'login'){
            $this->load->driver('cache');
            $this->session->unset_userdata(array('nama' => '', 'status'=>''));
            $this->session->sess_destroy();
            $this->cache->clean();
            redirect(site_url('login'));
        }

        $this->load->model('userModel');
        $this->data['rspmi'] = $this->userModel->getRandom();
	}

	function index(){
        $this->load->view('userpage', $this->data);
	}

    /*function showmore(){
        $this->load->model('userModel', '', TRUE);
        $data = $this->userModel->getRandom();
    )*/

    function getData(){
        $this->data['rspmi'] = $this->userModel->getRandom();
    }

    function logout(){
        $this->load->driver('cache');
        $this->session->unset_userdata(array('nama' => '', 'status'=>''));
        $this->session->sess_destroy();
        $this->cache->clean();
        redirect(site_url('login'));
    }
}