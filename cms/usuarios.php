<?php
require_once('moduloProjeto.php');
// quando o botao ok do login for clicado
if(isset($_GET['ok'])){
	$nome=$_GET['Nome'];
	$_SESSION['Nome']=$nome;
	$senha=$_GET['Senha'];
	
//verificar o tem no banco dentro da tabela usuarios
// o AND serve para usar o where mais de uma vez
$sql="SELECT * from tblusuarios WHERE usuario = '". $nome . "'AND senha = '".$senha."'";

$resultado = mysql_query($sql,$conexao);

$dados=mysql_fetch_assoc ($resultado);
$id=$dados['id'];
$_SESSION['id']=$id;




//ao fazer o login, foi verificado se usuario e senha estavam no banco, para saber se estava ou não usar 
//(mysql_affected_rows ($conexao)) pra verificar se alguma linha foi 'afetada' com a informação.

if(mysql_affected_rows ($conexao) == 1){
	header('location:CMS.php');
} else{
	header('location:../projeto.php');
}
}

?>