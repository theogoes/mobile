<?php
session_start();
if(!$_SESSION['login']){
    header( "Location: index.php");
}

include "../includes/conexao.php";

$sql = 'SELECT * FROM usuario';
$resultado = mysqli_query($conexao,$sql);

mysqli_close($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listar Usuários</title>
        <link href="../style.css" rel="stylesheet">
        <link rel="icon" type="incon-x/css" href="../img/icon.png">
    </head>
    <body>   
<h1>Lista Usuário</h1>      
<table>
    <tr>
    	<th>Id</th>
        <th>Nome</th>
        <th>Senha</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php
    while($dados = mysqli_fetch_array($resultado)){         
        echo "<tr>";
        echo "<td>".$dados['id']."</td>";
        echo "<td>".utf8_encode($dados['nome'])."</td>";
        echo "<td>".$dados['senha']."</td>";
        echo "<td>".$dados['email']."</td>";    
        echo " <td> <a href='usuario-edita.php?id={$dados['id']}'>Editar</a>  ";  
        echo "      <a href='usuario-deleta-ok.php?id={$dados['id']}'>Deletar</a>  </td>";
        echo "</tr>";      
    }
    ?>
</table>  
      

<br>
<a href="cadastro.html">Cadastrar Usuário</a> | <a href="produto-lista.php">Listar Produtos</a> | <a href="produto-cadastra.php">Cadastrar Produto</a> 

    </body>
</html>