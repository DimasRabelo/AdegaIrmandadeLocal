<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once("class/vendas.php");
    $venda = new VendasClass($id);


    $venda->ativar();

    // Redireciona de volta para a lista após a ativação
    echo "<script>document.location='index.php?p=vendas'</script>";
    exit;
    
}
