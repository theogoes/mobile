<?php 
	session_start();
	include "includes/conexao.php";
	$_SESSION['loginCliente'] = null;
	$location = "index.php";
	$msg = "";
	if (isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['senha']) && $_POST['senha'] != "") {
		if (isset($_GET['idProduto'])) {
			$location = 'produto-detalhe.php?id='.$_GET['idProduto'];
			$action = 'cadastro.php?id=2&idProduto='.$_GET['idProduto'];
		}else{
			$action = 'cadastro.php?id=2';
		}

		$email = $_POST['email'];
		$senha = md5($_POST['senha']);
		$sql = "SELECT * FROM usuario WHERE email ='$email' && senha ='$senha'";
		$resultado = mysqli_query($conexao,$sql);

		$usuario = mysqli_fetch_array($resultado);



		if(mysqli_num_rows($resultado)){
			$_SESSION['loginCliente'] = $usuario;
			header('Location:'.$location);
		}else{
			header('location:'.$action);

		}
	}else{

	if (isset($_GET['idProduto'])) {
		$action = 'cadastro.php?id=1&idProduto='.$_GET['idProduto'];
	}else{
		$action = 'cadastro.php?id=2';
	}
 ?>
<!DOCTYPE html>
<html lang="pt">
<head>
<title>Cadastro</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<div class="cadastro">
		<div class="box">
			<form action="<?php echo $action ?>" method="POST">
					<center><p class="tit">Preencha Todos os Campos</p>
						<a href="<?php echo $action;?>"class="cadastrese">Voltar</a>
				
				
			<?php } ?>
			</center>
	
			</form>
		</div>
	</div>
</div>
</body>
</html>