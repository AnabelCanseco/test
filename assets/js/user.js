$(document).ready(function() {
	$('#usersListData').DataTable( {
	    dom: 'Bfrtip',
	    buttons: [
	        'csv', 'excel'
	    ]
	} );

	$(document).on("click",".editar-btn",function(){
        var id = $(this).data('id');
        $.ajax({
            url :"users/edit",
            type:"POST",
            cache:false,
            data:{editarId:id}
        }).done(function(response){
            $("#editarForm").html(response);
        }).fail(function(err){
        	console.log(err);
        });
    });
});

