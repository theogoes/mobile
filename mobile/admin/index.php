<?php
	//Inicia a sessão
	session_start();
	$_SESSION['login'] = false;

	$msg = "";
	if(isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['senha']) && $_POST['senha'] != "") {
		
		include "../includes/conexao.php";

		$email = $_POST['email'];
		$senha = md5($_POST['senha']);
		$sql = "SELECT * FROM usuario where email = '$email' && senha = '$senha' && administrador = 1";
		$resultado = mysqli_query($conexao,$sql);
		
		if(mysqli_num_rows($resultado)){	
			$_SESSION['login'] = true;
			header('Location:usuario-lista.php');
		} else {			
			$msg = "Email ou senha inválidos!";
		}
	} 
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<title>Login</title>
		<link href="../style.css" rel="stylesheet">
		<link rel="icon" type="incon-x/css" href="../img/icon.png">
	</head>
    <body>        
    	<h1>Login Admin</h1>
    	<h2><?php echo $msg; ?></h2>          
		<form role="form" action="" method="POST">
			<label>E-mail</label>
			<input type="email" name="email">

			<label>Senha</label>
			<input type="password" name="senha">		
			
			<button type="submit">Login</button>
		</form>   		                         
    </body>
</html>