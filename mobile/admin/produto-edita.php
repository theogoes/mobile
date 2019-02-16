<?php 
	session_start();
	if(!$_SESSION['login']){
	    header( "Location: index.php");

	}

	if ( $_GET['id']!="") {

		include "../includes/conexao.php"; 

        $id = $_GET['id'];  
		$sql = "SELECT * FROM  produto WHERE id = $id";
		$resultado = mysqli_query($conexao, $sql);		
		$dadosProduto = mysqli_fetch_array($resultado);
		
		mysqli_close($conexao);
	} 
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Editar Produto</title>
		<link href="css/style-admin.css" rel="stylesheet">
	</head>
    <body>        
    	<h1>Editar Produto</h1>	          
		<form role="form" action="produto-edita-ok.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $dadosProduto['id'] ?>">
			
			<label>Nome</label>
			<input type="text" name="nome" value="<?php echo $dadosProduto['nome'] ?>">
			
			<label>Descrição</label>
			<input type="text" name="descricao" value="<?php echo $dadosProduto['descricao'] ?>">
			
			<label>Valor</label>
			<input type="int" name="preco" value="<?php echo $dadosProduto['preco'] ?>">
            
            <label>Quantidade</label>
			<input type="int" name="quantidade" value="<?php echo $dadosProduto['quantidade'] ?>">
			
			<button type="submit">Salvar</button>
		</form>   
		<br>
		<a href="usuario-lista.php">Listar Usuários</a> | 
		<a href="produto-lista.php">Listar Produtos</a>                             
    </body>
</html>