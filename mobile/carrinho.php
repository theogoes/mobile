<?php 
	include "includes/conexao.php";
	session_start();
	

 $R = 0;
	$sql = "SELECT *, PROD.nome as produto_nome FROM pedido AS P 
	INNER JOIN pedido_item as PI on P.id = PI.id_pedido 
	INNER JOIN produto as PROD on PI.id_produto = PROD.id
	INNER JOIN usuario AS U on U.id = P.id_usuario 
	WHERE U.id = {$_SESSION['loginCliente']['id']}";
	$resultado = mysqli_query($conexao,$sql);
	mysqli_close($conexao);

 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="img/x-icon" href="img/icon.png">
	<title>Carrinho</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

 <div id="container">
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
 		<div class="pedidos">
 			<h1>Carrinho</h1>
 			<form action="carrinho.php" method="POST">
 			<table border="0" width="100%">
 				<tr>
 					<BR><BR><br><br>
 					<th>Id Pedido</th>
 					<th>Produto</th>
 					<th>Preço</th>
 					<th>Quantidade</th>
 				</tr>
 				<?php   while ($dados = mysqli_fetch_array($resultado)) {
 					if($dados['quantidade'] > 0){
 					echo "<tr>";
 					echo "<td>".$dados['id_pedido']."</td>";
 					echo "<td>".utf8_encode($dados['produto_nome'])."</td>";
 					echo "<td> R$".number_format($dados['preco'],2,',','.')."</td>";
 					echo "<td> <input type='number' id='tentacles' name='quantidade' value = 1
       min='0' max='10'>";
 					
 					echo"</td>";
  					echo "</tr>";
 					$R = $dados['preco'] + $R;
 				} 
 			}
 				?>
 			</table>
 			<?php echo "<div class = 'total'> Total de : R$".number_format($R,2,',','.')."</div>"; ?>
 		</form>
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