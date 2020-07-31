<?php
require_once "model/Usuario.class.php";
require_once "model/VisaoUsuario.class.php";

$v = new VisaoUsuario();

session_start();
if (!isset($_SESSION['nome_usuario'])) {
    $_SESSION['nome_usuario'] = '';
    $_SESSION['nivel_usuario'] = '';
    $_SESSION['id_usuario'] = '';
}

if (isset($_POST["confirmar"])) {

    $nome = $_POST["usuario_login"];
    $senha = $_POST["usuario_senha"];

    $obj_user = new UsuarioDados($nome, $senha);
    $array = $obj_user->validarUsuario();

    if (is_array($array)) {
        header('Location: http://localhost/plataforma/view/menu.php ');
    } else {
        echo
            '<div class="container w-50 p3">
            <div class="row">
                <div class="col-md-12" style="height:10px;"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert" style="text-align:center;">
                    <span ><strong>Usu&aacuterio ou Senha Inv&aacutelidos</strong></span>
                    </div>
                </div>
            </div>
        </div>';
    }
}
$v->layoutLogin();
