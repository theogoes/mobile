<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar</title>
    <link href="../style.css" rel="stylesheet">
        <link rel="icon" type="incon-x/css" href="../img/icon.png">
    </head>
    <body>
        
        <?php
        
        $databaseHost = 'localhost';
		$databaseUsuario = 'root';
		$databaseSenha = '';
		$databaseNome = 'lolja';
        
		$conexao = mysqli_connect($databaseHost, $databaseUsuario, $databaseSenha,$databaseNome);
        
        $id=$_GET['id'];
        $sql= "SELECT * FROM usuarios WHERE id= $id";
        $resultado = mysqli_query($conexao,$sql);
        
        $dadosUsuario = mysqli_fetch_array($resultado);
        
        mysqli_close($conexao);
        ?>
        <h1>Editar Usuário</h1>
        
        <form action="editar-ok.php" method="POST">
            
            <input type="hidden" name="id" value="<?php echo $dadosUsuario['id']?>">
            <label>Nome</label>
            <input type="text" name="nome" value="<?php echo $dadosUsuario['nome']?>">
            <br>
            <label>Senha</label>
            <input type="password" name="senha" value="<?php echo $dadosUsuario['senha']?>">
            <br>
            <label>E-mail</label>
            <input type="email" name="email" value="<?php echo $dadosUsuario['email']?>">
            <br>
            <button type="submit">Salvar</button>
        </form>
        <br>
        
    </body>
</html>