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

      if (isset($_POST['nome']) && !empty($_POST['nome']) ) {
          
          $nome = addslashes($_POST['nome']);
          $usuario = addslashes($_POST['usuario_cadastro']);
          $email = addslashes($_POST['email']);
          $senha = addslashes($_POST['senha_cadastro']);
          $rep_senha = addslashes($_POST['senha_cadastroR']);
          if ($senha  == $rep_senha) {
            $sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, usuario = :usuario, email = :email, senha = :senha");
          $sql->bindValue(":nome", $nome);
          $sql->bindValue(":usuario", $usuario);
          $sql->bindValue(":email", $email);
          $sql->bindValue(":senha", $senha);
          $sql->execute();

          header("Location: login.php");
          unset($_SESSION['user']);
          exit;  

          }else{
            $menssage = "Senha não confere!";
          }
      }

    ?>
     <div class="container divisor espaco-topo">
       <div class="row">
        
          <div class="text-center col-md-6 col-md-offset-3">
            <h6 class="red-text h6-form"><?php if(isset($menssage)) echo '<div class="alert alert-danger" role="alert">
            <b>'.$menssage.'</b>
</div>' ?></h6>
        </div>

        <div class="col-md-12">
           <h6 class="text-center h6-form">Não é cadastrado?</h6>
            <h1 class="text-center h1-form"><b>Faça Seu Cadastro</b></h1>
            <form method="POST" class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-md-3">Nome</label>
                <div class="col-md-6">
                   <input class="form-control" type="text" name="nome" placeholder="Seu nome" required/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Usuario</label>
                <div class="col-md-6">
                   <input class="form-control" type="text" name="usuario_cadastro" placeholder="Seu nome" required/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Email</label>
                <div class="col-md-6">
                   <input class="form-control" type="email" name="email" placeholder="Digite seu melhor Email" required/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Senha</label>
                <div class="col-md-6">
                   <input class="form-control" type="password" name="senha_cadastro" placeholder="Sua senha" required/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Repetir Senha</label>
                <div class="col-md-6">
                   <input class="form-control" type="password" name="senha_cadastroR" placeholder="Sua senha novamente" required/>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <input class="btn btn-success btn-block" type="submit" value="Cadastra">
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
  <script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>