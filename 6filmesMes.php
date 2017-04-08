<?php
require_once('moduloProjeto.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Filmes do Mês </title>
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
			<article>
				<image>
					<img class="imgFilmes" src="imagem/filmeMes.png">
				</image>
				<nav class="aoLado">
					Todo Mês dicas de Filmes para você se divertir!
				</nav>
			</article>
			
			<section class="coluna2" >
				
				<?php
						$sql = "SELECT * FROM tblfilmemes ";
						$select= mysql_query($sql);
					while($rs=mysql_fetch_assoc($select)){
					?>
					<table class="produto" id="promo" > 
						<tr>
							<td> <img class="imgtamanho" src="arquivos/<?php echo ($rs['foto'])?>"></td>
							
						</tr>
						
							
						<tr >
							<td> Data Lançamento: <?php echo ($rs['dataLancamento'])?></td>
						</tr>
						<tr >
							<td> Elenco: <?php echo ($rs['elenco'])?></td>
						</tr>
						<tr >
							<td> Direção: <?php echo ($rs['direcao'])?></td>
						</tr>
						<tr >
							<td> Nacionalidade: <?php echo ($rs['nacionalidade'])?></td>
						</tr>
										<!--<div>Gênero:Comédia</div> -->	
					</table>
					<?php }?>
				
			</section>
				
		</section>
		
		<footer id="rodape">
			<article>
				Agradecemos sua visita, é sempre um prazer recebe-lo
				<nav><img src="imagem/logo.jpg"></nav>
			</article>
			
		</footer>
	
	</section>
	
	
	</body>
</html>