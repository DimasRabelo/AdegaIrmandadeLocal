<?php

$id = $_GET["id"];
//echo $id;
require_once('class/vendas.php');
$venda = new VendasClass($id);

//echo $venda->idVenda;





if (isset($_POST['statusVenda'])) {



    $statusVenda = $_POST['statusVenda'];
    $valorTotalVenda = $_POST['valorTotalVenda'];
    $idFuncionario = $_POST['idFuncionario'];
    $idProduto = $_POST['idProduto'];

    $venda->statusVenda = $statusVenda;
    $venda->valorTotalVenda = $valorTotalVenda;
    $venda->idFuncionario = $idFuncionario;
    $venda->idProduto = $idProduto;

    $venda->Atualizar();
}

?>

<h1 class="h1Atual">Atualizar Venda</h1>
<form class="formVendas" action="index.php?p=vendas&v=atualizar&id=<?php echo $venda->idVenda ?>" method="POST" enctype="multipart/form-data">

    <div>
        <select class="seleVendas" aria-label="Default select example" name="statusVenda">
            <option selected disabled>Selecione o Status da Venda</option>
            <?php
            // Obtém o status da venda atualmente associado à venda
            $statusVendaAtual = $venda->statusVenda;

            // Define as opções do select
            $opcoesStatus = array(
                'ATIVO' => 'ATIVO',
                'DESATIVADO' => 'DESATIVADO'
            );

            // Itera sobre as opções e exibe cada uma delas
            foreach ($opcoesStatus as $valor => $texto) {
                // Verifica se o valor da opção corresponde ao status da venda associado à venda atual
                $selected = ($valor == $statusVendaAtual) ? 'selected' : '';
                echo "<option value='$valor' $selected>$texto</option>";
            }
            ?>
        </select>
    </div>


    <div>
        <label for="valorTotalVenda"> Valor Total</label>
        <input type="text" name="valorTotalVenda" id="valorTotalVenda" placeholder="digite o valor" value="R$ <?php echo $venda->valorTotalVenda; ?>">
    </div>

    <div>
        <select class="seleVendas" aria-label="Default select example" name="idFuncionario" id="idFuncionario" required>
            <option selected disabled>Selecione o Funcionário</option>

            <?php
            // Require da classe FuncionarioClass
            require_once('class/funcionario.php');

            // Instância da classe FuncionarioClass
            $funcionarioClass = new FuncionarioClass();

            // Obtém os funcionários ativos usando o método listarAtivos()
            $funcionarios = $funcionarioClass->listarAtivos();

            // Obtém o ID do funcionário atualmente cadastrado na venda
            $idFuncionarioVenda = $venda->idFuncionario;

            foreach ($funcionarios as $funcionario) {
                // Verifica se o ID do funcionário sendo iterado no loop é igual ao ID do funcionário associado à venda
                $selected = ($funcionario['idFuncionario'] == $idFuncionarioVenda) ? 'selected' : '';

                // Exibe a opção do select, marcando-a como selecionada se for o funcionário atual associado à venda
                echo "<option value='{$funcionario['idFuncionario']}' $selected>{$funcionario['nomeFuncionario']}</option>";
            }
            ?>
        </select>
    </div>



    <div>
        <select class="seleVendas" aria-label="Default select example" name="idProduto" id="idProduto" required>
            <option selected disabled>Selecione o Produto</option>

            <?php
            // Require da classe ProdutoClass
            require_once('class/produto.php');

            // Instância da classe ProdutoClass
            $produtoClass = new ProdutoClass();

            // Obtém os produtos ativos usando o método listarProdutosAtivos()
            $produtosAtivos = $produtoClass->listarProdutosAtivos();

            // Obtém o ID do produto atualmente cadastrado na venda
            $idProdutoVenda = $venda->idProduto;

            foreach ($produtosAtivos as $produto) {
                // Verifica se o ID do produto sendo iterado no loop é igual ao ID do produto associado à venda
                $selected = ($produto['idProduto'] == $idProdutoVenda) ? 'selected' : '';

                // Exibe a opção do select, marcando-a como selecionada se for o produto atual associado à venda
                echo "<option value='{$produto['idProduto']}' $selected>{$produto['nomeProduto']}</option>";
            }

            // Listar produtos desativados
            $produtosDesativados = $produtoClass->listarProdutosDesativados();
            foreach ($produtosDesativados as $produto) {
                // Verifica se o ID do produto desativado é igual ao ID do produto associado à venda
                $selected = ($produto['idProduto'] == $idProdutoVenda) ? 'selected' : '';

                // Exibe a opção do select, marcando-a como selecionada se for o produto atual associado à venda
                echo "<option value='{$produto['idProduto']}' $selected>{$produto['nomeProduto']} (Desativado)</option>";
            }
            ?>
        </select>
    </div>


    <div>
        <button type="submit">Atualizar Venda</button>
    </div>

</form>