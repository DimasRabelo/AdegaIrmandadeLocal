<?php

$pagina = @$_GET['u'];


if ($pagina == NULL) {
    require_once ('listar.php');
}else {
   
    if($pagina ==  'atualizar') { require_once('atualizar.php');}    
    if($pagina == 'desativar' ) { require_once('desativar.php');}
    if($pagina == 'ativar' ) { require_once('ativar.php');}
}
