<?php
require_once('moduloProjeto.php');
?>

<!DOCTYPE html>
</html>
	<head>
		<title> home </title>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="projeto.css">
		<link rel="stylesheet" type="text/css" href="slider.css">
		
	</head>
	<body>
	
  <script type="text/javascript">
function setaImagem(){
    var settings = {
        primeiraImg: function(){
            elemento = document.querySelector("#slider a:first-child");
            elemento.classList.add("ativo");
            
        },
 
        slide: function(){
            elemento = document.querySelector(".ativo");
 
            if(elemento.nextElementSibling){
                elemento.nextElementSibling.classList.add("ativo");
                
                elemento.classList.remove("ativo");
            }else{
                elemento.classList.remove("ativo");
                settings.primeiraImg();
            }
 
        },
 
        proximo: function(){
            clearInterval(intervalo);
            elemento = document.querySelector(".ativo");
 
            if(elemento.nextElementSibling){
                elemento.nextElementSibling.classList.add("ativo");
                
                elemento.classList.remove("ativo");
            }else{
                elemento.classList.remove("ativo");
                settings.primeiraImg();
            }
            intervalo = setInterval(settings.slide,4000);
        },
 
        anterior: function(){
            clearInterval(intervalo);
            elemento = document.querySelector(".ativo");
 
            if(elemento.previousElementSibling){
                elemento.previousElementSibling.classList.add("ativo");
                settings.legenda(elemento.previousElementSibling);
                elemento.classList.remove("ativo");
            }else{
                elemento.classList.remove("ativo");						
                elemento = document.querySelector("a:last-child");
                elemento.classList.add("ativo");
                this.legenda(elemento);
            }
            intervalo = setInterval(settings.slide,4000);
        },
 
        legenda: function(obj){
           
        }
 
    }
 
    //chama o slide
    settings.primeiraImg();
 
    
 
    //chama o slide à um determinado tempo
    var intervalo = setInterval(settings.slide,4000);
    document.querySelector(".next").addEventListener("click",settings.proximo,false);
    document.querySelector(".prev").addEventListener("click",settings.anterior,false);
}
 
