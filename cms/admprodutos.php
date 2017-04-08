<?php
require_once('moduloProjeto.php');


if(isset($_GET['logout'])){
	header('location:../index.php');
	
}

?>
<html>
	<head>
		<title>adm conteudo </title>
        <link rel="stylesheet" type="text/css" href="cms.css">
		<link rel="stylesheet" type="text/css" href="produtos.css">
		
	</head>
	<body>
	<section id="principal">
		<header id="cabecalho">
			<div id="titulo">
				<h1>CMS
					<span>- Sistema de Gerenciamento do Site </span>
				</h1>
			</div> 
			<div id="imgCabecalho">
				Acme Tunes SA
			</div>
		</header>
		<?php require_once('moduloLogin.php');?>
		<form>
			<nav class="logout1">
				<div class="logout2"><input type="submit" value="Logout" name="logout"></div>
			</nav>
		</form>
		
		
		<section>
            <table class="lstproduto">
                <tr>
						<td>
							<a class="adm edit" href="home.php"><img src="../imagem/editar21.png"></a> 
						</td>
				
						<td >
							<ul class="categoria" >
								<li>
									<p>categoria</p>
									<a href="#"><img width="50px" src="imagens/adc.png"></a> 
									<a href="#"><img width="50px" src="imagens/cog_delete.png"></a> 
									<a href="#"><img width="50px" src="imagens/edit.png"></a> 
									
								
								</li>
								<li>
									<p>Sub-Categoria</p>
									<a href="#"><img width="50px" src="imagens/adc.png"></a> 
									<a href="#"><img width="50px" src="imagens/cog_delete.png"></a> 
									<a href="#"><img width="50px" src="imagens/edit.png"></a> 
									
								
								</li>
							</ul>
						</td>
					</tr>
                    
                
                
            </table>
			
			
		</section>
		
			
		
		<footer>
			desenvolvido por ellen
		</footer>
	</section>
	</body>
</html>