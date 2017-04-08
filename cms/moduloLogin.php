<?php 
//conexao com o banco de dados
$con=mysql_connect('localhost','root','961301');
mysql_select_db('dbacmetunes');


?>

<table class="opDeLogin">
			<tr>
				<td class="adm"><a href="admconteudo.php"><img  src="imagens/adm.png"></td>
                <td class="adm"><a href="faleconosco.php"><img src="imagens/adm2.png" ></td>
				<td class="adm"><a href="admprodutos.php"><img src="imagens/adm3.png"></td>
				<td class="adm"><a href="admusuarios.php"><img src="imagens/adm4.png"></td>
				<td class="bemvindo">Bem Vindo,  
					<?php
                     
					
								echo $_SESSION['Nome'];
							
					?>
				</td>
			</tr>
</table>
