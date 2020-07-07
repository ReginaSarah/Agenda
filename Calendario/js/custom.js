$('document').ready(function(){
 
	$("#btn-login").click(function(){
		var data = $("#formulario-entrar").serialize();
			
		$.ajax({
			type : 'GET',
			url  : 'login.php',
			data : data,
			dataType: 'json',
			beforeSend: function()
			{	
				$("#btn-login").html('Validando ...');
			},
			success :  function(response){						
				if(response.codigo == "1"){	
					$("#btn-login").html('Entrar');
					window.location.href = "index.php";
				}
				else{			
					$("#btn-login").html('Entrar');
					$("#mensagem").html('<strong>Erro! </strong>' + response.mensagem);
				}
		    }
		});
	});
});