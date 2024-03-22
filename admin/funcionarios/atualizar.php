<?php

$id = $_GET["id"];
//echo $id;
require_once("class/funcionario.php");
$funcionario = new FuncionarioClass($id);







if (isset($_POST['nomeFuncionario'])) {

    $nomeFuncionario = $_POST['nomeFuncionario'];
    $cargoFuncionario = $_POST['cargoFuncionario'];
    $dataNascFuncionario = $_POST['dataNascFuncionario'];
    $emailFuncionario = $_POST['emailFuncionario'];
    $nivelFuncionario = $_POST['nivelFuncionario'];
    $dataAdmissaoFuncionario = $_POST['dataAdmissaoFuncionario'];
    $enderecoFuncionario = $_POST['enderecoFuncionario'];
    $telFuncionario = $_POST['telFuncionario'];
    $cepFuncionario = $_POST['cepFuncionario'];
    $statusFuncionario = $_POST['statusFuncionario'];

    //foto


    if (!empty($_FILES['fotoFuncionario']['name'])) {


        // Foto
        $arquivo   = $_FILES['fotoFuncionario'];

        if ($arquivo['error']) {
            throw new Exception('Error' . $arquivo['error']);
        }
        if (move_uploaded_file($arquivo['tmp_name'], '../admin/img/funcionario/' . $arquivo['name'])) {
            $fotoFuncionario = 'funcionario/' . $arquivo['name'];
        } else {
            throw new Exception('Erro: Não foi possível realizar o upload da imagem.');
        }
    } else {
        $fotoFuncionario = $funcionario->fotoFuncionario;
    }
    // fim da empty

    $funcionario->nomeFuncionario = $nomeFuncionario;
    $funcionario->cargoFuncionario = $cargoFuncionario;
    $funcionario->dataNascFuncionario = $dataNascFuncionario;
    $funcionario->emailFuncionario = $emailFuncionario;
    $funcionario->nivelFuncionario = $nivelFuncionario;
    $funcionario->dataAdmissaoFuncionario = $dataAdmissaoFuncionario;
    $funcionario->enderecoFuncionario = $enderecoFuncionario;
    $funcionario->telFuncionario = $telFuncionario;
    $funcionario->cepFuncionario = $cepFuncionario;
    $funcionario->statusFuncionario = $statusFuncionario;
    $funcionario->fotoFuncionario = $fotoFuncionario;

    $funcionario->Atualizar();
}





?>

<h1 class="h1Atual">Atualizar Funcionário</h1>
<form action="index.php?p=funcionarios&f=atualizar&id=<?php echo $funcionario->idFuncionario; ?> " method="POST" enctype="multipart/form-data">


    <div class="fotoForm">

        <div>
            <?php if (!empty($funcionario->fotoFuncionario)) : ?>
                <img src="../admin/img/<?php echo $funcionario->fotoFuncionario; ?>" alt="Funcionário Photo" id="imgfoto">
            <?php else : ?>
                <img src="img/sem-foto.jpg" alt="Sem Foto" id="imgfoto">
            <?php endif; ?>
        </div>
        <input type="file" id="fotoFuncionario" name="fotoFuncionario" style="display: none;">

    </div>
    <p class="informa">clique em cima da foto se deseja alterar</p>
    <div>
        <label for="nomeFuncionario">Nome do Funcionario</label>
        <input type="text" name="nomeFuncionario" id="nomeFuncionario" placeholder="Informe o Nome do Funcionario" value="<?php echo $funcionario->nomeFuncionario; ?>">

    </div>

    <div>
        <label for="cargoFuncionario">Cargo</label>
        <input type="text" name="cargoFuncionario" id="cargoFuncionario" placeholder="Informe o Cargo" value="<?php echo $funcionario->cargoFuncionario; ?>">
    </div>

    <div>
        <label for="dataNascFuncionario">Data de Nascimento</label>
        <input class="Dateatual" type="date" name="dataNascFuncionario" id="dataNascFuncionario" value="<?php echo $funcionario->dataNascFuncionario; ?>">
    </div>

    <div>
        <label for="emailFuncionario"> Email</label>
        <input type="email" name="emailFuncionario" id="emailFuncionario" placeholder="name@example.com" value="<?php echo $funcionario->emailFuncionario;  ?>">
    </div>

    <div>
        <label for="nivelFuncionario">Nivel de Acesso</label>
        <input type="text" name="nivelFuncionario" id="nivelFuncionario" placeholder="Informe o Nivel de Acesso" value="<?php echo $funcionario->nivelFuncionario; ?>">
    </div>

    <div>
        <label for="dataAdmissaoFuncionario">Data de Admissão</label>
        <input class="Dateatual" type="date" name="dataAdmissaoFuncionario" id="dataAdmissaoFuncionario" value="<?php echo $funcionario->dataAdmissaoFuncionario; ?>">
    </div>

    <div>
        <label for="enderecoFuncionario"> Endereço</label>
        <input type="text" name="enderecoFuncionario" id="enderecoFuncionario" placeholder="Informe o Endereço" value="<?php echo $funcionario->enderecoFuncionario; ?>">
    </div>

    <div>
        <label for="telFuncionario">Telefone:</label>
        <input type="tel" name="telFuncionario" id="telFuncionario" placeholder="(11)99999-9999" value="<?php echo $funcionario->telFuncionario; ?>">
    </div>


    <div>
        <label for="cepFuncionario"> Cep</label>
        <input type="text" id="cepFuncionario" name="cepFuncionario" maxlength="9" placeholder="00000-000" value="<?php echo $funcionario->cepFuncionario; ?>">

    </div>


    <div>
        <select class="seleAtual" aria-label="Default select example" name="statusFuncionario">
            <option selected disabled>Selecione o Status do Funcionário</option>
            <?php
            
            $statusFuncionarioAtual = $funcionario->statusFuncionario;

            // Define as opções do select
            $opcoesStatus = array(
                'ATIVO' => 'ATIVO',
                'DESATIVADO' => 'DESATIVADO'
            );

            // Itera sobre as opções e exibe cada uma delas
            foreach ($opcoesStatus as $valor => $texto) {
               
                $selected = ($valor == $statusFuncionarioAtual) ? 'selected' : '';
                echo "<option value='$valor' $selected>$texto</option>";
            }
            ?>
        </select>
    </div>




    


    <div>
        <button type="submit">Atualizar Funcionário</button>
    </div>

</form>

<script>
    // Evento de Clique
    document.getElementById('imgfoto').addEventListener('click', function() {
        document.getElementById('fotoFuncionario').click();
    });

    // Evento de Alteração Mudar
    document.getElementById('fotoFuncionario').addEventListener('change', function(e) {
        let imgfoto = document.getElementById('imgfoto');
        let arquivo = e.target.files[0];
        if (arquivo) {
            let carregar = new FileReader();

            carregar.onload = function(e) {
                imgfoto.src = e.target.result;
                // console.log(imgfoto.src);
            }

            carregar.readAsDataURL(arquivo);
        }
    });
</script>