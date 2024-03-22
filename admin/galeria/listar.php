<?php
require_once('class/galeria.php');
$galeria = new GaleriaClass();
$listaAtivos = $galeria->listarGaleria();
$listaDesativados = $galeria->listarDesativados();
?>

<style>
    .tblGaleria {
        display: flex;
        justify-content: center;
    }
       
    .iconeCrud{
        padding: 100px;
    }
    .iconeCrud img{
        margin-right: -114px 
    }
    .GaleriaFoto{
        width: 100%;
    }
    .GaleriaFoto img{
        max-width: 220px;
        max-height: 220px;
        object-fit: cover;
    }
    
</style>

<div>
    <a class="icon-link icon-link-hover" href="index.php?p=galeria&g=cadastrar">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-repeat" viewBox="0 0 16 16">
            <path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z" />
        </svg>
        Adicionar Nova foto
    </a>
</div>




<div class="tblGaleria">
    <div class="table-container" id="arrastarMouse">

        <table>
            <caption>Lista de Galeria</caption>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Desativar ou Ativar </th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaAtivos as $linha) : ?>
                    <tr>
                        <td class="GaleriaFoto">
                            <a href="../src/imagens/<?php echo $linha['fotoGaleria'] ?>" data-lightbox="<?php echo $linha['nomeGaleria'] ?>" data-title="<?php echo $linha['nomeGaleria'] ?>">
                                <img src="../src/imagens/<?php echo $linha['fotoGaleria']; ?>" alt="<?php echo $linha['nomeGaleria']; ?>">
                            </a>
                        </td>
                        <td class="iconeCrud"> <a href="index.php?p=galeria&g=ativar&id=<?php echo $linha['idGaleria']; ?>" onclick="return confirmarAtivacao()">
                                <img src="./img/aceitar.png" alt="Ativar">
                            </a>
                            <a href="index.php?p=galeria&g=desativar&id=<?php echo $linha['idGaleria'] ?>" onclick="return confirmarDesativacao()">
                                <img src="./img/lixeira-de-reciclagem.png" alt="Desativar">
                            </a>
                        </td>
                        <td><?php echo $linha['statusGaleria'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php foreach ($listaDesativados as $linha) : ?>
                    <tr>
                        <td class="GaleriaFoto">
                            <a href="../src/imagens/<?php echo $linha['fotoGaleria'] ?>" data-lightbox="<?php echo $linha['nomeGaleria'] ?>" data-title="<?php echo $linha['nomeGaleria'] ?>">
                                <img src="../src/imagens/<?php echo $linha['fotoGaleria']; ?>" alt="<?php echo $linha['nomeGaleria']; ?>">
                            </a>
                        </td>
                        <Td class="iconeCrud" >
                            <a href="index.php?p=galeria&g=ativar&id=<?php echo $linha['idGaleria']; ?>" onclick="return confirmarAtivacao()">
                                <img src="./img/aceitar.png" alt="Ativar">
                            </a>
                            <a href="index.php?p=galeria&g=desativar&id=<?php echo $linha['idGaleria'] ?>" onclick="return confirmarDesativacao()">
                                <img src="./img/lixeira-de-reciclagem.png" alt="Desativar">
                            </a>
                        </td>
                        <td><?php echo $linha['statusGaleria'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
