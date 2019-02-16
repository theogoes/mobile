<!DOCTYPE html>
<html lang="en">
<head>
<title>Cadastra</title>
<link href="../style.css" rel="stylesheet">
		<link rel="icon" type="incon-x/css" href="../img/icon.png">
</head>
<body>
<h1> Cadastro de Produto </h1>

<form action="produto-cadastra-ok.php" method="POST">
<label>Nome</label>
<input type="text" name="nome" >
<br>
<label>Descrição</label>
<input type="text" name="descricao">
<br>
<label>Preço</label>
<input type="int" name="preco" >
<br>
<label>Quantidade</label>
<input type="int" name="quantidade" >
<br>
<button type="submit" >Salvar</button>
</form>

</body>
</html>