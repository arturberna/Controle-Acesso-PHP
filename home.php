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
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/foundation/5.5.0/css/foundation.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <!-- <link rel="stylesheet" href="./style.css"> -->
  

</head>
<body>

<!-- Top Menu bar Navigation -->
<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="#">Logo</a></h1>
    </li>

    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <ul class="right">
        <?php 
            if (! empty($_SESSION['pages'])){
                foreach($_SESSION["pages"] as $page){
                    echo '<li class="divider"></li>';
                    echo '<li><a href="'.$page["link"].'">'.$page["nome"].'</a></li>';
                }
            }
        ?>
      
      <li class="divider"></li>
      <?php
        if (! empty($_SESSION['logged_user'])){
            echo '<li><a href="#"><i class="fa fa-fw fa-user"></i>' .$_SESSION["logged_user"].'</a></li>';
        }
      ?>
      <li class="divider"></li>';
      <li><a href="./index.php">Sair</a></li>';
    </ul>
  </section>
</nav>


<section class="hero-unit">

  <div class="row">
    <div class="large-12 columns">
      <hgroup>
        <h1>Insira um texto de título</h1>
        <h4>Aqui uma pequena descrição...</h4>
        <h3>Aqui pode ser uma imagem, ou um conjunto de cards</h3>
      </hgroup>
    </div>
 </div>
</section>
</body>
</html>
