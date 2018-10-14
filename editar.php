<?php

require_once 'Contato.php';
$contato = new Contato();

if(!empty($_GET['id'])):
    $id = $_GET['id'];

$dados = $contato->returnDado($id);
endif;
?>
<h1>Editar</h1>

<form method="POST" action="edtSubmit.php">
    <input type="hidden" name="id" value="<?= $dados['id']; ?>">
	<input type="text" name="nome" placeholder="Nome*" value="<?= $dados['nome']; ?>"><br/><br/>
	<input type="text" name="email" placeholder="Email*" value="<?= $dados['email']; ?>"><br/><br/>
	<input type="submit" value="Atualizar">
</form>

<a href="index.php">Voltar</a>