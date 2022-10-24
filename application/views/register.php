<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>Test</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet"  href="<?= base_url('assets/css/login.css?v=' . rand()) ?>">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
</head>
<body class="bg-light">
		<div class="container mt-5">
				<div class="card text-center">
					<div class="bg-primary p-2 text-white">
					 <h4>Registro de nuevo usuario</h4>
					</div>
					<div class="card-body">
						<form class="row g-4" id="register-form" method="post">
							<div class="col-md-6 col-sm-12">
								<label for="name" class="form-label">Nombre</label>
								<input type="text" class="form-control" id="name" name="name">
								<span class="text-danger" id="name-error"></span>
							</div>
							<div class="col-md-6 col-sm-12">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control" id="email" name="email">
								<span class="text-danger" id="email-error"></span>
							</div>
							<div class="col-md-6 col-sm-12">
								<label for="phone" class="form-label">Teléfono</label>
								<input type="text" class="form-control" id="phone" name="phone">
								 <span class="text-danger" id="phone-error"></span>
							</div>
							<div class="col-md-6 col-sm-12">
								<label for="rfc" class="form-label">RFC</label>
								<input type="text" class="form-control" id="rfc" name="rfc">
								 <span class="text-danger" id="rfc-error"></span>
							</div>
							<div class="col-md-6 col-sm-12">
								<label for="pwd" class="form-label">Contraseña</label>
								<input type="password" class="form-control" id="pwd" name="pwd">
								<span class="text-danger" id="pwd-error"></span>
							</div>
							<div class="col-md-6 col-sm-12">
								<label for="confirmPwd" class="form-label">Confirmar contraseña</label>
								<input type="password" class="form-control" id="confirmPwd" name="confirmPwd">
								<span class="text-danger" id="confirmPwd-error"></span>
							</div>
							<div class="col-12">
								<label for="notes" class="form-label">Notas</label>
								<input type="text" class="form-control" id="notes" name="notes">
							</div>
							<div class="col-12">
								<button type="submit" class="btn btn-primary">Registrarse</button>
							</div>
						</form>
					</div>
					<div class="mt-3 mb-3">
						<a href="<?php echo base_url('login') ?>">Regresar al login</a>
					</div>
					<div class="card-footer text-muted">
						Designed By Anabel Canseco
					</div>
				</div>
		</div>
		<script src="<?php echo base_url('assets/js/register.js') ?>">

		</script>
</body>
</html>
