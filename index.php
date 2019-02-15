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
            <li><a href="Promocoes.php" id="font">Promoções</a></li>
            <li><a href="carrinho.php" id="font">Carrinho</a></li>
            <li>
              <a href="#" id="font">
              <?php
                session_start(); 
                if(isset($_SESSION['usuario'])) echo $_SESSION['usuario']; 
              ?>  
              </a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- Fim navbar -->

    <!-- Carousel -->
    <div class="espaco-topo">
    	<div id="myCarousel" class="carousel slide container_carrocel" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img/frente-atacadao.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="img/frente-atacadao2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="img/frente-atacadao3.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->	
    </div>
    <!-- Fim carrocel -->

    <!-- Inicio conteudo -->
    <div class="espaco-conteudo">
    	<div class="jumbotron">
	      <div class="container">
	        <h1><strong>Seja Bem Vindo</strong></h1>
	        <p>Ocupando posição de destaque no cenário nacional, o Atacadão está entre as melhores e maiores empresas do seu segmento no país, com 124 lojas de autosserviço, 22 centros de distribuição e atacados, estrategicamente localizados, e mais de 36 mil colaboradores.</p>

			<p>Atuando em atividades comerciais fundamentais, como o atacado de distribuição e as lojas de autosserviço, o Atacadão oferece uma infraestrutura moderna e eficiente. Disponibiliza aos seus clientes uma variada gama de produtos, que totalizam aproximadamente 10 mil itens, distribuídos em alimentos em geral, frios e laticínios, hortifrúti, bebidas, conservas e enlatados, doces e biscoitos, higiene pessoal, limpeza, bazar, pet shop, automotivo, entre outros.</p>

			<p>Todos os nossos esforços convergem para a satisfação das expectativas dos clientes. Nossa missão é ser a referência da distribuição moderna em cada um dos nossos mercados.</p>
	      </div>
    	</div>
    	<!-- Fim conteudo -->

    	<!-- Inicio footer -->
<!-- 
    <footer>

		</footer> -->
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