<?php

require_once('moduloProjeto.php');

$Cep="";
if(isset($_GET['btnenviar'])){
	$Cep=($_GET['cep']);
	echo "<script> alert ('CEP  $Cep Cadastrado com sucesso'); </script>"; 
	header('location: nossasLojas.php');
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title> Nossas Lojas </title>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="projeto.css">
		
	</head>
	<body>
				<header>
			<nav>
				<?php require_once('moduloMenu.php');?>
			</nav>
			<form method="get" action="cms/usuarios.php">
				<table id="login">
						<tr>
							<td> Usuario:  </td>
							<td>Senha: </td>
						</tr>
						<tr>
							<td><input type="text" name="Nome"/></td>
							<td><input type="password" name="Senha"/></td>
							<td><input type="submit" name="ok" value="ok" /></td>
						</tr>
				</table>
			</form>
		</header>
		<section class="lateral">
				<nav> 
					<a href ="https://www.facebook.com"target="_blank"> <img class="social" alt="facebook" title="facebook" src="imagem/face.png"></a>
					<a href ="https://www.instagram.com"target="_blank"> <img class="social" alt="instagram"title="instagram" src="imagem/insta.png"></a>
					<a href ="https://www.twitter.com"target="_blank"> <img class="social" alt="twitter" title="twitter" src="imagem/tt.png"></a>
				
				</nav>
			</section>
		<section id="Conteudo">
			
				<article class="nossaslojas">
					<p>Conheça também nossas loja fisica:</p>
					 Av. Marechal Teodoro da Fonseca nº589, Lapa Prox. ao Mercado do Japonês  |  Av. Estradão nº 18, Campo Limpo <br/>
				</article>
			
			<footer id="rodape">
				<nav>
					<img src="imagem/logo.jpg" alt="Acme Tunes SA" title="Acme Tunes SA">
				</nav>
			</footer>
		</section>
	</body>
</html>