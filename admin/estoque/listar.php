<?php
require_once('class/estoque.php');
$estoque = new EstoqueClass();

// Inicializa a lista completa de funcionários ativos
$listaAtivos = $estoque->listarEstoque();
$listaDesativados = $estoque->listarEstoqueDesativados();

//var_dump($listaAtivos);
//var_dump($listaDesativados);

// Inicializa a lista filtrada combinando ambas as listas
$listaFiltrada = array_merge($listaAtivos, $listaDesativados);

// Inicializa a variável $statusFiltrar
$statusFiltrar = '';

// Verifica se o filtro de status foi aplicado
if (isset($_POST['statusEstoque'])) {
    $statusFiltrar = $_POST['statusEstoque'];

    if ($statusFiltrar === 'DESATIVADO') {
        $listaFiltrada = $listaDesativados;
    }
}

if (isset($_POST['searchInput'])) {
    $searchTerm = strtolower($_POST['searchInput']);

    // Filtra a lista com base no nome do produto
    $listaFiltrada = array_filter($listaFiltrada, function ($linha) use ($searchTerm) {
        $nomeProduto = strtolower($linha['nomeProduto']);
        return stripos($nomeProduto, $searchTerm) !== false;
    });
}

// Agora, $listaFiltrada contém a lista de funcionários a ser exibida

// Lógica para contar todos os funcionários
$totalCadastrados = count($listaFiltrada);

// Lógica para contar os funcionários ativos
$totalAtivos = count($listaAtivos);

// Lógica para contar os funcionários desativados
$totalDesativados = count($listaDesativados);
?>



<div>
    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="index.php?p=estoque&e=cadastrar">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-repeat" viewBox="0 0 16 16">
            <path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z" />
        </svg>
        Novo Estoque
    </a>


</div>

<div>
    <form class="CampoPes" action="" method="POST">
        <input type="text" id="searchInput" name="searchInput" placeholder="Digite o nome do Estoque ou Produto">
        <button type="submit">Pesquisar</button>
    </form>
</div>

<?php if (empty($statusFiltrar) || $statusFiltrar === 'LISTA GERAL') : ?>
    <div class="legenda-status">
        <div class="bolinha verde"></div>
        <span>Ativo</span>

        <div class="bolinha vermelha"></div>
        <span>Desativado</span>
    </div>
<?php endif; ?>


<form class="formStatus" action="" method="POST">
    <div>
        <select class="seleAtual" aria-label="Default select example" name="statusEstoque">
            <option value="" selected disabled>Selecione um Status da Lista</option>
            <option value="" <?php echo empty($statusFiltrar) ? 'selected' : 'LISTA GERAL'; ?>>LISTA GERAL</option>
            <option value="ATIVO" <?php echo ($statusFiltrar === 'ATIVO') ? 'selected' : ''; ?>>ATIVOS</option>
            <option value="DESATIVADO" <?php echo ($statusFiltrar === 'DESATIVADO') ? 'selected' : ''; ?>>DESATIVADOS</option>
        </select>
        <button type="submit">Filtrar</button>
    </div>
    <div>
        <?php if ($statusFiltrar === 'ATIVO') : ?>
            <p class="total">Total de ativos: <?php echo $totalAtivos; ?></p>
        <?php elseif ($statusFiltrar === 'DESATIVADO') : ?>
            <p class="total">Total de desativados: <?php echo $totalDesativados; ?></p>
        <?php else : ?>
            <p class="total">Lista Geral de Cadastro: <?php echo $totalCadastrados; ?></p>
        <?php endif; ?>
    </div>
</form>






<div class="table-container" id="arrastarMouse">
    <div>
        <table>
            <caption>Lista Estoque</caption>
            <thead>
                <tr>

                    
                    <?php if (empty($statusFiltrar) || $statusFiltrar === 'LISTA GERAL') : ?>
                        <th class="spanstatus">Status</th>
                    <?php endif; ?>
                    <?php if ($statusFiltrar === 'DESATIVADO') : ?>
                        <th class="ativar">Ativar</th>
                    <?php endif; ?>

                    <th>Produto</th>
                    <?php if ($statusFiltrar !== 'DESATIVADO') : ?>
                        <th>Alterar ou Desativar</th>

                    <?php endif; ?>
                    <th>Quantidade</th>
                    <th>Data Cadastro</th>
                    <th>Data Atualização</th>
                    <th>Hora</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaFiltrada as $linha) : ?>
                    <?php if (empty($statusFiltrar) || $linha['statusEstoque'] === $statusFiltrar) : ?>
                        <tr>
                          


                            <?php if (empty($statusFiltrar) || $statusFiltrar === 'LISTA GERAL') : ?>
                                <td class="spanstatus">
                                    <?php if ($linha['statusEstoque'] === 'ATIVO') : ?>
                                        <span class="status-span active-status"></span>
                                    <?php else : ?>
                                        <span class="status-span inactive-status"></span>
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                            <?php if ($statusFiltrar === 'DESATIVADO') : ?>
                                <td class="ativar">
                                    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="index.php?p=estoque&e=ativar&id=<?php echo $linha['idEstoque']; ?>" onclick="return confirmarAtivacao()">
                                        <img src="./img/aceitar.png" alt="">

                                    </a>
                                </td>
                            <?php endif; ?>

                            <td><?php echo $linha['nomeProduto'] ?></td>
                            <?php if ($statusFiltrar !== 'DESATIVADO') : ?>
                                <td class="btngrudsicone">
                                    <a href="index.php?p=estoque&e=atualizar&id=<?php echo $linha['idEstoque'] ?>" >
                                        <img src="./img/setas-flechas.png" alt="">
                                    </a>



                                    <a href="index.php?p=estoque&e=desativar&id=<?php echo $linha['idEstoque'] ?>" onclick="return confirmarDesativacao()">
                                        <img src="./img/lixeira-de-reciclagem.png" alt="">
                                    </a>
                                </td>
                            <?php endif; ?>
                            <td><?php echo $linha['quantidadeEstoque'] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($linha['dataCadastroEstoque'])) ?></td>
                            <td><?php echo date('d/m/Y', strtotime($linha['dataAtualiEstoque'])) ?></td>
                            <td><?php echo $linha['horaEstoque'] ?></td>


                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>