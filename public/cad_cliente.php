<?php
require_once('./header.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '/acoes/verifica_sessao.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/classes/cliente.class.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/controllers/cliente.controller.php");

$cliente = new Cliente();

if (isset($_GET) && isset($_GET['key'])) {
    $id = filter_input(INPUT_GET, 'key');
    $controller = new ClienteController();
    $cliente = $controller->buscarPorId($id);
}

?>

<div class="container">
    <?php require_once('nav.php'); ?>
    <h1>Cadastro de Clientes </h1>

    <form method="POST" action="../acoes/salvar_cliente.php">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $cliente->getNome() ?>">
            <input type="hidden" name="id" value="<?= $cliente->getId(); ?>">
        </div>
        <div class="mb-3">
            <label for="cpfcnpj" class="form-label">CPF/CNPJ</label>
            <input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" value="<?= $cliente->getCpfCnpj() ?>">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" value="<?= $cliente->getTelefone() ?>">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="submit" class="btn btn-primary" formaction="../acoes/excluir_cliente.php">Excluir</button>
    </form>

    <?php
    if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == TRUE) {
    ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php
    }
    if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == false) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php
    }
    unset($_SESSION['sucesso'], $_SESSION['mensagem']);
    ?>

</div>

<?php
require_once('./footer.php');
