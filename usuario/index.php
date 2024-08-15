<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  

    <title>Controle de Usuários</title>
</head>

<body>
        <div class="container">
          <div class="jumbotron">
            <div class="row">
                <h2>Gerenciamento de Usuários</h2>
            </div>
          </div>
            </br>
            <div class="row">
            <nav class="navbar navbar-expand-sm bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="javascript:void(0)">Usuário</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mynavbar">
                    
                    <form class="d-flex">
                        <input class="form-control me-2" type="text" placeholder="Search">
                        <button class="btn btn-primary" type="button">Search</button>
                    </form>
                    <a href="create.php" class="btn btn-success rounded-circle" data-toggle="tooltip" title="Adicionar!"> <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </nav>
                <!--  -->
                <!-- <p>
                    <a href="create.php" class="btn btn-success rounded-circle" data-toggle="tooltip" title="Adicionar!"> <i class="fa fa-plus"></i></a>
                </p> -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Login</th>
                            <th scope="col">Senha</th>
                            <th scope="col">Ações</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM usuario ORDER BY idUsuario DESC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
			                echo '<th scope="row">'. $row['idUsuario'] . '</th>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. $row['login'] . '</td>';
                            echo '<td>'. $row['senha'] . '</td>';
                            
                            echo '<td >';
                            echo '<a class=" text-primary"  data-toggle="tooltip" title="Info!" href="read.php?id='.$row['idUsuario'].'"> <i class="fa fa-info-circle"></i> </a>';
                            echo ' ';
                            echo '<a class=" text-info " data-toggle="tooltip" title="Atualizar!" href="update.php?id='.$row['idUsuario'].'"><i class="fa fa-refresh"></i> </a>';
                            echo ' ';
                            echo '<a class=" text-danger " data-toggle="tooltip" title="Remover!" href="delete.php?id='.$row['idUsuario'].'"><i class="fa fa-trash"></i> </a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
   
    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</body>

</html>
