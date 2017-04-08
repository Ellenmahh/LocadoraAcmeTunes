<?php
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
				<table id = "menu">
					<tr>
						<td>
							<img class="img" src="imagem/logo.jpg" alt="Acme Tunes SA" title="Acme Tunes SA">
						</td>
					</tr>
					<tr>
						<td>
							<ul class="lstmenu">
								<li><a href="projeto.php"><img id="home" alt="home" src="imagem/home.png"/></a></li>
								<li><a href="atoresEmDestaque.php"> Atores em destaque  </a></li> 
								<li><a href="sobreALocadora.php"> Sobre a locadora </a><li> 
								<li><a href="promocoes.php"> Promoções </a></li>
								<li><a href="nossasLojas.php"> Nossas lojas </a><li>
								<li><a href="filmesMes.php"> Filmes do mês </a></li>
								<li><a href="faleConosco.php"> Fale conosco </a><li>
							</ul>
						</td>
					</tr>
				</table>
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
		
		<section id="Conteudo">
			
			
			
			<section class="lateral">
				<nav> 
					<a href ="https://www.facebook.com"target="_blank"> <img class="social" alt="facebook" title="facebook" src="imagem/face.png"></a>
					<a href ="https://www.instagram.com"target="_blank"> <img class="social" alt="instagram"title="instagram" src="imagem/insta.png"></a>
					<a href ="https://www.twitter.com"target="_blank"> <img class="social" alt="twitter" title="twitter" src="imagem/tt.png"></a>
				
				</nav>
			</section>
			<footer id="rodape">
			<form name="frmnossasLojas" method="get" action="nossasLojas.php">
			<article>
				<p>Conheça também nossas loja fisica:</p>

				
					 Av. Marechal Teodoro da Fonseca nº589, Lapa Prox. ao Mercado do Japonês  |  Av. Estradão nº 18, Campo Limpo <br/>
					 deixe o seu CEP registrado, e logo estaremos mais perto de você 
					 <input type="number" name="cep" value="cep" placeholder="Digite seu cep" max=8/>
					 <input type="submit" name="btnenviar" value="Enviar"/>
					
					
			</article>
			<nav><img src="imagem/logo.jpg" alt="Acme Tunes SA" title="Acme Tunes SA"></nav>
			</footer>
		</section>
	
	
	
	
	</body>
</html>