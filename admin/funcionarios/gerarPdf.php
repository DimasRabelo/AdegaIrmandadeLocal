<?php

require_once("class/conexao.php");
require_once("class/funcionario.php");

// Carregar a biblioteca Dompdf usando o Composer
require_once '../vendor/autoload.php';

// Faz referência ao namespace Dompdf
use Dompdf\Dompdf;

// Cria uma instância da classe Dompdf
$dompdf = new Dompdf();



// Carrega o HTML no Dompdf
$dompdf->loadHtml('Gerar PHP');

// (Opcional) Configura o tamanho e a orientação do papel
$dompdf->setPaper('A4', 'landscape');

// Renderiza o HTML como PDF
$dompdf->render();

// Envia o PDF gerado para o navegador
$dompdf->stream();
