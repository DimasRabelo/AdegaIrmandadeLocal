<?php

$id = $_GET["id"];
echo $id;
require_once('class/estoque.php');
$estoque = new EstoqueClass($id);

echo $estoque->nomeEstoque;

if (isset($_POST['nomeEstoque'])) {

    $nomeEstoque = $_POST['nomeEstoque'];
    $quantidadeEstoque = $_POST['quantidadeEstoque'];
    $statusEstoque = $_POST['statusEstoque'];
    $idProduto = $_POST['idProduto'];

    $estoque->nomeEstoque = $nomeEstoque;
    $estoque->quantidadeEstoque = $quantidadeEstoque;
    $estoque->statusEstoque = $statusEstoque;
    $estoque->idProduto = $idProduto;

    $estoque->Atualizar();
}



?>


<h1>Atualizar Estoque</h1>
<form class="formEstoque" action="index.php?p=estoque&e=atualizar&id=<?php echo $estoque->idEstoque ?>" method="POST" enctype="multipart/form-data">

    <div>
        <label for="nomeEstoque"> Nome do Estoque</label>
        <input type="text" name="nomeEstoque" id="nomeEstoque" required placeholder="nome estoque" value="<?php echo $estoque->nomeEstoque; ?>">
    </div>



    <select class="seleEstoque" aria-label="Default select example" name="idProduto" id="idProduto" required>
        <option selected disabled>Seleciona o Produto</option>

        <?php

        require_once('class/produto.php');

        // Instância da classe ProdutoClass
        $produtoClass = new ProdutoClass();

        // Obtém os produtos ativos usando o método listarProdutosAtivos()
        $produtosAtivos = $produtoClass->listarProdutosAtivos();

        // Obtém o ID do produto atualmente cadastrado na venda
        $idProdutoEstoque = $estoque->idProduto;

        foreach ($produtosAtivos as $produto) {
            // Verifica se o ID do produto sendo iterado no loop é igual ao ID do produto associado à venda
            $selected = ($produto['idProduto'] == $idProdutoEstoque) ? 'selected' : '';

            // Exibe a opção do select, marcando-a como selecionada se for o produto atual associado à venda
            echo "<option value='{$produto['idProduto']}' $selected>{$produto['nomeProduto']}</option>";
        }
        // Listar produtos desativados
        $produtosDesativados = $produtoClass->listarProdutosDesativados();
        foreach ($produtosDesativados as $produto) {
            echo "<option value='{$produto['idProduto']}'>{$produto['nomeProduto']} (Desativado)</option>";
        }
        ?>
    </select>


    <div>
        <label for="quantidadeEstoque"> Quantidade</label>
        <input type="text" name="quantidadeEstoque" id="quantidadeEstoque" placeholder="quantidade" value="<?php echo $estoque->quantidadeEstoque; ?>">
    </div>

    <div>
        <select class="seleEstoque" aria-label="Default select example" name="statusEstoque">
            <option selected disabled>Selecione o Status do Estoque</option>
            <?php
            // Obtém o status da venda atualmente associado à venda
            $statusEstoqueAtual = $estoque->statusEstoque;

            // Define as opções do select
            $opcoesStatus = array(
                'ATIVO' => 'ATIVO',
                'DESATIVADO' => 'DESATIVADO'
            );

            // Itera sobre as opções e exibe cada uma delas
            foreach ($opcoesStatus as $valor => $texto) {
                // Verifica se o valor da opção corresponde ao status da venda associado à venda atual
                $selected = ($valor == $statusEstoqueAtual) ? 'selected' : '';
                echo "<option value='$valor' $selected>$texto</option>";
            }
            ?>
        </select>
    </div>


    <div>
        <button type="submit">Atualizar Estoque</button>
    </div>

</form>