<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once("class/cliente.php");
    $usuario = new ClienteClass($id);


    $usuario->ativar();

    // Redireciona de volta para a lista após a ativação
    echo "<script>document.location='index.php?p=clientes'</script>";
    exit;
}
