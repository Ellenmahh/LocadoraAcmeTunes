<?php
    require_once('moduloProjeto.php');
		
    $id = (int) $_GET['codigo'];
    $sql = 'SELECT d.id,d.principal, d.descricao from tbldestaque as d WHERE d.id = ' . $id;
    $resultado = mysql_query($sql);
    $valores = mysql_fetch_assoc($resultado);
    
    $principal = $valores['principal'];
    $descricao = $valores['descricao'];

    if(isset($_POST['btnatualizar'])) {  
		$codigo = (int) $_GET['codigo'];
		// = (condicao)? verdadeiro : falso. se txtdescricao existir, cai no verdadeiro
        $formDescricao = ( isset($_POST['txtdescricao']))? $_POST['txtdescricao'] : "";                
		//ERROR == 0 SIGNIFICA QUE FOI SELECIONADO UM ARQUIVO, ISSO OBRIGA O USUARIO A FAZER UPLOAD DE UMA FOTO		
        if($_FILES['flefoto']['error'] == 0) {            		
			$uploaddir = "../arquivos/"; 
			
			$nome_arq = basename($_FILES['flefoto']['name']);
			$temp_name = $_FILES['flefoto']['tmp_name'];
			$uploadfile = $uploaddir . $nome_arq;
			$sql="UPDATE tbldestaque SET principal = '" . $nome_arq . "', descricao = '" . $formDescricao . "' WHERE id = ".$codigo;
			move_uploaded_file($temp_name, $uploadfile );
			
			//armazena no banco como 'arquivos/ pois a pagina que carregará a imagem nao esta na pasta do cms, então n é necessario voltar uma pasta
        }
		else {
			$sql="UPDATE tbldestaque SET descricao = '" . $formDescricao . "' WHERE id = ".$codigo;
		}
			
		mysql_query($sql); //só executa o sql aqui \o/
			
		header('location:destaque.php');

        
        
    }
	if(isset($_POST['btnvolts'])){
	header('location:destaque.php');
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
		<form name="frmEditar" method="post" action="editardestaque.php?codigo=<?php echo $id;?>" enctype="multipart/form-data">
            <section id="conteudo">
                <table class="tblusuario">
                    <tr>
                        <td>Escolha a Foto: <input type="file" name="flefoto"></td>
                    </tr>
                    <tr>
                        <td><img width="900" src="../arquivos/<?php echo $principal; ?>"></td>
                    </tr>
                    <tr>
                        <td>Descrição:
						<textarea name="txtdescricao"> <?php echo $descricao; ?> </textarea></td>
                    </tr>
                    <tr>
                        <td><input class="btn" type="submit" name="btnatualizar" value="Atualizar"> 
						
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