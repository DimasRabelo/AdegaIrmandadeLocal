<?php

$pagina = @$_GET['pr'];


if ($pagina == NULL) {
    require_once ('listar.php');
}else {
    if($pagina == 'cadastrar') { require_once('cadastrar.php');}
    if($pagina ==  'atualizar') { require_once('atualizar.php');}    
    if($pagina == 'desativar' ) { require_once('desativar.php');}
    if($pagina == 'ativar' ) { require_once('ativar.php');}
    if($pagina == 'gerarPdf' ) { require_once('gerarPdf.php');}
}
