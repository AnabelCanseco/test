<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

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

	public function generate_pwd($password) {
		return password_hash($password, self::HASH, ['cost' => self::COST]);
	}

	public function verify_pwd($password, $passwordHash, $userId) {
		if (password_verify($password, $passwordHash)) {
            // Se comprueba si la contraseña necesita un rehash:
            if (password_needs_rehash($passwordHash, self::HASH, ['cost' => self::COST])) {
                $this->db->where('id', $userId)
					->update($this->table, [
						'password' => $this->generate_pwd($password)
					]);
            }

            return true;
        }

        return false;
	}


	public function user_exist($data)
	{
		$response = [
			'message' => '¡Bienvenido!',
			'exist'   => true,
			'class'	  => 'success'
		];

		$query = $this->db->select('id,name,email,pwd')
			->from('users')
			->where('email', $data['email'])
			->get();

		$count = $query->num_rows();

		if ($count === 1) {
			$result = $query->row_array();

			if ($this->users->verify_pwd($data['pwd'], $result['pwd'], $result['id'])) {
				$_SESSION["name"]    = $result['name'];
				$_SESSION["email"]   = $result['email'];
				$_SESSION["logged"]  = true;

				$response =[
					'done'    => true,
					'class'   => "success",
					'message' => "¡Bienvenido!"
				];

			} else {
				$response =  [
					'done'    => false,
					'class'   => "error",
					'message' => "Usuario o contraseña incorrecto!"
				];
			}
		} else {
			$response =  [
				'done'    => false,
				'class'   => "error",
				'message' => "Usuario o contraseña incorrecto!"
			];
		}

		return $response;
	}

	public function get()
	{
		return $this->db->select('id, name, email, rfc, phone, notes')
			->from($this->table)
			->get()
			->result();
	}

	public function edit($id)
	{
		$return = $this->db->select('id, name, email, rfc, phone, notes')
			->from($this->table)
			->where('id', 1)
			->get()
			->row();

		//log_message('error',print_r($this->db->last_query(),true));

		return $return;
	}

}
