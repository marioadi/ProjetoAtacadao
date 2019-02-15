<?php include('conexao.php'); ?>


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

  
    <?php


	if (isset($_POST['id_txt'])) {
		$id = $_POST['id_txt'];
		$nome = $_POST['nome_produto'];
		$preco = $_POST['preco_produto'];
		$quantidade = $_POST['quantidade_produto'];

		$meucarrinho[] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade);
	
	}

	//INICIO DA SESSÃO
	session_start();
	if(isset($_SESSION['carrinho'])){
		$meucarrinho = $_SESSION['carrinho'];
		if (isset($_POST['id_txt'])) {
			$id = $_POST['id_txt'];
			$nome = $_POST['nome_produto'];
			$preco = $_POST['preco_produto'];
			$quantidade = $_POST['quantidade_produto'];
			$posicao = -1;

			for ($i=0; $i < count($meucarrinho); $i++) { 
				if ($id == $meucarrinho[$i]['id']) {
					$posicao = $i;
				}
			}

			if ($posicao <> -1) {
				$quant = $meucarrinho[$posicao]['quantidade'] + $quantidade;
				$meucarrinho[$posicao] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quant);
			}else{

				$meucarrinho[] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade);
			}
		}
	}
	
	if (isset($_POST['id2'])) {
		$indice = $_POST['id2'];
		$quant = $_POST['quantidade2'];
		$meucarrinho[$indice]['quantidade'] = $quant;
	}

	if (isset($_POST['id3'])) {
		$indice = $_POST['id3'];
		$meucarrinho[$indice] = NULL;
	}

	if(isset($meucarrinho)) $_SESSION['carrinho'] = $meucarrinho;
	//FIM DA SESSÃO

	?>

<div class="container divisor espaco-topo-tabela">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
						<table class="table table-hover">
					<tr >
						<th align="center" valign="middle"> &nbsp; </th>
						<th align="center" valign="middle">NOME</th>
						<th align="center" valign="middle">VALOR</th>
						<th align="center" valign="middle">QUANTIDADE</th>
						<th align="center" valign="middle">AÇOES</th>
					</tr>

				<?php 
					$total = 0;
					if (isset($meucarrinho)) {
						for ($i=0; $i < count($meucarrinho); $i++) {
							if ($meucarrinho[$i] <> NULL){
			 	?>
					
					<tr>
						<td align="center" valign="middle">
							<form method="POST">
								<input type="hidden" name="id3" value="<?php echo $i; ?>" />
								<input class="btn btn-success" type="submit" value="Exluir"/>
							</form>
						</td>
						<td align="center" valign="middle"><?php echo $meucarrinho[$i]['nome']; ?></td>
						<td align="center" valign="middle"><?php echo $meucarrinho[$i]['preco']; ?></td>
						<td align="center" valign="middle"><?php echo $meucarrinho[$i]['quantidade']; ?></td>
						<td align="center" valign="middle"> 
							<form method="POST">
								<div class="form-group">
									<div class="col-md-5">
										<input class="form-control" type="number" size="2" name="quantidade2" value="<?php echo $meucarrinho[$i]['quantidade']; ?>"/>		
									</div>
									<input type="hidden" name="id2" value="<?php echo $i; ?>" />
									<!-- <input type="image" src="img/arrow_refresh.png" /> -->
									<input class="btn btn-success" type="submit" value="Atualizar" name="Atualizar" />
								</div>
							</form>
						</td>

						<?php 
							$subtotal = $meucarrinho[$i]['preco'] * $meucarrinho[$i]['quantidade'];
					 		$total = $total + $subtotal;
						?>
					</tr>

					<?php 
				  }
				 }
				} 
				?>	
					<tr>
						<td class="success" colspan="2" align="center" valign="middle"> TOTAL </td>
						<td class="success" align="center" valign="middle"> <?php if (isset($total)) echo $total; ?> </td>
					</tr>

						

				</table>
				<a class="btn btn-success" href="promocoes.php"> Voltar </a>
		</div>
	</div>	
</div>
	

    <!-- Inicio footer -->
    <footer >
			
	</footer>
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