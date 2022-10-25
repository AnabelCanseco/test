<?php 

/**
 * Author Anabel Canseco Peralta
 */

class Auth_api extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model','auth');
	}

	public function login()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if (strtoupper($method) === 'POST') {
			$username =$this->input->post('username');
			$password =$this->input->post('password');

			if ($this->form_validation->run('signup')) {
				if ($this->auth->credential($username, $password))
				{
					$token = $this->auth->assign_token_to($username);

					$response = [
						'token' => $token,
						'message' => 'Token success',
						'error' => false,
					];

					$this->response_json($response);
				} else{
					$response = [
						'message' => 'Invalid username or password',
						'error' => true,
					];
					$this->response_json($response);
				}
			} else {
				$response = [
						'message' => 'Incomplete information',
						'error'  => $this->form_validation->error_array()
					];
					$this->response_json($response);

			}

		}else {
			$response = [
				'message' => 'Method Not Allowed',
				'error' => true,
			];
			$this->response_json($response);
		}

	}

}
