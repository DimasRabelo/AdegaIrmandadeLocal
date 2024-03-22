<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once("class/cliente.php");
    $usuario = new ClienteClass($id);


    $usuario->desativar();

    // Redireciona de volta para a lista após a desativação
    echo "<script>document.location='index.php?p=clientes'</script>";
    exit;
}

