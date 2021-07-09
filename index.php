<?php
	$localizado = 'index.php';
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

	<!-- scripts -->
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/routes.js"></script>

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

		<div class="item-inicial"  onclick="selecionarRoute('caminho', 'controleDeEstoque')">
			<i class="bi bi-ui-checks"></i>
			<span>Controle do estoque</span>
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
				<form method="post" action="controller.php?acao=adicionar&pag=index" id="formulario-produtos" >
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

	<!-- areqa container dos cards principal -->
	<section id="container-cards-principais">
		<h3>Informações de estoque</h3>
		<hr style="border: 1px solid #ff34a0;">

		<!-- area-cards -->
		<div id="area-cards">
			<div class="cards" >
				<span class="titulo-card">Total PRODUTOS</span>
				<span class="valor-card"><?= $somarProdutos[0]['total'] ?></span>
				<span class="area-btn-card">
					<a href="" class="btn-card">consultar</a>
				</span>
			</div>

			<div class="cards" style="background: rgb(0, 209, 122);">
				<span class="titulo-card">Produtos na LOJA</span>
				<span class="valor-card">0</span>
				<span class="area-btn-card">
					<a href="" class="btn-card" style="border-bottom: 1px solid rgb(0, 209, 122);">consultar</a>
				</span>
			</div>

			<div class="cards" style="background: rgb(255, 54, 54);">
				<span class="titulo-card">Projeção de FATURAMENTO</span>
				<span style=" display: flex; align-items: center;justify-content: space-around; font-size: 1.9em; height: 50%;">R$ <span class="valor-card" style="font-size: 1.0em;"><?= $calcularFaturamento[0]['total'] ?></span></span>
				<span class="area-btn-card">
					<a href="" class="btn-card" style="border-bottom: 1px solid rgb(255, 54, 54);">consultar</a>
				</span>
			</div>

			<div class="cards" style="background: rgba(46, 46, 46, 0.438);">
				<span class="titulo-card">Vendas REALIZADAS</span>
				<span style=" display: flex; align-items: center;justify-content: space-around; font-size: 1.9em; height: 50%;">R$ <span class="valor-card" style="font-size: 1.0em;">0,00</span></span>
				<span class="area-btn-card">
					<a href="#" class="btn-card" style="cursor: context-menu; border-bottom: 1px solid rgba(46, 46, 46, 0.438);">indisponivel</a>
				</span>
			</div>
		</div>

	</section>

	<section id="area-conteudo-principal">

		Não tem solicitações...

	</section>
	
</div>

</body>
</html>