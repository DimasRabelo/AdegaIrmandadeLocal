<?php
if (isset($_POST['statusGaleria'])) {

    $statusGaleria = $_POST['statusGaleria'];
   

    $arquivo = $_FILES['fotoGaleria'];

    if ($arquivo['error']) {
        throw new Exception('Error' . $arquivo['error']);
    }
    if (move_uploaded_file($arquivo['tmp_name'], '../src/imagens/galeria/' . $arquivo['name'])) {
        $fotoGaleria = 'galeria/' . $arquivo['name'];
    }
   
    require_once('class/galeria.php');

    $galeria = new GaleriaClass();

    $galeria->statusGaleria = $statusGaleria;
    $galeria->fotoGaleria = $fotoGaleria;
   

    $galeria->Cadastrar();

    
}
var_dump($_FILES);
?>

<h1 class="h1Atual">Inserir Foto</h1>
<form action="index.php?p=galeria&g=cadastrar" method="POST" enctype="multipart/form-data">

    <div class="fotoForm">
        <div>
            <img src="img/sem-foto.jpg" alt="..." id="imgfoto">
        </div>
        <input type="file" id="fotoGaleria" name="fotoGaleria" required style="display: none;">

    </div>
    <p>TAMANHO RECOMENDADO 220 DE LARGURA E 220 DE ALTURA</p>
    <div>
        <select aria-label="Default select example" name="statusGaleria" required>
            <option selected="">Seleciona o Status da foto</option>
            <option value="ATIVO">ATIVO</option>
            <option value="DESATIVADO">DESATIVADO</option>
           
        </select>
    </div>

    <div>
        <button type="submit">Cadastrar Foto</button>
    </div>


</form>

<script>
    // Evento de Clique
    document.getElementById('imgfoto').addEventListener('click', function() {
        document.getElementById('fotoGaleria').click();
    });

    // Evento de Alteração Mudar
    document.getElementById('fotoGaleria').addEventListener('change', function(a) {
        let imgfoto = document.getElementById('imgfoto');
        let arquivo = a.target.files[0]; // Get the selected file

        if (arquivo) {
            let carregar = new FileReader();

            carregar.onload = function(a) {
                imgfoto.src = a.target.result;
                //console.log(imgFoto.src);
            }

            carregar.readAsDataURL(arquivo);
        }
    });
</script>