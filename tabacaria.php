
<?php
  require_once('admin/class/banner.php');

    $banner = new BannerClass();
    $lista      = $banner->ListarBanner();
   // var_dump($lista);
?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik&family=Secular+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./src/css/reset.css" />

    <link rel="stylesheet" href="./src/css/slick.css">
    <link rel="stylesheet" href="./src/css/slick-theme.css">
    <link rel="stylesheet" href="./src/css/lity.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    
    <link rel="stylesheet" href="./src/css/responsivopgs.css" />
    <link rel="stylesheet" href="./src/css/estilopgs.css" />



</head>

<body>

   <!-- MENU -->

   <?php require_once("src/Conteudo/Menus/menutabacaria.php") ?>

   <!-- Banner -->

 

 <!-- Corpo --> 
    
 <?php require_once("src/Conteudo/Corpo/corpotabacaria.php") ?>


     <!-- RODAPE -->

     <?php require_once("src/Conteudo/rodape.php") ?>;

    
        

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="./src/js/slick.min.js"></script>
    <script src="./src/js/lity.min.js"></script>
    <script src="./src/js/wow.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    
    
    <script src="./src/js/animacoes.js"></script>



</body>

</html>