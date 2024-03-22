<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rubik&family=Secular+One&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./src/css/reset.css" />

  <link rel="stylesheet" href="/src/css/slick.css">
  <link rel="stylesheet" href="/src/css/slick-theme.css">
  <link rel="stylesheet" href="/src/css/lity.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


  <link rel="stylesheet" href="./src/css/estilos.css" />
  <link rel="stylesheet" href="./src/css/responsivo.css">

</head>
<style>
  #msgLogin {
    color: #ffffff;
  }
</style>



<body class="usuariopg">
  <!-- MENU -->

  <?php require_once("src/Conteudo/Menus/menuusuario.php") ?>

  <div class="estruturaLogin">

    <span class="close" onclick="fecharLogin()"><img src="src/imagens/botaofechar.png" alt=""></span>
    <form class=" formuusuario" id="loginUsuario">
      <div>
        <h1><img src="src/imagens/adega1.png" alt=""></h1>
      </div>

      <p>Faça o login caso tenha cadastro</p>
      <a href="#">Clique aqui para se Cadastrar</a>

      <div class="forminputslabel" class="mb-3">
        <label for="email" class="form-label">Digite seu Email</label>
        <input class="inputuser" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required placeholder=" digite seu email">
        <div class="forminputs" id="emailHelp" class="form-text">

        </div>
      </div>
      <div class="forminputslabel" class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Senha</label>
        <input class="inputuser" type="password" class="form-control" name="senha" id="senha" placeholder=" digite sua senha">

      </div>
      <a href="#">Esqueceu a Senha</a>
      <div class="inputuser" class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>

      </div>
      <button type="button" class="btn btn-primary" onclick="carregarLogin()">acessar
      </button>
      <div id="msgLogin"></div>
    </form>
  </div>



  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="/src/js/slick.min.js"></script>
  <script src="/src/js/lity.min.js"></script>
  <script src="/src/js/wow.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="/src/js/animacoes.js"></script>


  <script>
    function fecharLogin() {
      var login = document.querySelector('.estruturaLogin'); // Seleciona a estrutura pelo elemento de classe para o fechamento
      login.style.display = 'none';

      window.location.href = 'http://localhost/ProjetoAdegaIrmandade/';
    }

    function carregarLogin() {
      //alert('Login bem sucedido! Redirecionando');
      $("#loginUsuario").click(function() {
        var formData = $('#loginUsuario').serialize();
        console.log("Dados do Form: " + formData);

        $.ajax({
          url: './admin/class/cliente.php',
          method: 'POST',
          data: formData,
          dataType: 'json',



          success: function(data) {
            if (data.success) {
              $('#msgLogin').html('<div class="msgSuccess">' + data.message + '</div>');

              var idUsuario = data.idUsuario; //Banco de dados do Cliente
              var nomeUsuario = data.nomeUsuario; //Nome do usuário obtido do banco de dados
              var fotoUsuario = data.fotoUsuario; //URL da foto do usuário obtida do banco de dados

              // Armazenar as informações na sessionStorage
              sessionStorage.setItem('nomeUsuario', nomeUsuario);
              sessionStorage.setItem('fotoUsuario', fotoUsuario);

              window.location.href = 'http://localhost/ProjetoAdegaIrmandade/';
            } else {
              $('#msgLogin').html('<div class="msgSuccess">' + data.message + '</div>');
            }
          },
          error: function(xhr, status, error) {
            // console.log(xhr);
            // console.log("A requisição para cliente.php falhou.");

          }
          // Imprimir uma mensagem indicando que a requisição falhou
        });
      });
    }


    carregarLogin();
  </script>



</body>

</html>