<?php
if (isset($_POST['nomeEstoque'])) {

    $nomeEstoque = $_POST['nomeEstoque'];
    $quantidadeEstoque = $_POST['quantidadeEstoque'];
    $statusEstoque = $_POST['statusEstoque'];
    $idProduto = $_POST['idProduto'];

    require_once('class/estoque.php');

    $estoque = new EstoqueClass();

    $estoque->nomeEstoque = $nomeEstoque;
    $estoque->quantidadeEstoque = $quantidadeEstoque;
    $estoque->statusEstoque = $statusEstoque;
    $estoque->idProduto = $idProduto;

    $estoque->Cadastrar();
}
?>

<h1  class="h1Atual">Cadastrar Estoque</h1>
<form class="formEstoque" action="index.php?p=estoque&e=cadastrar" method="POST" enctype="multipart/form-data">

    <div>
        <label for="nomeEstoque"> Nome do Estoque:</label>
        <input type="text" name="nomeEstoque" id="nomeEstoque" required placeholder="nome estoque">
    </div>

    <div>

        <select class="seleEstoque" aria-label="Default select example" name="idProduto" id="idProduto" required>
            <option selected disabled>Seleciona o Produto</option>

            <?php

            require_once('class/produto.php');

            $produtoClass = new ProdutoClass();
            
            
            // Listar produtos ativos
            $produtosAtivos = $produtoClass->listarProdutosAtivos();
            foreach ($produtosAtivos as $produto) {
                echo "<option value='{$produto['idProduto']}'>{$produto['nomeProduto']}</option>";
            }

            // Listar produtos desativados
            $produtosDesativados = $produtoClass->listarProdutosDesativados();
            foreach ($produtosDesativados as $produto) {
                echo "<option value='{$produto['idProduto']}'>{$produto['nomeProduto']} (Desativado)</option>";
            }
            ?>
        </select>
    </div>

    <div>
        <label for="quantidadeEstoque"> Quantidade:</label>
        <input type="text" name="quantidadeEstoque" id="quantidadeEstoque" required placeholder="quantidade">
    </div>

    <div>
        <select class="seleEstoque" aria-label="Default select example" name="statusEstoque" required>
            <option selected disabled>Seleciona o Status do Estoque</option>
            <option value="ATIVO">ATIVO</option>
            <option value="DESATIVADO">DESATIVADO</option>
            <option value="INATIVO">INATIVO</option>
        </select>
    </div>

    <div>
        <button type="submit">Cadastrar Estoque</button>
    </div>

</form>