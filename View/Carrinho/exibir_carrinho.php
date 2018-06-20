<html>
    <?php
    session_start();
    $carrinho = $_SESSION['carrinho'];
    require_once('../Shared/Header.php');
    ?>
    <body>
        <?php
        require_once('../Shared/MenuHeader.php');
        require_once('../Shared/Panel.php');
        ?>
    <center>
        <center><h3 class="panel-title">Meu Carrinho de Compras</h3></center>
    </div>

    <?php
    require_once('..\..\Model\Servico.php');


    $cont = 1;
    $soma = 0;


    if (isset($_REQUEST['status'])) {

        echo '<div style="background-color: tomato; width:100%;">';

        echo '<p style="text-align: center;">Nenhum item foi incluído no carrinho de compras</p>';
        echo '<p style="text-align: center;"><a href="..\Servico\BuscaServico.php">Visualizar Serviços</p>';

        echo '</div>';

        die();
    } else {
        ?>

        <table class="table table-striped table-bordered" align="center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tr align="left">

                <?php
                foreach ($carrinho as $item) {
                    ?>

                    <td><?php echo $cont; ?></td>
                    <td><?php echo $item->id_servico; ?></td>
                    <td><?php echo $item->nome; ?></td>
                    <td><?php echo $item->id_tipo; ?></td>
                    <td><?php echo 'R$ ' . $item->valor; ?></td>
                    <td><a href="..\..\Controller\carrinhoController.php?opcao=2&index=<?php echo $cont - 1; ?>">Remover</a></td>
                </tr>
        <?php
        $soma += $item->valor;
        $cont++;
    }
}
?>
        <tr align="center">
            <td colspan="6" style="font-family: Verdana;color: red;">
                <b>Valor total = R$ <?php echo $soma; ?></b>
            </td>
        </tr>
    </table>
    <br>
    <a href="..\Servico\BuscaServico.php">Continuar comprando</a>
    <a href="finalizar_compra.php?total=<?php echo $soma; ?>">Finalizar compra</a>
</body>
</html>