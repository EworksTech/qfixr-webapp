<?php
	
	require("phpmailer.php");
	
  $date = date('r');
  $remote_addr = $_SERVER['REMOTE_ADDR'];
	$nome = $_POST['name'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];
	$mensagem = $_POST['message'];
	
	
	$data = "$date;$remote_addr;$nome;$tel;$email;$mensagem;".PHP_EOL;
	
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
	$fromaddress = 'contato@qfixr.com.br';
	$fromname = 'Qfixr Brasil';
	
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
		$recipient = "contato@qfixr.com.br";
		$subject = 'Envio Falhou';
		$content = $body;	
		mail($recipient, $subject, $content, "From: contato@qfixr.com.br\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
		exit;
	}

	$to = 'Qfixr';
	$email = 'atendimento@qfixr.com.br';
	$fromaddress = $email;
	$fromname = $nome;
	$corpo_email = str_replace(';', '<br>', $data);
	
	$mail = new PHPMailer();
	
	$mail->From     = $fromaddress;
	$mail->FromName = $fromname;
	$mail->AddAddress($email,$nome);
	
	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	
	$mail->Subject  =  "Solicitação de atendimento";
	$mail->Body     =  $corpo_email;//E_MENSAGEM." <bold>$idvela</bold> e do email $email.";
	$mail->AltBody  =  $corpo_email;//E_MENSAGEM." <bold>$idvela</bold> e do email $email.";
	
	if(!$mail->Send()) {
		$recipient = "contato@qfixr.com.br";
		$subject = 'Envio Falhou';
		$content = $body;	
		mail($recipient, $subject, $content, "From: contato@qfixr.com.br\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
		exit;
	}

	
	echo "Gravado";
	
?>