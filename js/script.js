// array de produtos 
const produtosCones = Array();

produtosCones['produto'] = Array();
produtosCones['valor'] = Array();

produtosCones['produto'][1] = 'CONE PAÇOCA'
produtosCones['produto'][2] = 'CONE PRESTÍGIO'
produtosCones['produto'][3] = 'CONE CHOCOLATE'
produtosCones['produto'][4] = 'CONE MARACUJÁ'
produtosCones['produto'][5] = 'CONE LEITE NINHO C/ NUTELA'
produtosCones['produto'][6] = 'CONE LEITE NINHO'
produtosCones['produto'][7] = 'CONE LIMÃO'
produtosCones['produto'][8] = 'CONE SENSAÇÃO'

// gourme
produtosCones['produto'][9] = 'CONE FERRERO ROCHER'
produtosCones['produto'][10] = 'CONE RAFAELLO'
produtosCones['produto'][11] = 'CONE SONHO DE VALSA'

produtosCones['valor'][1] = 5
produtosCones['valor'][2] = 5
produtosCones['valor'][3] = 5
produtosCones['valor'][4] = 5
produtosCones['valor'][5] = 5
produtosCones['valor'][6] = 5
produtosCones['valor'][7] = 5
produtosCones['valor'][8] = 5

// valor gourme
produtosCones['valor'][9] = 8
produtosCones['valor'][10] = 8
produtosCones['valor'][11] = 8


// bolos
const produtosBolos = Array();

produtosBolos['produto'] = Array();
produtosBolos['valor'] = Array();

produtosBolos['produto'][1] = 'BOLOS CHOCOLATE'
produtosBolos['produto'][2] = 'BOLOS PRESTÍGIO'
produtosBolos['produto'][3] = 'BOLOS LEITE NINHO'
produtosBolos['produto'][4] = 'BOLOS VULCAO'

produtosBolos['valor'][1] = 6
produtosBolos['valor'][2] = 6
produtosBolos['valor'][3] = 6
produtosBolos['valor'][4] = 6

// MiniBrigadeiros
const produtosMiniBrigadeiros = Array();

produtosMiniBrigadeiros['produto'] = Array();
produtosMiniBrigadeiros['valor'] = Array();

produtosMiniBrigadeiros['produto'][1] = 'MiniBri/ MORANGO (UN)'
produtosMiniBrigadeiros['produto'][2] = 'MiniBri/ CHOCOLATE (UN)'
produtosMiniBrigadeiros['produto'][3] = 'MiniBri/ Leite ninho (UN)'
produtosMiniBrigadeiros['produto'][4] = 'MiniBri/ Leite ninho c/ Morango (UN)'

produtosMiniBrigadeiros['valor'][1] = 2
produtosMiniBrigadeiros['valor'][2] = 2
produtosMiniBrigadeiros['valor'][3] = 2
produtosMiniBrigadeiros['valor'][4] = 2


// Brigadeiros
const produtosBrigadeiros = Array();

produtosBrigadeiros['produto'] = Array();
produtosBrigadeiros['valor'] = Array();

produtosBrigadeiros['produto'][1] = 'BRI/ MORANGO (UN) 22g'
produtosBrigadeiros['produto'][2] = 'BRI/ CHOCOLATE (UN) 22g'
produtosBrigadeiros['produto'][3] = 'BRI/ Leite ninho (UN) 22g'
produtosBrigadeiros['produto'][4] = 'BRI/ Leite ninho c/ Morango (UN) 22g'
produtosBrigadeiros['produto'][5] = 'BRI/ CAIXA MORANGO C/ 4 22g'
produtosBrigadeiros['produto'][6] = 'BRI/ CAIXA CHOCOLATE C/ 4 22g'
produtosBrigadeiros['produto'][7] = 'BRI/ CAIXA MORANGO/CHOCOLATE C/ 4 22g'
produtosBrigadeiros['produto'][8] = 'BRI/ CAIXA MISTURADO C/ 4 22g'


