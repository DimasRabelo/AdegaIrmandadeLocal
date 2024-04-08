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

                    <th>Url dos Carrossel de Videos da Página Galeria</th>
                    <th>Video</th>
                    <th>Data da Publicação</th>
                    <th>Status</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha) : ?>
                    <tr>


                        <td>
                            <a href="<?php echo $linha['urlVideo']; ?>" target="_blank"><?php echo $linha['urlVideo']; ?></a>
                            <a href="index.php?p=videos&u=atualizar&id=<?php echo $linha['idVideo']; ?>">
                                <p class="alterar">Alterar Url do Video</p>
                            </a>
                        </td>
                        <td><?php echo $linha['idVideo'] ?></td>
                        <td><?php echo date('d/m/Y', strtotime($linha['dataPublicacao'])) ?></td>
                        <td><?php echo $linha['statusVideos'] ?></td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</tbody>

</table>
</div>