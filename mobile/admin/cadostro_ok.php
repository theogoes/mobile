<!DOCTYPE html>
<html lang="en">
<head>
<title>Cadastro</title>
</head>
<body>
	<?php

		include "includes/conexao.php";

		
	if ( $_POST['nome']!="" && $_POST['senha']!="" && $_POST['email']!="") {

		$nome = $_POST['nome'];
		$senha = md5($_POST['senha']);
		$email = $_POST['email'];

		$sql = "INSERT INTO usuario(nome, senha, email)  
		             VALUES ('$nome', '$senha', '$email');";

		$retornoInsert = mysqli_query($conexao, $sql);

		if($retornoInsert) {
			echo "Registro salvo com sucesso!";	
		} else {
			echo "Erro ao salvar registro!";
		}
		mysqli_close($conexao);
	} else {
		echo "Opss! Tente novamente! Mas agora preenchendo todos os campos!";
		echo "<a href=\"usuario-cadastra.php\">Cadstro de Usuário</a>";
	}	
		?>
<a href="usuario-lista.php">Lista Usuário</a>

</body>
</html>