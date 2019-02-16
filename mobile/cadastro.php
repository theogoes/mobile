<?php 
	if (isset($_GET['idProduto'])) {
		$action = 'cadostro_ok.php?idProduto='.$_GET['idProduto'];
		$action2 = 'loguin.php?idProduto='.$_GET['idProduto'];
	}else{
		$action = 'cadostro_ok.php';
		$action2 = 'loguin.php';
	}
	if($_GET['id'] == 1){
		$nome = "Cadastro";
	}else{
		$nome = "Loguin";
	}
 ?>
<!DOCTYPE html>
<html lang="pt">
<head>
<title><?php echo $nome; ?></title>
<link rel="icon" type="img/x-icon" href="img/icon.png">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<div id="menu">

                    <input type="checkbox" id="chkmenu" style="display: none">
                    <label for="chkmenu" class="iconeMenu"> &#9776;</label>

                    <div class="barraMenu">

                        <nav>
                            <a href="index.php">HOME</a><br>
                            <div class="l1"></div>
                            <a href="loja.php"> SOBRE </a><br>
                            <a href="cadastro.php?id=1"> CADASTRA </a><br>
                            <a href="cadastro.php?id=2"> LOGUIN </a><br>
                           
                            <?php if (isset($_SESSION['loginCliente']) && $_SESSION['loginCliente']){
                            echo"<a href='carrinho.php'> CARRINHO</a>";}?>

                        </nav>
                    </div>
                </div>
	<div class="cadastro">
		<div class="box">
			<?php if($_GET['id'] == 1){ ?>
			<form action="<?php echo $action ?>" method="POST">
					<center><p class="tit">Cadastre-se</p>
				<label> <p class ="cad">Nome</p></label>
				<input class = "camp" type="text" name="nome" >
				<br>
				<label><p class ="cad">Senha</p></label>
				<input class = "camp" type="password" name="senha" >
				<br>
				<label><p class ="cad">E-mail</p></label>
				<input  class = "camp" type="email" name="email">
				<br>
				<button type="submit"class ="sub" name="Salvar"><p >Salvar</p></button>
				<br><br>
				<?php if (isset($_GET['idProduto'])) { ?>
				<a class="cadastrese" href="cadastro.php?id=2&idProduto=<?php echo$_GET['idProduto'];?>">Logar-se</a>
				<?php }else{ ?>
				<a class="cadastrese" href="cadastro.php?id=2">Logar-se</a>
			<?php } ?>
				</center>
			<?php }else{ ?>
			<form action="<?php echo $action2 ?>" method="POST">
				<center><p class="tit">Entrar</p>
				<label> <p class ="cad">E-mail</p></label>
				<input class = "camp" type="text" name="email" >
				<br>
				<label><p class ="cad">Senha</p></label>
				<input class = "camp" type="password" name="senha" >
				<br>
				<button type="submit"class ="sub" ><p >Logar</p></button>
				<br><br>
				<?php if (isset($_GET['idProduto'])) { ?>
				<a class="cadastrese" href="cadastro.php?id=1&idProduto=<?php echo $_GET['idProduto'];?>">Cadatre-se</a>
				<?php }else{ ?>
				<a class="cadastrese" href="cadastro.php?id=1">Cadatre-se</a>
			<?php } ?>
			</center>
			<?php } ?>
			</form>
		</div>
	</div>
</div>
</body>
</html>