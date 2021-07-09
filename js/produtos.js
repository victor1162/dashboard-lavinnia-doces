// $(document).ready(() => {
    
//     $('.removerTudo').on('click', () => {
//         $('#area-removerTudoSN').css('display', 'flex');
//     })

//     $('#fechar-removerTudoSN').on('click', () => {
//         $('#area-removerTudoSN').css('display', 'none');
//     })
// })


//função editar a quantidade de cada produto na pagina "produtos.php?acao=recuperar"
function abrirEdit(valor){
    let divEdit = document.querySelector('.form-detalhe_' + valor)

    if(divEdit.style.display == 'none'){
        document.querySelector('.form-detalhe_' + valor).style.display = 'flex';
    }else{
        document.querySelector('.form-detalhe_' + valor).style.display = 'none';
    }
}

function removerTudo(id){
    location = `produtos.php?acao=removerTudo&id=${id}`;
}

function decrementarUM(id){
    location = `produtos.php?acao=decrementarUM&id=${id}`;
}

function incrementarUM(id){
    location = `produtos.php?acao=incrementarUM&id=${id}`;
}

function enviarEstoqueLoja(tipo, id){
    if(tipo == 'loja'){

        location = `produtos.php?acao=enviarLoja&id=${id}`;
        console.log('loja');
    }else if(tipo == 'estoque'){

        location = `enviarParaLoja.php?acao=enviarEstoque&id=${id}`;
        console.log('estoque');
    }
}