<?php

require_once('class/banner.php');
$banner = new BannerClass();
$lista = $banner->ListarBanner();

//var_dump($lista)



?>

<style>
    .table-container {
        display: flex;
        justify-content: center;
    }

    table {
        width: 10%; 
        margin-left: auto;
        margin-right: auto;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .BannerFoto{
        width: 100%;
    }
    .BannerFoto img{
        max-width: 600px;
        max-height:200px;
    }
    .alterar{
        text-decoration: none;
        
    }
</style>


<tbody>

    <div>
        <table>
            <caption> Lista de Banner</caption>

            <thead>

                <tr>

                    <th>IMAGENS DO BANNER DAS PÁGINAS</th>
                    <th>PÁGINA</th>
                   
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha) : ?>

                    <tr>
                        <td class="BannerFoto">
                            <a href="../src/imagens/<?php echo $linha['fotoBanner'] ?>" data-lightbox="<?php echo $linha['nomeBanner'] ?>" data-title="<?php echo $linha['nomeBanner'] ?>">
                                <img src="../src/imagens/<?php echo $linha['fotoBanner'] ?>" data-alt="<?php echo $linha['nomeBanner'] ?>">
                            </a>
                            <a href="index.php?p=banner&b=atualizar&id=<?php echo $linha['idBanner']; ?>">
                                <p class="alterar">Alterar Foto do Banner</p>
                            </a>
                            <td><?php echo $linha['paginaDestino'] ?></td>
                        
                        </td>
                        

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </tr>

</tbody>
</table>
</div>