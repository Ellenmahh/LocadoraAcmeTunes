<?php
require_once('moduloProjeto.php');


if(isset($_GET['logout'])){
	header('location:../index.php');
	
}

?>
<html>
	<head>
		<title>adm conteudo </title>
		<link rel="stylesheet" type="text/css" href="cms.css">
		<link rel="stylesheet" type="text/php" href="usuarios.php">
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
		
		
		<section>
			<!--<a class="adm edit" href="home.php"><img src="../imagem/editar21.png"></a> -->
			<a class="adm edit" href="destaque.php"><img src="../imagem/editar22.png"></a>
			<a class="adm edit" href="promo.php"><img src="../imagem/editar23.png"></a>
			<a class="adm edit" href="filmeMes.php"><img src="../imagem/editar24.png"></a>
			
		</section>
		
			
		
		<footer>
			desenvolvido por ellen
		</footer>
	</section>
	</section>
	</body>
</html>