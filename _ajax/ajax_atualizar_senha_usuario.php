<?php

require "../model/Usuario.class.php";

$codusuario = $_POST['codusuario'];

$usuario = new UsuarioDados('', '');
$array = $usuario->recuperarLoginUsuario($codusuario);

if ($array > 0) {
    $input =
        '<label for="usuario"><span style="float:left;">Antiga senha:<span></label>
        <input class="form-control" type="password" id="senha_antiga" name ="senha_antiga" placeholder="Informa a senha antiga:" />
        <br>
        <label for="usuario"><span style="float:left;">Nova senha:</label>
        <input class="form-control" type="password" id="nova_senha" name = "nova_senha" 
        placeholder="Informe seu código de Usuário." />
        <br>
        <input name="atualizar" class="btn btn-outline-success form-control" type="submit" value="Enviar" >
        <br><br>';
        echo $input;
} else {
    echo "Nenhum usuário encontrado.";
}
