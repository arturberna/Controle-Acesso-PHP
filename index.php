<?php
// remove all session variables
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Controle de Acesso</title>
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>
<body>

<div class="caixatexto">

<h1>Lorem<br><small>Ipsum</small></h1>
<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec mi dignissim, laoreet nunc at, fringilla augue. Nullam venenatis vulputate consectetur. Suspendisse nisl felis.</p>

<div class="caixabnt">

<a href="#"><button id="bnt1">Conheça</button></a>
<a href="#"><button id="bnt2">Sobre</button></a>

</div>
</div>


<div class="formulario">

<form method="post">

<h3>Faça login com sua conta</h3>

<div class="form-fields">
  <label>Login</label>
  <p>
    <i class="bi bi-person ico-pos" ></i>
    <input type="text" name="login" placeholder="Digite seu login" required>
  </p>

  <label>Senha</label>
  <p>
    <i class="bi bi-key ico-pos" ></i>
    <input type="password" id = "senha" name="senha" placeholder="Digite sua Senha" required/>	
    <i style="margin-left: -30px;cursor: pointer; " class="bi bi-eye-slash" id="togglePassword"></i>
  </p>
  

  <div class="bntlogin">
    <button id="bntlogin1">Login</button>
  </div>

  <a id="esqueceu" href="#">Esqueceu sua senha? <span style="color:red">Clique aqui</span></a>
</div>

</form>	

</div>	





  <script src="./assets/js/login.js" ></script>
</body>
</html>
<?php
    if(!empty($_POST)){
   
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    
    include 'banco.php';
    $pdo = Banco::conectar();
    // verifica se o usuário está no BD
    $sql = 'SELECT * FROM usuario u where u.login = "'.$login.'" and u.senha = "'.$senha .'"' ;
    $result = $pdo->query($sql);
    $rows = $result->fetchAll();
    if(sizeof($rows)==1){
      // se houver 1 resultado...
        // inicia a sessão
        session_start();
        // guarda na sessão o nome do usuário
        $_SESSION["logged_user"] = $rows[0]['nome'];
        // recupera do BD o conjunto de páginas que o usuário tem acesso
        $sql = 'SELECT p.nome, p.link FROM pagina p join perfil_pagina pp ON (idPagina=fkPagina) join (usuario u) on u.fkPerfil = pp.fkPerfil WHERE idUsuario = '. $rows[0]['idUsuario'];
        $result = $pdo->query($sql);
        $rows = $result->fetchAll();
        // guarda na sessão o conjunto de páginas que o usuário tem acesso
        $_SESSION["pages"] = $rows;


    }
    Banco::desconectar();
    header("Location: home.php");
}
?>