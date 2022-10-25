<?php
$config = array(
		'login' => array(
			[
				'field' => 'email',
				'label' => 'email',
				'rules' => 'required|valid_email'
			],
			[
				'field' => 'pwd',
				'label' => 'contraseña',
				'rules' => 'required|min_length[5]'
			],
        ),
		'register' => array(
			[
				'field' => 'name',
				'label' => 'Nombre',
				'rules' => 'required|min_length[2]|max_length[255]|is_unique[users.name]'
			],
			[
				'field' => 'email',
				'label' => 'email',
				'rules' => 'required|valid_email|is_unique[users.email]'
			],
			[
				'field' => 'phone',
				'label' => 'Teléfono celular',
				'rules' => 'required|numeric|exact_length[10]'
			],
			[
				'field' => 'rfc',
				'label' => 'RFC',
				'rules' => 'required|min_length[12]|max_length[13]'
			],
			[
				'field' => 'pwd',
				'label' => 'contraseña',
				'rules' => 'required|min_length[5]'
			],
			[
				'field' => 'confirmPwd',
				'label' => 'Confirmar contraseña',
				'rules' => 'required|min_length[5]|matches[pwd]'
			],

		),
		'registerApi' => array(
			[
				'field' => 'name',
				'label' => 'Nombre',
				'rules' => 'required|min_length[2]|max_length[255]|is_unique[users.name]'
			],
			[
				'field' => 'email',
				'label' => 'email',
				'rules' => 'required|valid_email|is_unique[users.email]'
			],
			[
				'field' => 'phone',
				'label' => 'Teléfono celular',
				'rules' => 'required|numeric|exact_length[10]'
			],
			[
				'field' => 'rfc',
				'label' => 'RFC',
				'rules' => 'required|min_length[12]|max_length[13]'
			],
			[
				'field' => 'pwd',
				'label' => 'contraseña',
				'rules' => 'required|min_length[5]'
			],
			[
				'field' => 'confirmPwd',
				'label' => 'Confirmar contraseña',
				'rules' => 'required|min_length[5]|matches[pwd]'
			],
			[
				'field' => 'token',
				'label' => 'Token',
				'rules' => 'required|min_length[5]'
			],

		),
		'registerEdit' => array(
			[
				'field' => 'name',
				'label' => 'Nombre',
				'rules' => 'required|min_length[2]|max_length[255]'
			],
			[
				'field' => 'email',
				'label' => 'email',
				'rules' => 'required|valid_email'
			],
			[
				'field' => 'phone',
				'label' => 'Teléfono celular',
				'rules' => 'required|numeric|exact_length[10]'
			],
			[
				'field' => 'rfc',
				'label' => 'RFC',
				'rules' => 'required|min_length[12]|max_length[13]'
			],
		),
		'registerUpdateApi' => array(
			[
				'field' => 'name',
				'label' => 'Nombre',
				'rules' => 'required|min_length[2]|max_length[255]'
			],
			[
				'field' => 'email',
				'label' => 'email',
				'rules' => 'required|valid_email'
			],
			[
				'field' => 'phone',
				'label' => 'Teléfono celular',
				'rules' => 'required|numeric|exact_length[10]'
			],
			[
				'field' => 'rfc',
				'label' => 'RFC',
				'rules' => 'required|min_length[12]|max_length[13]'
			],
			[
				'field' => 'token',
				'label' => 'Token',
				'rules' => 'required|min_length[5]'
			],

		),
		'signup' => array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			),
		),
		'api' => array(
			array(
				'field' => 'token',
				'label' => 'Token',
				'rules' => 'required'
			),
			array(
				'field' => 'userId',
				'label' => 'User ID',
				'rules' => 'required|numeric'
			),
		),
);
