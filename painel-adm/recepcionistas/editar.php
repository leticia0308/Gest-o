<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$turno = $_POST['turno'];
$email = $_POST['email'];

$id = $_POST['id'];
$campo_antigo = $_POST['campo_antigo'];

$cpf_limpo = preg_replace('/[^0-9]/', '', $campo_antigo);


if($campo_antigo != $cpf){

		//VERIFICAR SE O RECEPCIONISTA JÁ ESTÁ CADASTRADO
	$res_c = $pdo->query("select * from recepcionistas where cpf = '$cpf'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_c);

	if($linhas != 0){

		echo "Já cadastrado!!";
		exit();
	}

}


$res = $pdo->prepare("UPDATE recepcionistas set nome = :nome, cpf = :cpf, telefone = :telefone, email = :email, turno = :turno  where id = :id ");

$res->bindValue(":nome", $nome);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":email", $email);
$res->bindValue(":turno", $turno);
$res->bindValue(":id", $id);

$res->execute();


echo "Editado com Sucesso!!";


//EDITAR TAMBÉM NA TABELA DE USUÁRIOS
$res = $pdo->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario, senha = :senha, senha_original = :senha_original, nivel = :nivel where senha_original = :cpf ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":usuario", $email);

	
	$cpf_sem_traco = preg_replace('/[^0-9]/', '', $cpf);

	$res->bindValue(":senha", md5($cpf_sem_traco));
	$res->bindValue(":senha_original", $cpf_sem_traco);
	$res->bindValue(":nivel", 'portaria');
	$res->bindValue(":cpf", $cpf_limpo);

$res->execute();



?>
