<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("users_model","users");
	}

	public function index()
	{
		if(!isset($_SESSION['email'])) {
			$data['error'] = ['message'=>'Sin datos'];
			$this->load->view('login',$data);
		} else {
			//create controller
			redirect('dashboard');
		}
	}

	public function validate()
	{
		if ($this->input->is_ajax_request()) {
			log_message('error', print_r($this->input->post(),true));
			echo json_encode($this->users->user_exist($this->input->post()));
		} else {
			echo json_encode('Petición incorrecta');
		}
	}

	public function destroy(){
		$this->session->unset_userdata($_SESSION);
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
