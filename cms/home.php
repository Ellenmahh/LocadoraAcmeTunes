<?php
require_once('moduloProjeto.php');


if(isset($_GET['logout'])){
	header('location:../index.php');
	
}
if(isset($_POST['btnsalvar'])){
	$nome=$_POST['txtnome'];
	$descricao=$_POST['txtdescricao'];
	$preco=$_POST['txtpreco'];
    $categoria=$_POST['cat'];
    $sub=$_POST['subcat'];
    
	
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
			$sql="insert into tblfilmes (foto,descricao,preco,nome_filmes,fk_cat,fk_sub) values ('".$nome_arq."','".$descricao."',".$preco.",'".$nome."',".$categoria.",".$sub.")";
			mysql_query($sql);
			echo $sql;
		}
	}else{
			
			echo'Extensao inválida';
		}
}
if(isset($_GET['modo'])){
	$modo=$_GET['modo'];
		if($modo=='excluir'){
			$cod=$_GET['codigo'];
			$delete='delete from tblfilmes WHERE id='.$cod;
			mysql_query($delete);
			
			
		}
	
	
}

if(isset($_POST['btnvolts'])){
	header('location:admprodutos.php');
}

?>
<html>
	<head>
		<title>adm conteudo </title>
		<link rel="stylesheet" type="text/css" href="cms.css">
		<link rel="stylesheet" type="text/php" href="usuarios.php">
	</head>
	<body>
	<section id="principal">
		<form name="frmupload" method="post" enctype="multipart/form-data" action="home.php">
			<section >
				
				<div id="adcAdm">Escolha a Foto:</div><div> <input type="file" name="flefoto"></div>
				<div id="adcAdm">Nome: </div>
                <div><input type="text" name="txtnome" > </div>
				
				<div id="adcAdm"> Descrição:  </div>
                <div> <textarea name="txtdescricao" class="txtdescricao" cols="110" rows="7">
                </textarea></div>
				<div id="adcAdm">Preço: </div>
                <div><input type="text" name="txtpreco" > </div>
				<div id="adcAdm">Categoria: 
				
						<select name="cat">
							<?php $cat_sql ="SELECT * FROM tblcategoria" ;
								  $exec = mysql_query($cat_sql);
							 while($lista = mysql_fetch_array($exec)){?>
								<option value= "<?php echo($lista['id']);?>" <?php echo ($exec == $lista['id'])? "selected" : ""; ?> > <?php echo ($lista['nome_cat'])?></option>
							<?php } ?>
						</select>
					
				
				
				</div>
				<div id="adcAdm">Sub-Categoria: 

					<select name="subcat">
							<?php $cat_sql ="SELECT * FROM tblsub" ;
								  $exec = mysql_query($cat_sql);
							 while($lista = mysql_fetch_array($exec)){?>
								<option value= "<?php echo($lista['id']);?>"
								<?php echo ($exec == $lista['id'])? "selected" : ""; ?> >
								<?php echo utf8_decode($lista['nome_sub'])?></option>
							<?php } ?>
						</select>

				</div>
				
				<div><input class="btn" type="submit" name="btnsalvar" value="salvar">
				<input class="btn" type="submit" name="btnvolts" value="voltar"> </div>
			</section>	
		</form>
			
		
		
			<!-- fazer a lista e excluir e editar-->
			<?php 
				$sql = "SELECT tblfilmes.* , tblcategoria.* , tblsub.* FROM tblfilmes 
				INNER JOIN tblcategoria on tblfilmes.fk_cat = tblcategoria.id INNER JOIN tblsub on tblcategoria.id = tblsub.idCat ; 
				";
				//$sql = "SELECT * FROM tblfilmes;";
				$select=mysql_query($sql);
				while($lista=mysql_fetch_array($select)){
					
					
			?>
			<section>
				<table class="tbluser" > 
						
							<tr>
								<td><img class="imgtamanho" src="../arquivos/<?php echo ($lista['foto'])?>"></td>
							</tr>
							<tr>
								<td> Nome: <?php echo ($lista['nome_filmes'])?> </td>
							</tr>
							<tr>
								<td> 
									Descrição:<?php echo ($lista['descricao'])?>
								</td>
							</tr>
							<tr>
								<td> Preço: <?php echo ($lista['preco'])?></td>
							</tr>
							<tr>
								<td> Categoria: <?php echo ($lista['nome_cat'])?></td>
							</tr>
							<tr>
								<td> Sub-Categoria: <?php echo ($lista['nome_sub'])?></td>
							</tr>
							<tr>
								<td>
									<a href="home.php?modo=excluir&codigo=<?php echo $lista['id'];?>" excluir ><img src="imagens/cog_delete.png"></a> |
									<a href="editarconteudo.php?modo=editar&codigo=<?php echo $lista['id'];?>"><img src="imagens/cog_edit.png"></a> 
								</td>
							</tr>
								
							
						
				</table>
						
			</section>
			<?php } ?>
		
	
			
		
		<footer>
			desenvolvido por ellen
		</footer>
	</section>
	</body>
</html>