<?php
	//Campos utilizados no Formulario
    $nome = $_POST['nome'];
	$periodo = $_POST['periodo'];
	$curso = $_POST['curso'];
	$telefone = $_POST['telefone'];
    $email = $_POST['email'];
	
	
	//Dados para envio do email com o formulario preenchido
    $from = 'De: CP2eJr'; 
    $to = 'pedro.miranda@get.inatel.br'; 
    $subject = 'Workshop Fetin';
	$message = "Dados Inscrições para o Workshop da Fetin\nNome: $nome\nPeríodo: $periodo\nCurso: $curso\nTel. Contato: $telefone\nE-Mail: $email\n\nInscrIção Workshop Fetin\n";	
	
	// if(isset($_FILES) && (bool) $_FILES){
		//Formatos Possiveis dos anexos
		// $allowedExtensions = array("pdf","doc","docx","gif","jpeg","jpg","png","rtf","txt");
	
	$files = array();
		foreach($_FILES as $name=>$file) {
			$file_name = $file['name']; 
			$temp_name = $file['tmp_name'];
			$file_type = $file['type'];
			$path_parts = pathinfo($file_name);
			$ext = $path_parts['extension'];
			if(!in_array($ext,$allowedExtensions)) {
				die("O arquivo $file_name possui a extensao $ext que nao e suportada, por favor mude o formato do arquivo e tente novamente");
			}
			array_push($files,$file);
		}
	
	// email fields: to, from, subject, and so on
	$headers = "From: $from";
	
	// boundary 
	$semi_rand = md5(time()); 
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
	 
	// headers for attachment 
	$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
	 
	// multipart boundary 
	$message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"utf-8\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
	$message .= "--{$mime_boundary}\n";
	 
		// preparing attachments
		for($x=0;$x<count($files);$x++){
			$file = fopen($files[$x]['tmp_name'],"rb");
			$data = fread($file,filesize($files[$x]['tmp_name']));
			fclose($file);
			$data = chunk_split(base64_encode($data));
			$name = $files[$x]['name'];
			$message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" . 
			"Content-Disposition: attachment;\n" . " filename=\"$name\"\n" . 
			"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
			$message .= "--{$mime_boundary}\n";
		}
		
    if ($_POST['submit']) {
		if ($nome != '' && $periodo != '' && $curso != '' && $telefone != '' && $email != '' ) {				 
			if (mail ($to, $subject,$message, $headers)) { 
				echo("<script type='text/javascript'> alert('Cadastro para  o Workshop da CP2eJr realizado com sucesso.'); location.href='http://www.cp2ejr.com.br';</script>");
			} else { 
				echo '<p>Algo deu errado, volte e tente novamente!</p>'; 
			} 
		}
	}
?>
