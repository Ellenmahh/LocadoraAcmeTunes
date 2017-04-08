<?php
require_once('moduloProjeto.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Filmes do Mês </title>
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
		</header>
		
		<section id="Conteudo">
			<article>
				<image>
					<img class="imgFilmes" src="imagem/filmeMes.png">
				</image>
				<nav class="aoLado">
					Todo Mês dicas de Filmes para você se divertir!
				</nav>
			</article>
			
			<section class="coluna2" id="promocao" >
				
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
				<!--<section class="produto" id="filmeMes"> 
					<table> 
						<tr>
							<td class="imgFilmes" > <img src="imagem/cinza.jpg" alt="50 Tons de Cinza" title="50 Tons de Cinza"> </td>
							
						</tr>
						
						<tr>
							<td> 
							 
								<div>Data de lançamento: 12 de fevereiro de 2015 (2h 05min)</div>
								<div>Direção: Sam Taylor-Johnson</div>
								<div>Elenco: Jamie Dornan, Dakota Johnson, Jennifer Ehle mais</div>
								<div>Gêneros: Erótico, Drama, Romance</div>
								<div>Nacionalidade: Eua</div>
							 
							 
							
							</td>
							
						</tr>
					</table>
				</section>
				<section class="produto" id="filmeMes"> 
					<table> 
						<tr>
							<td class="imgFilmes"> <img src="imagem/teoria.jpg" alt="Teoria de Tudo" title="Teoria de Tudo"> </td>
							
						</tr>
						<tr>
							<td > 
							
								<div>Data de lançamento: 29 de janeiro de 2015 (2h 03min)</div>
								<div>Direção: James Marsh</div>
								<div>Elenco: Eddie Redmayne, Felicity Jones, Tom Prior mais</div>
								<div>Gêneros: Biografia, Drama</div>
								<div>Nacionalidade: Reino unido</div>
							
							
							</td>
							
						</tr>
					</table>
				</section>
				<section class="produto" id="filmeMes"> 
					<table> 
						<tr>
							<td class="imgFilmes"> <img src="imagem/malvado.jpg" alt="Meu Malvado Favorito" title="Meu Malvado Favorito"> </td>
							
						</tr>
						<tr>
							<td > 
							
							
								<div>Data de lançamento: 6 de agosto de 2010 (1h 35min)</div>
								<div>Direção: Chris Renaud, Pierre Coffin</div>
								<div>Elenco: Leandro Hassum, Marcius Melhem, Steve Carell mais</div>
								<div>Gênero: Animação</div>
								<div>Nacionalidade: Eua</div>
							
							
							
							</td>
							
						</tr>
					</table>
				</section>
				
				<section class="produto" id="filmeMes"> 
					<table> 
						<tr>
							<td class="imgFilmes"> <img src="imagem/as.jpg" alt="As Branquelas" title="As Branquelas"> </td>
							
						</tr>
						<tr>
							<td> 
							
								<div>Data de lançamento: 27 de agosto de 2004 (1h 49min)</div>
								<div>Direção: Keenen Ivory Wayans</div>
								<div>Elenco: Shawn Wayans, Marlon Wayans, Maitland Ward mais</div>
								<div>Gêneros: Comédia , Policial</div>
								<div>Nacionalidade: Eua</div>
							
							
							</td>
							
						</tr>
					</table>
				</section>
				
				<section class="produto" id="filmeMes"> 
					<table> 
						<tr>
							<td class="imgFilmes"> <img src="imagem/onda.jpg" alt="A onda" title="A onda"> </td>
							
						</tr>
						<tr>
							<td > 
							
								<div>Data de lançamento: junho 2016 para DVD (1h 50min)</div>
								<div>Direção: Roar Uthaug</div>
								<div>Elenco: Kristoffer Joner, Thomas Bo Larsen, Ane Dahl Torp mais</div>
								<div>Gêneros: Ação, Drama</div>
								<div>Nacionalidade: Noruega</div>
							
							
							</td>
							
						</tr>
					</table>
				</section>
				
				<section class="produto" id="filmeMes"> 
					<table> 
						<tr>
							<td class="imgFilmes"> <img src="imagem/imperador.jpg" alt="O Imperador" title="O Imperador"> </td>
						</tr>
						<tr>
							<td > 
							
								<div>Data de lançamento 12 de fevereiro de 2015 (1h 39min)</div>
								<div>Direção: Nick Powell</div>
								<div>Elenco: Nicolas Cage, Hayden Christensen, Yifei Liu mais</div>
								<div>Gêneros: Ação, Aventura</div>
								<div>Nacionalidades: Eua, França, Reino unido</div>
							
							
							
							
							
							</td>
						</tr>
					</table>
				</section>
				 
				<section class="produto" id="filmeMes"> 
					<table> 
						<tr>
							<td class="img"> <img src="imagem/jerusalem.jpg" alt="Jeruzalém" title="Jeruzalém"> </td>
							
						</tr>
						<tr>
							<td > 
								<div>Data de lançamento 20 de julho de 2016 para DVD (1h 34min)</div>
								<div>Direção: Doron Paz, Yoav Paz</div>
								<div>Elenco: Yael Grobglas, Danielle Jadelyn, Yon Tumarkin mais</div>
								<div>Gênero: Terror</div>
								<div>Nacionalidade: Israel</div>
															
							
							
							</td>
							
						</tr>
					</table>
				</section>
				
				<section class="produto" id="filmeMes"> 
					<table> 
						<tr>
							<td class="imgFilmes"> <img src="imagem/pie.jpg" alt="American Pie 4 - Tocando a Maior Zona" title="American Pie 4 - Tocando a Maior Zona"> </td>
							
						</tr>
						<tr>
							<td > 
							
								<div>Data de lançamento 23 de novembro de 2005 (1h 34min)</div>
								<div>Direção: Steve Rash</div>
								<div>Elenco: Eugene Levy, Tad Hilgenbrink, Arielle Kebbel mais</div>
								<div>Gênero: Comédia</div>
								<div>Nacionalidade: Eua</div>
							
							
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
				Agradecemos sua visita, é sempre um prazer recebe-lo
				<nav><img src="imagem/logo.jpg"></nav>
			</article>
			
		</footer>
	
	</section>
	
	
	</body>
</html>