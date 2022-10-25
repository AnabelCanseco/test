<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {

	private $table = 'users';
	const HASH = PASSWORD_DEFAULT;
    const COST = 14;


	public function store($user_store)
	{
		unset($user_store['confirmPwd']);
		if (array_key_exists('pwd', $user_store)) {
		    $user_store['pwd'] = $this->generate_pwd($user_store['pwd']);
		}

		return ($this->db->insert('users', $user_store)) ?
			[
				'done'    => true,
				'class'   => "success",
				'message' => "Usuario creado correctamente!"
			]
			: [
				'done'    => false,
				'class'   => "error",
				'message' => "Se produjo un error, vuelva a intentar!"
			];
	}

	public function user($userId)
	{
		return $this->db->select('id, name, email, rfc, phone, notes')
			->from($this->table)
			->where('id', $userId)
			->get()
			->row();
	}

		public function users()
	{
		return $this->db->select('id, name, email, rfc, phone, notes')
			->from($this->table)
			->get()
			->result();
	}

	public function edit($id)
	{
		return  $this->db->select('id, name, email, rfc, phone, notes')
			->from($this->table)
			->where('id', $id)
			->get()
			->row();
	}

}
