<?php

$id = $_GET["id"];
//echo $id;
require_once("class/cliente.php");
$usuario = new ClienteClass($id);

//echo $usuario->nomeUsuario;

if (isset($_POST['nomeUsuario'])) {


    $nomeUsuario = $_POST['nomeUsuario'];
    $emailUsuario = $_POST['emailUsuario'];
    $senhaUsuario = $_POST['senhaUsuario'];
    $statusUsuario = $_POST['statusUsuario'];




    if (!empty($_FILES['fotoUsuario']['name'])) {


        // Foto
        $arquivo    = $_FILES['fotoUsuario'];

        if ($arquivo['error']) {
            throw new Exception('Error' . $arquivo['error']);
        }
        if (move_uploaded_file($arquivo['tmp_name'], '../admin/img/Usuario/' . $arquivo['name'])) {
            $fotoUsuario = 'Usuario/' . $arquivo['name'];
        } else {
            throw new Exception('Erro: Não foi possível realizar o upload da imagem.');
        }
    } else {
        $fotoUsuario = $usuario->fotoUsuario;
    }

    $usuario->nomeUsuario = $nomeUsuario;
    $usuario->emailUsuario = $emailUsuario;
    $usuario->senhaUsuario = $senhaUsuario;
    $usuario->statusUsuario = $statusUsuario;
    $usuario->fotoUsuario = $fotoUsuario;

    $usuario->Atualizar();
}



?>






<h1 class="h1Atual">Atualizar Usuario</h1>
<form action="index.php?p=clientes&c=atualizar&id=<?php echo $usuario->idUsuario; ?>" method="POST" enctype="multipart/form-data">

    <div class="fotoForm">
        <div>
            <?php if (!empty($usuario->fotoUsuario)) : ?>
                <img src="../admin/img/<?php echo $usuario->fotoUsuario; ?>" alt="Usuario Photo" id="imgfoto">
            <?php else : ?>
                <img src="img/sem-foto.jpg" alt="Sem Foto" id="imgfoto">
            <?php endif; ?>
        </div>
        <input type="file" id="fotoUsuario" name="fotoUsuario" style="display: none;">

    </div>
    <p class="informa">clique em cima da foto se deseja alterar</p>
    <div>
        <label for="nomeUsuario"> Nome do Usuario</label>
        <input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Informe o Nome do Cliente" value="<?php echo $usuario->nomeUsuario; ?>">


    </div>

    <div>
        <label for="emailUsuario"> Email</label>
        <input type="email" name="emailUsuario" id="emailUsuario" placeholder="name@example.com" value="<?php echo $usuario->emailUsuario; ?>">

    </div>

    <div>
        <label for="senhaUsuario">Digite Sua Senha</label>
        <div>
            <input type="password" id="senhaUsuario" name="senhaUsuario" placeholder="digite sua senha" value="<?php echo $usuario->senhaUsuario; ?>">


        </div>
    </div>
    <div>
        <select class="seleAtual" aria-label="Default select example" name="statusUsuario">
            <option value="" selected>Seleciona o Status do Usuario</option>
            <option value="ATIVO">ATIVO</option>
            <option value="DESATIVADO">DESATIVADO</option>
            <option value="INATIVO">INATIVO</option>
        </select>
    </div>


    <div>
        <button type="submit">Atualizar Usuario</button>
    </div>


</form>

<script>
    // Evento de Clique
    document.getElementById('imgfoto').addEventListener('click', function() {
        document.getElementById('fotoUsuario').click();
    });

    // Evento de Alteração Mudar
    document.getElementById('fotoUsuario').addEventListener('change', function(a) {
        let imgfoto = document.getElementById('imgfoto');
        let arquivo = a.target.files[0]; // Get the selected file

        if (arquivo) {
            let carregar = new FileReader();

            carregar.onload = function(a) {
                imgfoto.src = a.target.result;
                //console.log(imgfoto.src);
            }

            carregar.readAsDataURL(arquivo);
        }
    });
</script>