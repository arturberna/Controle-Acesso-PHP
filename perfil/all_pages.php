<?php
require '../banco.php';
class Pagina {
    public $idPagina;
    public $nome;
}
// trata a requisição

    $pdo = Banco::conectar();
    
    $sql_allPages = 'SELECT p.nome, p.idPagina FROM pagina p order by p.idPagina';
    
    
    $result_allPages = $pdo->query($sql_allPages);

    $rows_all = $result_allPages->fetchAll(PDO::FETCH_CLASS,'Pagina');
    
    
    echo '<h3 >Adicione páginas ao perfil</h3>';
    foreach($rows_all as $row){
        echo '<div class="form-check">';
        echo '<input class="form-check-input" type="checkbox" value="" id="flexCheck"'.$row->idPagina.'">';
        echo '<label class="form-check-label" for="flexCheck"'.$row->idPagina.'">';
        echo $row->nome;
        echo '</label>';
        echo '</div>';
    }
    
Banco::desconectar();

    

                
                


?>