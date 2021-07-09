<?php
    include "controller/produto-controller.php";

    $teste = new ConsultarResReq($conexao, $produto);
    $teste->consultarResReq();
?>