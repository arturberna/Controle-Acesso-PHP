<?php
require '../banco.php';
echo '<h3 > em save perfil</h3>';
if(!empty($_GET))
    {
       //pega os dados do formulário utilizando o método post
        $nome = $_GET['nome'];
        $descricao = $_GET['descricao'];
       
       
        //Inserindo no Banco perfil:
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $sql = "INSERT INTO perfil (nome, descricao) VALUES(?,?)";
            // $q = $pdo->prepare($sql);
            // $q->execute(array($nome,$descricao));
        //Inserindo no Banco páginas - perfil:
            Banco::desconectar();
            
           }

?>