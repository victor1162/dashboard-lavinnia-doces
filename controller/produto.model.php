<?php

    // Classe (obj) sera usado para setar valores para o banco de dados e recuperar do banco com o __get
class Produtos{
    private $id;
    private $produto; #nome produto
    private $categoria; #nome categoria
    private $quantidade; #quantidade
    private $valor_produto; #valor produto
    private $id_estoque_loja;
    private $pesquisar;

    //valor do parametros a ser recuperado com __get (atributo)
    public function __get($atributo){
        return $this->$atributo;
    }

    //valores do parametros a ser recebido com __set (atributo, valor)
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}

?>