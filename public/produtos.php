<?php

require_once('./header.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/acoes/verifica_sessao.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/controllers/produto.controller.php');

$controller = new ProdutoController();
$produtos = $controller->buscarTodos();

?>
<div class="container">
    <?php require_once('nav.php'); ?>

    <h1>Lista de Produtos</h1>
    <a class="btn btn-primary" href="cad_produto.php">Novo Produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Código de Barras</th>
                <th scope="col">Qtde. Produtos</th>
                <th scope="col">Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($produtos as $p) :
            ?>
                <tr>
                    <td><?= $p->getId(); ?></td>
                    <td><?= $p->getNome(); ?></td>
                    <td><?= $p->getDescricao(); ?></td>
                    <td><?= $p->getCodigoBarras(); ?></td>
                    <td><?= $p->getQtdeEstoque(); ?></td>
                    <td><?= $p->getAtivo(); ?></td>
                    <td>
                        <a class="btn btn-light" href="cad_produto.php?key=<?=$p->getId()?>">Editar</a>
                        <a class="btn btn-link" href="cad_produto.php?key=<?=$p->getId()?>">Excluir</a>
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