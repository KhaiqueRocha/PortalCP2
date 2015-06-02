<?php
 
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$from = 'De: RoleBIT';
$to = 'bit@rolebit.com';
$subject = 'Website';
$human = $_POST['human'];
 
$body = "De: $name\n E-Mail: $email\n Mensagem:\n $message";
 
if ($_POST['submit']) {
if ($name != '' && $email != '') {
if ($human == '4') {
if (mail ($to, $subject, $body, $from)) {
echo '<p>Sua mensagem foi enviada!</p>';
} else {
echo '<p>Algo deu errado, volte e tente novamente!</p>';
}
} else if ($_POST['submit'] && $human != '4') {
echo '<p>Voc&ecirc; respondeu ao anti-spam incorretamente!</p>';
}
} else {
echo '<p>Voc&ecirc; precisa responder todas as quest&otilde;es!!</p>';
}
}
?>