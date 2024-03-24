<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Loja Mágica</title>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/table.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/modal.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/mobile.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
</head>

<body class="container">

    <div class="section flex between menu">
        <h3 class="title">Loja Mágica 🪄</h3>
        <div class="flex around">
            <div>
                <a href="<?php echo URLROOT ?>/customer/index" class="btn btn-menu">Clientes</a>
            </div>
            <div>
                <a href="<?php echo URLROOT ?>/order/index" class="btn btn-menu">Pedidos</a>
            </div>
            <div>
                <a href="<?php echo URLROOT ?>/message/index" class="btn btn-menu">E-mails</a>
            </div>
        </div>
    </div>



    <div class="section d-none" id="msg">

        <div class="alert" id="msg-text"></div>

    </div>

