<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once("class/estoque.php");
    $estoque = new EstoqueClass($id);


    $estoque->ativar();

    // Redireciona de volta para a lista após a desativação
    echo "<script>document.location='index.php?p=estoque '</script>";
    exit;
    
}
