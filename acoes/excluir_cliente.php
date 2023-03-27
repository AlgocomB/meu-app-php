<?php
session_start();

require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/controllers/cliente.controller.php");

$cliente = new Cliente();

$id = addslashes(filter_input(INPUT_POST, 'id'));
$cliente->setId($id);

$controller = new ClienteController();
$resultado = $controller->excluirCliente($id);

if ($resultado) {
    $_SESSION['mensagem'] = "Excluído com sucesso";
    $_SESSION['sucesso'] = true;
} else {
    $_SESSION['mensagem'] = "Erro ao excluir";
    $_SESSION['sucesso'] = false;
}
header('Location:../public/cad_cliente.php');
