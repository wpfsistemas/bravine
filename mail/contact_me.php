<?php
// Verifique se há campos vazios
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Nenhum argumento fornecido!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// Crie o e-mail e envie a mensagem
$to = 'pablo@wpfsites.net.br'; // Adicione seu endereço de e-mail entre o '' substituindo seu nome@seu.dominio.com - Aqui é onde o formulário enviará uma mensagem para.
$email_subject = "Formulário de contato do site:  $name";
$email_body = "Você recebeu uma nova mensagem do formulário de contato do seu site.\n\n"."Aqui estão os detalhes:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@wpfsites.net.br\n"; // Este é o endereço de e-mail da qual a mensagem sera gerada. Recomendamos usar algo como noreply@dominio.com
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>