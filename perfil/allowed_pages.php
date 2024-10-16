<?php
require '../banco.php';
class Pagina {
    public $idPagina;
    public $nome;
}
function compare_objects($obj_a, $obj_b) {
    return $obj_a->idPagina - $obj_b->idPagina;
}
// trata a requisição
if(!empty($_GET['q']))
{
    $q = intval($_GET['q']);

    $pdo = Banco::conectar();
    $sql_allowedPages = 'SELECT p.nome,p.idPagina FROM `perfil_pagina` inner JOIN pagina p on fkPagina=idPagina where fkPerfil = '.$q.' order by fkPagina';
    $sql_allPages = 'SELECT p.nome, p.idPagina FROM pagina p order by p.idPagina';
    
    $result_allowedPages = $pdo->query($sql_allowedPages);
    $result_allPages = $pdo->query($sql_allPages);

    $rows_all = $result_allPages->fetchAll(PDO::FETCH_CLASS,'Pagina');
    
    $rows_allowed = $result_allowedPages->fetchAll(PDO::FETCH_CLASS,'Pagina');
    
    $not_allowed_pages = array_udiff($rows_all,$rows_allowed,'compare_objects');
    echo '<h3 >Páginas autorizadas</h3>';
    foreach($rows_allowed as $row){
        echo '<div class="form-check">';
        echo '<input class="form-check-input" type="checkbox" value="" id="flexCheck"'.$row->idPagina.'" checked>';
        echo '<label class="form-check-label" for="flexCheck"'.$row->idPagina.'">';
        echo $row->nome;
        echo '</label>';
        echo '</div>';
    }
    foreach($not_allowed_pages as $row){
        echo '<div class="form-check">';
        echo '<input class="form-check-input" type="checkbox" value="" id="flexCheck"'.$row->idPagina.'">';
        echo '<label class="form-check-label" for="flexCheck"'.$row->idPagina.'">';
        echo $row->nome;
        echo '</label>';
        echo '</div>';
    }
Banco::desconectar();

    
}
                
                


?>