<?php
	$localizado = 'controleDeEstoque.php';
	require 'controller.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Sistema lavinnia Doces</title>

	<!-- folhas de estilos -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<link rel="stylesheet" type="text/css" href="css/produtos.css">
    <link rel="stylesheet" type="text/css" href="css/enviarParaLoja.css">
    <link rel="stylesheet" type="text/css" href="css/estoque.css">
    <link rel="stylesheet" type="text/css" href="css/controleDeEstoque.css">


	<!-- icones -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

	<!-- links fontes -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
	<!-- font-family: 'Padauk', sans-serif; -->

	<!-- normalize -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css">

	<!-- html5shiv -->
	<link rel="stylesheet" type="text/css" href="js/shiv.js">
	
	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="crossorigin="anonymous">
	</script>

	<!-- scripts -->
	<script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/routes.js"></script>
    <script type="text/javascript" src="js/produtos.js"></script>

</head>
<body class="body">

	<header>
		<a href="index.php">
			<img src="imagem/logo.png">
		</a>
	
		<nav>
			<a href="index.php">PAGINA INICIAL</a>
		</nav>
	</header>

<div id="container">
	<section id="selecione-inicial">
		<div class="item-inicial" onclick="adicionarProduto()">
			<i class="bi bi-plus-square-fill"></i>
			<span>Adicionar</span>
		</div>

		<div class="item-inicial" onclick="selecionarRoute('caminho', 'produtos')">
			<i class="bi bi-cart-fill"></i>
			<span>Produtos</span>

		</div>

		<div class="item-inicial"  onclick="selecionarRoute('caminho', 'enviarParaLoja')">
			<i class="bi bi-box-arrow-in-right"></i>
			<span>Enviar para loja</span>
		</div>

		<div class="item-inicial"  onclick="selecionarRoute('caminho', 'estoque')">
			<i class="bi bi-box-seam"></i>
			<span>Estoque</span>
		</div>
	</section>

    <!-- modal adicionar produtos -->
	<div id="area-adicionarProdutos">
		<section class="container-background-adicionar" >
			<div class="container-form">

				<!-- categorias pré selecionar -->
				<div id="TipoCone" class="item-tipos" onclick="tipoDeCategoria('cone')">
					<span>CONE</span>
				</div>

				<div id="TipoBolo" class="item-tipos" onclick="tipoDeCategoria('bolo')">
					<span>BOLO</span>
				</div>

				<div id="miniBrigadeiro" class="item-tipos" onclick="tipoDeCategoria('miniBrigadeiro')">
					<span>
						Mini
						<br />
						BRIGADEIRO
					</span>
				</div>

				<div id="TipoBrigadeiro" class="item-tipos" onclick="tipoDeCategoria('brigadeiro')">
					<span>BRIGADEIRO</span>
				</div>
				
				<!-- formulario de envio -->
				<form method="post" action="controller.php?acao=adicionar&pag=controleDeEstoque" id="formulario-produtos" >
					<fieldset>
						<legend>Adicionar <span id="legend-dos-produtos"></span></legend>
						
						<input type="hidden" name="categoria" id="categoriaSelecionada" value=''>

						<div id="titulo-produto">
							<span id="titulo-dos-produtos"></span>
						</div>
						
						<div id="area-select">
							<select name="produto" onchange="selecionarSabor(this.value)" id="selectProdutos">
								<option selected disabled id="option-titulo-1">-- SELECIONE</option>
								<option id="value-option-1"></option>
								<option id="value-option-2"></option>
								<option id="value-option-3"></option>
								<option id="value-option-4"></option>
								<option id="value-option-5"></option>
								<option id="value-option-6"></option>
								<option id="value-option-7"></option>
								<option id="value-option-8"></option>
								<option id="value-option-9"></option>
								<option id="value-option-10"></option>
								<option id="value-option-11"></option>
							</select>
						</div>
					
						<div style="display: flex; justify-content: center;" id="area-MaisQuantidade">
							<input type="number" id="maisQuantidade" value="1" name="quantidade" placeholder="Quantidade" style="padding: 10px; text-align: center; width: 110px; border: 2px solid #ff6cba; border-radius: 8px;">
						</div>

						<div id="area-valor">
							<div class="bg-valor">
								<span>valor:</span>
								<input type="number" name="valor_produto" id="valorProduto" />
								,00
							</div>
						</div>
						
						<div id="enviar-formulario">
							<span class="btn-voltar" onclick="tipoDeCategoria('voltar')">
								</i>voltar
							</span>

							<input type="submit" value="salvar" id="btn-submit-formulario">

							<span class="btn-fechar" onclick="tipoDeCategoria('fechar')">
								fechar
							</span>
						</div>

					</fieldset>
				</form>
			</div>
		</section>

	</div>

    <section id="area-controle-de-estoque">
        <div class="container-controle-de-estoque">

            <form action="" class="form-controle-de-estoque">
                <fieldset>
                    <legend>Controle estoque</legend>

					<div class="conatiner-controller">
						<div>
							<span>Adicionar na loja</span>

							<div>
								<span>Sim</span>
								<span>Não</span>
							</div>
						</div>

						<div>
							<span></span>

							<div>
								<span>Sim</span>
								<span>Não</span>
							</div>
						</div>


					</div>
                </fieldset>
            </form>

        </div>
    </section>

</div>
</body>
</html>