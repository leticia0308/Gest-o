<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];


	//VERIFICAR SE O INQUILINO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from inquilinos where telefone = '$telefone'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);
if($linhas == 0){
	$res = $pdo->prepare("INSERT into inquilinos (nome, idade, sexo, telefone, email) values (:nome, :idade, :sexo, :telefone, :email) ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":idade", $idade);
	$res->bindValue(":sexo", $sexo);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);
	

	$res->execute();



	echo "Cadastrado com Sucesso!!";

}else{
	echo "Este Inquilino já está cadastrado!!";
}

?>