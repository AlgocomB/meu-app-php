<?php
session_start();

require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '/acoes/verifica_sessao.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/classes/cliente.class.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/controllers/cliente.controller.php");

$cliente = new Cliente();

if (isset($_POST) && isset($_POST['id'])) {
    $id         = addslashes(filter_input(INPUT_POST, 'id'));
    $nome       = addslashes(filter_input(INPUT_POST, 'nome'));
    $cpfcnpj    = addslashes(filter_input(INPUT_POST, 'cpfcnpj'));
    $telefone   = addslashes(filter_input(INPUT_POST, 'telefone'));
    var_dump($cpfcnpj);

    if (empty($nome) || empty($cpfcnpj)) {
        $_SESSION['mensagem'] = "Obrigatório informar Nome e CPF/CNPJ";
        $_SESSION['sucesso'] = false;
        header('Location:../public/cad_cliente.php?key=' . $id);
        die();
    }
    $cliente->setId($id);
    $cliente->setNome($nome);
    $cliente->setCpfCnpj($cpfcnpj);
    $cliente->setTelefone($telefone);

    $controller = new ClienteController();
    $resultado = $controller->atualizarCliente($cliente);

    if ($resultado) {
        $_SESSION['mensagem'] = "Cliente atualizado com sucesso.";
        $_SESSION['sucesso'] = true;
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar cliente.";
        $_SESSION['sucesso'] = false;
    }
    header('Location:../public/cad_cliente.php');
} else {

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $cpfcnpj = isset($_POST['cpfcnpj']) ? $_POST['cpfcnpj'] : null;
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;

    if ($nome && $cpfcnpj) {

        $cliente->setNome($nome);
        $cliente->setCpfCnpj($cpfcnpj);
        $cliente->setTelefone($telefone);

        $dao = new ClienteController();
        $resultado = $dao->criarCliente($cliente);
        if ($resultado) {
            $_SESSION['mensagem'] = "Cliente criado com sucesso.";
            $_SESSION['sucesso'] = true;
        } else {
            $_SESSION['mensagem'] = "Erro ao criar cliente.";
            $_SESSION['sucesso'] = false;
        }
    } else {
        $_SESSION['mensagem'] = "Obrigatório informar Nome e CPF/CNPJ";
        $_SESSION['sucesso'] = false;
    }
    header('Location:../public/cad_cliente.php');
}
