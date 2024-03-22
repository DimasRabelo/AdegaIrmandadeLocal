<?php
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

//if ($arquivo['error']) {
  //  echo 'Error: ' . $arquivo['error'];


 
 $fotoFuncionario = '';

 // Verifica se um arquivo foi enviado
 if (isset($_FILES['fotoFuncionario']) && $_FILES['fotoFuncionario']['error'] !== UPLOAD_ERR_NO_FILE) {
     $arquivo = $_FILES['fotoFuncionario'];

     if ($arquivo['error']) {
         throw new Exception('Error' . $arquivo['error']);
     }
     if (move_uploaded_file($arquivo['tmp_name'], '../admin/img/funcionario/' . $arquivo['name'])) {
         $fotoFuncionario = 'funcionario/' . $arquivo['name'];
     }
 } else {
     // Se nenhum arquivo foi enviado, defina um valor padrão
     $fotoFuncionario = 'funcionario/fotoUser.png';
 }


require_once('class/funcionario.php');

$funcionario = new FuncionarioClass();

$funcionario->nomeFuncionario = $nomeFuncionario;
$funcionario->cargoFuncionario = $cargoFuncionario;
$funcionario->dataNascFuncionario = $dataNascFuncionario;
$funcionario->emailFuncionario = $emailFuncionario;
$funcionario->senhaFuncionario = $senhaUsuario;
$funcionario->nivelFuncionario = $nivelFuncionario;
$funcionario->dataAdmissaoFuncionario = $dataAdmissaoFuncionario;
$funcionario->enderecoFuncionario = $enderecoFuncionario;
$funcionario->telFuncionario = $telFuncionario;
$funcionario->cepFuncionario = $cepFuncionario;
$funcionario->statusFuncionario = $statusFuncionario;
$funcionario->fotoFuncionario = $fotoFuncionario;

$funcionario->Cadastrar();


}





?>



<h1 class="h1Atual"  >Cadastrar Funcionário</h1>
<form action="index.php?p=funcionarios&f=cadastrar" method="POST" enctype="multipart/form-data">


    <div class="fotoForm">
        <div>
            <img src="img/funcionario/fotoUser.png" alt="..." id="imgfoto">
        </div>
        <input type="file" id="fotoFuncionario" name="fotoFuncionario" style="display: none;">

    </div>




    <div>
        <label for="nomeFuncionario"> Nome do Funcionario:</label>
        <input type="text" name="nomeFuncionario" id="nomeFuncionario" required placeholder="Informe o Nome do Funcionario">

    </div>

    <div>
        <label for="cargoFuncionario">Cargo:</label>
        <input type="text" name="cargoFuncionario" id="cargoFuncionario" required placeholder="Informe o Cargo">
    </div>

    <div>
        <label for="dataNascFuncionario">Data de Nascimento:</label>
        <input class="Date" type="date" name="dataNascFuncionario" id="dataNascFuncionario" required>
    </div>

    <div>
        <label for="emailFuncionario"> Email:</label>
        <input type="email" name="emailFuncionario" id="emailFuncionario" required placeholder="name@example.com">
    </div>
   
    <div>
        <label for="senhaFuncionario">Escolha Uma Senha:</label>
        <div>
            <input type="password" id="senhaFuncionario" name="senhaFuncionario" required placeholder="digite sua senha">

        </div>
    </div>


    <div>
        <select aria-label="Default select example" name="nivelFuncionario" required>
            <option selected="">Selecione o Nivel de Acesso</option>
            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
            <option value="USUARIO">USUARIO</option>
          </select>
    </div>





    <div>
        <label for="dataAdmissaoFuncionario">Data de Admissão:</label>
        <input class="Date"  type="date" name="dataAdmissaoFuncionario" id="dataAdmissaoFuncionario" required>
    </div>

    <div>
        <label for="enderecoFuncionario"> Endereço</label>
        <input type="text" name="enderecoFuncionario" id="enderecoFuncionario" required placeholder="Informe o Endereço">
    </div>

    <div>
        <label for="telFuncionario">Telefone:</label>
        <input type="tel" id="telFuncionario" name="telFuncionario" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}" required placeholder="(00) 00000-0000">
       
    </div>
    

    <div>
        <label for="cepFuncionario"> Cep:</label>
        <input type="text" id="cepFuncionario" name="cepFuncionario" maxlength="9" required placeholder="00000-000">
        
    </div>


    <div>
        <select aria-label="Default select example" name="statusFuncionario" required>
            <option selected="">Seleciona o Status do Funcionario</option>
            <option value="ATIVO">ATIVO</option>
            <option value="DESATIVADO">DESATIVADO</option>
            <option value="INATIVO">INATIVO</option>
        </select>
    </div>



    <div>
        <button type="submit">Cadastrar Funcionário</button>
    </div>

</form>

<script>
    // Evento de Clique
    document.getElementById('imgfoto').addEventListener('click', function() {
        document.getElementById('fotoFuncionario').click();
    });

    // Evento de Alteração Mudar
    document.getElementById('fotoFuncionario').addEventListener('change', function(a) {
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