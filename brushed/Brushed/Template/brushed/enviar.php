<?php

    $nome = $_POST['nome'];
	$rg = $_POST['rg'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$telefone = $_POST['telefone'];
    $email = $_POST['email'];
	$nucleos = $_POST['nucleos'];
	//$curriculo = $_POST['curriculo'];
    //$message = $_POST['message'];
    $from = 'De: CP2eJr'; 
    $to = 'danielcerqueira@gec.inatel.br'; 
    $subject = 'Processo Seletivo - CP2eJr';
    //$human = $_POST['human'];
			
    $body = "Dados Cadastrados através do Formulário do Processo Seletivo da CP2eJr\nNome: $nome\nNúmero do RG: $rg\nEndereço: $endereco\nBairro: $bairro\nCidade: $cidade\nTel. Contato: $telefone\nE-Mail: $email\nNúcleo: $nucleos\n";
				
    if ($_POST['submit']) {
    if ($nome != '' && $rg != '' && $endereco != '' && $bairro != '' && $cidade != '' && $telefone != '' && $email != '' && $nucleos != '') {				 
            if (mail ($to, $subject, $body, $from)) { 
			//echo "<script>alert('Cadastro Realizado com Sucesso!!!!!!);location.href=\"index.html";</script>";
			echo("<script type='text/javascript'> alert('Cadastro do Processo Seletivo da CP2eJr realizado com sucesso! Verifique seu e-mail para acompanhar o resultado!'); location.href='http://www.cp2ejr.com.br';</script>");
			//javascript:window.location='index.php';
			//header("Location:http://www.cp2ejr.com.br");
	       //echo '<p>Aguarde enquanto você é redirecionado!</p>';
	    } else { 
	        echo '<p>Algo deu errado, volte e tente novamente!</p>'; 
	    } 
	
}
	}
?>
