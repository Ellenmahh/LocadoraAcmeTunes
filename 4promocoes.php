<?php
require_once('moduloProjeto.php');
?>
<html>
	<head>
		<title> Promoções </title>
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
				</table>
		</header>
		<section class="lateral">
				
				<nav> 
							<a href ="https://www.facebook.com"target="_blank"> <img class="social" title="facebook" src="imagem/face.png"></a>
							<a href ="https://www.instagram.com"target="_blank"> <img class="social" title="instagram" src="imagem/insta.png"></a>
							<a href ="https://www.twitter.com"target="_blank"> <img class="social" title="twitter" src="imagem/tt.png"></a>
						
				</nav>
		</section>
		<section id="Conteudo">
			
			
			<section class="coluna2" >
				
				<?php
						$sql = "SELECT * FROM tblpromocoes ";
						$select= mysql_query($sql);
					while($rs=mysql_fetch_array($select)){
					?>
				
			<table class="produto" id="promo">
				<tr>
					<td>
						 <img class="imgtamanho" src="arquivos/<?php echo ($rs['foto'])?>">
						<td id="desconto" > 15% </td>
					</td>
				</tr>
				<tr >
					<td> Nome: <?php echo ($rs['nome'])?></td>
				</tr>
				<tr>
							<td> 
							 De:<strike><?php echo($rs['de'])?></strike>
							 Por: <?php echo($rs['por'])?>
							 </td>
							
						</tr>
			</table>
				
			
			
				<?php } ?>
				
		</section>
		
		<footer id="rodape">
			<article>
				
				<nav><img src="imagem/logo.jpg"></nav>
			</article>
			
		</footer>
	
	</section>
	
	
	</body>
</html>