<?php

// Habilita a exibição de erros para depuração
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("class/conexao.php");
require_once("class/funcionario.php");
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$funcPdf = new FuncionarioClass();

// Chama o método geradorPDF() para obter os dados dos funcionários
$resultado = $funcPdf->geradorPDF();

if ($resultado && count($resultado) > 0) {
    // Constrói a tabela HTML
    $html = "<html><head><style>@font-face { font-family: 'Secular One'; src: url('/path/to/secular-one.ttf') format('truetype'); }</style></head><body><table>";

    // Adiciona títulos dos campos
    $html .= "<tr>";
    $html .= "<th>Nome</th>";
    $html .= "<th>Cargo</th>";
    $html .= "</tr>";

    foreach ($resultado as $row) {
        $html .= "<tr>";
        $html .= "<td>" . $row['nomeFuncionario'] . "</td>";
        $html .= "<td>" . $row['cargoFuncionario'] . "</td>";
        $html .= "</tr>";
    }
    $html .= "</table></body></html>";

    // Verifica o HTML gerado (para depuração)
    echo $html;

    // Cria uma instância do Dompdf
    $dompdf = new Dompdf();

    // Carrega o HTML
    $dompdf->loadHtml($html);

    // Define o tamanho da página e a orientação
    $dompdf->setPaper('A4', 'portrait'); // ou 'landscape' se preferir paisagem

    // Renderiza o PDF
    $dompdf->render();
     
    // Saída do PDF para o navegador
    $dompdf->stream("funcionarios.pdf");

    //$output = $dompdf->output();

    // defina aqui o nome do arquivo que você quer que seja salvo
    //file_put_contents("funcionarios.pdf", $output);

} else {
    echo 'Nenhum dado Registrado';
}

