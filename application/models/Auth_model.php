<?php 

/**
 * Author: Anabel Canseco
 */
class Auth_model extends CI_Model
{

	public function credential($username, $password)
	{
		$query = $this->db->select('username','password')
		->from('Auth_api')
		->where('username', $username)
		->where('password', $password)
		->get();
		return ($query->num_rows() === 1);
	}

	public function assign_token_to($username)
	{
		$token = bin2hex(random_bytes(16));
		$this->db->where('username', $username)
		->update('Auth_api',['token'=>$token]);
		return $token;
	}

	public function validate_token($token)
	{
		return $this->db->select('token')
		->from('Auth_api')
		->where('token', $token)
		->get()
		->row();
	}
}
