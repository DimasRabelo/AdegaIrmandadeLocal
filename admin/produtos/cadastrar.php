<?php
if (isset($_POST['nomeProduto'])){

    $nomeProduto = $_POST['nomeProduto'];
    $descricaoProduto = $_POST['descricaoProduto'];
    $categoriaProduto = $_POST['categoriaProduto'];
    $statusProduto = $_POST['statusProduto'];
    $precoCompraProduto = $_POST['precoCompraProduto'];
    $precoVendaProduto = $_POST['precoVendaProduto'];
    $fornecedorProduto = $_POST['fornecedorProduto'];
    

   require_once('class/produto.php') ;

   $produto = new ProdutoClass();

   
   $produto->nomeProduto = $nomeProduto;
   $produto->descricaoProduto = $descricaoProduto;
   $produto->categoriaProduto = $categoriaProduto;
   $produto->statusProduto = $statusProduto;
   $produto->precoCompraProduto = $precoCompraProduto;
   $produto->precoVendaProduto = $precoVendaProduto;
   $produto->fornecedorProduto = $fornecedorProduto;

   
   $produto->Cadastrar();


}




?>



<h1 class="h1Atual">Cadastrar Produto</h1>
<form action="index.php?p=produtos&pr=cadastrar" method="POST" enctype="multipart/form-data">

    <div>
        <label for="nomeProduto"> Nome do Produto:</label>
        <input type="text" name="nomeProduto" id="nomeProduto" required placeholder="Informe o Produto">

    </div>

    <div>
        <label for="descricaoProduto">Descrição:</label>
        <div>
            <textarea name="descricaoProduto" id="descricaoProduto" cols="37" rows="10" required="" placeholder="descrição do produto:"></textarea>
        </div>
    </div>

    <div>
        <select class="seleproduto" aria-label="Default select example" name="categoriaProduto" required>
            <option selected="">Selecione a Categoria do Produto</option>
            <option value="ALCOOLICO">ALCOÓLICO</option>
            <option value="NAOALCOOLICO">NÃO ALCOÓLICO</option>
           
        </select>
    </div>

    <div>
        <select class="selestatus" aria-label="Default select example" name="statusProduto" required>
            <option selected="">Seleciona o Status do Produto</option>
            <option value="ATIVO">ATIVO</option>
            <option value="DESATIVADO">DESATIVADO</option>
            <option value="INATIVO">INATIVO</option>
        </select>
    </div>

    <div>
        <label for="precoCompraProduto">Preço de Compra R$:</label>
        <input type="text" name="precoCompraProduto"  id="precoCompraProduto" required placeholder="digite o valor da compra" >
    </div>

    <div>
        <label for="precoVendaProduto">Preço de Venda R$:</label>
        <input type="text" name="precoVendaProduto" id="precoVendaProduto" required placeholder="digite o preço de venda">
    </div>

    <div>
        <label for="fornecedorProduto">Fornecedor:</label>
        <input type="text" name="fornecedorProduto" id="fornecedorProduto" required placeholder="digite o fornecedor">
    </div>



    <div>
        <button type="submit">Cadastrar Produto</button>
    </div>

</form>