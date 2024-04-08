<?php
require_once('class/videos.php');
$video = new VideosClass();
$lista = $video->listarUrlVideos();


//var_dump($lista)


?>


<tbody>
    <div>
        <table>
            <caption> Lista de Url Videos</caption>

            <thead>
                <tr>
                    <th>Url dos Carrossel de Videos</th>
                   

                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha) : ?>
                    <tr>
                       
                        <td><?php echo $linha['urlVideo'] ?>
                        <a href="index.php?p=videos&u=atualizar&id=<?php echo $linha['idVideo']; ?>"> </a> 
                        </td>
                       
                            
                     
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</tbody>

</table>
</div>