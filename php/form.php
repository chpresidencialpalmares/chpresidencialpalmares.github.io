<?
	$email = $_GET['email'];
	$name = $_GET['name'];
	$message = $_GET['message'];
if ($email != "" and $name != "")
{
  $destinatario = "cpd@chpresidencialpalmares.com.br";
  $cabecalho = "From: $email\nReply-To: $email";
  $assunto2 .= "Contato Residencial Palmares";
  $mailheaders = "From: cpd@chpresidencialpalmares.com.br\nReply-To: $email";
  $corpo .= "Nome = $name .\n\n";
  $corpo .= "Email = $email .\n\n";
  $corpo .= "Mensagem = $message .\n\n";
  $corpo .="\n\n**********************************************\n";
  $corpo .= "Este e-mail é um contato do site chpresidencialpalmares.com.br.\n";
  $corpo .= "**********************************************";
  mail($destinatario, $assunto2, $corpo, $mailheaders);


  $destinatario2 = "$email";
  $cabecalho2 = "From: $email\nReply-To: $email";
  $assunto3 .= "Auto-Resposta site Residencial Palmares";
  $mailheaders2 = "From: cpd@chpresidencialpalmares.com.br";
  $corpo2 .= "O e-mail foi enviado com sucesso. Agradecemos o contato.\n\n";
  $corpo2 .= "Equipe Residencial Palmares - 2017";

  mail($destinatario2, $assunto3, $corpo2, $mailheaders2);

mail("cpd@chpresidencialpalmares.com.br', 'assunto aleat', 'corpo email', 'cpd@chpresidencialpalmares.com.br');

	unset($_GET['email']);
	unset($_GET['name']);
	unset($_GET['message']);
  echo ("Mensagem enviada com sucesso!");
  
  
}
echo "
<p>Preencha os campos abaixo:</p>
<form action='' method='get'>
<table width='200' border='0'>
<tbody>
<tr>
<td>Nome:</td>
<td><input id='name' type='text' name='name' value='' /></td>
</tr>
<tr>
<td>Email:</td>
<td><input id='email' type='text' name='email' value='' /></td>
</tr>
<tr>
<td>Mensagem:</td>
<td><textarea id='message' style='width: 497px; height: 255px;' name='message' rows='11' cols='37'></textarea></td>
</tr>
</tbody>
</table>
<p><input class='formbutton' style='margin-left: 150px;' type='submit' name='send' value='Enviar' /></p>
</form>";
?>