<?php
session_start();

require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/controllers/produto.controller.php");

$produto = new Produto();

$id = addslashes(filter_input(INPUT_POST, 'id'));
$produto->setId($id);

$controller = new ProdutoController();
$resultado = $controller->excluirProduto($id);

if ($resultado) {
    $_SESSION['mensagem'] = "Produto excluído com sucesso.";
    $_SESSION['sucesso'] = true;
} else {
    $_SESSION['mensagem'] = "Erro ao excluir produto.";
    $_SESSION['sucesso'] = false;
}
header('Location:../public/cad_produto.php');
