<?php
    require '..\model\VisaoUsuario.class.php';
    require '..\model\Usuario.class.php';

    $v = new VisaoUsuario();
    $usuario = new UsuarioDados('', '');

    if(isset($_POST['atualizar'])){
    
        $senha_antiga = $_POST['senha_antiga'];
        $senha_nova = $_POST['nova_senha'];
        $codusuario = $_POST['usuario_login'];

        if($usuario->attSenha($senha_antiga,$senha_nova,$codusuario)){
            echo
        '<div class="container w-50 p3">
            <div class="row">
                <div class="col-md-12" style="height:10px;"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert" style="text-align:center;">
                    <span ><strong>Senha Atualizada com Sucesso!</strong></span>
                    </div>
                </div>
            </div>
        </div>';
        }else {
            echo
        '<div class="container w-50 p3">
            <div class="row">
                <div class="col-md-12" style="height:10px;"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert" style="text-align:center;">
                    <span ><strong>Não foi possivel atualizar a senha!</strong></span><br>
                    <span ><strong>Verifique a senha antiga e tente novamente!</strong></span>
                    </div>
                </div>
            </div>
        </div>';
        }
    }

$v->layoutAttLogin();
