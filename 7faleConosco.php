<?php
require_once('moduloProjeto.php');
	$nome="";
	$telefone="";
	$celular="";
	$email="";
	$homepage="";
	$linkface="";
	$infoproduto="";
	$sugestao="";
	$sexo="";
	$profissao="";
	
if(isset($_GET['btnenviar'])){
	$nome=($_GET['Nome']);
	$telefone=($_GET['Telefone']);
	$celular=($_GET['Celular']);
	$email=($_GET['Email']);
	$homepage=($_GET['HomePage']);
	$linkface=($_GET['LinkFacebook']);
	$infoproduto=($_GET['InfoProduto']);
	$sugestao=($_GET['sugestao']);
	$sexo=($_GET['Sexo']);
	$profissao=($_GET['Profissao']);

$sql="INSERT INTO tblfaleconosco(nome,telefone,celular,email,homePage,linkFacebook,sugestoesCriticas,infoProdutos,sexo,profissao) VALUES('".
$nome."','".$telefone."','".$celular."','".$email."','".$homepage."','".$linkface."','".$infoproduto."','".$sugestao."','".$sexo."','".$profissao."')";

$resultado = mysql_query($sql);
header('location:faleConosco.php');

if(!$resultado) {
	die("Error" . mysql_error());
}
}

?>
	<!DOCTYPE html>
<html>
	<head>
		<title>Fale Conosco</title>
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
		
		<section id="Conteudo">
			
			<form name="frmfaleConosco" method="get" action="faleConosco.php">
			<table class="faleConosco">
				<tr>
					<td class="tdfaleConosco">Nome * :</td>
					<td><input type="text" name="Nome"/> </td>
					
				</tr>
				<tr>
					<td class="tdfaleConosco">Telefone:</td>
					<td><input type="text" name="Telefone"/> </td>
				</tr>
				<tr>
					<td class="tdfaleConosco">Celular * : </td>
					<td><input type="text" name="Celular"/> </td>
				</tr>
				<tr>
					<td class="tdfaleConosco">Email * : </td>
					<td><input type="email" name="Email"/> </td>
				</tr>
				<tr>
					<td class="tdfaleConosco">Home Page: </td>
					<td><input type="text" name="HomePage"/> </td>
				</tr>
				<tr>
					<td class="tdfaleConosco">Link do Facebook:</td> 
					<td><input type="text" name="LinkFacebook"/> </td>
				</tr>
				<tr>
					<td class="tdfaleConosco">Informações do Produto:</td> 
					<td><input type="text" name="InfoProduto"/> </td>
				</tr>
				<tr>
					
					<td class="tdfaleConosco" >Sugestão * : </td>
					<td>
						<textarea style="resize:none" rows="5"cols="20" name="sugestao"> 
						</textarea>
					</td>
				</tr>
				<tr>
					<td class="tdfaleConosco">Sexo * : </td>
					<td> M<input type="radio" name="Sexo" value="M" checked /> 
					F <input type="radio" name="Sexo" value="F"/> </td>
				</tr>
				<tr>
					<td class="tdfaleConosco">Profissão * : </td>
					<td><input type="text" name="Profissao"/> </td>
				</tr>
				<tr>
					
					<td><input type="submit" name="btnenviar" value="Enviar"/> </td>
				</tr>
				
			</table>
			</form>
		
	
		</section>
			
		
		
		<footer id="rodape">
			<article>
				
				<nav><img src="imagem/logo.jpg"> </nav>
			</article>
			
		</footer>
	
	</section>
	
	
	</body>
</html>