<?php 
    require "controller/conexao.php";
    require "controller/produto.model.php";
    require "controller/produto.service.php";
    require "controller/consultarResReq.service.php";


    //qual ação tomar for clicado no submit dentro do FORM
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';

    /* valor "pag" da action dentro dos forms de toda a aplicação para localizar a pagina e
     resetar nela mesmo caso um prouto seja adicionado em outra pagina*/
    $localizando = isset($_GET['pag']) ? $_GET['pag'] : '';

    $produto = new Produtos();
    $conexao = new Conexao();
    $produtoServices = new ProdutoServices($conexao, $produto);

    $somarProdutos = $produtoServices->somarProdutos();
    $calcularFaturamento = $produtoServices->calcularFaturamento();


    //adicionar produto
    if($acao == 'adicionar'){
        $produto = new Produtos();

        $produto->__set('produto', $_POST['produto']);
        $produto->__set('categoria', $_POST['categoria']);
        $produto->__set('quantidade', $_POST['quantidade']);
        $produto->__set('valor_produto', $_POST['valor_produto']);

        $conexao = new Conexao();
        $produtoServices = new ProdutoServices($conexao, $produto);
        
        $produtoServices->adicionar();
        

        //resetar para pagina atual após submit do form / resetar com "?acao=recuperar" para não dar erro na page "produtos.php"
        header("Location: $localizando.php?acao=recuperar");
        
    }else if($acao == 'recuperar'){
        $produto = new Produtos();
        $conexao = new Conexao();
        $produtoServices = new ProdutoServices($conexao, $produto);
        $recuperado = $produtoServices->recuperar();


        // echo "<pre>";
        // print_r($recuperado);
        // echo "</pre>";

    }else if($acao == 'removerTudo'){
        // recuperar arquivos antes de excluir o selecionado
        $produto = new Produtos();
        $conexao = new Conexao();
        $produtoServices = new ProdutoServices($conexao, $produto);
        $produto->__set('id', $_GET['id']);
        $recuperado = $produtoServices->recuperar();

        $remover = $produtoServices->removerTudo();

        header("Location: produtos.php?acao=recuperar");
    }else if($acao == 'decrementarUM'){
        // recuperar arquivos antes
        $produto = new Produtos();
        $conexao = new Conexao();
        $produtoServices = new ProdutoServices($conexao, $produto);
        $produto->__set('id', $_GET['id']);
        $recuperado = $produtoServices->recuperar();

        foreach ($recuperado as $indice => $recuperadoDec){ // logica para descrementar o valor para o banco de dados salvar o valor ja atualizado
            if($recuperadoDec->id == $_GET['id']){
                $produto = new Produtos();
                $conexao = new Conexao();
                $produtoServices = new ProdutoServices($conexao, $produto);
                $produto->__set('id',  $recuperadoDec->id);
                $produto->__set('quantidade', $recuperadoDec->quantidade);
                $produto->__set('valor_produto', $recuperadoDec->valor_produto);
            }
        }

        $decrementarUM = $produtoServices->decrementarUM();
        header("Location: produtos.php?acao=recuperar");

    }else if($acao == 'incrementarUM'){
        // recuperar arquivos antes
        $produto = new Produtos();
        $conexao = new Conexao();
        $produtoServices = new ProdutoServices($conexao, $produto);
        $produto->__set('id', $_GET['id']);
        $recuperado = $produtoServices->recuperar();

        foreach ($recuperado as $indice => $recuperadoDec){ // logica para descrementar o valor para o banco de dados salvar o valor ja atualizado
            if($recuperadoDec->id == $_GET['id']){
                $produto = new Produtos();
                $conexao = new Conexao();
                $produtoServices = new ProdutoServices($conexao, $produto);
                $produto->__set('id',  $recuperadoDec->id);
                $produto->__set('quantidade', $recuperadoDec->quantidade);
                $produto->__set('valor_produto', $recuperadoDec->valor_produto);
            }
        }
        $incrementarUM = $produtoServices->incrementarUM();
        header("Location: produtos.php?acao=recuperar");

    }else if($acao == 'enviarEstoque'){
        // recuperar arquivos
        $produto = new Produtos();
        $conexao = new Conexao();
        $produtoServices = new ProdutoServices($conexao, $produto);
        $produto->__set('id', $_GET['id']);
        $recuperado = $produtoServices->recuperar();

        foreach ($recuperado as $indice => $enviarEstoqueLoja){ // logica para descrementar o valor para o banco de dados salvar o valor ja atualizado
            if($enviarEstoqueLoja->id == $_GET['id']){
                $produto = new Produtos();
                $conexao = new Conexao();
                $produtoServices = new ProdutoServices($conexao, $produto);
                $produto->__set('id',  $enviarEstoqueLoja->id);
                $produto->__set('id_estoque_loja', $enviarEstoqueLoja->id_estoque_loja);
            }
        }

        // echo '<pre>';
        // print_r($recuperado);
        // echo '</pre>';
        
        $recuperado = $produtoServices->enviarLoja();
        header("Location: enviarParaLoja.php?acao=recuperar");
    }else if($acao == 'enviarLoja'){
        // recuperar arquivos
        $produto = new Produtos();
        $conexao = new Conexao();
        $produtoServices = new ProdutoServices($conexao, $produto);
        $produto->__set('id', $_GET['id']);
        $recuperado = $produtoServices->recuperar();

        foreach ($recuperado as $indice => $enviarEstoqueLoja){ // logica para descrementar o valor para o banco de dados salvar o valor ja atualizado
            if($enviarEstoqueLoja->id == $_GET['id']){
                $produto = new Produtos();
                $conexao = new Conexao();
                $produtoServices = new ProdutoServices($conexao, $produto);
                $produto->__set('id',  $enviarEstoqueLoja->id);
                $produto->__set('id_estoque_loja', $enviarEstoqueLoja->id_estoque_loja);
            }
        }

        // echo '<pre>';
        // print_r($recuperado);
        // echo '</pre>';
        $recuperado = $produtoServices->enviarEstoque();
        header("Location: enviarParaLoja.php?acao=recuperar");
    }


?>