produtosBrigadeiros['valor'][1] = 2
produtosBrigadeiros['valor'][2] = 2
produtosBrigadeiros['valor'][3] = 2
produtosBrigadeiros['valor'][4] = 8
produtosBrigadeiros['valor'][5] = 8
produtosBrigadeiros['valor'][6] = 8
produtosBrigadeiros['valor'][7] = 8
produtosBrigadeiros['valor'][8] = 8





    // modificando dom da pagina
function adicionarProduto(){

    let pagina = document.getElementById('area-adicionarProdutos')
    
    pagina.style.display = 'flex'

    document.getElementById('TipoCone').style.display = "flex"
    document.getElementById('TipoBolo').style.display = "flex"
    document.getElementById('miniBrigadeiro').style.display = "flex"
    document.getElementById('TipoBrigadeiro').style.display = "flex"

    
}

function tipoDeCategoria(tipo){
    if(tipo == 'cone'){
        

    // configurando display
    document.getElementById('TipoCone').style.display = "none"
    document.getElementById('TipoBolo').style.display = "none"
    document.getElementById('miniBrigadeiro').style.display = "none"
    document.getElementById('TipoBrigadeiro').style.display = "none"
    document.getElementById('formulario-produtos').style.display = "flex"

    // titulo-dos-produtos
    document.getElementById('legend-dos-produtos').innerHTML = 'CONES'; //legends
    document.getElementById('titulo-dos-produtos').innerHTML = 'CONES'; //titulo

    document.getElementById('value-option-1').innerHTML = produtosCones['produto'][1];
    document.getElementById('value-option-2').innerHTML = produtosCones['produto'][2];
    document.getElementById('value-option-3').innerHTML = produtosCones['produto'][3];
    document.getElementById('value-option-4').innerHTML = produtosCones['produto'][4];
    document.getElementById('value-option-5').innerHTML = produtosCones['produto'][5];
    document.getElementById('value-option-6').innerHTML = produtosCones['produto'][6];
    document.getElementById('value-option-7').innerHTML = produtosCones['produto'][7];
    document.getElementById('value-option-8').innerHTML = produtosCones['produto'][8];
    document.getElementById('value-option-9').innerHTML = produtosCones['produto'][9];
    document.getElementById('value-option-10').innerHTML = produtosCones['produto'][10];
    document.getElementById('value-option-11').innerHTML = produtosCones['produto'][11];

    let categoriaSelecionada = document.getElementById('categoriaSelecionada');
    categoriaSelecionada.value = 'cone';

    }   
    if(tipo == 'bolo'){
    // configurando display
    document.getElementById('TipoCone').style.display = "none"
    document.getElementById('TipoBolo').style.display = "none"
    document.getElementById('miniBrigadeiro').style.display = "none"
    document.getElementById('TipoBrigadeiro').style.display = "none"
    document.getElementById('formulario-produtos').style.display = "flex"

    // titulo-dos-produtos
    document.getElementById('legend-dos-produtos').innerHTML = 'BOLOS'; //legends
    document.getElementById('titulo-dos-produtos').innerHTML = 'BOLOS'; //titulo

    document.getElementById('value-option-1').innerHTML = '';
    document.getElementById('value-option-2').innerHTML = '';
    document.getElementById('value-option-3').innerHTML = '';
    document.getElementById('value-option-4').innerHTML = '';
    document.getElementById('value-option-5').innerHTML = '';
    document.getElementById('value-option-6').innerHTML = '';
    document.getElementById('value-option-7').innerHTML = '';
    document.getElementById('value-option-8').innerHTML = '';
    document.getElementById('value-option-9').innerHTML = '';
    document.getElementById('value-option-10').innerHTML = '';
    document.getElementById('value-option-11').innerHTML = '';

    document.getElementById('value-option-1').innerHTML = produtosBolos['produto'][1];
    document.getElementById('value-option-2').innerHTML = produtosBolos['produto'][2];
    document.getElementById('value-option-3').innerHTML = produtosBolos['produto'][3];
    document.getElementById('value-option-4').innerHTML = produtosBolos['produto'][4];

    let categoriaSelecionada = document.getElementById('categoriaSelecionada');
    categoriaSelecionada.value = 'bolo';

    if(
        produto == 'CHOCOLATE' || 
        produto == 'PRESTÍGIO' || 
        produto == 'VULCAO' || 
        produto == 'LEITE NINHO'){

        document.getElementById('valorProduto').value = 6

        }

    

    }else if(tipo == 'miniBrigadeiro'){
    // configurando display
    document.getElementById('TipoCone').style.display = "none"
    document.getElementById('TipoBolo').style.display = "none"
    document.getElementById('miniBrigadeiro').style.display = "none"
    document.getElementById('TipoBrigadeiro').style.display = "none"
    document.getElementById('formulario-produtos').style.display = "flex"

    // titulo-dos-produtos
    document.getElementById('legend-dos-produtos').innerHTML = 'Mini Brigadeiros'; //legends
    document.getElementById('titulo-dos-produtos').innerHTML = 'Mini Brigadeiros'; //titulo

    document.getElementById('value-option-1').innerHTML = '';
    document.getElementById('value-option-2').innerHTML = '';
    document.getElementById('value-option-3').innerHTML = '';
    document.getElementById('value-option-4').innerHTML = '';
    document.getElementById('value-option-5').innerHTML = '';
    document.getElementById('value-option-6').innerHTML = '';
    document.getElementById('value-option-7').innerHTML = '';
    document.getElementById('value-option-8').innerHTML = '';
    document.getElementById('value-option-9').innerHTML = '';
    document.getElementById('value-option-10').innerHTML = '';
    document.getElementById('value-option-11').innerHTML = '';

    document.getElementById('value-option-1').innerHTML = produtosMiniBrigadeiros['produto'][1];
    document.getElementById('value-option-2').innerHTML = produtosMiniBrigadeiros['produto'][2];
    document.getElementById('value-option-3').innerHTML = produtosMiniBrigadeiros['produto'][3];
    document.getElementById('value-option-4').innerHTML = produtosMiniBrigadeiros['produto'][4];
    let categoriaSelecionada = document.getElementById('categoriaSelecionada');
    categoriaSelecionada.value = 'miniBrigadeiro';


    }else if(tipo == 'brigadeiro'){
    // configurando display
    document.getElementById('TipoCone').style.display = "none"
    document.getElementById('TipoBolo').style.display = "none"
    document.getElementById('miniBrigadeiro').style.display = "none"
    document.getElementById('TipoBrigadeiro').style.display = "none"
    document.getElementById('formulario-produtos').style.display = "flex"

    // titulo-dos-produtos
    document.getElementById('legend-dos-produtos').innerHTML = 'Brigadeiros'; //legends
    document.getElementById('titulo-dos-produtos').innerHTML = 'Brigadeiros'; //titulo

     
    document.getElementById('value-option-1').innerHTML = '';
    document.getElementById('value-option-2').innerHTML = '';
    document.getElementById('value-option-3').innerHTML = '';
    document.getElementById('value-option-4').innerHTML = '';
    document.getElementById('value-option-5').innerHTML = '';
    document.getElementById('value-option-6').innerHTML = '';
    document.getElementById('value-option-7').innerHTML = '';
    document.getElementById('value-option-8').innerHTML = '';
    document.getElementById('value-option-9').innerHTML = '';
    document.getElementById('value-option-10').innerHTML = '';
    document.getElementById('value-option-11').innerHTML = '';

    document.getElementById('value-option-1').innerHTML = produtosBrigadeiros['produto'][1];
    document.getElementById('value-option-2').innerHTML = produtosBrigadeiros['produto'][2];
    document.getElementById('value-option-3').innerHTML = produtosBrigadeiros['produto'][3];
    document.getElementById('value-option-4').innerHTML = produtosBrigadeiros['produto'][4];
    document.getElementById('value-option-5').innerHTML = produtosBrigadeiros['produto'][5];

    let categoriaSelecionada = document.getElementById('categoriaSelecionada');
    categoriaSelecionada.value = 'brigadeiro';


    }else if(tipo == 'voltar'){
        document.getElementById('TipoCone').style.display = "flex"
        document.getElementById('TipoBolo').style.display = "flex"
        document.getElementById('miniBrigadeiro').style.display = "flex"
        document.getElementById('TipoBrigadeiro').style.display = "flex"

        document.getElementById('formulario-produtos').style.display = "none"

    }else if(tipo == 'fechar'){

        let pagina = document.getElementById('area-adicionarProdutos')
    
        pagina.style.display = 'none'
        document.getElementById('TipoCone').style.display = "none"
        document.getElementById('TipoBolo').style.display = "none"
        document.getElementById('miniBrigadeiro').style.display = "none"
        document.getElementById('TipoBrigadeiro').style.display = "none"

        document.getElementById('formulario-produtos').style.display = "none"

    }
}

