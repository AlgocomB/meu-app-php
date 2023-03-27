<?php

require_once('./header.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/acoes/verifica_sessao.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/controllers/cliente.controller.php');

$controller = new ClienteController();
$clientes = $controller->buscarTodos();

?>
<div class="container">
    <?php require_once('nav.php'); ?>

    <h1>Lista de Clientes</h1>
    <a class="btn btn-primary" href="cad_cliente.php">Novo Cliente</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF/CNPJ</th>
                <th scope="col">Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($clientes as $c) :
            ?>
                <tr>
                    <td><?= $c->getId(); ?></td>
                    <td><?= $c->getNome(); ?></td>
                    <td><?= $c->getCpfCnpj(); ?></td>
                    <td><?= $c->getTelefone(); ?></td>
                    <td>
                        <a class="btn btn-light" href="cad_cliente.php?key=<?=$c->getId()?>">Editar</a>
                        <a class="btn btn-link" href="cad_cliente.php?key=<?=$c->getId()?>">Excluir</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>



</div>

<?php
require_once('./footer.php');