window.addEventListener("load",setaImagem,false);
</script>
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
								<li><a href="projeto.php"><img id="home" src="imagem/home.png" alt="Home"/></a></li>
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
							<td><input type="text" name="Nome" /></td>
							<td><input type="password" name="Senha"/></td>
							<td><input type="submit" name="ok" value="ok" /></td>
						</tr>
				</table>
			</form>
		
		</header>
		<section id="Conteudo">
			
				<figure>
				   <span class="trs next"></span>
				   <span class="trs prev"></span>
				   <div id="slider">
					  <a href="#" class="trs"><img src="imagem/imagem1.jpg" alt="Esquadrão Suicida" title="Esquadrão Suicida"></a>
					  <a href="#" class="trs"><img src="imagem/imagem2.jpg" alt="Guerra Civil" title="Guerra Civil"></a>
					  <a href="#" class="trs"><img src="imagem/imagem3.jpg" alt="Batman vs Super-man" title="Batman vs Super-man"></a>
					  <a href="#" class="trs"><img src="imagem/imagem4.jpg" alt="Deus não esta morto" title="Deus não esta morto"></a>
				   </div>
				</figure>
			
			<aside id="coluna1">
				<ul class="lstconteudo">
					<li> 
						<input type="search" placeholder="Digite um genero" list="generos"/> 
							<datalist id="generos" style="display:hidden;">
								  <option value="INFANTIL">
								  <option value="COMÉDIA">
								  <option value="TERROR">
								  <option value="DRAMA">
								  <option value="ROMANCE">
							</datalist>
					</li> 
					<li> home </li>
					<li> home </li> 
				</ul>
			</aside>
			<section class="coluna2" id="principal">
			<?php
						$sql = "SELECT * FROM tblfilmes order by id desc";
						$select= mysql_query($sql);
					while($rs=mysql_fetch_array($select)){
					?>
				<section class="produto">
					
					<table> 
					
						<tr>
							<td>
								<img width="190" height="180" src="arquivos/<?php echo ($rs['foto'])?>"></td>
						</tr>
					
						<tr>
							<td> Nome:<?php echo ($rs['nome'])?> </td>
						
						</tr>
						<tr>
							<td> Descrição: <?php echo ($rs['descricao'])?>
						
							</td>
							
						</tr>
						<tr>
							<td> Preço: <?php echo ($rs['preco'])?> </td>
							
						</tr>
						<tr>
							<td class="detalhes"> 
								<a href="#" class="formata"> Detalhes </a>
							</td>
						</tr>
					
					</table>
					
			</section>
			<?php } ?>
				<!-- <section class="produto"> 
						<table> 
							<tr>
								<td class="img">  <img src="imagem/eradogelo.jpg" alt="A era do Gelo e o Big Bang" title="A era do Gelo e o Big Bang"> </td>
							</tr>
							<tr>
								<td> Nome: A era do Gelo e o Big Bang </td>	
							</tr>
							<tr>
								<td> 
									Descrição:Depois que o esquilo Scrat,provoca um acidente espacial em sua incansável perseguição pela noz, um enorme meteoro entra em rota de colisão com a Terra, ameaçando o lar de Manny, Diego, Sid e cia.
								</td>
							</tr>
							<tr>
								<td> Preço: 10,99</td>
								
							</tr>
							<tr>
								<td class="detalhes"> 
									<a href="#" class="formata"> Detalhes
								</td>
							</tr>
						</table>
				</section>
				<section class="produto"> 
						<table> 
							<tr>
								<td class="img"> <img src="imagem/deadpool.jpg" alt="Deadpool" title="Deadpool"> </td>
							</tr>
							<tr>
								<td> Nome: Deadpool</td>
								
							</tr>
							<tr>
								<td> 
									Descrição: Ex-militar e mercenário, Wade Wilson (Ryan Reynolds) é diagnosticado com câncer em estado terminal, porém encontra uma possibilidade de cura em uma sinistra experiência científica.
								</td>
							</tr>
							<tr>
								<td> Preço: 14,95</td>
							</tr>
							<tr>
								<td class="detalhes"> 
									<a href="#" class="formata"> Detalhes
								</td>
							</tr>
						</table>
				</section>
				<section class="produto"> 
						<table> 
							<tr>
								<td class="img">  <img src="imagem/bruxaecacador.jpg" alt="O caçador e a Rainha do Gelo" title="O caçador e a Rainha do Gelo"></td>
							</tr>
							<tr>
								<td> Nome: O caçador e a Rainha do Gelo </td>
								
							</tr>
							<tr>
								<td> 
									Descrição: Freya é a irmã boa da toda poderosa Rainha Ravenna. Depois de passar por um trauma,ela desperta para os poderes mágicos e se isola. Ela constrói seu próprio reinado – se torna a Rainha do Gelo 
								</td>
							</tr>
							<tr>
								<td> Preço: 17,28</td>
								<td></td>
							</tr>
							<tr>
								<td class="detalhes"> 
									<a href="#" class="formata"> Detalhes
								</td>
							</tr>
						</table>
				</section>
				<section class="produto"> 
						<table> 
							<tr>
								<td class="img">  <img src="imagem/5onda.jpg" alt="A 5º Onda" title="A 5º Onda"><td>
							</tr>
							<tr>
								<td> Nome:A 5º Onda</td>
								
							</tr>
							<tr>
								<td> Descrição:A Terra repentinamente sofre uma série de ataques alienígenas. Na primeira onda de ataques, um pulso eletromagnético retira a eletricidade do planeta.  </td>
								
							</tr>
							<tr>
								<td> Preço: 5,98 </td>
								<td></td>
							</tr>
								<tr>
								<td class="detalhes"> 
									<a href="#" class="formata"> Detalhes
								</td>
							</tr>
						</table>
				</section>
				<section class="produto"> 
					<table> 
						<tr>
							<td class="img"> <img src="imagem/panico.jpg" alt=" Todo mundo em panico 3" title=" Todo mundo em panico 3"> </td>
						</tr>
						<tr>
							<td> Nome: Todo mundo em panico 3 </td>
						</tr>
						<tr>
							<td> 
								Descrição:Das mentes dos criadores do seriado da TV americana "In living color" surge o primeiro thriller-comédia, em que 	adolescentes apavorados fugindo de maníacos assassinos são o pretexto para uma série de piadas . 
							</td>
			
						</tr>
						<tr>
							<td> Preço: 10,99 </td>
						</tr>
							<tr>
								<td class="detalhes"> 
									<a href="#" class="formata"> Detalhes
								</td>
							</tr>
					</table>
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
				
				<nav><img src="imagem/logo.jpg" alt="Acme Tunes SA" title="Acme Tunes SA"></nav>
			</article>
			
		</footer>
	
	
	
	</section>
	</body>
</html>