<?php 

//Banco de dados
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','magic_shop');

//Email
define('MAIL_FROM','test@hostinger-tutorials.com');

//App config
define('APPROOT',dirname(dirname(__FILE__)));
define('URLROOT','http://magicshop/');
date_default_timezone_set('America/Sao_Paulo');

//funcões para dev
function dd ($parm) {
    var_dump($parm);
    die;
}

?>