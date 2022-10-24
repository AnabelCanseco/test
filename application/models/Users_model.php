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

}
