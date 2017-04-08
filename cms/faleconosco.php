<?php
require_once('moduloProjeto.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$apagar='delete from tblfaleconosco WHERE id='.$id;
	mysql_query($apagar,$conexao);	
}

if(isset($_GET['logout'])){
	header('location:../index.php');
	
}
$sql = 'SELECT * FROM tblfaleconosco';
$resultado = mysql_query($sql,$conexao);
//  transformar em lista com numeros
//$lista = mysql_fetch_array($resultado);
//  transformar em lista com nome da coluna 

?>
<html>
	<head>
		<title> cms faleconosco </title>
		<link rel="stylesheet" type="text/css" href="cms.css">
		<link rel="stylesheet" type="text/php" href="usuarios.php">
		<meta charset=utf-8>
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
			<article>
				<nav class="texto"> Veja o que nossos clienetes estão dizendo</nav>
			</article>
			<form name="frmfaleconosco" method="get" action="faleconosco.html">
			<?php while($lista = mysql_fetch_assoc($resultado)){?>
			<table class="faleConosco">
				<tr>
					<td class="tdfaleConosco">Nome : <?php echo($lista['nome']);?> </td>	
				</tr>
				<tr>
					<td class="tdfaleConosco">Telefone : <?php echo($lista['telefone']);?> </td>	
				</tr>
				<tr>
					<td class="tdfaleConosco">Celular : <?php echo($lista['celular']);?> </td>	
				</tr>
				<tr>
					<td class="tdfaleConosco">Email : <?php echo($lista['email']);?> </td>	
				</tr>
				<tr>
					<td class="tdfaleConosco">Home Page : <?php echo($lista['homePage']);?> </td>	
				</tr>
				<tr>
					<td class="tdfaleConosco">Link do Facebook : <?php echo($lista['linkFacebook']);?> </td>	
				</tr>
				<tr>
					<td class="tdfaleConosco">Informações do Produto : <?php echo($lista['infoProdutos']);?> </td>	
				</tr>
				<tr>
					
					<td class="tdfaleConosco">Sugestões e Críticas : <?php echo($lista['sugestoesCriticas']);?> </td>	
				</tr>
				<tr>
					<td class="tdfaleConosco">Sexo : <?php echo($lista['sexo']);?> </td>	
				</tr>
				<tr>
					<td class="tdfaleConosco">Profissão : <?php echo($lista['profissao']);?> </td>	
				</tr>
				<!-- apagar do banco -->
				<tr> 
					<td> <a href="faleconosco.php?id=<?php echo $lista['id'];?>"><img src="imagens/cog_delete.png"> </a></td>
				</tr>
			</table>
			<?php }?>
		</section>
		<footer>
			desenvolvido por ellen
		</footer>
	</section>
	</body>
</html>