<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model','users');
    }

	public function index()
	{
		$this->load->view('register');
	}

	public function store(){
		if ($this->input->is_ajax_request()) {
			log_message('error', print_r($this->input->post(),true));
			if ($this->form_validation->run('register')) {
				$user_sql= [
					"name" => $this->input->post('name'),
				    "email" => $this->input->post('email'),
				    "phone" => $this->input->post('phone'),
				    "rfc" => $this->input->post('rfc'),
				    "pwd" => $this->input->post('pwd'),
				    "notes" => $this->input->post('notes'),
				];

				echo json_encode($this->users->store( $user_sql ) );
			} else {
				$response = [
					'class'   =>'alert-danger',
                    'message' => 'Se han encontrado datos incorrectos',
                    'errors'  => $this->form_validation->error_array()
				];
				echo json_encode($response);
			}


		} else {
			echo json_encode('Petición incorrecta');
		}
	}
}
