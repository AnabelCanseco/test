<?php 

/**
 * Author Anabel Canseco Peralta
 */
class MY_Controller extends CI_Controller
{
	protected $settings = [];

	public function __construct()
	{
		parent::__construct();
	}

	public function response_json($response)
	{
		// CORS
		if (isset($_SERVER['HTTP_ORIGIN'])) {
			header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
			header('Access-Control-Allow-Credentials: true');
		}
		// Access-Control headers are received during OPTIONS requests
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
				// may also be using PUT, PATCH, HEAD etc
				header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
				if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
					header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
		}

		header("Content-Type: application/json");
		echo json_encode($response);
	}
}

