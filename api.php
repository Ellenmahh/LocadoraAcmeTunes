<?php
$conexao=mysql_connect('localhost','root','961301');
mysql_select_db('dbacmetunes');

$sql="select f.id, f.nome, f.descricao, f.foto,f.preco, c.nome as categoria, s.nome as subcategoria from tblfilmes f
	inner join tblcategoria c on c.id = f.fk_cat
    inner join tblsub s on s.id = f.fk_sub
;";

$select=mysql_query($sql);
$listafilmes = array();

while($rs=mysql_fetch_array($select)){
    
    $listafilmes [] = array(
        'id' => $rs['id'],
        'nome'=> $rs['nome'],
        'descricao'=>$rs['descricao'],
        'imagem'=> $rs['foto'],
        'categoria' => $rs['categoria'],
        'sub_categoria' => $rs['subcategoria'],
        'preco' => $rs['preco']
    
    );
}
 echo json_encode($listafilmes);

?>