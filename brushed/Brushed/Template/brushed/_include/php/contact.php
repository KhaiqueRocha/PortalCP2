<?php
/*
* Contact Form Class
*/


header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$admin_email = 'contato@cp2ejr.com.br'; // Your Email
$message_min_length = 5; // Min Message Length



class Contact_Form{
	function __construct($details, $email_admin, $message_min_length){
		
		$this->name = stripslashes($details['name']);
		$this->email = trim($details['email']);
		$this->subject = 'Contato a partir do site'; // Subject 
		$this->message = stripslashes($details['message']);
	
		$this->email_admin = $email_admin;
		$this->message_min_length = $message_min_length;
		
		$this->response_status = 1;
		$this->response_html = '';
	}


	private function validateEmail(){
		$regex = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';
	
		if($this->email == '') { 
			return false;
		} else {
			$string = preg_replace($regex, '', $this->email);
		}
	
		return empty($string) ? true : false;
	}


	private function validateFields(){
		// Check name
		if(!$this->name)
		{
			$this->response_html .= '<p>Por favor, preencha NOME!</p>';
			$this->response_status = 0;
		}

		// Check email
		if(!$this->email)
		{
			$this->response_html .= '<p>Por favor, preencha EMAIL!</p>';
			$this->response_status = 0;
		}
		
		// Check valid email
		if($this->email && !$this->validateEmail())
		{
			$this->response_html .= '<p>Por favor, entre com um EMAIL válido!</p>';
			$this->response_status = 0;
		}
		
		// Check message length
		if(!$this->message || strlen($this->message) < $this->message_min_length)
		{
			$this->response_html .= '<p>Sua mensagens deve conter ao menos '.$this->message_min_length.' caracteres!</p>';
			$this->response_status = 0;
		}
	}


	private function sendEmail(){
		$mail = mail($this->email_admin, $this->subject, $this->message,
			 "From: ".$this->name." <".$this->email.">\r\n"
			."Reply-To: ".$this->email."\r\n"
		."X-Mailer: PHP/" . phpversion());
	
		if($mail)
		{
			$this->response_status = 1;
			$this->response_html = '<p>Obrigado!</p>';
		}
	}


	function sendRequest(){
		$this->validateFields();
		if($this->response_status)
		{
			$this->sendEmail();
		}

		$response = array("status" => $this->response_status, "html" => $this->response_html);
//		$response['status'] = $this->response_status;	
//		$response['html'] = $this->response_html;
		
		echo json_encode($response);
	}
}

$contact_form = new Contact_Form($_POST, $admin_email, $message_min_length);
$contact_form->sendRequest();

?>