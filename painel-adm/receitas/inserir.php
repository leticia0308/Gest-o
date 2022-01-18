<?php 

require_once("../../conexao.php");

$despesas = $_POST['despesas'];
$descricao = $_POST['descricao'];
$tipo_despesa= $_POST['tipo_despesa'];
$valor = $_POST['valor'];
$vencimento_fatura = $_POST['vencimento_fatura'];
$status_pagamento = $_POST['status_pagamento'];


	//VERIFICAR SE A UNIDADE JÁ ESTÁ CADASTRADO
	$res_c = $pdo->query("select * from receitas where descricao = '$descricao'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_c);
	if($linhas == 0){
		$res = $pdo->prepare("INSERT into receitas (despesas, descricao, tipo_despesa, valor, vencimento_fatura, status_pagamento) values (:despesas, :descricao, :tipo_despesa, :valor, :vencimento_fatura, :status_pagamento) ");
	
		$res->bindValue(":despesas", $despesas);
		$res->bindValue(":descricao", $descricao);
		$res->bindValue(":tipo_despesa", $tipo_despesa);
		$res->bindValue(":valor", $valor);
		$res->bindValue(":vencimento_fatura", $vencimento_fatura);
		$res->bindValue(":status_pagamento", $status_pagamento);
		
	
		$res->execute();
	
	
		echo "Cadastrado com Sucesso!!";
	
	}else{
		echo "Este recita já está cadastrado!!";
	}
	
	?>