<?php
// Inclua a classe ContatoClass
require_once('class/contato.php');

// Instancie a classe ContatoClass
$contato = new ContatoClass();

// Inicializa as listas de ativos, desativados e respondidos
$listaativos = $contato->listarativos();
$listadesativados = $contato->listardesativados();
$listarespondidos = $contato->listarrespondidos();

// Inicializa a variável $statusFiltrar
$statusFiltrar = 'ATIVO'; // Definindo como ativo por padrão

// Verifica se o filtro de status foi aplicado
if (isset($_POST['statusContato'])) {
    $statusFiltrar = $_POST['statusContato'];
}

// Inicializa a lista filtrada com base no status selecionado
switch ($statusFiltrar) {
    case 'ATIVO':
        $listaFiltrada = $listaativos;
        break;
    case 'DESATIVADO':
        $listaFiltrada = $listadesativados;
        break;
    case 'RESPONDIDO':
        $listaFiltrada = $listarespondidos;
        break;
    default:
        // Nenhum filtro aplicado, mantém a lista geral
        $listaFiltrada = array_merge($listaativos, $listadesativados, $listarespondidos);
        break;
}

// Filtra a lista com base no termo de pesquisa
if (isset($_POST['searchInput'])) {
    $searchTerm = strtolower($_POST['searchInput']);

    // Filtra a lista com base no termo de pesquisa
    $listaFiltrada = array_filter($listaFiltrada, function ($linha) use ($searchTerm) {
        return stripos(strtolower($linha['nomeContato']), $searchTerm) !== false;
    });
}

// Lógica para contar os funcionários ativos
$totalativos = count($listaativos);

// Lógica para contar os funcionários desativados
$totaldesativados = count($listadesativados);
?>

<!-- HTML para o formulário de pesquisa -->
<div>
    <form class="CampoPes" action="" method="POST">
        <input type="text" id="searchInput" name="searchInput" placeholder="Digite o Nome do Contato">
        <button type="submit">Pesquisar</button>
    </form>
</div>

<!-- HTML para o formulário de filtro de status -->
<form class="formStatus" action="" method="POST">
    <div>
        <select class="seleAtual" aria-label="Default select example" name="statusContato">
            <option value="" selected disabled>Selecione um Status da Lista</option>
            <option value="ATIVO" <?php echo ($statusFiltrar === 'ATIVO') ? 'selected' : ''; ?>>ATIVOS</option>
            <option value="DESATIVADO" <?php echo ($statusFiltrar === 'DESATIVADO') ? 'selected' : ''; ?>>DESATIVADOS</option>
            <option value="RESPONDIDO" <?php echo ($statusFiltrar === 'RESPONDIDO') ? 'selected' : ''; ?>>RESPONDIDOS</option>
        </select>

        <button type="submit">Filtrar</button>
    </div>
    <div>
        <?php if ($statusFiltrar === 'ATIVO') : ?>
            <p class="total">Total de ativos: <?php echo $totalativos; ?></p>
        <?php elseif ($statusFiltrar === 'DESATIVADO') : ?>
            <p class="total">Total de desativados: <?php echo $totaldesativados; ?></p>
        <?php elseif ($statusFiltrar === 'RESPONDIDO') : ?>
            <p class="total">Total de respondidos: <?php echo count($listarespondidos); ?></p>
        <?php endif; ?>
    </div>
</form>

<!-- Tabela para exibir a lista de contatos -->
<div class="table-container" id="arrastarMouse">
    <table>
        <caption>Lista de Email</caption>
        <thead>
            <tr>
                <th>Status</th>
                <th>Nome Contato</th>
                <th>E-mail Contato</th>
                <th>Telefone Contato</th>
                <th>Mensagem</th>
                <th>Data da Mensagem</th>
                <th>Hora da Mensagem</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verifica se a lista filtrada está vazia
            if (!empty($listaFiltrada)) {
                foreach ($listaFiltrada as $linha) : ?>
                    <tr>
                        <td><?php echo $linha['statusContato'] ?></td>
                        <td><?php echo $linha['nomeContato']; ?></td>
                        <td><?php echo $linha['emailContato']; ?></td>
                        <td><?php echo $linha['telefoneContato']; ?></td>
                        <td><?php echo $linha['mensagemContato'] ?></td>
                        <td><?php echo date('d/m/Y', strtotime($linha['dataContato'])) ?></td>
                        <td><?php echo $linha['horaContato'] ?></td>
                    </tr>
            <?php endforeach;
            } else {
                // Caso a lista esteja vazia, exibe uma mensagem
                echo "<tr><td colspan='7'>Nenhum dado disponível</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
