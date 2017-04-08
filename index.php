<?php
//conexao com o banco de dados
require_once('moduloProjeto.php');
$palavra="";
$a="";

?>

<!DOCTYPE html>
</html>
	<head>
		<title> home </title>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="projeto.css">
		<link rel="stylesheet" type="text/css" href="slider.css">
        <link rel="stylesheet" type="text/css" href="cms/produtos.css">
		
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
				<?php require_once('moduloMenu.php');?>
			</nav>
            
             <form name="frmBusca" method="post" action="index.php?a=buscar" >
                            <input type="text" name="palavra" />
                            <input type="submit"  value="buscar" />
            </form>
			
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
		<section class="lateral">
				<div >
							<a href ="https://www.facebook.com"target="_blank"> <img class="social" title="facebook" src="imagem/face.png"></a>
							<a href ="https://www.instagram.com"target="_blank"> <img class="social" title="instagram" src="imagem/insta.png"></a>
							<a href ="https://www.twitter.com"target="_blank"> <img class="social" title="twitter" src="imagem/tt.png"></a>
						
				</div>
		</section>
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
			
           
			<aside id="coluna1" >
                <ul class="lstproduto">
                <?php
                    $sql="SELECT * FROM tblcategoria";
                    $select=mysql_query($sql);
                    while($rs=mysql_fetch_array($select)){
                ?>
                        <li><?php echo ($rs['nome'])?> 

                            <ul class="subprodutos"> 
                                <?php
                                $banco="SELECT * FROM tblsub where idCat=".$rs['id'];
                                $exec=mysql_query($banco);
                                while($result=mysql_fetch_array($exec)){

                                ?>
                                <a href="index.php?abrir_produtos=<?php echo ($result['id'])?>"><li><?php echo ($result['nome'])?> </li></a>
                            <?php }?> 
                            </ul>
                        </li>
                <?php } ?>
                    </ul>
			</aside>
            
			<section class="coluna2" >
                
                
			<?php
                 //Pegamos a palavra
                $palavra="";
	            $palavra = trim($_POST['palavra']);
                
                $url="";
                if(isset($_GET['abrir_produtos'])){
                    $url=$_GET['abrir_produtos'];
                }
                if($url == ""){
                    $sql = "SELECT * FROM tblfilmes order by rand();";
                    
                    
                } else{
                 $sql = "SELECT * FROM tblfilmes where fk_sub=".$url;
                }
                
                $a = $_GET['a'];
                if($a=='buscar'){
                    $sql = "SELECT * FROM tblfilmes WHERE nome LIKE '%".$palavra."%' ORDER BY nome";
                } else {
                  echo "Nenhum produto foi encontrado com a palavra ".$palavra."";
                }
                
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
                    <td> Categoria: <?php echo ($rs['fk_cat'])?> </td>

                </tr>
                 <tr>
                    <td> Subcat: <?php echo ($rs['fk_sub'])?> </td>

                </tr>
                <tr>
                    <td class="detalhes"> 
                        <a href="#" class="formata"> Detalhes</a>
                    </td>
                </tr>

            </table>

            </section>
               <?php }?>
			
			</section>
			
		
		
		<footer id="rodape">
			<article>
				
				<nav><img src="imagem/logo.jpg" alt="Acme Tunes SA" title="Acme Tunes SA"></nav>
			</article>
			
		</footer>
	
	
	
	</section>
	</body>
</html>