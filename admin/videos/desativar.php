<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once("class/videos.php");
    $video = new VideosClass($id);


    $video->desativar();

    // Redireciona de volta para a lista após a desativação
    echo "<script>document.location='index.php?p=vendas'</script>";
    exit;
}

?>