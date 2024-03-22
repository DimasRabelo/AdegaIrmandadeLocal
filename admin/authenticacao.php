<?php
session_start();



if (isset($_SESSION['idUsuario'])) {
    $id = $_SESSION['idUsuario'];
    $tipoUsuario = 'cliente';
} elseif (isset($_SESSION['idFuncionario'])) {
    $id = $_SESSION['idFuncionario'];
    $tipoUsuario = 'funcionario';
} else {
    header("location: http://localhost/ProjetoAdegaIrmandade/admin/loginAdmin.php");
    exit;
}



$pagina = @$_GET['p'];

require_once('class/cliente.php');
require_once('class/funcionario.php');

if ($tipoUsuario === 'cliente') {
    $usuarios = new ClienteClass($id);
    $usuario = $usuarios;
} elseif ($tipoUsuario === 'funcionario') {
    $funcionarios = new FuncionarioClass($id);
    $usuario = $funcionarios;
}


