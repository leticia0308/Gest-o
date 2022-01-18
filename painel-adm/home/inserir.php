<?php 

require_once("../../conexao.php");

$assunto = $_POST['assunto'];
$status_ocorrencia = $_POST['status_ocorrencia'];


	//VERIFICAR SE O MÉDICO JÁ ESTÁ CADASTRADO
	$res_c = $pdo->query("select * from home where assunto = '$assunto'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_c);
	
	
	if($assunto == ''){
		echo "Preencha a Descrição!!";
		exit();
	}
	
	if($linhas == 0){
		$res = $pdo->prepare("INSERT into home (assunto, status_ocorrencia) values (:assunto, :status_ocorrencia)");
	
		$res->bindValue(":assunto", $assunto);
		$res->bindValue(":status_ocorrencia", $status_ocorrencia);
		
	
		$res->execute();
	
	
		echo "Cadastrado com Sucesso!!";
	
	}else{
		echo "Este Registro já está cadastrado!!";
	}
	
	?>