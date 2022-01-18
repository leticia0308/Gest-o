<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$identificacao = $_POST['identificacao'];
$proprietario = $_POST['proprietario'];
$condominio = $_POST['condominio'];
$endereco = $_POST['endereco'];


	//VERIFICAR SE A UNIDADE JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from unidades where identificacao = '$identificacao'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);
if($linhas == 0){
	$res = $pdo->prepare("INSERT into unidades (nome, identificacao, proprietario, condominio, endereco) values (:nome, :identificacao, :proprietario, :condominio, :endereco) ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":identificacao", $identificacao);
	$res->bindValue(":proprietario", $proprietario);
	$res->bindValue(":condominio", $condominio);
	$res->bindValue(":endereco", $endereco);
	

	$res->execute();


	echo "Cadastrado com Sucesso!!";

}else{
	echo "Este Inquilino já está cadastrado!!";
}

?>