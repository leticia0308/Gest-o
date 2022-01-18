<?php 

//DADOS PARA CONEXÃO COM BANCO DE DADOS LOCAL

$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'system';



//DADOS PARA CONEXÃO COM BANCO DE DADOS HOSPEDADA
/*
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'system';
*/

//VALORES PARA A COMBOBOX DE PAGINAÇÃO
$opcao1 = 5;
$opcao2 = 8;
$opcao3 = 10;


//VARIAVEL PARA DEFINIR O CAMINHO DO SISTEMA

session_start();

$url_sistema = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"]. "?") . "/";;

$email_adm = 'contato@leticia.com.br';




 ?>