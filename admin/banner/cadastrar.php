
<?php
if (isset($_POST['nomeBanner'])) {

    $nomeBanner = $_POST['nomeBanner'];
    $altBanner = $_POST['altBanner'];
    $statusBanner = $_POST['statusBanner'];
    
    $arquivo = $_FILES['fotoBanner'];


    if ($arquivo['error']) {
        throw new Exception('Error' . $arquivo['error']);
    }
    if (move_uploaded_file($arquivo['tmp_name'], '../src/imagens/banner/' . $arquivo['name'])) {
        $fotoBanner = 'banner/' . $arquivo['name'];
    }



    require_once('class/banner.php');

    $banner = new BannerClass();

    $banner->nomeBanner = $nomeBanner;
    $banner->altBanner = $altBanner;
    $banner->fotoBanner = $fotoBanner;
    $banner->statusBanner = $statusBanner;

    $banner->Cadastrar();
}
?>



<h1>Inserir Banner</h1>
<form action="index.php?p=banner&b=cadastrar" method="POST" enctype="multipart/form-data">

    <div class="fotoForm">
        <div>
            <img src="img/sem-foto.jpg" alt="..." id="imgfoto">
        </div>
        <input type="file" id="fotoBanner" name="fotoBanner" required style="display: none;">

    </div>

    <div>
        <label for="nomeBanner"></label>
        <input type="text" name="nomeBanner" id="nomeBanner" required placeholder="Informe o Nome do Banner">

    </div>

    <div>
        <select aria-label="Default select example" name="statusBanner" required>
            <option selected="">Seleciona o Status do Banner</option>
            <option value="ATIVO">ATIVO</option>
            <option value="DESATIVADO">DESATIVADO</option>
        </select>
    </div>
    

    <div>
        <button type="submit">Enviar Banner</button>
    </div>


</form>

<script>
    // Evento de Clique
    document.getElementById('imgfoto').addEventListener('click', function() {
        document.getElementById('fotoBanner').click();
    });

    // Evento de Alteração Mudar
    document.getElementById('fotoBanner').addEventListener('change', function(a) {
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