<?php
require_once('moduloProjeto.php');

$id=(int)$_GET['codigo'];
$sql='SELECT u.id, u.usuario, u.senha,u.fk_idNivel from tblusuarios as u,tblnivel as n WHERE u.fk_idNivel = n.idNivel and u.id = '.$id;
$resultado = mysql_query($sql,$conexao);
$valores=mysql_fetch_assoc($resultado);
$nome = $valores['usuario'];
$senha = $valores['senha'];
$nivel = $valores['fk_idNivel'];

if(isset($_POST['btnsalvar'])){
	
	$formNome=$_POST['txtnome'];
	$formSenha=$_POST['txtsenha'];
	$formNivel=$_POST['nivel'];
	
	$sql="UPDATE tblusuarios SET usuario = '".$formNome."', senha = '".$formSenha."', fk_idNivel = ".$formNivel." WHERE id = ".$id;
	
	mysql_query($sql);
	header('location:admusuarios.php');
}

if(isset($_POST['btnvolts'])){
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
		<form name="frmEditar" method="post" action="editar.php?codigo=<?php echo $id;?>">
		<section id="conteudo">
		
			<table class="tblusuario">
				<tr>
					<td> Nome do Usuario:<input type="text" name="txtnome" value="<?php echo $nome;?>"></td>
				</tr>
				<tr>
					<td> Senha do Usuário:<input type="text" name="txtsenha" value="<?php echo $senha;?>"> </td>
				</tr>
				<tr>
					<td> Nivel: 
						<select name="nivel">
							<?php $niveissql ="SELECT * FROM tblnivel" ;
									$niveis = mysql_query($niveissql,$conexao);
							?>
							<?php while($lista = mysql_fetch_assoc($niveis)){?>
								<option value= "<?php echo($lista['idNivel']);?>" <?php echo ($nivel == $lista['idNivel'])? "selected" : ""; ?> > 
								<?php echo ($lista['nivel'])?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><input class="btn" type="submit" name="btnsalvar" value="SALVAR"> 
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