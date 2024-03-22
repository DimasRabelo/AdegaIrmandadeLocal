<?php

$id = $_GET["id"];
//echo $id;
require_once("class/produto.php");
$produto = new ProdutoClass($id);

//echo $produto->nomeProduto;



if (isset($_POST['nomeProduto'])) {


    $nomeProduto = $_POST['nomeProduto'];
    $descricaoProduto = $_POST['descricaoProduto'];
    $categoriaProduto = $_POST['categoriaProduto'];
    $statusProduto = $_POST['$statusProduto'];
    $precoCompraProduto = $_POST['precoCompraProduto'];
    $precoVendaProduto = $_POST['precoVendaProduto'];
    $fornecedorProduto = $_POST['fornecedorProduto'];


    $produto->nomeProduto = $nomeProduto;
    $produto->descricaoProduto = $descricaoProduto;
    $produto->categoriaProduto = $categoriaProduto;
    $produto->statusProduto = $statusProduto;
    $produto->precoCompraProduto = $precoCompraProduto;
    $produto->precoVendaProduto = $precoVendaProduto;
    $produto->fornecedorProduto = $fornecedorProduto;

    $produto->Atualizar();
}


?>

<h1   class="h1Atual">Atualizar Produto</h1>
<form action="index.php?p=produtos&pr=atualizar&id=<?php echo $produto->idProduto ?>" method="POST" enctype="multipart/form-data">

    <div>
        <label for="nomeProduto"> Nome do Produto</label>
        <input type="text" name="nomeProduto" id="nomeProduto" placeholder="Informe o Produto" value="<?php echo $produto->nomeProduto ?>">

    </div>

    <div>
        <label for="descricaoProduto">Descrição:</label>
        <div>
            <textarea name="descricaoProduto" id="descricaoProduto" cols="37" rows="10" required="" placeholder="descrição do produto:"><?php echo $produto->descricaoProduto ?></textarea>
        </div>
    </div>


    <div>
        <select class="seleproduto" aria-label="Default select example" name="categoriaProduto">
            <option selected disabled>Selecione a Categoria</option>
            <?php
            // Obtém o status da venda atualmente associado à venda
            $categoriaProdutoAtual = $produto->categoriaProduto;

            // Define as opções do select
            $opcoesCategoria = array(
                'ALCOOLICO' => 'ALCOOLICO',
                'NÃO ALCOÓLICO' => 'NÃO ALCOÓLICO',
                'TABACARIA' => 'TABACARIA'
            );

            // Itera sobre as opções e exibe cada uma delas
            foreach ($opcoesCategoria as $valor => $texto) {
               
                $selected = ($valor == $categoriaProdutoAtual) ? 'selected' : '';
                echo "<option value='$valor' $selected>$texto</option>";
            }
            ?>
        </select>
    </div>






    <div>
    <div>
        <select class="selestatus" aria-label="Default select example" name="statusProduto">
            <option selected disabled>Selecione o Status do Produto</option>
            <?php
            // Obtém o status do produto atualmente associado à venda
            $statusProdutoAtual = $produto->statusProduto;

            // Define as opções do select
            $opcoesStatus = array(
                'ATIVO' => 'ATIVO',
                'DESATIVADO' => 'DESATIVADO'
            );

            // Itera sobre as opções e exibe cada uma delas
            foreach ($opcoesStatus as $valor => $texto) {
               
                $selected = ($valor == $statusProdutoAtual) ? 'selected' : '';
                echo "<option value='$valor' $selected>$texto</option>";
            }
            ?>
        </select>
    </div>





    </div>

    <div>
        <label for="precoCompraProduto">Preço de Compra</label>
        <input type="text" name="precoCompraProduto" pattern="\d+(\.\d{1,2})?" id="precoCompraProduto" placeholder="digite o valor da compra" value="R$<?php echo $produto->precoCompraProduto ?>">
    </div>

    <div>
        <label for="precoVendaProduto">Preço de Venda</label>
        <input type="text" name="precoVendaProduto" pattern="\d+(\.\d{1,2})?" id="precoVendaProduto" placeholder="digite o preço de venda" value="R$<?php echo $produto->precoVendaProduto ?>">
    </div>

    <div>
        <label for="fornecedorProduto">Fornecedor</label>
        <input type="text" name="fornecedorProduto" id="fornecedorProduto" placeholder="digite o fornecedor" value="<?php echo $produto->fornecedorProduto ?>">
    </div>



    <div>
        <button type="submit">Atualizar Produto</button>
    </div>

</form>