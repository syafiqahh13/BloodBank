<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bloodbank extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
	}

	public function index() {
		$this->load->view('halamanawal');
	}

	public function login() {
		$this->load->view('login');
	}

	public function user() {
		$this->load->view('userpage');
	}
}
