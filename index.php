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

	<script>
		function chamando(){
			let url = 'http://localhost/Projeto-lavinnai-final/consultaResReq.php';

			let xmlHttp = new XMLHttpRequest();
			xmlHttp.open('GET', url);

			xmlHttp.onreadystatechange = () => {
				if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
					/* produtos */
					let retorno = xmlHttp.responseText;
					let Obj = JSON.parse(retorno);

					let produtos = Obj.produtos;
					let maxProduto = 150;
					let porcentagem = 100;

					let mediaPorc = porcentagem / maxProduto;

					let resultado = mediaPorc * produtos;
					
					document.getElementById('barra-produtos').style.width = resultado + '%';
					document.getElementById('valor-produto').innerHTML = produtos;
					document.getElementById('limite-produtos').innerHTML = maxProduto;

					// produtos loja
					let noEstoque = Obj.estoque;
					let mediaPorcEstoque = porcentagem / produtos;
					let naLoja = Obj.loja;
					let resultadoLoja = mediaPorcEstoque * naLoja;

					document.getElementById('barra-na-loja').style.width = resultadoLoja + '%';
					document.getElementById('na-loja').innerHTML = naLoja;
					document.getElementById('no-estoque').innerHTML = produtos;


					//produtos estoque
					let produtosEstoque_total = mediaPorcEstoque * noEstoque;

					document.getElementById('total-estoque').innerHTML = produtos;
					document.getElementById('produtos-Estoque').style.width = produtosEstoque_total + '%';
					document.getElementById('em-estoque').innerHTML = noEstoque;
				}
			}

			xmlHttp.send();
		}
		 
		chamando();

	</script>
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
				<span class="titulo-card">PRODUTOS</span>
				<span class="valor-card"><?= $somarProdutos[0]['total'] ?></span>
				<span class="area-btn-card">
					<a href="" class="btn-card">consultar</a>
				</span>
			</div>

			<div class="cards" style="background: rgb(0, 209, 122);">
				<span class="titulo-card">NA LOJA</span>
				<span class="valor-card"><?= $produtoEmLoja[0]->loja ?></span>
				<span class="area-btn-card">
					<a href="" class="btn-card" style="border-bottom: 1px solid rgb(0, 209, 122);">consultar</a>
				</span>
			</div>

			<div class="cards" style="background: rgb(255, 54, 54);">
				<span class="titulo-card">FATURAMENTO</span>
				<span style=" display: flex; align-items: center;justify-content: space-around; font-size: 1.9em; height: 50%;">R$ <span class="valor-card" style="font-size: 1.0em;"><?= $calcularFaturamento[0]['total'] ?></span></span>
				<span class="area-btn-card">
					<a href="" class="btn-card" style="border-bottom: 1px solid rgb(255, 54, 54);">consultar</a>
				</span>
			</div>

			<div class="cards" style="background: rgba(46, 46, 46, 0.438);">
				<span class="titulo-card">VENDAS REALIZADAS</span>
				<span style=" display: flex; align-items: center;justify-content: space-around; font-size: 1.9em; height: 50%;">R$ <span class="valor-card" style="font-size: 1.0em;">0,00</span></span>
				<span class="area-btn-card">
					<a href="#" class="btn-card" style="cursor: context-menu; border-bottom: 1px solid rgba(46, 46, 46, 0.438);">indisponivel</a>
				</span>
			</div>
		</div>

	</section>

	<section id="area-conteudo-principal">
		
		<div class="container-info-estoque">
			<h3 >Informações do sistema </h3>
			<hr>
			<div class="area-info-estoque">
				<div class="relatorio">
					<span>Produtos</span>
					<div class="area-barra-progresso">
						<div class="barra-progresso-produtos" id="barra-produtos"></div>

						<div class="detalhe">
							<span>Produtos: <span id="valor-produto">0</span> de <span id="limite-produtos">0</span></span>
						</div>
					</div>
					
				</div>

				<div class="relatorio">
					<span>Produtos loja</span>
					<div class="area-barra-progresso">
						<div class="barra-progresso-loja" id="barra-na-loja"></div>

						<div class="detalhe">
							<span>Loja: <span id="na-loja">0</span> de <span id="no-estoque">0</span></span>
						</div>
					</div>
				</div>

				<div class="relatorio">
					<span>Produtos faturamento</span>
					<div class="area-barra-progresso">
						<div class="barra-progresso-faturamento"></div>

						<div class="detalhe">
							<span>Faturamento: 0 de 0</span>
						</div>
					</div>
				</div>

				<div class="relatorio">
					<span>Produtos estoque</span>
					<div class="area-barra-progresso">
						<div class="barra-progresso-estoque" id="produtos-Estoque"></div>

						<div class="detalhe">
							<span>Estoque: <span id="em-estoque"></span> de <span id="total-estoque"></span></span>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	
</div>

</body>
</html>