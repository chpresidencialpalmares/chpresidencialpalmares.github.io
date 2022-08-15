<?php
 
/* apenas dispara o envio do formulario caso exista $_POST['enviarFormulario']
if (isset($_POST['enviarFormulario']))
{*/
	/*** INICIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURA��ES DE E-MAIL ***/
	$enviaFormularioParaNome = 'Morador';
	$enviaFormularioParaEmail = 'cpd@chpresidencialpalmares.com.br';
	$caixaPostalServidorNome = 'chpresidencialpalmares.com.br';
	$caixaPostalServidorEmail = 'cpd@chpresidencialpalmares.com.br';
	$caixaPostalServidorSenha = 'chpcpd11';
	/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
	 
	/* abaixo as veriaveis principais, que devem conter em seu formulario*/
	$remetenteNome  = $_POST['name'];
	$remetenteEmail = $_POST['email'];
	$assunto  = $_POST['subject'];
	$mensagem = $_POST['message'];
	$mensagemConcatenada = 'Formulário gerado via website'.'<br/>'; 
	$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
	$mensagemConcatenada .= '
	<table  border="1">
		<tbody>
			<tr>
				<td>Nome:</td>
				<td>'.$remetenteNome.'</td>
			</tr>
			<tr>
				<td>E-mail:</td>
				<td>'.$remetenteEmail.'</td>
			</tr>
			<tr>
				<td>Assunto:</td>
				<td>'.$assunto.'</td>
			</tr>
			<tr>
				<td>Mensagem:</td>
				<td>'.$mensagem.'</td>
			</tr>

		</tbody>
	</table>';
	
	/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
	require_once('PHPMailer-master/PHPMailerAutoload.php');
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth  = true;
	$mail->Charset   = 'utf8_decode()';
	$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
	$mail->Port  = '587';
	$mail->Username  = $caixaPostalServidorEmail;
	$mail->Password  = $caixaPostalServidorSenha;
	$mail->From  = $caixaPostalServidorEmail;
	$mail->FromName  = utf8_decode($caixaPostalServidorNome);
	$mail->IsHTML(true);
	$mail->Subject  = utf8_decode($assunto);
	$mail->Body  = utf8_decode($mensagemConcatenada);
	$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
	if(!$mail->Send())
	{
		$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
	}
	else
	{
		$mensagemRetorno = 'Formulário enviado com sucesso!';
	} 
	
	
	//email para o remetente
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth  = true;
	$mail->Charset   = 'utf8_decode()';
	$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
	$mail->Port  = '587';
	$mail->Username  = $caixaPostalServidorEmail;
	$mail->Password  = $caixaPostalServidorSenha;
	$mail->From  = $caixaPostalServidorEmail;
	$mail->FromName  = utf8_decode($caixaPostalServidorNome);
	$mail->IsHTML(true);
	$mail->Subject  = utf8_decode('Confirmação de recebimento de mensagem.');
	$mail->Body  = utf8_decode('A mensagem foi recebida com sucesso. Aguarde contato.<br/> Equipe Residencial Palmares');
	$mail->AddAddress($remetenteEmail,utf8_decode($enviaFormularioParaNome));
	if(!$mail->Send())
	{
		$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
	}
	else
	{
		$mensagemRetorno = 'Formulário enviado com sucesso!';
	} 


?>
 
<?php
if(isset($mensagemRetorno))
{
	echo $mensagemRetorno;
}

echo "<meta http-equiv='refresh' content='10;URL=http://chpresidencialpalmares.com.br/site/'>";
?>
 