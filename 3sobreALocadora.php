<?php
require_once('moduloProjeto.php');
?>
<!DOCTYPE html>
	<html>
	<head>
		<title> Sobre a Locadora </title>
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
            var legenda = obj.querySelector("img").getAttribute("alt");
            document.querySelector("figcaption").innerphp = legenda;
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
			<section>
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
			</section>
			
			
			
			<footer id="rodape">
			<article>
				<p>Sobre a Locadora</p>

				
					ACMETUNES SA Locações de Filmes oferece, desde 2016, os melhores filmes para você e sua família.

					A Malu quer facilitar a sua vida, através de uma parceria efetiva, com uma equipe altamente qualificada e preparada, pensando no conforto e na segurança de nossos parceiros.
					Para isso, trabalhamos com duas vertentes: 

					<p><a href="https://www.universalpictures.com/" target="_blank">Universal Pictures</a> | <a href="http://marvel.com/" target="_blank">Marvel Comics</a></p>
			</article>
			<nav><img src="imagem/logo.jpg" alt="Acme Tunes SA"></nav>
			</footer>
		</section>
	
	
	
	</body>
</html>