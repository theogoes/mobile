<?php
session_start();
if(!$_SESSION['login']){
    header( "Location: index.php");
}

include "../includes/conexao.php";

$sql = 'SELECT * FROM produto';
$resultado = mysqli_query($conexao,$sql);

mysqli_close($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listar Produtos</title>
        <link href="../style.css" rel="stylesheet">
        <link rel="icon" type="incon-x/css" href="../img/icon.png">
    </head>
    <body>   
<h1>Produtos</h1>      
<table>
    <tr>
    	<th>Id</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Quantidade</th>
    </tr>
    <?php
    while($dados = mysqli_fetch_array($resultado)){         
        echo "<tr>";
        echo "<td>".$dados['id']."</td>";
        echo "<td>".utf8_encode($dados['nome'])."</td>";
        echo "<td>".utf8_encode($dados['descricao'])."</td>";
        echo "<td>".$dados['preco']."</td>";
        echo "<td>".$dados['quantidade']."</td>";
        echo " <td> <a href='produto-edita.php?id={$dados['id']}'>Editar</a>  ";  
        echo "      <a href='produto-deleta-ok.php?id={$dados['id']}'>Deletar</a>  </td>";
        echo "</tr>";      
    }
    ?>
</table>  
      

<br>
<a href="usuario-lista.php">Lista Usuario</a> | <a href="produto-lista.php">Listar Produtos</a> | <a href="produto-cadastra.php">Cadastrar Produto</a> 

    </body>
</html>