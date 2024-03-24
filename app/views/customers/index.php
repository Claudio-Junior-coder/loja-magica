
<?php require_once APPROOT  . '/views/master/header.php'; ?>

<div>
    
    <?php require_once APPROOT  . '/components/modal.php'; ?>

    <div class="section text-center subtitle">
        <h4>Clientes 🙋🏻‍♂️</h4>
    </div>
    
    <div class="section flex flex-end">

        <div>

            <a href="javascript:void(0);" class="btn btn-success" id="importBtn" action="<?php echo URLROOT ?>/customer/import">Importar do Excel 📁</a>
            
        </div>

    </div>

    <?php require_once APPROOT  . '/components/import-form.php'; ?>
    <div class="responsive-table">
        <table class="table">

            <thead>

                <tr>

                    <th>#ID</th>

                    <th>Nome</th>

                    <th>E-mail</th>

                    <th>Hist. Pedidos</th>

                    <th>Data Último Pedido</th>

                    <th>Valor Último Pedido ($)</th>

                    <th class="text-center">Comunicar</th>

                    <th class="text-center">Editar</th>

                    <th class="text-center">Excluir</th>


                </tr>

            </thead>

            <tbody>

            <?php

            $result = $data['customers'];

            if (!empty($result)) {

                foreach($data['customers'] as $customer) {

            ?>

                <tr>

                    <td><?= $customer['id'] ?></td>

                    <td><?= $customer['name'] ?></td>

                    <td><?= $customer['email'] ?></td>

                    <td><?= $customer['order_history'] ?></td>

                    <td><?= date('d/m/Y', strtotime($customer['last_order'])) ?></td>

                    <td><?= $customer['last_order_value'] ?></td>

                    <td class="text-center"><a href="<?php echo URLROOT ?>/message/write/<?= $customer['email'] ?>" class="btn">📧</a></td>
                    
                    <td class="text-center"><a href="<?php echo URLROOT ?>/customer/edit/<?= $customer['id'] ?>" class="btn">✏️</a></td>

                    <td class="text-center"><a href="#" class="btn confirmDelete" action="<?php echo URLROOT ?>/customer/delete/<?= $customer['id'] ?>">⛔</a></td>

                </tr>

            <?php } } else { ?>

                <tr><td colspan="5">Nenhum registro encontrado...</td></tr>

            <?php } ?>

            </tbody>

        </table>
    </div>
</div>

<script src="<?php echo URLROOT ?>/public/js/modal.js"></script>

<?php require_once APPROOT  . '/views/master/footer.php'; ?>