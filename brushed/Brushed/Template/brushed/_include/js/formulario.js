function Enviar(){
	var nome = document.getElementById("nomeid");
	var rg = document.getElementById("rgid");
	var endereco = document.getElementById("enderecoid");
	var bairro = document.getElementById("bairroid");
	var cidade = document.getElementById("cidadeid");
	var telefone = document.getElementById("telefoneid");
	var email = document.getElementById("emailid");
	
	if(nome.value !="" && rg.value !="" && endereco.value !="" && bairro.value !="" && cidade.value !="" && telefone.value !="" && email.value !=""){
		alert('Obrigado sr(a) ' + nome.value + ' os seus dados foram salvos com sucesso!\nDentro de instantes entraremos em contato no e-mail para confirmação da inscrição!');
	}
}