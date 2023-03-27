<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/DAO/ClienteDAO.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/classes/cliente.class.php");

class ClienteController{

    public function buscarTodos(){
        $dao = new ClienteDAO();
        return $dao->buscarTodos();
    }

    public function buscarPorId($id){
        $dao = new ClienteDAO();
        return $dao->buscarUm($id);
    }

    public function criarCliente(Cliente $cliente){
        $dao = new ClienteDAO();
        return $dao->inserirCliente($cliente);
    }

    public function atualizarCliente(Cliente $cliente) {
        $dao = new ClienteDAO();
        return $dao->atualizaCliente($cliente);
    }

    public function excluirCliente($id){
        $dao = new ClienteDAO();
        return $dao->removeCliente($id);
    }
}
