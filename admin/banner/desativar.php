<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once("class/banner.php");
    $banner = new BannerClass($id);


    $banner->desativar();

    // Redireciona de volta para a lista após a desativação
    echo "<script>document.location='index.php?p=banner'</script>";
    exit;
}


