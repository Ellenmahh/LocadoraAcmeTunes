<?php
	require_once('moduloProjeto.php');
	// if ... codigo existir, $cod se torna código blablabla
	$cod = (isset($_GET['codigo'])) ? $_GET['codigo'] : null;
	$data = "";
	$direcao = "";
	$elenco = "";
	$nacionalidade = "";
	// modo excluir
	$modo = "";
	if(isset($_GET['modo'])){
		$modo=$_GET['modo'];
		if($modo=='excluir'){
			$cod=$_GET['codigo'];
			$delete='delete from tblfilmemes WHERE id='.$cod;
			mysql_query($delete);
			
	// modo editar
		} elseif($modo == 'editar') {
			$cod = (int) $_GET['codigo'];
			$sql = "SELECT * FROM tblfilmemes WHERE id = " . $cod;
			$resultado = mysql_query($sql);
			$dados = mysql_fetch_assoc($resultado);
			$data = $dados["dataLancamento"];
			$direcao = $dados["direcao"];
			$elenco = $dados["elenco"];
			$nacionalidade = $dados["nacionalidade"];
		}		
	}
	
    if(isset($_POST["btnsalvar"])) {		
        $data = $_POST["txtdata"];
        $direcao = $_POST["txtdirecao"];
        $elenco = $_POST["txtelenco"];
        $nacionalidade = $_POST["txtnacionalidade"];
		$genero = $_POST["genero"];
		
        $sql = "INSERT INTO tblfilmemes(dataLancamento, direcao, elenco, nacionalidade,foto,fk_genero) VALUES('" . $data . "', '" . $direcao . "', '" . $elenco . "', '" . $nacionalidade . "', 
				'" . $nome_arq . "', ".$genero.")";	
				
				
				
		if( $_FILES["flefoto"]["error"] == 0 ) {
			$upload_dir = "../arquivos/";
			$nome_arq = basename($_FILES["flefoto"]["name"]);
			$tmp_name = $_FILES["flefoto"]["tmp_name"];
			
			$upload = $upload_dir . $nome_arq;
			
			move_uploaded_file($tmp_name, $upload);			

			
		// se editar foto 
			if( $modo == "editar" ) {
				$sql = "UPDATE tblfilmemes SET dataLancamento = '" . $data . "', direcao = '" . $direcao . "', elenco = '" . $elenco . "', nacionalidade = '" . $nacionalidade . "', foto = '" . $nome_arq . "' WHERE id = " . $cod;
			} else {
				$sql = "INSERT INTO tblfilmemes(dataLancamento, direcao, elenco, nacionalidade,foto,fk_genero) VALUES('" . $data . "', '" . $direcao . "', '" . $elenco . "', '" . $nacionalidade . "', 
				'" . $nome_arq . "', ".$genero.")";			
			} 
		}
        	
		
        mysql_query($sql);
		header('location:filmeMes.php');
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
		<form method="post" enctype="multipart/form-data" action="filmeMes.php<?php echo (isset($cod))? "?modo=editar&codigo=" . $cod : ""; ?>">
			<table>
				<tr>
					
					<td><input type="file" name="flefoto" /></td>
				<tr/>
			
				<tr>
					<td>Data de lançamento:</td>
					<td><input type="text" name="txtdata" value="<?php echo $data; ?>" /></td>
				</tr>
				<tr>
					<td>Direção:</td>
					<td><input type="text" name="txtdirecao" value="<?php echo $direcao; ?>" /></td>
				</tr>
				<tr>
					<td>Elenco:</td>
					<td><input type="text" name="txtelenco" value="<?php echo $elenco; ?>" /></td>
				</tr>
				<td> Genero: 
						<select name="genero">
							<?php $sql ="SELECT * FROM tblgenero" ;
									$generos = mysql_query($sql,$conexao);
							?>
							<?php while($lista = mysql_fetch_assoc($generos)){?>
								<option value= "<?php echo($lista['id']);?>" <?php echo ($generos == $lista['id'])? "selected" : ""; ?> > <?php echo ($lista['genero'])?>
								</option>
							<?php } ?>
						</select>
					</td>
				<tr>
					<td>Nacionalidade:</td>
					<td><input type="text" name="txtnacionalidade" value="<?php echo $nacionalidade; ?>" /></td>
				</tr>
				<tr>            
					
					<td><input class="btn" type="submit" name="btnsalvar" value="Salvar"> 
						<input class="btn" type="submit" name="btnvolts" value="voltar"> 
					</td>
							
				</tr>		
			</table>
		</form>
	
	<section id="conteudo">
	
	<table>
		 
		
			<?php
				$sql = "SELECT f.id,f.dataLancamento,f.direcao,f.elenco,f.nacionalidade,f.foto,g.genero from tblfilmemes as f,tblgenero as g  WHERE f.fk_genero = g.id ";
				
				$select= mysql_query($sql);
				while($rs=mysql_fetch_assoc($select)){
			?> 
		<tr>
			<td> <img src= "../arquivos/<?php echo $rs['foto'];?>"></td>
		</tr>
		<tr>
			<td> Data Lançamento: <?php echo $rs['dataLancamento'];?> </td>
		</tr>
		<tr>
			<td> Direção: <?php echo $rs['direcao'];?> </td>
		</tr>
		<tr>
			<td>Elenco: <?php echo $rs['elenco'];?> </td>
		</tr>
		<tr>
			<td> Nacionalidade: <?php echo $rs['nacionalidade'];?> </td>
		</tr>
		<tr>
			<td> Genero: <?php echo $rs['genero'];?> </td>
		</tr>
		<tr>
			<td>
				<a href="filmeMes.php?modo=excluir&codigo=<?php echo $rs['id'];?>" excluir ><img src="imagens/cog_delete.png"></a> |
				<a href="filmeMes.php?modo=editar&codigo=<?php echo $rs['id'];?>"><img src="imagens/cog_edit.png"></a> 
			</td>
		</tr>
				<?php } ?>
	</table>
	</section>
	</section>	
</body>
</html>