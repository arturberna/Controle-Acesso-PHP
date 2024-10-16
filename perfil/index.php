<?php include "../menubar.php"; ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Gerenciamento de Perfis</title>
  
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel="stylesheet" href="./table_style.css">

</head>
<body>

<div class="container">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2>Gerenciamento de <b>Perfis</b></h2>
        </div>
        <div class="col-sm-6">
          <a data-bs-target="#addPerfil" class="btn btn-success" data-bs-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Novo Perfil</span></a>
          <a data-bs-target="#deleteEmployeeModal" class="btn btn-danger" data-bs-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Apagar</span></a>
        </div>
      </div>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>
            <span class="custom-checkbox">
			    <input type="checkbox" id="selectAll">
				<label for="selectAll"></label>
			</span>
          </th>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Páginas com acesso</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
      <?php
        include '../banco.php';
        $pdo = Banco::conectar();
        $sql = 'SELECT * FROM perfil ORDER BY idPerfil';

        foreach($pdo->query($sql)as $row)
        {
            echo '<tr id="tr_'. $row['idPerfil'] .'">';
            echo '<td> 
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                        <label for="checkbox1"></label>
                    </span>
                </td>';
            echo '<td id="row_name_'. $row['idPerfil'] .'">'. $row['nome'] . '</td>';
            echo '<td id="row_desc_'. $row['idPerfil'] .'">'. $row['descricao'] . '</td>';
            // echo '<td>'. $row['idPerfil'] . '</td>';
            echo '<td> <button type="button" class="btn btn-primary">
  Páginas <span class="badge bg-secondary">'. $row['idPerfil'] .'</span>
</button> </td>';
            echo '<td>
                    <a data-bs-target="#editPerfil" class="edit" data-bs-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a data-bs-target="#deleteEmployeeModal" class="delete" data-bs-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                 </td>';
        }
        Banco::desconectar();
        ?>
      </tbody>
    </table>
    <!-- <div class="clearfix">
      <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
      <ul class="pagination">
        <li class="page-item disabled"><a href="#">Previous</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link">Next</a></li>
      </ul>
    </div> -->
  </div>
</div>
<!-- Modal Adicionar -->
<div id="addPerfil" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form >
        <div class="modal-header">
          <h4 class="modal-title">Adicionar Perfil</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nome</label>
            <input name="AddNome" id="AddName" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Descrição</label>
            <input name="AddDescricao" id="AddDesc" type="text" class="form-control" required>
          </div>
          <div id="allPages" class="form-group"></div>
          <div id="result" class="form-group"></div>
          
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-light" data-bs-dismiss="modal" value="Cancelar">
          <a href="#" id="btnAdd" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Adicionar</span></a>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal HTML -->
<div id="editPerfil" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Editar Perfil</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nome</label>
            <input id="modal-input-name" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Descrição</label>
            <input id="modal-input-desc" type="text" class="form-control" required>
          </div>
          <div id="allowedPages" class="form-group">
            
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-light" data-bs-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-info" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade" tabindex="-1">>
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Delete Employee</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete these Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-light" data-bs-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>
<script src="./script.js"></script>
</body>
</html>
