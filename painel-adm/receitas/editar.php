<?php 

require_once("../../conexao.php");

$despesas = $_POST['despesas'];
$descricao = $_POST['descricao'];
$tipo_despesa = $_POST['tipo_despesa'];
$valor = $_POST['valor'];
$vencimento_fatura = $_POST['vencimento_fatura'];
$status_pagamento = $_POST['status_pagamento'];
$id = $_POST['id'];




$res = $pdo->prepare("UPDATE receitas set despesas = :despesas, descricao = :descricao, tipo_despesa = :tipo_despesa, valor = :valor, vencimento_fatura = :vencimento_fatura, status_pagamento = :status_pagamento  where id = :id ");

$res->bindValue(":despesas", $despesas);
$res->bindValue(":descricao", $descricao);
$res->bindValue(":tipo_despesa", $tipo_despesa);
$res->bindValue(":valor", $valor);
$res->bindValue(":vencimento_fatura", $vencimento_fatura);
$res->bindValue(":status_pagamento", $status_pagamento);
$res->bindValue(":id", $id);

$res->execute();


echo "Editado com Sucesso!!";
