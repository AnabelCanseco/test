<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('register');
	}

	public function store(){
		if ($this->input->is_ajax_request()) {
			if ($this->form_validation->run('register')) {

				echo json_encode($this->register->store($this->input->post()));
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
