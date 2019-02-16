<?php 
	include "includes/conexao.php";
	session_start();
	$id = $_SESSION['loginCliente']['id'].'usuario';
	$location = "produto-detalhe.php?id=".$_GET['idProduto'];
	$sql ="INSERT INTO pedido (id_usuario,data) VALUES ('$id', NOW());";
	$retorno=mysqli_query($conexao,$sql);
	if($retorno){
		echo "pedido OK";
	}else{
		echo "deu Ruim";
		header("Location:".$location);
	}
	$idProduto = $_GET['idProduto'];
	$pedido = mysqli_insert_id($conexao);
	$sql="INSERT INTO pedido_item (id_pedido,id_produto,quantidade) VALUES('$pedido','$idProduto',1)";
	$retorno2=mysqli_query($conexao,$sql);
	if($retorno2){
		echo "pedido OK2";
	}else{
		echo "deu Ruim2";
		header("Location:".$location);
	}
	header("Location:carrinho.php");
 ?>