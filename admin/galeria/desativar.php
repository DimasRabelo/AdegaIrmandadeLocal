<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once("class/galeria.php");
    $galeria = new GaleriaClass($id);


    $galeria->desativar();

    // Redireciona de volta para a lista após a desativação
    echo "<script>document.location='index.php?p=galeria'</script>";
    exit;
}
