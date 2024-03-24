
<?php require_once APPROOT  . '/views/master/header.php'; ?>

<div>
    
    <?php require_once APPROOT  . '/components/modal.php'; ?>

    <div class="section text-center subtitle">
        <h4>E-mails Enviados 📧</h4>
    </div>

    <div class="responsive-table">
        <table class="table">

            <thead>

                <tr>

                    <th>#ID</th>

                    <th>Destino</th>

                    <th>Data</th>

                    <th class="text-center">Ver</th>

                    <th class="text-center">Excluir</th>


                </tr>

            </thead>

            <tbody>

            <?php

            $result = $data['mails'];

            if (!empty($result)) {

                foreach($data['mails'] as $mail) {

            ?>

                <tr>

                    <td><?= $mail['id'] ?></td>

                    <td><?= $mail['destination'] ?></td>

                    <td><?= date('d/m/Y', strtotime($mail['date'])) ?></td>

                    <td class="text-center"><a href="<?php echo URLROOT ?>/message/show/<?= $mail['id'] ?>" class="btn">👁️‍🗨️</a></td>

                    <td class="text-center"><a href="#" class="btn confirmDelete" action="<?php echo URLROOT ?>/message/delete/<?= $mail['id'] ?>">⛔</a></td>

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