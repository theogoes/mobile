<?php
include "includes/conexao.php";

session_start();

if($_GET){
	$sql = "SELECT * FROM produto where nome like '%{$_GET['buscar']}'";
} else{
	$sql = 'SELECT * FROM produto';
}

$resultado = mysqli_query($conexao,$sql);
mysqli_close($conexao);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="img/x-icon" href="img/icon.png">
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
	<title>Olho</title>
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
		
		
		
		<div class="promocao">
			<a href="produto-detalhe.php?id=5">
				<img src="img/promo.png">
			</a>
		</div>
		<div id="l1"></div>
		<div class="produtos">
			<?php
				while ($produtos = mysqli_fetch_array($resultado)) {
			?>
			<div class="umproduto">
				<div class="arrumaimg">
					<a href="produto-detalhe.php?id=<?php echo $produtos['id'];?>"> 
						<img src="produtos/<?php echo $produtos['id']; ?>.jpg" height= "160px" width="130">
					</a>
				</div>
				<div>
					<p class="nome-produto"><?php echo utf8_encode($produtos['nome']);?></p>
					<p class="preco-real">
						de R$<?php echo number_format($produtos['preco'],2,',','.');;?>
					</p>
					<p class="preco-comdesconto">
						por R$ <?php echo number_format($produtos['preco']*0.90,2,',','.');?>
					</p>
					<p class="preco-parcelado">
						10X de R$ <?php $parcelado = $produtos['preco'] / 10 ;
						echo number_format($parcelado,2,',','.');?>
					</p>
				</div>
			</div>
		<?php } ?>
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
				<p class=" infos ">
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