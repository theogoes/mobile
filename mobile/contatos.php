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
	<title>BBB</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div id="cabecalho">
			<div id="cabecalhoL1">
				<div id="menu">&#9776;</div>
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
							<input type="text" name="buscar" size="40" placeholder="Busque seu produto" onfocus="">
						</div>
						<div id="divBtnbuscar">
							<input type="submit" name="Btnbuscar" value="Buscar   "><label for="Btnbuscar"></label>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="pomocao">
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
		<div id="l1"></div>
		<div class="produto">
			
			<div class="img">
				<img src="produtos/<?php echo $produto['id'];?>.jpg" heigth="200px" width="150px">
			</div>
			<div>
				<p class="nome">
				<?php echo utf8_encode($produto['nome']);?>
			</p>
			<div class= preco>
				Valor: R$ <?php echo number_format($produto['preco']*0.90,2,',','.');?><br>
			</div>
			<div class="parcela">
				10X de R$ <?php $parcelado = $produto['preco'] / 10 ;
						echo number_format($parcelado,2,',','.');?><br>
			</div>
			<?php 
						if (isset($_SESSION['loginCliente']) && $_SESSION['loginCliente']) {
							?><p class="comprar">
								<a href="comprar.php?idProduto=<?php echo $produto['id'];?>">Comprar</a>
							</p>
						<?php }else{ ?>
							<p class="comprar">
								<a href="cadastro.php?id=1&idProduto=<?php echo $produto['id'];?>">Comprar</a>
							</p>
							<?php } ?>

			</div>
			</div>
			<div id="l1"></div>
			<div class="descricao">
				<center>
				DESCRIÇÃO PRODUTO:<br>
				<?php echo utf8_encode($produto['descricao']); ?>
			</center>
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
			<center>olho.com  - Todos direitos reservados<br>
				<p class=" infos ">
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