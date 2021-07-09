<?php
class ProdutoServices{

    private $conexao;
    private $produto;

    public function __construct(Conexao $conexao, Produtos $produto){
        $this->conexao = $conexao->conectar();
        $this->produto = $produto;
    }

    public function  adicionar(){
        
        //calculando valor_produto + quantidade e salvando o total antes de recuperar do banco
        $valorTotal = $this->produto->quantidade * $this->produto->valor_produto; 

        // adicionando pedido no banco de dados
        $query = '
            insert into 
                tb_produtos(produto, categoria, quantidade, valor_produto)
                     values(:produto, :categoria, :quantidade, :valor_produto);
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':produto', $this->produto->__get('produto'));
        $stmt->bindValue(':categoria', $this->produto->__get('categoria'));
        $stmt->bindValue(':quantidade', $this->produto->__get('quantidade'));
        $stmt->bindValue(':valor_produto', $valorTotal);#referenciar valor total soma de quantidade + valor_produto

        $stmt->execute();
    }
        //recuperar produtos
    public function  recuperar(){
        $query = '
            select
                tb.id, tb.produto, tb.categoria, tb.quantidade, tb.valor_produto, id_estoque_loja, l.loja_estoque
            from
                tb_produtos as tb
                left join tb_loja_estoque as l on (tb.id_estoque_loja = l.id)
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
        //somar quantidade dos produtos
    public function somarProdutos(){
        $query = '
            select
                sum(quantidade) as total
            from
                tb_produtos 
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function calcularProdutosLoja(){

    }
        //calcular faturamento antes de ser vendido
    public function calcularFaturamento(){
        $query = '
            select
                sum(valor_produto) as total
            from
                tb_produtos
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function pesquisar(){

    }

    public function decrementarUm(){
        //Modificar o tipo de dados e calcular valor que foi recuperado do Banco de dados
        //dividir valor do produto pela quantidade antes de subtrair a quantidade
        $divisãoQV = intval($this->produto->valor_produto) / intval($this->produto->quantidade);

        //subtraindo a quantidade
        $quantidadeAtualizado = $this->produto->quantidade - 1;
        $idProdutos = $this->produto->id;

        $totalCalculado = $quantidadeAtualizado * $divisãoQV;

        //deletar produto caso seja <= 0
        if($quantidadeAtualizado <= 0){
            $query = '
                delete from tb_produtos where id = :id;
            ';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $idProdutos);
            $stmt->execute();
        }

        $query = '
            update tb_produtos set quantidade = :atualizado where id = :id;
            update tb_produtos set valor_produto = :totalCalculado where id = :id;
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':atualizado', $quantidadeAtualizado);
        $stmt->bindValue(':totalCalculado', $totalCalculado);
        $stmt->bindValue(':id', $idProdutos);
        $stmt->execute();
    }

    public function incrementarUm(){
        //Modificar o tipo de dados e calcular valor que foi recuperado do Banco de dados
        //dividir valor do produto pela quantidade antes de adicionar +1 a quantidade
        $divisãoQV = intval($this->produto->valor_produto) / intval($this->produto->quantidade);

        //adicionando +1 a quantidade
        $quantidadeAtualizado = $this->produto->quantidade + 1;
        $idProdutos = $this->produto->id;

        $totalCalculado = $quantidadeAtualizado * $divisãoQV;

        $query = '
            update tb_produtos set quantidade = :atualizado where id = :id;
            update tb_produtos set valor_produto = :totalCalculado where id = :id;
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':atualizado', $quantidadeAtualizado);
        $stmt->bindValue(':totalCalculado', $totalCalculado);
        $stmt->bindValue(':id', $idProdutos);
        $stmt->execute();
    }

    public function removerTudo(){
        $query = '
            delete from tb_produtos where id = :id;
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->produto->__get('id'));
        $stmt->execute();
    }

    public function enviarLoja(){
        $atualizarEstoqueLoja = 1;

        // echo $this->produto->id_estoque_loja;

        $query = '
            update tb_produtos set id_estoque_loja = :id_estoque_loja where id = :id;
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_estoque_loja', $atualizarEstoqueLoja);
        $stmt->bindValue(':id', $this->produto->id);
        $stmt->execute();
    }

    public function enviarEstoque(){
        $atualizarEstoqueLoja = 2;
        
        echo $this->produto->id_estoque_loja;

        $query = '
            update tb_produtos set id_estoque_loja = :id_estoque_loja where id = :id;
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_estoque_loja', $atualizarEstoqueLoja);
        $stmt->bindValue(':id', $this->produto->id);
        $stmt->execute();
    }
}

?>