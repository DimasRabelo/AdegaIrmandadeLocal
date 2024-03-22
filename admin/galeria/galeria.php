<?php

$pagina = @$_GET['g'];


if ($pagina == NULL) {
    require_once ('listar.php');
}else {
    if($pagina == 'cadastrar') { require_once('cadastrar.php');}
    if($pagina ==  'ativar') { require_once('ativar.php');}    
    if($pagina == 'desativar' ) { require_once('desativar.php');}
   
}
