<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="./assets/css/colors.css">
  <title>Adicionar Usuário</title>
</head>

<body>
<?php include "../menubar.php"; ?>
    <div class="container">
        <div clas="span10 offset1">
          <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Usuário </h3>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="create.php" method="post">

                <div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
                    <label class="control-label">Nome</label>
                    <div class="controls">
                        <input size="50" class="form-control" name="nome" type="text" placeholder="Nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
                        <?php if(!empty($nomeErro)): ?>
                            <span class="help-inline"><?php echo $nomeErro;?></span>
                            <?php endif;?>
                    </div>
                </div>

                <div class="control-group <?php echo !empty($loginErro)?'error ': '';?>">
                    <label class="control-label">Login</label>
                    <div class="controls">
                        <input size="80" class="form-control" name="login" type="text" placeholder="Login" required="" value="<?php echo !empty($login)?$login: '';?>">
                        
                    </div>
                </div>

                <div class="control-group <?php echo !empty($senhaErro)?'error ': '';?>">
                    <label class="control-label">Senha</label>
                    <div class="controls">
                        <input size="35" class="form-control" name="senha" type="password" placeholder="Senha" required="" value="<?php echo !empty($senha)?$senha: '';?>">
                        <?php if(!empty($senhaErro)): ?>
                            <span class="help-inline"><?php echo $senhaErro;?></span>
                            <?php endif;?>
                    </div>
                </div>
               
                <div class="form-actions">
                    <br/>

                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="index.php" type="btn" class="btn btn-primary">Voltar</a>

                </div>
            </form>
          </div>
        </div>
        </div>
    </div>
    </div>
   
</body>

</html>

<?php
    require '../banco.php';
    if(!empty($_POST))
    {
       //pega os dados do formulário utilizando o método post
        $nome = $_POST['nome'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        
        //Inserindo no Banco:
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuario (nome, login, senha) VALUES(?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome,$login,$senha));
            Banco::desconectar();
            header("Location: index.php");
           }
?>
