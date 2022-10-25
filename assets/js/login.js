$(document).ready(function() {
	$("#login-form").validate({
		errorClass: "text-danger",
		validClass: "text-success",
		rules: {
			email: {
				required: true,
				email: true
			},
			pwd: {
				required: true,
				minlength:5,
			},
		},
		messages : {
			email: {
				email: "El formato debe ser  tuemail@dominio.com"
			},
			pwd: {
				minlength:"la contraseña debe tener minimo 5 caracteres",
			},
		},
		submitHandler: function(form) {
			$.ajax({
				url: "login/validate",
				method: "POST",
			    data: "email="+escape($('#email').val())+"&pwd="+escape($('#pwd').val()),
				dataType: "json"
			}).done(function( response ) {
				$('#email-error').html("");
				$('#pwd-error').html("");
			 if (response.done===true) {
				alert(response.message );
				window.location.reload();
				$timeout( function(){
			      window.location.href = "/";
			   }, 2000 );
			 }else {
			 	if (response.errors ==='null') {
					$('#email-error').html(response.errors.email);
					$('#pwd-error').html(response.errors.pwd);
			 	}
			 	$('#message-error').html(response.message);
			 }
			}).fail(function( jqXHR, textStatus ) {
				alert( "Request failed: " + textStatus );
			});
		 }
	});
});

