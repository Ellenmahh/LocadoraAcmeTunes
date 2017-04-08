<?php
require_once('moduloProjeto.php');
$resultado ="";

if(isset($_GET['ok'])){
	
		$nome=($_GET['nome']);
		$senha=($_GET['senha']);
		$nivel=($_GET['id']);

		$sql="INSERT INTO tblusuarios (usuario,senha,fk_idNivel)VALUES ('".$nome."','".$senha."','".$nivel."')";
		$resultado = mysql_query($sql,$conexao);
		header('location:admusuarios.php');
}


if(isset($_GET['btnvolts'])){
	header('location:admusuarios.php');
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
		
		<section id="conteudo">
		
			<form name="adicionarUser" method="get" action="adcUser.php">
		
				<table>
					<tr>
						<td>Nome:</td>
						<td> <input type="text" name="nome" ></td>
					</tr>
					<tr>
						<td>Senha:</td>
						<td> <input type="text" name="senha"></td>
					</tr>
					<tr>
						<td>Tipo de Conta:</td>
						<td> 
							<select name="id">
							<?php $niveissql ="SELECT * FROM tblnivel" ;
									$niveis = mysql_query($niveissql,$conexao);
							?>
							<?php while($lista = mysql_fetch_assoc($niveis)){?>
								<option value= "<?php echo($lista['idNivel']);?>"> <?php echo ($lista['nivel'])?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<input class="btn" type="submit" name="ok" value="cadastrar">
							<input class="btn" type="submit" name="btnvolts" value="voltar"> 
						</td>
					</tr>
				</table>
		</form>
		
		
		</section>
		<footer>
			desenvolvido por ellen
		</footer>
	</section>
	</body>
</html>