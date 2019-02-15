<?php require 'conexao.php'; ?>

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

	   <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" id="font-1">Atacadão</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php" id="font">Home</a></li>
            <li><a href="promocoes.php" id="font">Promoções</a></li>
            <li><a href="carrinho.php" id="font">Carrinho</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Fim navbar -->

    <!-- INICIO CAMPO BUSCAR  -->
    <div class="container espaco-topo">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form class="form-inline" method="POST">
            <input class="form-control" type="text" name="buscar"/>
            <input class="btn btn-success" type="submit" value="Buscar">
          </form>
        </div>
      </div>
    </div>
    <!-- FIM CAMPO BUSCAR -->
    
    </br>
    <div class="espaco-topo">
      <div class="container">
        <div class="row">
        <?php

        $sql = $pdo->query("select * from produtos");

        // INCIO DA PAGINAÇÃO

        $nro = $sql->rowCount($sql);

        if($nro == 0){
            echo "Não existe registro no banco de dados!";
        }

        $regs_pag = 4;
        if(isset($_GET['num'])){
            $nro_pag = $_GET['num'];
        }else{
            $nro_pag = 1;
        }

        if(is_numeric($nro_pag)){
            $init = ($nro_pag-1) * $regs_pag;
        }else{
            $init = 0;
        }

        $sql = "select * from produtos ORDER BY nome limit $init, $regs_pag";
        $sql = $pdo->query($sql);

        $quant_pag = ceil($nro / $regs_pag);

        // FIM DA PAGINAÇÃO

        if (isset($_POST['buscar'])) {
          $sql = "select * from produtos where nome like '%".$_POST['buscar']."%'";
          $sql = $pdo->query($sql); 
        }

        foreach ($sql->fetchAll() as $ln) {
           
          $id = $ln['id'];
          $nome = $ln['nome'];
          $imagem = $ln['imagem'];
          $quantidade = $ln['qunatidade'];
          $preco = $ln['preco'];
          $descricao = $ln['descricao'];

        ?>  

          <div class="col-md-4">
            <div class="thumbnail">
              <img src="<?php echo $imagem; ?>">
              <div class="caption" align="center">
                <h3><b><?php echo $nome; ?></b></h3>
                <h2><?php echo $preco; ?></h2>
                <p><b>Descrição: </b> <?php echo $descricao; ?> </p>
                  <form method="POST" action="carrinho.php">

                      <input type="hidden" name="id_txt" value="<?php echo $id; ?>" />
                      <input type="hidden" name="nome_produto" value="<?php echo $nome; ?>" />
                      <input type="hidden" name="preco_produto" value="<?php echo $preco; ?>" />
                      <input type="hidden" name="quantidade_produto" value="1" />

                      <input type="submit" value="Comprar" class="btn btn-success" />
                  </form>
              </div>
            </div>
          </div>
          

    <?php 

      }

     ?>

        </div>
          <?php

          if($nro_pag > 1){
              echo '<a href="promocoes.php?num='.($nro_pag-1).'"> Anterior </a>';
          }

          for($i = 1; $i <= $quant_pag; $i++){
              if($i == $nro_pag){
                  echo $i." ";
              }else{
                  echo '<a href="promocoes.php?num='.$i.'"> '.$i.' <a/>';
              }
          }

          if($nro_pag < $quant_pag){
              echo '<a href="promocoes.php?num='.($nro_pag + 1).'"> Proximo </a>';
          }

          ?>
      </div>
    </div>
    </br>
    <!-- Inicio footer -->
    <footer></footer>
    <!-- Final footer -->
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