$(document).ready(function() {
	$("#register-form").validate({
		errorClass: "text-danger",
		validClass: "text-success",
		rules: {
			name : {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			phone: {
				required: true,
				digits: true,
				minlength:10,
				maxlength: 12
			},
			rfc: {
				required: true,
				minlength:12,
				maxlength: 13
			},
			pwd: {
				required: true,
				minlength:5,
			},
			confirmPwd: {
				required: true,
				minlength:5,
			},

		},
		messages : {
			name: {
				minlength: "El nombre debe tener más de dos caracteres"
			},
			email: {
				email: "El formato debe ser  tuemail@dominio.com"
			},
			phone: {
				digits: "Ingrese sólo digitos",
				minlength:"Ingrese los 10 digitos de su teléfono",
				maxlength: "Ingreso sólo 10 digitos"
			},
			rfc: {
				minlength:"El RFC de las personas fisicas es de 13 caracteres y para morales es de  12",
				maxlength: "El valor máximo es de 13 caracteres"
			},
			pwd: {
				minlength:"la contraseña debe tener minimo 5 caracteres",
			},
			confirmPwd: {
				minlength:"la contraseña debe tener minimo 5 caracteres",
			},
		},
		submitHandler: function(form) {
			$.ajax({
				url: "Register/store",
				method: "POST",
			 data: "name="+escape($('#name').val())+"&email="+escape($('#email').val())+"&phone="+escape($('#phone').val())+"&rfc="+escape($('#rfc').val())+"&pwd="+escape($('#pwd').val())+"&confirmPwd="+escape($('#confirmPwd').val())+"&notes="+escape($('#notes').val()),
				dataType: "json"
			}).done(function( response ) {
				$('#name-error').html("");
				$('#email-error').html("");
				$('#phone-error').html("");
				$('#rfc-error').html("");
				$('#pwd-error').html("");
				$('#confirmPwd-error').html("");
			 if (response.done===true) {
				alert(response.message );
				window.location.href = "/";
				$timeout( function(){
			      window.location.href = "/";
			   }, 2000 );
			 }else {
				 $('#name-error').html(response.errors.name);
				 $('#email-error').html(response.errors.email);
				 $('#phone-error').html(response.errors.phone);
				 $('#rfc-error').html(response.errors.rfc);
				 $('#pwd-error').html(response.errors.pwd);
				 $('#confirmPwd-error').html(response.errors.confirmPwd);
			 }
			}).fail(function( jqXHR, textStatus ) {
				alert( "Request failed: " + textStatus );
			});
		 }
	});
});

