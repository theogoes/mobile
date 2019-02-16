<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Editar Usuário</title>
		<link href="css/style-admin.css" rel="stylesheet">
	</head>
    <body>   
<h1>Editar Produto</h1>
<?php 
	
	if ( $_POST['nome']!="" && $_POST['descricao']!="" && $_POST['preco']!="" && $_POST['quantidade']!="" && $_POST['id']!="") {

		include "../includes/conexao.php";

		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$descricao =$_POST['descricao'];
		$preco = $_POST['preco'];
		$quantidade = $_POST['quantidade'];

		$sql = "UPDATE produto 
		           SET nome = '$nome', 
		               descricao = '$descricao', 
		               preco = '$preco', 
		               quantidade = '$quantidade' 
		         WHERE id = $id;";

		$retornoUpdate = mysqli_query($conexao, $sql);
		if($retornoUpdate) {
			echo "Registro atualizado com sucesso! <br>";	
		} else {
			echo "Erro ao atualizar registro!<br>";
		}

		mysqli_close($conexao);
	} else {
		echo "Opss! Tente novamente! Mas agora preenchendo todos os campos!";
	}	
?>
<br>
<a href="usuario-lista.php">Listar Usuários</a> | <a href="produto-lista.php">Listar Produtos</a>

    </body>
</html>