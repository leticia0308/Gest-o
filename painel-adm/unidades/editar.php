<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$identificacao = $_POST['identificacao'];
$proprietario = $_POST['proprietario'];
$condominio = $_POST['condominio'];
$endereco = $_POST['endereco'];
$id = $_POST['id'];




$res = $pdo->prepare("UPDATE unidades set nome = :nome, identificacao = :identificacao, proprietario = :proprietario, condominio = :condominio, endereco = :endereco  where id = :id ");

$res->bindValue(":nome", $nome);
$res->bindValue(":identificacao", $identificacao);
$res->bindValue(":proprietario", $proprietario);
$res->bindValue(":condominio", $condominio);
$res->bindValue(":endereco", $endereco);
$res->bindValue(":id", $id);


$res->execute();


echo "Editado com Sucesso!!";





?>