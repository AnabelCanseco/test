<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("users_model","users");
	}

	public function index()
	{
		if (isset($_SESSION['logged'])) {
			$users['users'] = $this->users->get();
			$this->load->view('dashboard', $users);
		}else {
			$this->load->view('login');
		}
	}
}
