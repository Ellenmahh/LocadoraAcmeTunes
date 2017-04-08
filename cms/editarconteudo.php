<?php
require_once('moduloProjeto.php');

$id=(int)$_GET['codigo'];
$sql='SELECT f.id, f.foto, f.descricao, f.preco, f.nome from tblfilmes as f WHERE f.id = ' . $id;
$resultado = mysql_query($sql);
$valores = mysql_fetch_assoc($resultado);

$nome = $valores['nome'];
$descricao = $valores['descricao'];
$preco = $valores['preco'];
$foto = $valores['foto'];

if(isset($_POST['btnsalvar'])){
	$codigo = (int) $_GET['codigo'];
	$nome = $_POST['txtnome'];
	$descricao = $_POST['txtdescricao'];
	$preco = $_POST['txtpreco'];
	if($_FILES['flefoto']['error'] == 0) {            		
			$uploaddir = "../arquivos/"; 
			$nome_arq = basename($_FILES['flefoto']['name']);
			$temp_name = $_FILES['flefoto']['tmp_name'];
			$uploadfile = $uploaddir . $nome_arq;
			$sql="UPDATE tblfilmes SET foto = '".$nome_arq."', nome = '".$nome."', descricao = '".$descricao."', preco = ".$preco." WHERE id = ".$codigo;
			move_uploaded_file($temp_name, $uploadfile );
	}else{
		
			$sql="UPDATE tblfilmes SET nome = '".$nome."', descricao = '".$descricao."', preco = ".$preco." WHERE id = ".$codigo;
	}
			mysql_query($sql);
			header('location:home.php');
	

if(isset($_POST['btnvolts'])){
	header('location:home.php');
}
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
		<form name="frmEditar" method="post" action="editarconteudo.php?codigo=<?php echo $id;?>" enctype="multipart/form-data">	
			<section>
				<table class="tbluser" > 
							<tr>
								<td>Escolha a Foto: <input type="file" name="flefoto"></td>
							</tr>
						
							<tr>
								<td>
									<img src="../arquivos/<?php echo ($foto)?>">
								</td>
							</tr>
						
							<tr>
								<td> Nome:<input type="text" name="txtnome" value="<?php echo $nome;?>"> </td>
							</tr>
							<tr>
								<td> Descrição:<textarea name="txtdescricao" cols="50" rows="7"><?php echo $descricao?></textarea></td>
							</tr>
							<tr>
								<td> Preço: <input type="text" name="txtpreco" value="<?php echo $preco; ?>"> </td>
							
							</tr>
							
							<tr>
								<td><input class="btn" type="submit" name="btnsalvar" value="Atualizar"> 
                                    
								<input class="btn" type="submit" name="btnvolts" value="voltar"></td>
							</tr>
							
						
				</table>
						
			</section>			
		</form>
		<footer>
			desenvolvido por ellen
		</footer>
	</section>
	</body>
</html>


