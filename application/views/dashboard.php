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
		<div class="card  mt-5 mb-3" >
		  <div class="row g-0">
		    <div class="col-md-6">
		      <img src="<?php echo base_url('assets/img/login.jpg') ?>" class="img-fluid rounded-start" alt="...">
		    </div>
		    <div class="col-md-6 bg-login" >
		      <div class="card-body mt-5">
		      	<div class="col-md-12 mb-5">
			  		<h4 class="text-center">Inicio de sesión</h4>
			  	</div>
				<form class="row g-4 mt-5" id="login-form" method="post">
					<div class="col-md-12 col-sm-12">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" name="email">
						<span class="text-danger" id="email-error"></span>
					</div>
					<div class="col-md-12 col-sm-12">
						<label for="pwd" class="form-label">Contraseña</label>
						<input type="password" class="form-control" id="pwd" name="pwd">
						<span class="text-danger" id="pwd-error"></span>
					</div>
					<div class="col-12 text-center">
						<button type="submit" class="btn btn-lg btn-primary ">Iniciar sesión</button>
					</div>
				</form>
				</div>

		    </div>
		  </div>
		</div>
	</div>
	<script src="<?php echo base_url('assets/js/login.js') ?>"></script>
</body>
</html>
