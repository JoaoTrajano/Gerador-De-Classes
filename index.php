<?php
require_once "model/VisaoUsuario.class.php";

include_once 'config.php';

$v = new VisaoUsuario();

if (isset($_POST["confirmar"])) 
{
    header('Location: '.URL_DOMINIO.'view/home.php ');
}

var_dump($_SERVER['HTTP_HOST']);
$v->layoutLogin();
