<?php
    if (isset($_POST['statusVenda'])) {

        $statusVenda = $_POST['statusVenda'];
        $quantidadeVenda = $_POST['quantidadeVenda'];
        $idFuncionario = $_POST['idFuncionario'];
        $idProduto = $_POST['idProduto'];
        
        require_once('class/vendas.php');

        $venda = new VendasClass(); 

        $venda->statusVenda = $statusVenda;
        $venda->quantidadeVenda = $quantidadeVenda;
        $venda->idFuncionario = $idFuncionario;
        $venda->idProduto = $idProduto;
  
        $venda->Cadastrar();
    }
?>





<h1 class="h1Atual">Cadastrar Venda</h1>
<form class="formVendas"   action="index.php?p=vendas&v=cadastrar" method="POST" enctype="multipart/form-data">

    <div>
        <select class="seleVendas"   aria-label="Default select example" name="statusVenda" required>
            <option selected disabled>Selecione o Status da Venda</option>
            <option value="ATIVO">ATIVO</option>
            <option value="DESATIVADO">DESATIVADO</option>
        </select>
    </div>

    <div>
        <label for="quantidadeVenda">Quantidade:</label>
        <input type="text" name="quantidadeVenda" pattern="\d+(\.\d{1,2})?" id="quantidadeVenda" required placeholder="digite a quantidade">
    </div>

    <div>
        <select class="seleVendas"   aria-label="Default select example" name="idFuncionario" id="idFuncionario" required>
            <option selected disabled>Selecione o Funcionário</option>

            <?php

            require_once('class/funcionario.php');

            $funcionarioClass = new FuncionarioClass();
            $funcionario = $funcionarioClass->listarAtivos();

            foreach ($funcionario as $funcionario) {
                echo "<option value='{$funcionario['idFuncionario']}'>{$funcionario['nomeFuncionario']}</option>";
            }
            ?>
        </select>
    </div>
   
   

    <div>

        <select class="seleVendas" aria-label="Default select example" name="idProduto" id="idProduto" required>
            <option selected disabled>Selecione o Produto</option>

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
        <button type="submit">Cadastrar Venda</button>
    </div>

</form>