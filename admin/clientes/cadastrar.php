<?php
if (isset($_POST['nomeUsuario'])) {

    $nomeUsuario = $_POST['nomeUsuario'];
    $emailUsuario = $_POST['emailUsuario'];
    $senhaUsuario = $_POST['senhaUsuario'];
    $statusUsuario = $_POST['statusUsuario'];

    // Inicializa $fotoUsuario como vazio
    $fotoUsuario = '';

    // Verifica se um arquivo foi enviado
    if (isset($_FILES['fotoUsuario']) && $_FILES['fotoUsuario']['error'] !== UPLOAD_ERR_NO_FILE) {
        $arquivo = $_FILES['fotoUsuario'];

        if ($arquivo['error']) {
            throw new Exception('Error' . $arquivo['error']);
        }
        if (move_uploaded_file($arquivo['tmp_name'], '../admin/img/Usuario/' . $arquivo['name'])) {
            $fotoUsuario = 'Usuario/' . $arquivo['name'];
        }
    } else {
        // Se nenhum arquivo foi enviado, defina um valor padrão
        $fotoUsuario = 'Usuario/fotoUsuario.png';
    }

    require_once('class/cliente.php');

    $usuario = new ClienteClass();

    $usuario->nomeUsuario = $nomeUsuario;
    $usuario->emailUsuario = $emailUsuario;
    $usuario->senhaUsuario = $senhaUsuario;
    $usuario->fotoUsuario = $fotoUsuario;
    $usuario->statusUsuario = $statusUsuario;

    $usuario->Cadastrar();
}
?>

<h1 class="h1Atual">Cadastrar Usuario</h1>
<form action="index.php?p=clientes&c=cadastrar" method="POST" enctype="multipart/form-data">

    <div class="fotoForm">
        <div>
        <img src="img/Usuario/fotoUsuario.png" alt="..." id="imgfoto">
        </div>
        <input type="file" id="fotoUsuario" name="fotoUsuario" style="display: none;">

    </div>

    <div>
        <label for="nomeUsuario"> Nome do Cliente</label>
        <input type="text" name="nomeUsuario" id="nomeUsuario" required placeholder="Informe o Nome do Cliente">

    </div>

    <div>
        <label for="emailUsuario"> Email</label>
        <input type="email" name="emailUsuario" id="emailUsuario" required placeholder="name@example.com">
    </div>

    <div>
        <label for="senhaUsuario">Digite Sua Senha</label>
        <div>
            <input type="password" id="senhaUsuario" name="senhaUsuario" required placeholder="digite sua senha">

        </div>
    </div>

    <div>
        <select aria-label="Default select example" name="statusUsuario" required>
            <option selected="">Seleciona o Status do Cliente</option>
            <option value="ATIVO">ATIVO</option>
            <option value="DESATIVADO">DESATIVADO</option>
        </select>
    </div>


    <div>
        <button type="submit">Cadastrar Cliente</button>
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
                //console.log(imgFoto.src);
            }

            carregar.readAsDataURL(arquivo);
        }
    });
</script>