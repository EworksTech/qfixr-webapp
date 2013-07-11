$(document).ready(function(){    
	
	$(".container").fitVids();
	
	$('#go_client').on('click', function(){
		$('html,body').scrollTo('#client', '#client');
          e.preventDefault();
	});
	
	$('#go_technician').on('click', function(){
		$('html,body').scrollTo('#technician', '#technician');
          e.preventDefault();
	});
	
	// envio de formularios
	
	//formulario cliente	
	$("#send_client").on('click',function(){

	//valida os campos do cliente
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

		
	var nome = $("#client-name").val();
	if (nome == "") {
		bootbox.alert("Por favor, preencha todos os campos corretamente.", function() {
		  //
		});	
		return false;
	}
	
	var tel = $("#client-tel").val();
	if (tel == "") {
		bootbox.alert("Por favor, preencha todos os campos corretamente.", function() {
		  //
		});	
		return false;
	}
	
	var mensagem = $("#client-message").val();
	if (mensagem == "") {
		bootbox.alert("Por favor, preencha todos os campos corretamente.", function() {
		  //
		});	
		return false;
	}
	
	var email = $("#client-email ").val();     
	if (email == "") {
		bootbox.alert("Por favor, preencha todos os campos corretamente.", function() {
			 //
		});
		return false;
	} else {
		if(!emailReg.test(email)){
			bootbox.alert("Por favor, preencha todos os campos corretamente.", function() {
		  		//
			});
			return false;
		}	
	}
	
	
	///valida os campos do cliente
	
	//envia os dados para o servidor
	
	var dataString = "name="+nome+"&tel="+tel+"&email="+email+"&message="+mensagem;
	
	  	$.ajax({
		  	type: "POST",
	  		url: "client.php", 
	  		data: dataString
		}).done(function( msg ) {
		  		bootbox.alert("Parabéns! Agora você é um cliente Qfixr!<br>Entraremos em contato o mais breve possível. ", function() {
		  			  $("#client-name").val('');
					  $("#client-tel").val('');
					  $("#client-email").val('');
					  $("#client-message").val('');
				});
		}).fail(function(jqXHR, textStatus) {
		  		bootbox.alert("Não foi possível enviar sua solicitação. Por favor, tente mais tarde.", function() {
		  			//
				});
		});
	  return false;
	});// /cliente
	
	//formulario tecnico
	$("#send_technician").on('click',function(){
			
	//valida os campos do cliente
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

		
	var nome = $("#technician-name").val();
	if (nome == "") {
		bootbox.alert("Por favor, preencha todos os campos corretamente.", function() {
		  //
		});	
		return false;
	}
	
	var tel = $("#technician-tel").val();
	if (tel == "") {
		bootbox.alert("Por favor, preencha todos os campos corretamente.", function() {
		  //
		});	
		return false;
	}
						
	var email = $("#technician-email ").val();     
	if (email == "") {
		bootbox.alert("Por favor, preencha todos os campos corretamente.", function() {
			 //
		});
		return false;
	} else {
		if(!emailReg.test(email)){
			bootbox.alert("Por favor, preencha todos os campos corretamente.", function() {
		  		//
			});
			return false;
		}	
	}
	
	
	///valida os campos do cliente
	
	//envia os dados para o servidor
	
	var dataString = "name="+nome+"&tel="+tel+"&email="+email;
	
	  	$.ajax({
		  	type: "POST",
	  		url: "technician.php", 
	  		data: dataString
		}).done(function( msg ) {
		  		bootbox.alert("Cadastro realizado com sucesso!<br>Agora você está mais perto de ser um técnico Qfixr. Aguarde, pois logo entraremos em contato. ", function() {
		  			  $("#technician-name").val('');
					  $("#technician-tel").val('');
					  $("#technician-email").val('');
				});
		}).fail(function(jqXHR, textStatus) {
		  		bootbox.alert("Não foi possivel enviar sua solicitação. Por favor, tente mais tarde.", function() {
		  			//
				});
		});
	  return false;
	});// /cliente

});// /ready

