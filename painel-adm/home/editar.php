<?php 

require_once("../../conexao.php");

$assunto = $_POST['assunto'];
$status_ocorrencia = $_POST['status_ocorrencia'];
$id = $_POST['id'];



$res = $pdo->prepare("UPDATE home set assunto = :assunto, status_ocorrencia = :status_ocorrencia  where id = :id ");

$res->bindValue(":assunto", $assunto);
$res->bindValue(":status_ocorrencia", $status_ocorrencia);
$res->bindValue(":id", $id);

$res->execute();


echo "Editado com Sucesso!!";









?>