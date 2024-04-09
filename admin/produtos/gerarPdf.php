<?php



require_once("class/conexao.php");
require_once("class/produto.php");
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$proPdf = new ProdutoClass();

// Chama o método geradorPDF() para obter os dados dos funcionários
$resultado = $proPdf->geradorPDF();

if ($resultado && count($resultado) > 0) {
    // Constrói a tabela HTML
    $html = "<html><head><style>@font-face { font-family: 'Secular One'; src: url('/path/to/secular-one.ttf') format('truetype'); }</style></head><body><table>";

    // Adiciona títulos dos campos
    $html .= "<tr>";
    $html .= "<th>Produto</th>";
    $html .= "<th>Descrição</th>";
    $html .= "</tr>";

    foreach ($resultado as $row) {
        $html .= "<tr>";
        $html .= "<td>" . $row['nomeProduto'] . "</td>";
        $html .= "<td>" . $row['descricaoProduto'] . "</td>";
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
    $dompdf->stream("produtos.pdf");

    //$output = $dompdf->output();

    // defina aqui o nome do arquivo que você quer que seja salvo
    //file_put_contents("produtos.pdf", $output);

} else {
    echo 'Nenhum dado Registrado';
}

