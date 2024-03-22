<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once("class/produto.php");
    $produto = new ProdutoClass($id);


    $produto->desativar();

    // Redireciona de volta para a lista após a desativação
    echo "<script>document.location='index.php?p=produtos'</script>";
    exit;
}

?>