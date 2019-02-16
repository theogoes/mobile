<!DOCTYPE html>
<html lang="en">
<head>
<title>Cadastro</title>
</head>
<body>
	<?php

		$databaseHost = 'localhost';
		$databaseUsuario = 'root';
		$databaseSenha = '';
		$databaseNome = 'lolja';
		$conexao = mysqli_connect($databaseHost, $databaseUsuario, $databaseSenha,$databaseNome);


		if($_POST['nome']!='' && $_POST['senha']!='' && $_POST['email']!= ''){
		$id = $_POST['id'];	
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
		$email = $_POST['email'];

		$sql = "UPDATE  usuarios SET nome='$nome', senha='$senha', email='$email' WHERE id = $id; ";
	


		$resultado = mysqli_query($conexao, $sql);
		if($resultado) {
		echo "Registro editado com sucesso!";
		} else {
		echo "Erro ao editar registro!";


		}
		mysqli_close($conexao);
		} else {
		echo "Opss! Tente novamente! Mas agora preenchendo todos os campos!";
		}
		?>
<a href="usuario_lista.php">Lista Usuário</a>

</body>
</html>