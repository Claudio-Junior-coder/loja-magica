
<?php require_once APPROOT  . '/views/master/header.php'; ?>


<div>

    <div class="section flex flex-direction subtitle align-center ">
        <a href="<?php echo URLROOT ?>/message/index" class="btn btn-success btn-back">Voltar</a>
        <h4 class="text-center w-100">E-mail enviado para <?= isset($data['mail']['destination']) ? $data['mail']['destination'] : ''; ?> 📧</h4>
    </div>

    <form class="formDesign back-color-white">
        <div>
            <label>Destinatário:</label><br>
            <input type="email" value="<?= isset($data['mail']['destination']) ? $data['mail']['destination'] : ''; ?>" disabled>
        </div>
        <div>
            <label>Assunto:</label><br>
            <input type="text" value="<?= isset($data['mail']['subject']) ? $data['mail']['subject'] : ''; ?>" disabled>
        </div>
        <div>
            <label>Data:</label><br>
            <input type="text" value="<?= isset($data['mail']['date']) ? date('d/m/Y', strtotime($data['mail']['date'])) : ''; ?>" disabled>
        </div>
        <div>
            <label>Mensagem:</label><br>
            <textarea class="textarea" rows="4" cols="50" disabled><?= isset($data['mail']['content']) ? $data['mail']['content'] : ''; ?></textarea>
        </div>
    </form>

</div>

<?php require_once APPROOT  . '/views/master/footer.php'; ?>