let tipoDeAquivo = '.php';

function selecionarRoute(acao, rota){
    
    if(acao == 'caminho' && rota == 'produtos'){
        window.location.href = "produtos" + tipoDeAquivo + '?acao=recuperar';

    }else if(acao == 'caminho' && rota == 'enviarParaLoja'){
        window.location.href = "enviarParaLoja" + tipoDeAquivo + '?acao=recuperar';

    }else if(acao == 'caminho' && rota == 'estoque'){
        window.location.href = "estoque" + tipoDeAquivo + '?acao=recuperar';

    }else if(acao == 'caminho' && rota == 'controleDeEstoque'){
        window.location.href = "controleDeEstoque" + tipoDeAquivo;

    }
    
}