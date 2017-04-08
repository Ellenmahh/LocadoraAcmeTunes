<?php
require_once('moduloProjeto.php');

/*if(isset($_GET['id'])){
	$id=$_GET['id'];
	$delete='delete from tblusuarios WHERE id='.$id;
	mysql_query($delete,$conexao);
	header('location:admusuarios.php');
}
if(isset($_GET['logout'])){
	header('location:../projeto.php');
} */

if(isset($_GET['modo'])){
	$modo=$_GET['modo'];
		if($modo=='excluir'){
			$cod=$_GET['codigo'];
			$delete='delete from tblusuarios WHERE id='.$cod;
			mysql_query($delete);
			//header('location:admusuarios.php');
			
		}
	
	
}
if(isset($_GET['logout'])){
	header('location:../index.php');
	
}
$sql='SELECT u.id, u.usuario, u.senha,n.nivel from tblusuarios as u,tblnivel as n WHERE u.fk_idNivel = n.idNivel';
$resultado=mysql_query($sql,$conexao);


?>

<html>
	<head>
		<title> cms </title>
		<link rel="stylesheet" type="text/css" href="cms.css">
		
	</head>
	<body>
	<section id="principal">
		<header id="cabecalho">
			<div id="titulo">
				<h1>CMS
					<span>- Sistema de Gerenciamento do Site </span>
				</h1>
			</div> 
			<div id="imgCabecalho">
				Acme Tunes SA
			</div>
		</header>
		<?php require_once('moduloLogin.php');?>
		<form>
			<nav class="logout1">
				<div class="logout2"><input type="submit" value="Logout" name="logout"></div>
			</nav>
		</form>
		<section id="conteudo">
			<div class="btncrud">
				<a href="adcUser.php"><img src="imagens/cog_add.png"></a>
			</div>
			<?php while($lista = mysql_fetch_assoc($resultado)){?>
			<table class="tblusuario">
				<tr>
					<td> Nome do Usuario: <?php echo ($lista['usuario']);?></td>
				</tr>
				<tr>
					<td> Senha do Usuário: <?php echo ($lista['senha']);?></td>
				</tr>
				<tr>
					<td> Nivel: <?php echo ($lista['nivel']);?> </td>
				</tr>
				<tr>
					<td>
						<!-- <a href="05.08.php?modo=excluir&codigo=<?php echo ($rs['codigo'])?>">Excluir</a> | -->
						
						<a href="admusuarios.php?modo=excluir&codigo=<?php echo $lista['id'];?>" excluir ><img src="imagens/cog_delete.png"></a> |
						<a href="editar.php?modo=editar&codigo=<?php echo $lista['id'];?>"><img src="imagens/cog_edit.png"></a> 
					</td>
				</tr>
			<?php } ?>
			</table>
			
		</section>
		<footer>
			desenvolvido por ellen
		</footer>
	</section>
	</body>
</html>