<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Author:Anabel Canseco Peralta
 */
class Api extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model','auth');
		$this->load->model('users_model','users');
	}

	public function users()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if (strtoupper($method) === 'GET') {
			if (isset($_GET['token'])) {
				$token = $_GET['token'];
				if ($this->auth->validate_token($token)) {
					$result = $this->users->get();
					if (isset($result)) {
						$response = [
							'success' => true,
							'data' => $result,
						];
					} else {
					 	$response = [
							'success' => false,
							'message' => " Your identification request was not found. Please check it and try again.",
						];
					}

					$this->response_json($response);
				}else{
					$response = [
						'success' => false,
						'message' => 'Bad authentication',
					];
					$this->response_json($response);
				}
			}else{
				$response = [
					'success' => false,
					'message' => 'Incomplete information',
					'error'  => $this->form_validation->error_array()
				];
				$this->response_json($response);

			}

		} else {
			$response = [
				'success' => false,
				'message' => 'Method Not Allowed',
				'error' => true,
			];
			$this->response_json($response);
		}
	}

	public function user()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if (strtoupper($method) === 'POST') {
			if ($this->form_validation->run('api')) {
				$userId =$this->input->post('userId');
				$token =$this->input->post('token');

				if ($this->auth->validate_token($token)) {
					$result = $this->users->edit($userId);
					if (isset($result)) {
						$response = [
							'success' => true,
							'data' => $result,
						];
					} else {
					 	$response = [
							'success' => false,
							'message' => " Your identification request was not found. Please check it and try again.",
						];
					}

					$this->response_json($response);
				}else{
					$response = [
						'success' => false,
						'message' => 'Bad authentication',
					];
					$this->response_json($response);
				}
			}else{
				$response = [
					'success' => false,
					'message' => 'Incomplete information',
					'error'  => $this->form_validation->error_array()
				];
				$this->response_json($response);

			}

		} else {
			$response = [
				'success' => false,
				'message' => 'Method Not Allowed',
				'error' => true,
			];
			$this->response_json($response);
		}
	}

	public function storeUser()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if (strtoupper($method) === 'POST') {
			if ($this->form_validation->run('register')) {
				$token = $this->input->post('token');
				if ($this->auth->validate_token($token)) {
					$api_store = [
						"name" => $this->input->post('name'),
					    "email" => $this->input->post('email'),
					    "phone" => $this->input->post('phone'),
					    "rfc" => $this->input->post('rfc'),
					    "pwd" => $this->input->post('pwd'),
					    "notes" => $this->input->post('notes'),
					];
					$result = $this->users->store($api_store);
					if (isset($result)) {
						$response = [
							'success' => true,
							'data' => $result,
						];
					} else {
					 	$response = [
							'success' => false,
							'message' => " Your identification request was not found. Please check it and try again.",
						];
					}

					$this->response_json($response);
				}else{
					$response = [
						'success' => false,
						'message' => 'Bad authentication',
					];
					$this->response_json($response);
				}
			}else{
				$response = [
					'success' => false,
					'message' => 'Incomplete information',
					'error'  => $this->form_validation->error_array()
				];
				$this->response_json($response);

			}

		} else {
			$response = [
				'success' => false,
				'message' => 'Method Not Allowed',
				'error' => true,
			];
			$this->response_json($response);
		}
	}

	public function updateUser()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if (strtoupper($method) === 'POST') {
			if ($this->form_validation->run('registerUpdateApi')) {
				$token = $this->input->post('token');
				if ($this->auth->validate_token($token)) {
					$userId = $this->input->post('userId');
					$api_update = [
						"name" => $this->input->post('name'),
					    "email" => $this->input->post('email'),
					    "phone" => $this->input->post('phone'),
					    "rfc" => $this->input->post('rfc'),
					    "notes" => $this->input->post('notes'),
					];
					$result = $this->users->user($api_update,$userId);
					if (isset($result)) {
						$response = [
							'success' => true,
							'data' => $result,
						];
					} else {
					 	$response = [
							'success' => false,
							'message' => " Your identification request was not found. Please check it and try again.",
						];
					}

					$this->response_json($response);
				}else{
					$response = [
						'success' => false,
						'message' => 'Bad authentication',
					];
					$this->response_json($response);
				}
			}else{
				$response = [
					'success' => false,
					'message' => 'Incomplete information',
					'error'  => $this->form_validation->error_array()
				];
				$this->response_json($response);

			}

		} else {
			$response = [
				'success' => false,
				'message' => 'Method Not Allowed',
				'error' => true,
			];
			$this->response_json($response);
		}
	}

}
