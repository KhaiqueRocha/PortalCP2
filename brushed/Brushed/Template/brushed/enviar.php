<?php
    $nome = $_POST['nome'];
	$rg = $_POST['rg'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$telefone = $_POST['telefone'];
    $email = $_POST['email'];
    //$message = $_POST['message'];
    $from = 'De: CP2eJr'; 
    $to = 'rayana.noronha@cp2ejr.com.br'; 
    $subject = 'Curso de Java';
    //$human = $_POST['human'];
			
    $body = "Dados Cadastrados através do Formulário do Curso de Java Básico\nNome: $nome\nNúmero do RG: $rg\nEndereço: $endereco\nBairro: $bairro\nCidade: $cidade\nTel. Contato: $telefone\nE-Mail: $email\n";
				
    if ($_POST['submit']) {
    if ($nome != '' && $rg != '' && $endereco != '' && $bairro != '' && $cidade != '' && $telefone != '' && $email != '' ) {				 
            if (mail ($to, $subject, $body, $from)) { 
			header("Location:http://www.cp2ejr.com.br");
	       //echo '<p>Aguarde enquanto você é redirecionado!</p>';
	    } else { 
	        echo '<p>Algo deu errado, volte e tente novamente!</p>'; 
	    } 
	
}
	}
?>
