<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Cadastro</title>
</head>
<body>
	<?php

		include "../includes/conexao.php";

		
	if ( $_POST['nome']!="" && $_POST['senha']!="" && $_POST['email']!="") {

		$nome = $_POST['nome'];
		$senha = md5($_POST['senha']);
		$email = $_POST['email'];

		$sql = "INSERT INTO usuario(nome, senha, email)  
		             VALUES ('$nome', '$senha', '$email');";

		$retornoInsert = mysqli_query($conexao, $sql);
		
		 if($retornoInsert) { ?>
				<p class="tit">Cadastrado com sucesso</p>
			<?php }else{ ?>
				<p class="tit">Erro inesperado.<br>Contate o Suporte.</p>
			<?php }
			mysqli_close($conexao) ;
		}else{
			echo '<p class="tit"> Preencha todos os campos</p>';
		}
		?>
		<a href="usuario-lista.php">Pagina inicial</a>
</body>
</html>