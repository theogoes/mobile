<?php
	session_start();
	if ( isset($_GET['id']) && $_GET['id'] != ""){
		include "includes/conexao.php";

		$id=$_GET['id'];
		$sql = "SELECT * FROM produtos WHERE id = $id";
		$resultado = mysqli_query($conexao,$sql);
		$produtos = mysqli_fetch_array($resultado);

		mysqli_close($conexao);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BBB</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="cabecalho">
			<div id="linha">
				<div id="menu">&#9776;
			</div>
			<div id="logo"><a href="index.php"><img src="#"></a></div>
			<?php
				if (isset($_SESSION['logincliente']) && $_SESSION['logincliente']) {
					echo '<div id="usuario"><a href="loguin.php"><img src="img/user.png"></a></div>';
				}else{
					echo '';
				}
			?>
		</div>
			<form action="index.php" method="GET">
				<div id="linha2">
					<div id="linha2I">
						<div id="buscar">
							<input type="text" name="busca" size="40" placeholder="busque seu produto">
						</div>
						<div id="BtnBuscar">
							<input type="submit" name="btnbuscar" value="buscar"><label for="btnbuscar"></label>
						</div>
					</div>
				</div>
			</form>
		</div>
			<div class="promocao">
		</div>
		<div class="produtos">
			<?php
				while ($produtos = mysqli_fetch_array($resultado)) {
			?>
			<div class="umproduto">
				<div class="arrumaimg">
					<a href="produto-detalhe.php?id=<?php echo $produtos['id'];?>.jpg" height= "160px" width="100">
					</a>
				</div>
				<div>
					<p class="nome-produto"><?php echo $produtos['nome'];?></p>;
					<p class="preco-real">
						de R$<?php echo number_format($produtos['preco'],2,',','.');;?>
					</p>
					<p class="preco-descomto">
						por R$ <?php echo number_format($produtos['preco']/10);
						echo number_format($parcelado,2,',','.');?>
					</p>
					<?php
						if (isset($_SESSION['logincliente']) && $_SESSION['logincliente']) { ?>
							<p class="comprar">
								<a href="cmprar.php?idProduto=<?php echo $produtos['id'];?>">Comprar</a>
						<?php	</p>
						}
					?>
				</div>
			</div>
		<?php } ?>
		</div>
		<div class="rodape">
			<center>loja.com - Todos direitos reservados</center>
		</div>
	</div>

</body>
</html>