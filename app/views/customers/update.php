
<?php require_once APPROOT  . '/views/master/header.php'; ?>


<div>

    <div class="section flex flex-direction subtitle align-center ">
        <a href="<?php echo URLROOT ?>/customer/index" class="btn btn-success btn-back">Voltar</a>
        <h4 class="text-center w-100">Cliente - <?= $data['customer']['name']; ?> 🙋🏻‍♂️</h4>
    </div>

    <form class="formDesign" action="<?php echo URLROOT ?>/customer/update" method="post">
        <div>
            <label>Nome:</label><br>
            <input type="text" name="name" value="<?= $data['customer']['name']?>">
        </div>
        <div>
            <label>E-mail:</label><br>
            <input type="email" name="email" value="<?= $data['customer']['email']?>">
        </div>
        <div>
            <label>Histórico de Pedidos:</label><br>
            <input type="text" name="order_history" value="<?= $data['customer']['order_history']?>">
        </div>
        <div>
            <label>Data Último Pedido:</label><br>
            <input type="date" name="last_order" value="<?= $data['customer']['last_order']?>">
        </div>
        <div>
            <label>Valor Último Pedido ($):</label><br>
            <input type="text" name="last_order_value" value="<?= $data['customer']['last_order_value']?>">
        </div>
        <input type="hidden" name="id" value="<?= $data['customer']['id']?>"/>

        <input type="submit" class="btn btn-primary" value="Salvar">
    </form>

</div>

<script src="<?php echo URLROOT ?>/public/js/customer.js"></script>

<?php require_once APPROOT  . '/views/master/footer.php'; ?>