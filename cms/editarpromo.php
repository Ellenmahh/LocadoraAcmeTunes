<?php
require_once('moduloProjeto.php');

$id=(int)$_GET['codigo'];
$sql='SELECT f.id, f.foto, f.nome, f.de, f.por FROM tblpromocoes as f WHERE f.id = ' . $id;
$resultado = mysql_query($sql);
$valores = mysql_fetch_assoc($resultado);

$nome = $valores['nome'];
$de = $valores['de'];
$por = $valores['por'];
$foto = $valores['foto'];

if(isset($_POST['btnsalvar'])){
	$codigo = (int) $_GET['codigo'];
	$nome = $_POST['txtnome'];
	$de = (double) $_POST['txtpreco'];
	$por = (double) $_POST['txtnovopreco'];
	if($_FILES['flefoto']['error'] == 0) {            		
			$uploaddir = "../arquivos/"; 
			
			$nome_arq = basename($_FILES['flefoto']['name']);
			$temp_name = $_FILES['flefoto']['tmp_name'];
			$uploadfile = $uploaddir . $nome_arq;
			
			$sql="UPDATE tblpromocoes SET foto = '".$nome_arq."', nome = '".$nome."', de = ".$de.", por = ".$por." WHERE id = ".$codigo;
			move_uploaded_file($temp_name, $uploadfile );
	}else{
		
			$sql="UPDATE tblpromocoes SET nome = '".$nome."', de = ".$de.", por = ".$por." WHERE id = ".$codigo;
	}
			mysql_query($sql);
			header('location:promo.php');
	
	
}

if(isset($_POST['btnvolts'])){
	header('location:promo.php');
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
		<form name="frmEditar" method="post" action="editarpromo.php?codigo=<?php echo $id;?>" enctype="multipart/form-data">	
			<section>
				<table class="tbluser" > 
							<tr>
								<td>Escolha a Foto: <input type="file" name="flefoto"></td>
							</tr>
						
							<tr>
								<td>
									<img  class="imgtamanho" src="../arquivos/<?php echo ($foto)?>">
								</td>
							</tr>
						
							<tr>
								<td> Nome:<input type="text" name="txtnome" value="<?php echo ($nome); ?>"> </td>
							</tr>
							<tr>
								<td> De: <input type="text" name="txtpreco" value="<?php echo ($de); ?>"> </td>
							</tr>
							<tr>
								<td> Por: <input type="text" name="txtnovopreco" value="<?php echo ($por); ?>"> </td>
							
							</tr>
							
							<tr>
								<td><input class="btn" type="submit" name="btnsalvar" value="Atualizar"> 
									<input class="btn" type="submit" name="btnvolts" value="voltar"> 
								</td>
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


