<?php
require_once "model/VisaoUsuario.class.php";

$v = new VisaoUsuario();

if (isset($_POST["confirmar"])) 
{
    header('Location: http://localhost/plataforma/view/home.php ');
}

$v->layoutLogin();
