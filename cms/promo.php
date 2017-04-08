<?php
require_once('moduloProjeto.php');

if(isset($_POST['btnsalvar'])){
	$nomeFilme=$_POST['txtnome'];	
	$de=$_POST['txtde'];	
	$por=$_POST['txtpor'];	
	
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
			$sql="insert into tblpromocoes (foto,nome,de,por) values ('".$nome_arq."','".$nomeFilme."','".$de."','".$por."')";
			mysql_query($sql);
			header('location:promo.php');
			
			
		}
	}else{
			
			echo'Extensao inválida';
		}
}

if(isset($_GET['modo'])){
	$modo=$_GET['modo'];
		if($modo=='excluir'){
			$cod=$_GET['codigo'];
			$delete='delete from tblpromocoes WHERE id='.$cod;
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
	
		<form name="frmupload" method="post" enctype="multipart/form-data" action="promo.php">
			<section >
				<div id="adcAdm">Escolha a Foto Principal:</div><div> <input type="file" name="flefoto"></div>
				<div id="adcAdm">Nome do Filme: </div><div><input type="text" name="txtnome" > </div>
				<div id="adcAdm">De: </div><div><input type="text" name="txtde" > </div>
				<div id="adcAdm">Por: </div><div><input type="text" name="txtpor" > </div>
				
				<div>
					<input class="btn" type="submit" name="btnsalvar" value="salvar">
					<input class="btn" type="submit" name="btnvolts" value="voltar"> 
				</div>
				<!-- fim do form -->
		</form>
			</section>
			<section>
				<?php
					$sql = "SELECT * FROM tblpromocoes ";
					$select= mysql_query($sql);
					while($rs=mysql_fetch_array($select)){
					?> 
				
			<table class="tbluser">
				<tr >
					<td>
						<img class="imgtamanho" src="../arquivos/<?php echo ($rs['foto'])?>">
					</td>
				</tr>
				<tr> 
					<td> Nome Filme: <?php echo ($rs['nome'])?></td>
				</tr>
				<tr>
					<td>De: <?php echo ($rs['de'])?></td>
				</tr>
				<tr>
					<td> por: <?php echo ($rs['por'])?></td>
				</tr>
				<tr>
				<td>
					<a href="promo.php?modo=excluir&codigo=<?php echo $rs['id'];?>" excluir ><img src="imagens/cog_delete.png"></a> |
					<a href="editarpromo.php?modo=editar&codigo=<?php echo $rs['id'];?>"><img src="imagens/cog_edit.png"></a> 
				</td>
				<tr>
				
			</table>
				<?php } ?> 
			</section>
		
		

	
		<footer>
			desenvolvido por ellen
		</footer>
	</section>
	</body>
</html>


