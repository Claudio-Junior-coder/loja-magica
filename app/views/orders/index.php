
<?php require_once APPROOT  . '/views/master/header.php'; ?>

<div>

    <div class="section text-center subtitle">
        <h4>Pedidos 📦</h4>
    </div>

    <div class="section flex flex-end">

        <div>

            <a href="javascript:void(0);" class="btn btn-success" id="importBtn" action="<?php echo URLROOT ?>/order/import">Importar XML 📁</a>

        </div>

    </div>

    <?php require_once APPROOT  . '/components/import-form.php'; ?>
    <div class="responsive-table">
        <table class="table">

            <thead>

                <tr>

                    <th>#ID Loja</th>

                    <th>Loja</th>

                    <th>Local</th>

                    <th>Produto</th>

                    <th>Quantidade</th>


                </tr>

            </thead>

            <tbody>

            <?php

            $result = $data['orders'];

            if (!empty($result)) {

                foreach($data['orders'] as $order) {

            ?>

                <tr>

                    <td><?= $order['shop_id'] ?></td>

                    <td><?= $order['shop_name'] ?></td>

                    <td><?= $order['location'] ?></td>

                    <td><?= $order['product'] ?></td>

                    <td><?= $order['quantity'] ?></td>

                </tr>

            <?php } } else { ?>

                <tr><td colspan="5">Nenhum registro encontrado...</td></tr>

            <?php } ?>

            </tbody>

        </table>
    </div>
</div>

<?php require_once APPROOT  . '/views/master/footer.php'; ?>