<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/DAO/ProdutoDAO.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/classes/produto.class.php");

class ProdutoController {
    public function buscarTodos(){
        $dao = new ProdutoDAO();
        return $dao->buscarTodos();
    }

    public function buscarPorId($id){
        $dao = new ProdutoDAO();
        return $dao->buscarUm($id);
    }

    public function criarProduto(Produto $produto){
        $dao = new ProdutoDAO();
        return $dao->inserirProduto($produto);
    }

    public function atualizarProduto(Produto $produto) {
        $dao = new ProdutoDAO();
        return $dao->atualizaProduto($produto);
    }

    public function excluirProduto($id){
        $dao = new ProdutoDAO();
        return $dao->removeProduto($id);
    }
}