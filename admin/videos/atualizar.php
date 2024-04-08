<?php

$id = $_GET["id"];
//echo $id;
require_once('class/videos.php');
$video = new VideosClass($id);

//echo $video->idVideo;





if (isset($_POST['urlVideo'])) {



    $urlVideo = $_POST['urlVideo'];
    $statusVideos = $_POST['statusVideos'];
   
    $video->urlVideo = $urlVideo;
    $video->statusVideos = $statusVideos;
   

    $video->Atualizar();
}

?>

<h1 class="h1Atual">Atualizar Url Video</h1>
<form  action="index.php?p=videos&u=atualizar&id=<?php echo $video->idVideo ?>" method="POST" enctype="multipart/form-data">

    <div>
        <label for="urlVideo"> URL</label>
        <input class="inputUrl" type="text" name="urlVideo" id="urlVideo" placeholder="Informe a Url do video" value="<?php echo $video->urlVideo; ?>">
    </div>

    <div>
        <select aria-label="Default select example" name="statusVideos">
            <option selected disabled>Selecione o Status do Video</option>
            <?php
            // Obtém o status da venda atualmente associado à venda
            $statusVideoAtual = $video->statusVideos;

            // Define as opções do select
            $opcoesStatus = array(
                'ATIVO' => 'ATIVO',
                'DESATIVADO' => 'DESATIVADO'
            );

            // Itera sobre as opções e exibe cada uma delas
            foreach ($opcoesStatus as $valor => $texto) {
                // Verifica se o valor da opção corresponde ao status da venda associado à venda atual
                $selected = ($valor == $statusVideoAtual) ? 'selected' : '';
                echo "<option value='$valor' $selected>$texto</option>";
            }
            ?>
        </select>





    </div>


   
    <div>
        <button type="submit">Atualizar URL</button>
    </div>

</form>