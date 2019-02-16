<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Cadastro</title>
</head>
<body>
	<div class="container">
		<div class="cadastro">
		<div class="box">
			<center>
	<?php

		include "includes/conexao.php";
		$ref = "cadastro.php?id=2";
		
	if ( $_POST['nome']!="" && $_POST['senha']!="" && $_POST['email']!="") {

		$nome = $_POST['nome'];
		$senha = md5($_POST['senha']);
		$email = $_POST['email'];

		$sql = "INSERT INTO usuario(nome, senha, email)  
		             VALUES ('$nome', '$senha', '$email');";

		$retornoInsert = mysqli_query($conexao, $sql);
		
		 if($retornoInsert) { ?>
				<p class="tit">Cadastrado com sucesso</p>
				<?php if (isset($_GET['idProduto'])) {
					$ref = "cadastro.php?id=2&idProduto=".$_GET['idProduto'];
				} ?>
				<a href="<?php echo $ref ?>" class="cadastrese">Voltar</a>
			<?php }else{ ?>
				<p class="tit">Erro inesperado.<br>Contate o Suporte.</p>
				<a href="<?php echo $ref ?>" class="cadastrese">Voltar</a>
			<?php }
			mysqli_close($conexao) ;
		}else{
			
		
		?>
		
					<center><p class="tit">Preencha Todos os Campos</p>
						<a href="<?php echo $ref;?>"class="cadastrese">Voltar</a>
					</center>
				<?php } ?>
	
		</div>
	</div>
</div>
</body>
</html>