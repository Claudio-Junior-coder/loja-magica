
<?php require_once APPROOT  . '/views/master/header.php'; ?>


<div>

    <div class="section flex flex-direction subtitle align-center ">
        <a href="<?php echo URLROOT ?>/message/index" class="btn btn-success btn-back">Voltar</a>
        <h4 class="text-center w-100">Enviar e-mail para <?= isset($data['customer']['name']) ? $data['customer']['name'] : ''; ?> 📧</h4>
    </div>

    <form class="formDesign" action="<?php echo URLROOT ?>/message/send" method="post">
        <div>
            <label>Destinatário:</label><br>
            <input type="email" name="destination" value="<?= isset($data['customer']['email']) ? $data['customer']['email'] : ''; ?>" placeholder="Para" required>
        </div>
        <div>
            <label>Assunto:</label><br>
            <input type="text" name="subject" placeholder="Assunto" required>
        </div>
        <div>
            <label>Mensagem:</label><br>
            <textarea class="textarea" name="content" placeholder="Texto" rows="4" cols="50" required>Olá, <?= isset($data['customer']['name']) ? $data['customer']['name'] : ''; ?></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>

</div>

<?php require_once APPROOT  . '/views/master/footer.php'; ?>