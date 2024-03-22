<?php
// Inclua o arquivo vendas.php
require_once 'class/vendas.php';

// Crie uma instância da classe Vendas
$vendas = new VendasClass();

// Recupere os dados de vendas do método da classe Vendas
$dados_vendas = $vendas->listarVendasAtivas();

// Formate os dados de vendas para uso no gráfico Highcharts
$data_vendas = array();
foreach ($dados_vendas as $venda) {
    $data_vendas[] = array(
        'name' => $venda['nomeFuncionario'],
        'y' => intval($venda['valorTotalVenda'])
    );
}

require_once 'class/estoque.php';

$estoque = new EstoqueClass();

$dados_estoque = $estoque->listarEstoque();

// Formate os dados de estoque para uso no gráfico Highcharts
$data_estoque = array();
foreach ($dados_estoque as $item) {
    $data_estoque[] = array(
        'name' => $item['nomeProduto'],
        'y' => intval($item['quantidadeEstoque'])
    );
}
?>

<Style>


    text{
        font-family: 'Secular One';
        font-weight: bold;
    }
</Style>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik&family=Secular+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./src/css/reset.css" />

    
</head>

<body>

    <button><a href="index.php?p=galeria">Galeria</a></button>
    <button><a href="index.php?p=banner">Banners</a></button>

    <!-- Contêiner para o gráfico -->
    <div id="chart-container"></div>
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="./js/scrips.js"></script>

    <!-- Script para inicializar o gráfico -->
    <script>
        // Criar o gráfico Highcharts para vendas
        Highcharts.chart('chart-container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'DETALHAMENTO DE VENDAS POR FUNCIONÁRIOS'
            },
            xAxis: {
                type: 'category',
                title: {
                    text: 'FUNCIONÁRIO'
                }
            },
            yAxis: {
                title: {
                    text: 'VALOR TOTAL DE VENDAS (R$)'
                }
            },
            series: [{
                name: 'VENDAS',
                colorByPoint: true,
                data: <?php echo json_encode($data_vendas); ?> 
            }]
        });
    </script>

    <!-- Script para inicializar o gráfico de estoque -->
    <script>
        // Dados do estoque
        var dadosEstoque = <?php echo json_encode($data_estoque); ?>;

        // Preparar os dados para Highcharts
        var categoriasEstoque = [];
        var seriesDataEstoque = [];

        dadosEstoque.forEach(function(item) {
            categoriasEstoque.push(item.name); // Utilizando o campo nomeProduto
            seriesDataEstoque.push(item.y); // Utilizando o campo quantidadeEstoque
        });

        // Configurações do gráfico
        Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'QUANTIDADE TOTAL POR PRODUTOS'
            },
            xAxis: {
                categories: categoriasEstoque
            },
            yAxis: {
                title: {
                    text: 'QUANTIDADE'
                }
            },
            series: [{
                name: 'QUANTIDADE',
                data: seriesDataEstoque
            }]
        });
    </script>
</body>


</html>
