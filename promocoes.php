<?php
require_once('moduloProjeto.php');
?>
<html>
	<head>
		<title> Promoções </title>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="projeto.css">
		<link rel="stylesheet" type="text/css" href="cms/cms.css">
		
	</head>
	<body>
	
  
		<header>
			<nav>
				<table id = "menu">
					<tr>
						<td>
							<img class="img" src="imagem/logo.jpg" alt="Acme Tunes SA">
						</td>
					</tr>
					<tr>
						<td>
							<ul class="lstmenu">
								<li><a href="projeto.php"><img id="home" alt="Home" src="imagem/home.png"/></a></li>
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
				</table>
		</header>
		
		<section id="Conteudo">
			
			
			<section class="coluna2" id="promocao">
				
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
					<!--<table> 
						<tr>
							<td class="img"> <img src="imagem/malvado.jpg" alt="Meu Malvado Favorito"> </td>
							<td id="desconto" > 15% </td>
						</tr>
						
						<tr>
							<td> Nome:Meu Malvado favorito </td>
						
						</tr>
						<tr>
							<td> 
							 De:<strike>29,90</strike>
							 Por: 25,40 
							 </td>
							
						</tr>
							<tr>
							<td class="detalhes"> 
							<a href="#" class="formata"> Detalhes
							
							</td>
							
						</tr>
					</table>
					
				</section>
			
				<section class="produto" id="promo"> 
					<table> 
						<tr>
							<td class="img"> <img src="imagem/as.jpg" alt="As Branquelas"> </td>
							<td id="desconto" > 15% </td>
						</tr>
						
						<tr>
							<td> Nome:As Branquelas </td>
						
						</tr>
						<tr>
							<td> 
							 De:<strike>19,90</strike>
							 Por: 16,90 
							 </td>
							
						</tr>
							<tr>
							<td class="detalhes"> 
							<a href="#" class="formata"> Detalhes
							
							</td>
							
						</tr>
					</table>
				</section>
				
				<section class="produto" id="promo"> 
					<table> 
						<tr>
							<td class="img"> <img src="imagem/onda.jpg" alt="A onda"> </td>
							<td id="desconto" > 20% </td>
						</tr>
						
						<tr>
							<td> Nome:A onda </td>
						
						</tr>
						<tr>
							<td> 
							 De:<strike>29,90</strike>
							 Por: 23,90 
							 </td>
							
						</tr>
							<tr>
							<td class="detalhes"> 
							<a href="#" class="formata"> Detalhes
							
							</td>
							
						</tr>
					</table>
				</section>
				
				<section class="produto" id="promo"> 
					<table> 
						<tr>
							<td class="img"> <img src="imagem/imperador.jpg" alt="O imperador" title="O imperador"> </td>
							<td id="desconto" > 10% </td>
						</tr>
						
						<tr>
							<td> Nome:O imperador </td>
						
						</tr>
						<tr>
							<td> 
							 De:<strike>15,90</strike>
							 Por: 14,30 
							 </td>
							
						</tr>
							<tr>
							<td class="detalhes"> 
							<a href="#" class="formata"> Detalhes
							
							</td>
						</tr>
					</table>
				</section>
				 
				<section class="produto" id="promo"> 
					<table> 
						<tr>
							<td class="img"> <img src="imagem/jerusalem.jpg" alt="Jerusalém" title="jerusalem"> </td>
							<td id="desconto" > 13% </td>
						</tr>
						
						<tr>
							<td> Nome:Jerusalém </td>
						
						</tr>
						<tr>
							<td> 
							 De:<strike>39,90</strike>
							 Por: 34,70 
							 </td>
							
						</tr>
							<tr>
							<td class="detalhes"> 
							<a href="#" class="formata"> Detalhes
							
							</td>
							
						</tr>
					</table>
				</section>
				
				<section class="produto" id="promo"> 
					<table> 
						<tr>
							<td class="img"> <img src="imagem/pie.jpg" alt="American Pie 4" title="American Pie 4"> </td>
							<td id="desconto" > 10% </td>
						</tr>
						
						<tr>
							<td> Nome:American Pie</td>
						
						</tr>
						<tr>
							<td> 
							 De:<strike>9,90</strike>
							 Por: 8,90 
							 </td>
							
						</tr>
							<tr>
							<td class="detalhes"> 
							<a href="#" class="formata"> Detalhes
							
							</td>
							
						</tr>
					</table>
				</section>
				<section class="produto" id="promo"> 
					<table> 
						<tr>
							<td class="img"> <img src="imagem/homemaranha.jpeg" alt="Homem Aranha 2" title="Homem Aranha 2"> </td>
							<td id="desconto" > 25% </td>
						</tr>
						
						<tr>
							<td> Nome:O Homem Aranha 2 </td>
						
						</tr>
						<tr>
							<td> 
							 De:<strike>27,90</strike>
							 Por: 20,90 
							 </td>
							
						</tr>
							<tr>
							<td class="detalhes"> 
							<a href="#" class="formata"> Detalhes
							
							</td>
							
						</tr>
					</table>
				</section>
				<section class="produto" id="promo"> 
					<table> 
						<tr>
							<td class="img"> <img src="imagem/preto.jpg" alt="50 tons de preto" title="50 tons de preto"> </td>
							<td id="desconto" > 30% </td>
						</tr>
						
						<tr>
							<td> Nome:50 Tons de Preto </td>
						
						</tr>
						<tr>
							<td> 
							 De:<strike>39,90</strike>
							 Por: 27,90 
							 </td>
							
						</tr>
							<tr>
							<td class="detalhes"> 
							<a href="#" class="formata"> Detalhes
							
							</td>
							
						</tr>
					</table>
				</section>
				<section class="produto" id="promo"> 
					<table> 
						<tr>
							<td class="img"> <img src="imagem/cinza.jpg" alt="50 tons de Cinza" title="5o tons de cinza"> </td>
							<td id="desconto" > 20% </td>
						</tr>
						
						<tr>
							<td> Nome:5O Tons de Cinza</td>
						
						</tr>
						<tr>
							<td> 
							 De:<strike>49,90</strike>
							 Por: 39,90 
							 </td>
							
						</tr>
							<tr>
							<td class="detalhes"> 
							<a href="#" class="formata"> Detalhes
							
							</td>
							
						</tr>
					</table>
				</section>
			</section>
			-->
		</section>
		<section class="lateral">
				
				<nav> 
							<a href ="https://www.facebook.com"target="_blank"> <img class="social" title="facebook" src="imagem/face.png"></a>
							<a href ="https://www.instagram.com"target="_blank"> <img class="social" title="instagram" src="imagem/insta.png"></a>
							<a href ="https://www.twitter.com"target="_blank"> <img class="social" title="twitter" src="imagem/tt.png"></a>
						
				</nav>
		</section>
		<footer id="rodape">
			<article>
				
				<nav><img src="imagem/logo.jpg"></nav>
			</article>
			
		</footer>
	
	</section>
	
	
	</body>
</html>