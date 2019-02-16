<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Deletar Produto</title>
		<link href="css/style-admin.css" rel="stylesheet">
	</head>
    <body>   
<?php
	if ( $_GET['id']!="") {
        
		include "../includes/conexao.php";

        $id = $_GET['id'];  
		$sql = "DELETE FROM produto WHERE id = $id";
		$retornoDelete = mysqli_query($conexao, $sql);

		if($retornoDelete) {
			echo "Registro deletado com sucesso!";	
		} else {
			echo "Registro não foi deletado! Algo parece dar errado!";
		}
		mysqli_close($conexao);
	} 
?>
<br>
<a href="usuario-lista.php">Listar Usuários</a> | <a href="produto-lista.php">Listar Produtos</a>

    </body>
</html>