<?php
	
	require("phpmailer.php");
	
	$nome 		= $_POST['name'];
	$tel 		= $_POST['tel'];
	$email 		= $_POST['email'];
	$mensagem 	= $_POST['message'];
	
	
	$data = "nome:$nome|; tel:$tel|; email:$email|; mensagem:$mensagem|;".PHP_EOL;
	
	$fh = fopen("clientes.txt", "a");
	fwrite($fh, $data);
	fclose($fh);
	
	
	//email-------------------------------------------------------------------------
	$corpo_email = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<div style="border:solid 1px #dfdfdf;color:#686868;font:13px Arial">
	<div style="padding:20px">
	<table cellpadding="0" cellspacing="0">
		<tbody>
		<tr>
			<td style="padding-right:15px;">
				<img width="128" height="142" src="imgs/header_logo.png">
			</td>
			<td colspan="2" style="color:#686868;font:20px Arial">
				Parabéns! 
				<div style="color:#333;font:16px Arial;vertical-align:top;padding-top:10px">
					Agora você é um cliente Qfixr. Estaremos entrando em contato com você o mais breve possível.
				</div>
				<div style="color:#333;font:24px Arial;vertical-align:top;padding-top:24px" align="left">
					<img  src="imgs/client_phone_icon.png" height="30"/>&nbsp;4063-8100
				</div>
			</td>
		</tr>
		
		</tbody>
	</table>
	</div>';
	
	//===========================================================================
	
	$to = $nome;
	$email = $email;
	$fromaddress = 'cesarmascarenhas@gmail.com';
	$fromname = 'Cesar Mascarenhas';
	
	$mail = new PHPMailer();
	
	$mail->From     = $fromaddress;
	$mail->FromName = $fromname;
	$mail->AddAddress($email,$nome);
	
	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	
	$mail->Subject  =  "Bem-vindo ao QFIXR!";
	$mail->Body     =  $corpo_email;//E_MENSAGEM." <bold>$idvela</bold> e do email $email.";
	$mail->AltBody  =  $corpo_email;//E_MENSAGEM." <bold>$idvela</bold> e do email $email.";
	
	if(!$mail->Send()) {
		$recipient = E_EMAIL;
		$subject = 'Envio Falhou';
		$content = $body;	
		mail($recipient, $subject, $content, "From: mail@yourdomain.com\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
		exit;
	}


	
	echo "Gravado";
	
?>