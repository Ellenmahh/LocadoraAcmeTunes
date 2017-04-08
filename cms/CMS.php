<?php

session_start();

if(isset($_GET['logout'])){
	header('location:../index.php');
	
}
?>
<html>
	<head>
		<title> cms </title>
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
		<section id="conteudo">
		</section>
		<footer>
			desenvolvido por ellen
		</footer>
	</section>
	</body>
</html>