
<?php

require 'conexao.php';
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title> Atacadão </title>
	<meta charset="UTF-8">
	<meta name="viewport", content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link  href="css/style.css" rel="stylesheet"/>
  <link  href="css/bootstrap.min.css" rel="stylesheet"/>
	<link  href="css/carrocel.css" rel="stylesheet"/>

</head>
<body>
      <?php

        if(isset($_POST['usuario_login']) && !empty($_POST['usuario_login']))  {
            $usuario = addslashes($_POST['usuario_login']);
            $senha = addslashes($_POST['senha_login']);

            $sql = $pdo->query("SELECT id, usuario, senha FROM usuarios WHERE usuario = '".$usuario."'");

            if ($sql->rowCount() > 0) {
              $ln = $sql->fetch();
              $id_user = $ln['id'];
              echo $id_user;
              $user_db = $ln['usuario'];
              echo $user_db;
              $pass_db = $ln['senha'];
              echo $pass_db;
              if(isset($usuario) && isset($senha)) {
                if($usuario == $user_db && $senha == $pass_db) {
                      $_SESSION['user'] = $id_user;
                      header("Location: index.php");
                      exit;
                }
              }  
            }else{
              echo "Usuario não encontrado!!";
            }      
        }
      ?>

     <div class="container divisor espaco-topo">
       <div class="row">

         <div class="col-md-12">
           <h1 class="text-center h1-form"><b>Login</b></h1>
            <form method="POST" class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-md-3">Usuario</label>
                <div class="col-md-6">
                   <input class="form-control" type="text" name="usuario_login" placeholder="Digite seu nome de usuario" required/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Senha</label>
                <div class="col-md-6">
                   <input class="form-control" type="password" name="senha_login" placeholder="Sua senha" required/>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <input class="btn btn-success btn-block" type="submit" value="logar">
                </div>
              </div>
            </form>
         </div>

       </div>
     </div>

    <!-- Inicio direitos reservados --> 
    <div class="espaco-topo">
        <div class="container-fluid copy">
          <h5 class="text-center"><span class="glyphicon glyphicon-console
"></span> Mario Jr &copy; - Todos os direitos reservados.</h5>
      </div>
    </div>
    <!-- Fim direitos reservados -->
    
  <script src="https://code.jquery.com/jquery-3.1.1.js" type="text/javascript"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>