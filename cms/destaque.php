<?php
require_once('moduloProjeto.php');

if(isset($_POST['btnsalvar'])){
	
	$descricao=$_POST['txtdescricao'];	
	
	// objeto basename - pegar o arquivo que user selecionou e pegando apenas o nome do arquivo.
	$nome_arq=basename($_FILES['flefoto']['name']);
	// caminho da pasta para onde vai o arquivo que o user selecionou
	$uploaddir="arquivos/";
	//variavel que contem o caminho e o nome do arq
	$uploadfile=$uploaddir.$nome_arq;
	//decisao para validar os tipos de extensao valida 
	if(strstr($nome_arq,'.jpg') || strstr($nome_arq,'.png')){
		//mover o arquivo q esta no temporario para dentro do servidor, origem do arquivo, onde quero colocar
		//se conseguir mover o arquivo corretamento inserir no banco de dados
		if(move_uploaded_file($_FILES['flefoto']['tmp_name'], "../" . $uploadfile)){
			// inserir no banco
			$sql="insert into tbldestaque (principal,descricao) values ('".$nome_arq."','".$descricao."')";
			mysql_query($sql);
			header('location:destaque.php');
			
			
		}
	}else{
			
			echo'Extensao inválida';
		}
}

if(isset($_GET['modo'])){
	$modo=$_GET['modo'];
		if($modo=='excluir'){
			$cod=$_GET['codigo'];
			$delete='delete from tbldestaque WHERE id='.$cod;
			mysql_query($delete);
			
			
		}
	
	
}
if(isset($_POST['btnvolts'])){
	header('location:admconteudo.php');
}

?>
<html>
	<head>
		<title> cms </title>
		<link rel="stylesheet" type="text/css" href="cms.css">
		<link rel="stylesheet" type="text/php" href="usuarios.php">
	</head>
	<body>
	<section id="principal">
	
		<form name="frmupload" method="post" enctype="multipart/form-data" action="destaque.php">
			<section >
				
				<div id="adcAdm">Escolha a Foto Principal:</div>
				<div> 
					<input type="file" name="flefoto">
				</div> <br>
				<div> Descrição:</div>
				<div>
					<textarea  name="txtdescricao"  id="adcAdm"> </textarea>
				</div>
				<div>
					<input class="btn" type="submit" name="btnsalvar" value="salvar">
					<input class="btn" type="submit" name="btnvolts" value="voltar">
				</div>
			</section>
			<section>
				<?php
						$sql = "SELECT * FROM tbldestaque ";
						$select= mysql_query($sql);
					while($rs=mysql_fetch_array($select)){
					?>
				
			<article>
				<image>
					<img width="200" height="150"src="../arquivos/<?php echo ($rs['principal'])?>"></td>
				</image>
				<nav class="atorDestaqueLado">
					<div> Descrição: <?php echo ($rs['descricao'])?></div>
				</nav>
				<div>
					<a href="destaque.php?modo=excluir&codigo=<?php echo $rs['id'];?>" excluir ><img src="imagens/cog_delete.png"></a> |
					<a href="editardestaque.php?modo=editar&codigo=<?php echo $rs['id'];?>"><img src="imagens/cog_edit.png"></a> 
				<div>
				
			</article>
				<?php } ?>
			</section>
		</form>
		

	
		<footer>
			desenvolvido por ellen
		</footer>
	</section>
	</body>
</html>


