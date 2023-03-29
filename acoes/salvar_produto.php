<?php
session_start();

require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '/acoes/verifica_sessao.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/classes/produto.class.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/controllers/produto.controller.php");

$produto = new Produto();

if (isset($_POST) && isset($_POST['id']) && !empty($_POST['id'])) {
    $id           = intval(addslashes(filter_input(INPUT_POST, 'id')));
    $nome         = addslashes(filter_input(INPUT_POST, 'nome'));
    $descricao    = addslashes(filter_input(INPUT_POST, 'descricao'));
    $codigobarras = addslashes(filter_input(INPUT_POST, 'codigobarras'));
    $qtdeestoque  = addslashes(filter_input(INPUT_POST, 'qtdeestoque'));
    $ativo        = addslashes(filter_input(INPUT_POST, 'ativo'));

    if (empty($nome) || empty($codigobarras) || empty($qtdeestoque)) {
        $_SESSION['mensagem'] = "É necessário informar o nome, o código de barras e a quantidade em estoque.";
        $_SESSION['sucesso'] = false;
        header('Location:../public/cad_produto.php?key=' . $id);
        die();
    }
    $produto->setId($id);
    $produto->setNome($nome);
    $produto->setDescricao($descricao);
    $produto->setCodigoBarras($codigobarras);
    $produto->setQtdeEstoque($qtdeestoque);
    $produto->setAtivo($ativo);

    $controller = new ProdutoController();
    $resultado = $controller->atualizarProduto($produto);

    if ($resultado) {
        $_SESSION['mensagem'] = "Produto atualizado com sucesso";
        $_SESSION['sucesso'] = true;
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar produto.";
        $_SESSION['sucesso'] = false;
    }
    header('Location:../public/cad_produto.php');

} else {

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
    $codigobarras = isset($_POST['codigobarras']) ? $_POST['codigobarras'] : null;
    $qtdeestoque = isset($_POST['qtdeestoque']) ? $_POST['qtdeestoque'] : null;
    $ativo = isset($_POST['ativo']) ? $_POST['ativo'] : null;

    if ($nome && $codigobarras && $qtdeestoque) {

        $produto->setNome($nome);
        $produto->setDescricao($descricao);
        $produto->setCodigoBarras($codigobarras);
        $produto->setQtdeEstoque($qtdeestoque);
        $produto->setAtivo($ativo);

        $dao = new ProdutoController();
        $resultado = $dao->criarProduto($produto);
        
        if ($resultado) {
            $_SESSION['mensagem'] = "Produto criado com sucesso";
            $_SESSION['sucesso'] = true;
        } else {
            $_SESSION['mensagem'] = "Erro ao criar produto.";
            $_SESSION['sucesso'] = false;
        }
    } else {
        $_SESSION['mensagem'] = "É necessário informar o nome, o código de barras e a quantidade em estoque.";
        $_SESSION['sucesso'] = false;
    }
    header('Location:../public/cad_produto.php');
}
