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
  <link rel="stylesheet" 
          href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


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


<label>Login</label>
	<input type="text" name="login" placeholder="Digite seu login" required>

  <!-- <i class="fa-solid fa-key"></i> -->
  
	
  <label>Senha</label>
  <p>
    <input type="password" id = "senha" name="senha" placeholder="Digite sua Senha" required/>	
    <i style="margin-left: -30px;cursor: pointer; " class="bi bi-eye-slash" id="togglePassword"></i>
  </p>
  

<div class="bntlogin">
<button id="bntlogin1">Login In</button>
<!-- <button id="bntlogin2">Sign Up</button> -->
</div>


<a id="esqueceu" href="#">Esqueceu sua senha? <span style="color:red">Clique aqui</span></a>

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
        // inicia a sessão
        session_start();
        // guarda na sessão o nome do usuário
        $_SESSION["logged_user"] = $rows[0]['nome'];
        // guarda o conjunto de páginas que o usuário tem acesso
        $sql = 'SELECT p.nome, p.link FROM pagina p join perfil_pagina pp ON (idPagina=fkPagina) join (usuario u) on u.fkPerfil = pp.fkPerfil WHERE idUsuario = '. $rows[0]['idUsuario'];
        $result = $pdo->query($sql);
        $rows = $result->fetchAll();
        foreach($rows as $row){
          echo $row;
        }
        $_SESSION["pages"] = $rows;


    }
    Banco::desconectar();
    header("Location: home.php");
}
?>