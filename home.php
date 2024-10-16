<?php
session_start();
if (empty($_SESSION['logged_user'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Controle de acesso </title>
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./assets/css/colors.css">
  

</head>
<body>
<div class="blue-green border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start text-large">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
          <i class="fa fa-fw fa-user"></i>
          Logo
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <?php 
              if (! empty($_SESSION['pages'])){
                  foreach($_SESSION["pages"] as $page){
                      echo '<li><a class="nav-link text-white" href="'.$page["link"].'">'.$page["nome"].'</a></li>';
                  }
              }
            ?>
           
          </ul>
          <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <?php
              if (! empty($_SESSION['logged_user'])){
                echo '<li><a class="dropdown-item" href="#">' .$_SESSION["logged_user"].'</a></li>';
              }
            ?>
            
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./index.php">Sair</a></li>
          </ul>
        </div>
        </div>
      </div>
    </div>


    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Insira um texto de título</h1>
        <p class="col-md-8 fs-4">Aqui pode ser uma imagem, um texto, ou outro tipo de componente.</p>
        <button class="btn custom-blue btn-lg" type="button">Um botão</button>
      </div>
    </div>

</body>
</html>
