<?php
	session_start();
	$botao="salvar";
// definir variavel vazia para não dar erros no inio codigo
	$nome="";
	$telefone="";
	$celular="";
	$email="";
	$obs="";
    //conectando com o db MySQL usando o servidor, user e senha;
    //especificando abaixo o database;
	$conexao=mysql_connect('localhost', 'root', 'bcd127');
	mysql_select_db('dbcontatos20162');
	
	
	// se existir a variavel modo na url, que passa a existir apenas qndo o usuario clicar
	//resgatar variavel modo,codigo 
	if (isset($_GET['modo'])){
		$modo=$_GET['modo'];
		//se quando a variavel modo for clicada aparecer a palavra excluir ou editar
		if($modo=='excluir'){
			//resgatar a variavel codigo para saber qual o user clicou
			$cod=$_GET['codigo'];
			//codigo para apagar do BH
			$sql="delete from tblcontatos where codigo = ". $cod;
			//para executar esse codigo no BH
			mysql_query($sql);
			// para apagar oq fica na url depois de clicar em excluir
			header('location:05.08.php');
		}elseif($modo=='editar'){
			$cod=$_GET['codigo'];
			// guardar o valor de $cod em uma variavel de sessão, pois ao atualizar a pagina precisamos recuperar essa informação.
			$_SESSION['coditem']= $cod;
			
			$cod=$_GET['codigo'];
			//codigo para ver os registros da tabela, where para especificar o que foi clicado
			$sql = "select * from tblcontatos where codigo = ".$cod;
			// guardar o retorno do codigo na variavel $select
			$select = mysql_query($sql);
			//variavel rs recebe variavel select e guarda nela os itens em variaveis locais, separando umas das outras
			// converte o resultado do BD em matriz
			$rs=mysql_fetch_array($select);
			// guardamos os dados localizados em variaveis locais
			$nome=$rs['nome'];
			$telefone=$rs['telefone'];
			$celular=$rs['celular'];
			$email=$rs['email'];
			$obs=$rs['obs'];
			//essa variavel foi criada para alterar o value do botão salvar, para usarmos o codigo de atualizar o registro no BD
			$botao="atualizar";
		}	
	}
	if(isset($_POST['btnSalvar'])){

        //guarda os valores digitados pelo user nas respectivas variaveis
        $nome=$_POST['txtNome'];
        $telefone=$_POST['txtTelefone'];
        $celular=$_POST['txtCelular'];
        $email=$_POST['txtEmail'];
        $obs=$_POST['txtObservacao'];
		
		if($_POST['btnSalvar']=="salvar"){
			//Essa linha insere os dados no banco de dados
			$sql = "INSERT INTO tblcontatos (nome,telefone,celular,email,obs) VALUES ('".$nome."','".$telefone."','".$celular."','".$email."','".$obs."')";
		}elseif($_POST['btnSalvar']=="atualizar"){
			$sql="update tblcontatos set nome='".$nome."',telefone='".$telefone."',celular='".$celular."',email='".$email."',obs='".$obs."' where codigo= ".$_SESSION['coditem'];
			
		}
        //executando o script no banco de dados
        mysql_query($sql);

        //permite redirecionar para uma nova página.
        //Limpa a URL quando usamo o método GET 
        //Limpa as variáveis quando usamos o método POST
        header('location:05.08.php');
    }

?>

<html>
    <head>
       
        <title>BD</title>
    </head>
    
    <body>
    	<form name="frmCadastro" method="post" action="05.08.php">
    	<div class="divPrincipal">
        	<h3 class="titulo">Cadastro de Contatos</h3>
            <table id="tblGeral">
            	<tr>
                	<td class="tituloCaixas">Nome:</td>
                    <td><input type="text" name="txtNome" value="<?php echo($nome) ?>" required placeholder="Digite seu nome"></td>
                </tr>
                <tr>
                	<td class="tituloCaixas">Telefone:</td>
                    <td><input type="text" name="txtTelefone" value="<?php echo($telefone) ?>" placeholder="Digite seu Telefone"></td>
                </tr>
                <tr>
                	<td class="tituloCaixas">Celular:</td>
                    <td><input type="text" name="txtCelular" value="<?php echo($celular) ?>" required placeholder="Digite seu Celular"></td>
                </tr>
                <tr>
                	<td class="tituloCaixas">Email:</td>
                    <td><input type="email" name="txtEmail" value="<?php echo($email) ?>" required placeholder="Digite seu E-mail"></td>
                </tr>
                <tr>
                	<td class="tituloCaixas">Obs:</td>
                    <td><textarea name="txtObservacao" cols="30" rows="08" style="resize:none;" 
                       placeholder="Digite uma observação"> <?php echo($obs) ?></textarea></td>                    
                </tr>
         		<tr>
                	<td id="btnSalvar"><input type="submit" name="btnSalvar" value="<?php echo($botao)?>"></td>
                    <td><input type="reset" name="btnLimpar" value="Limpar"></td>
                </tr>
            </table>
        </div> 
        <div class="divPrincipal">
            <table>
            	<h3 class="titulo">Consulta de Contatos</h3>
                <table id="tblConsultaTitulos">
                	<tr>
                        <td class="nomeCaixas">
                            Nome
                        </td>
                        <td class="nomeCaixas">
                           Telefone
                        </td>
                        <td class="nomeCaixas">
                            Celular
                        </td>
                        <td class="nomeCaixas">
                            Email
                        </td>
                        <td class="nomeCaixas">
                           Opções
                        </td>
                	</tr>
                    <?php
                        // buscar os dados no banco de dados de forma decrescente
                        $sql="SELECT * FROM tblcontatos ORDER BY codigo DESC";
						//executa e guarda na variavel
                        $select=mysql_query($sql);
						//transforma o resultado em uma um matriz e guardar dentro da variavel rs
                        $cont=0;
                        while($rs=mysql_fetch_array($select)){

                            if($cont%2==0){
                               $cor="#007d7d";

                            }else{
                               $cor=" #009999";
                            }
                    ?>
                    <tr  bgcolor="<?php echo($cor) ?>">
                        <td class="camposExibir"><?php echo($rs["nome"]) ?></td>
                        <td class="camposExibir"><?php echo($rs["telefone"]) ?></td>
                        <td class="camposExibir"><?php echo($rs["celular"]) ?></td>
                        <td class="camposExibir"><?php echo($rs["email"]) ?></td>
						<!-- clique da palavra excluir-->
						<!-- A variavel modo serve para diferenciar a opção q o usuario ia clicar.
						A variavel codigo sempre guarda o codigo do registro atual, que esta no php, e que no BH é a ordem que os registro estão.-->
						<td><a href="05.08.php?modo=excluir&codigo=<?php echo ($rs['codigo'])?>">Excluir</a> | 
						<a href="05.08.php?modo=editar&codigo=<?php echo ($rs['codigo'])?>">Editar</a></td>
						
                        
                    </tr>
                    <?php
                            $cont=$cont+1;
                        }
                    ?>
                </table>
            </table>            
        </div>    	
    </body>
</html>
