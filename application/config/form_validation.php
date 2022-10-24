<?php
$config = array(
		'register' => array(
			[
				'field' => 'name',
				'label' => 'Nombre',
				'rules' => 'required|min_length[2]|max_length[255]is_unique[users.name]'
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
);