function selecionarSabor(produto){


    function tipoDeCategoria(tipo){
        if(
            produto == 'PAÇOCA' ||
            produto == 'PRESTÍGIO' ||
            produto == 'MARACUJÁ' ||
            produto == 'LEITE NINHO C/ NUTELA' ||
            produto == 'LEITE NINHO' ||
            produto == 'LIMÃO' ||
            produto == 'SENSAÇÃO'
    
            ){
                document.getElementById('valorProduto').value = 5
    
        }

    }

    produtosCones['produto'][1] = 'CONE PAÇOCA'
    produtosCones['produto'][2] = 'CONE PRESTÍGIO'
    produtosCones['produto'][3] = 'CONE CHOCOLATE'
    produtosCones['produto'][4] = 'CONE MARACUJÁ'
    produtosCones['produto'][5] = 'CONE LEITE NINHO C/ NUTELA'
    produtosCones['produto'][6] = 'CONE LEITE NINHO'
    produtosCones['produto'][7] = 'CONE LIMÃO'
    produtosCones['produto'][8] = 'CONE SENSAÇÃO'

    if(produto == 'CONE PAÇOCA'
    || produto == 'CONE PRESTÍGIO'
    || produto == 'CONE CHOCOLATE'
    || produto == 'CONE MARACUJÁ'
    || produto == 'CONE LEITE NINHO C/ NUTELA'
    || produto == 'CONE LEITE NINHO'
    || produto == 'CONE LIMÃO'
    || produto == 'CONE SENSAÇÃO'
    ){
        document.getElementById('valorProduto').value = 5

    }else if(produto == 'CONE FERRERO ROCHER' 
    || produto == 'CONE RAFAELLO' 
    || produto == 'CONE SONHO DE VALSA'
    ){
        document.getElementById('valorProduto').value = 8

    }else if(produto == 'BOLOS CHOCOLATE'
    || produto == 'BOLOS PRESTÍGIO'
    || produto == 'BOLOS LEITE NINHO'
    || produto == 'BOLOS VULCAO'
    ){
        document.getElementById('valorProduto').value = 6

    }else if(produto == 'MiniBri/ MORANGO (UN)'
    || produto == 'MiniBri/ CHOCOLATE (UN)'
    || produto == 'MiniBri/ Leite ninho (UN)'
    || produto == 'MiniBri/ Leite ninho c/ Morango (UN)'
    ){
        document.getElementById('valorProduto').value = 6

    }else if(produto == 'BRI/ MORANGO (UN) 22g'
    || produto == 'BRI/ CHOCOLATE (UN) 22g'
    || produto == 'BRI/ Leite ninho (UN) 22g'
    || produto == 'BRI/ Leite ninho c/ Morango (UN) 22g'
    ){
        document.getElementById('valorProduto').value = 2

    }else if(produto == 'BRI/ CAIXA MORANGO C/ 4 22g'
    || produto == 'BRI/ CAIXA CHOCOLATE C/ 4 22g'
    || produto == 'BRI/ CAIXA MORANGO/CHOCOLATE C/ 4 22g'
    || produto == 'BRI/ CAIXA MISTURADO C/ 4 22g'
    ){
        document.getElementById('valorProduto').value = 8

    }
}

function maisQuantidade(){
    let quantidades = document.getElementById('area-quantidade')
    quantidades.setAttribute('disabled', 'disabled');

    document.getElementById('area-quantidade').style.display = 'none'
    document.getElementById('area-MaisQuantidade').style.display = 'flex'
    let maisQuantidade = document.getElementById('maisQuantidade')

    maisQuantidade.style.display = 'block'

    maisQuantidade.removeAttribute('disabled');
}