<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Test</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-html5-2.2.3/r-2.3.0/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/datatables.min.css"/>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/datatables.min.js"></script>
</head>
<body class="bg-light">
	<div>
		<nav class="navbar navbar-dark bg-dark fixed-top mb-5">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="<?php echo base_url('dashboard') ?>"><?php echo $_SESSION['name'] ?></a>
		    <button class="navbar-toggler editar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
		      <div class="offcanvas-header">
		        <h6 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><?php echo $_SESSION['email'] ?></h6>
		        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		      </div>
		      <div class="offcanvas-body">
		        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
		          <li class="nav-item">
		            <a class="nav-link active" aria-current="page" href="<?php echo base_url("dashboard") ?>">Home</a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href="<?php echo base_url('login/destroy') ?>">Logout</a>
		          </li>
		        </ul>
		      </div>
		    </div>
		  </div>
		</nav>
	</div>
	<div class="container-fluid mt-5 pt-5">
	  <div>
	  	<h3 class="text-muted">Lista de usuarios</h3>
	  </div>
	  <div class="card p-2 mt-3">
	     <table class="table bg-muted" id="usersListData">
	       <thead>
	          <tr>
	             <th>Nombre</th>
	             <th>Email</th>
	             <th>Teléfono</th>
	             <th>RFC</th>
	             <th>Nota</th>
	             <th>Acción</th>
	          </tr>
	       </thead>
	       <tbody>
	          <?php if($users): ?>
	          <?php foreach($users as $user): ?>
	          <tr>
	             <td><?php echo $user->name ?></td>
	             <td><?php echo $user->email ?></td>
	             <td><?php echo $user->phone; ?></td>
	             <td><?php echo $user->rfc; ?></td>
	             <td><?php echo $user->notes; ?></td>
	             <td>
	             	<button class="btn btn-primary btn-sm editar-btn" data-bs-toggle="modal" data-bs-target="#exampleModalLabel" data-id='$user->id' data-placement="bottom" title="Editar datos">
	             		Editar
					</button>
	             </td>
	          </tr>
	         <?php endforeach; ?>
	         <?php endif; ?>
	       </tbody>
	     </table>
	  </div>
	</div>


			<!-- Modal -->
			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="staticBackdropLabel"></h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div id="editarForm">

				  </div>

			    </div>
			  </div>
			</div>

	<script>
	    $('#usersListData').DataTable( {
	        dom: 'Bfrtip',
	        buttons: [
	            'csv', 'excel'
	        ]
	    } );
	</script>
</body>
</html>
