
<?php

session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['idUsuario'])) {
    header("location: http://localhost/ProjetoAdegaIrmandade/home.php");
    exit;
} else {

    // Define as variáveis $id e $tipoUsuario com base na sessão do usuário
    $id = $_SESSION['idUsuario'];
    $tipoUsuario = 'cliente';

    // Carrega a classe do usuário
    require_once('admin/class/cliente.php');


    // Obtém o nome e a foto do usuário com base no tipo
    $usuario = new ClienteClass($id);
    $_SESSION['nomeUsuario'] = $usuario->getNome();
    $_SESSION['fotoUsuario'] = $usuario->getFoto();


    header("location: http://localhost/ProjetoAdegaIrmandade/home.php");


}

?>






