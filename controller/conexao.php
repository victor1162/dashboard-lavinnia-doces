<?php

//classe(obj) conexao do banco de dados com try()catch() caso tenha algum erro na conexao sera enviado no front uma mensagem de erro de 

 class Conexao {

    private $host = 'localhost'; #host em area de teste sempre localhost
    private $dbname = 'dashboard_lavinnia_doces'; #nome do banco de dados criado
    private $user = 'root'; #user(usuario) necessario dentro de uma hospedagem 
    private $pass = ''; #pass(senha) necessario dentro de uma hospedagem

    //conectando o banco de dados
    public function conectar(){
        try{
            
            //abrindo conexao
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            // sempre dar um return 
            return $conexao;

        }catch(PDOException $e){

            //bloco de erro caso exista na conexao com o banco
            echo '<p>' . $e->getMessege() . '</p>';

        }
    }
}

?>
