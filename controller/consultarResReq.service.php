<?php
    

class ConsultarResReq{
    private $conexao;
    private $produto;

    public function __construct(Conexao $conexao, Produtos $produto){
        $this->conexao = $conexao->conectar();
        $this->produto = $produto;
    }

    public function consultarResReq(){
        $query = '
            select produtos, categoria, quantidade, valor_produto
        ';
    }
}





?>
