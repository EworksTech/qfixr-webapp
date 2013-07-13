<?php
	
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
				<img width="128" height="142" src="http://qfixr.com.br/imgs/header_logo.png">
			</td>
			<td colspan="2" style="color:#686868;font:20px Arial">
				Parab&eacute;ns! 
				<div style="color:#333;font:16px Arial;vertical-align:top;padding-top:10px">
					Agora voc&ecirc; &eacute; um cliente Qfixr. Entraremos em contato com voc&ecirc; o mais breve poss&iacute;vel.
				</div>
				<div style="color:#333;font:24px Arial;vertical-align:top;padding-top:24px" align="left">
					<img  src="http://qfixr.com.br/imgs/client_phone_icon.png" height="30"/>&nbsp;4063-8100
				</div>
			</td>
		</tr>
		
		</tbody>
	</table>
	</div>';
	
	//===========================================================================
	
	$headers = "Content-Type: text/html; charset=utf-8\r\n";
	$headers = "MIME-Version: 1.0\r\n";
	
	mail('atendimento@qfixr.com.br', 'Solicitação de atendimento', str_replace(';', "<br>", $body), $headers);
	mail($_POST['email'], 'Qfixr | Confirmação de cadastro', $corpo_email, $headers);
	
	echo "Gravado";
	
?>