<?php
	session_start();
	if (isset($_GET['id']) && $_GET['id'] != "") {
		include "includes/conexao.php";
		$id = $_GET['id'];
		$sql = "SELECT * FROM produto WHERE id = $id";
		$resultado = mysqli_query($conexao, $sql);
		$produto = mysqli_fetch_array($resultado);

		mysqli_close($conexao);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sobre</title>
	<link rel="icon" type="img/x-icon" href="img/icon.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div id="cabecalho">
			<div id="cabecalhoL1">
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
                            <a href="contato.php"> CONTAO </a><br>
                            <?php if (isset($_SESSION['loginCliente']) && $_SESSION['loginCliente']){
                            echo"<a href='carrinho.php'> CARRINHO</a>";}?>

                        </nav>
                    </div>
                </div>
				<div id="logo"><a href="index.php"><img src="img/logo.png"></a></div>
				<?php 
					if (isset($_SESSION['loginCliente']) && $_SESSION['loginCliente']) {
						echo '<div id="usuario"><a href="cadastro.php?id=2"><img src="img/user.png"></a></div>';
					}else{
						echo '<div id="usuario"><a href="cadastro.php?id=2"><img src="img/user.png"></a></div>';
					}
					if (isset($_SESSION['loginCliente']) && $_SESSION['loginCliente']) {
						echo '<div id="carrinho"><a href="carrinho.php"><img src="img/carrinho.png"></a></div>';
					}else{
						echo "";
					}
				 ?>
			</div>
			<form action="index.php" method="GET">
				<div id="cabecalhoL2">
					<div id="cabecalhoL2interno">
						<div id="divTxtBuscar">
							<input type="text" name="buscar" size="40" placeholder="buscar" onfocus="placeholder=''">
						</div>
						<div id="divBtnbuscar">
							<input type="submit" name="Btnbuscar" value="Buscar   "><label for="Btnbuscar"></label>
						</div>
					</div>
				</div>
			</form>
			<div id="l1"></div>
		</div>
		<div class="pomocao">
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
		<div id="l1"></div>
		<div id="nos">

			<div class="tex">
				<center>
					<p class="tito">ENTRE EM CONTATO</p>
				<p class="nos">
					
					<br><br><br>

					<a href="index.php"><img src="img/Hicon.png" width="200px"  ></a><br><br><br>

					Rua Coronel Osvaldo Brito, 234 - Venancio Aires, Brasil <br>
					CEP 95800-000

				</p>
				</center>
			</div>


		</div>
		
	<div class="rodape">
			<div id="l1"></div>
			<p class="mapa"><a href="index.php">Pagina inicial</a> </p>
			<p class="mapa"><a href="cadastro.php?id=2"></p>
			<p class="mapa"><a href="index.php">Produtos</a></p>
			<p class="mapa"><a href="loja.php">Sobre a loja</a> </p>
			<div id="l1"></div>
			<a href="#"><img src="img/Facebook.png" name="media"></a>
			<a href="#"><img src="img/TT.png" name="media"></a>
			<a href="#"><img src="img/ins.png" name="media"></a>
			<div id="l1"></div>
			<p class="infos">
			<center>olho.com  - Todos direitos reservados<br>
				
				(51) 999 877 896<br>
				CNPJ: 01.856.145/0065-96<br>
				Rua Coronel Osvaldo Brito, 234 - Venancio Aires, Brasil <br>
				CEP 95800-000
			</p>
			</center>
		</div>	
</div>
</body>
</html>