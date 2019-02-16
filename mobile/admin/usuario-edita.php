<?php 
	session_start();
	if(!$_SESSION['login']){
	    header( "Location: index.php");

	}

	if ( $_GET['id']!="") {

		include "../includes/conexao.php"; 

        $id = $_GET['id'];  
		$sql = "SELECT * FROM  usuario WHERE id = $id";
		$resultado = mysqli_query($conexao, $sql);		
		$dadosUsuario = mysqli_fetch_array($resultado);
		
		mysqli_close($conexao);
	} 
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Editar Usuário</title>
		<link href="css/style-admin.css" rel="stylesheet">
	</head>
    <body>        
    	<h1>Editar Usuário</h1>	          
		<form role="form" action="usuario-edita-ok.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $dadosUsuario['id'] ?>">
			
			<label>Nome</label>
			<input type="text" name="nome" value="<?php echo $dadosUsuario['nome'] ?>">
			
			<label>Senha</label>
			<input type="password" name="senha" value="<?php echo $dadosUsuario['senha'] ?>">
			
			<label>E-mail</label>
			<input type="email" name="email" value="<?php echo $dadosUsuario['email'] ?>">
			
			<button type="submit">Salvar</button>
		</form>   
		<br>
		<a href="usuario-lista.php">Listar Usuários</a> | 
		<a href="produto-lista.php">Listar Produtos</a>                             
    </body>
</html>