<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once("class/videos.php");
    $video = new VideosClass($id);


    $video->ativar();

    // Redireciona de volta para a lista após a ativação
    echo "<script>document.location='index.php?p=videos'</script>";
    exit;
    
}
