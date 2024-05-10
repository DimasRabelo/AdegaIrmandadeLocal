<?php

$id = $_GET["id"];
//echo $id;
require_once('class/videos.php');
$video = new VideosClass($id);

//echo $video->idVideo;





if (isset($_POST['urlVideo'])) {



    $urlVideo = $_POST['urlVideo'];
   
   
    $video->urlVideo = $urlVideo;
    
   

    $video->Atualizar();
}



?>

<style>
    .inputUrl{
        text-transform: none;
    }
</style>

<h1 class="h1Atual">Atualizar Url Video</h1>
<form  action="index.php?p=videos&u=atualizar&id=<?php echo $video->idVideo ?>" method="POST" enctype="multipart/form-data">

    <div>
        <label for="urlVideo"> URL</label>
        <input class="inputUrl" type="text" name="urlVideo" id="urlVideo" placeholder="Informe a Url do video" value="<?php echo $video->urlVideo; ?>">
    </div>

   
   
    <div>
        <button type="submit">Atualizar URL</button>
    </div>

</form>