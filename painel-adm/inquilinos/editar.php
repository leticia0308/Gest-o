<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$id = $_POST['id'];




$res = $pdo->prepare("UPDATE inquilinos set nome = :nome, idade = :idade, sexo = :sexo, telefone = :telefone, email = :email where id = :id ");

$res->bindValue(":nome", $nome);
$res->bindValue(":idade", $idade);
$res->bindValue(":sexo", $sexo);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":email", $email);
$res->bindValue(":id", $id);


$res->execute();


echo "Editado com Sucesso!!";





?>