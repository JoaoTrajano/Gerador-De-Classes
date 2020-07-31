<?php
    require "..\model\Usuario.class.php";
    $codusuario = $_POST['codusuario'];

    $usuario = new UsuarioDados('','');
    $array = $usuario->recuperarLoginUsuario($codusuario);

    if($array > 0 AND is_array($array)){
        echo '<b>Usuário:</b> '.$array["usuario"].'<br>
        <b>Senha:</b> '.$array["senha"].'<br>';
    }else {
        echo "Nenhum usuário cadastrado";
    }