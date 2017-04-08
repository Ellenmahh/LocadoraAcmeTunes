<?php
require_once('moduloProjeto.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Atores em Destaque </title>
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
							<a href ="https://www.facebook.com"target="_blank"> <img class="social" title="facebook" src="imagem/face.png"></a>
							<a href ="https://www.instagram.com"target="_blank"> <img class="social" title="instagram" src="imagem/insta.png"></a>
							<a href ="https://www.twitter.com"target="_blank"> <img class="social" title="twitter" src="imagem/tt.png"></a>
						
				</nav>
		</section>
		
		<section id="Conteudo"> 
		<?php
						$sql = "SELECT * FROM tbldestaque ";
						$select= mysql_query($sql);
					while($rs=mysql_fetch_array($select)){
					?>
				
			<table class="atorDestaqueLado">
				<tr>
					<td>
						<img src="arquivos/<?php echo ($rs['principal'])?>">
					</td>
				</tr>
				<tr >
					<td> Descrição: <?php echo ($rs['descricao'])?></td>
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