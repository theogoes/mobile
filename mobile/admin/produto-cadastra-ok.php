<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Cadastra</title>
</head>
<body>
	<div class="container">
		<div class="cadastro">
		<div class="box">
	<?php

		include "../includes/conexao.php";

		
	if ( $_POST['nome']!="" && $_POST['descricao']!="" && $_POST['preco']!="" && $_POST['quantidade']!="") {

		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$preco = $_POST['preco'];
		$quantidade = $_POST['quantidade'];

		$sql = "INSERT INTO produto(nome, descricao, preco, quantidade)  
		             VALUES ('$nome', '$descricao', '$preco', '$quantidade');";

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
		<a href="produto-lista.php">Lista Produto</a>
            </div>
        </div>
</div>
</body>
</html>