<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once("class/vendas.php");
    $venda = new VendasClass($id);


    $venda->desativar();

    // Redireciona de volta para a lista após a desativação
    echo "<script>document.location='index.php?p=vendas'</script>";
    exit;
}

?>