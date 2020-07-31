<?php

require_once "Conexao.class.php";

class UsuarioDados
{

    private $nome_usuario;
    private $senha_usuario;

    function __construct($nome, $senha)
    {
        $this->nome_usuario = $nome;
        $this->senha_usuario = $senha;
    }

    public function getNomeUsuario()
    {
        return $this->nome_usuario;
    }
    public function getSenhaUsuario()
    {
        return $this->senha_usuario;
    }

    public function validarUsuario()
    {
        $obj_conexao = new Conexao("localhost", "root", '');

        $nome = $this->nome_usuario;
        $senha = $this->senha_usuario;

        $sql = "SELECT t.id_usuario, t.nome_usuario, t.nivel_usuario FROM tbusuario t WHERE t.usuario = '$nome' AND t.senha = '$senha'";
        $consulta = $obj_conexao->consultar($sql);

        if ($consulta) {
            if (mysqli_num_rows($consulta)) {
                while ($row = mysqli_fetch_array($consulta)) {
                    $array = array("nome" => $row["nome_usuario"], "nivel" => $row["nivel_usuario"], "id_usuario"=>$row["id_usuario"]);
                    $_SESSION['nome_usuario'] = $array['nome'];
                    $_SESSION['nivel_usuario'] = $array['nivel'];
                    $_SESSION['codusuario'] = $array['id_usuario'];
                    $obj_conexao->desconectar();
                }
            } else {
                unset($_SESSION['nome_usuario']);
                unset($_SESSION['nivel_usuario']);
                $obj_conexao->desconectar();
                return 1;
            }
        } else {
            echo "Não foi possível conectar ao banco.";
            die();
        }
        return $array;
    }

    public function recuperarLoginUsuario($codusuario)
    {

        $obj_conexao = new Conexao("localhost", "root", '');
        $sql = "SELECT t.usuario, t.senha FROM tbusuario t WHERE t.id_usuario = '$codusuario'";
        $consulta = $obj_conexao->consultar($sql);

        if ($consulta) {
            while ($row = mysqli_fetch_array($consulta)) {
                $arrayUsuario = array("usuario" => $row["usuario"], "senha" => $row["senha"]);
                return $arrayUsuario;
            }
        } else {
            $obj_conexao->desconectar();
            return 0;
        }
    }

    public function attSenha($senha_antiga, $senha_nova, $codusuario)
    {

        $obj_conexao = new Conexao("localhost", "root", '');
        $sql = "UPDATE tbusuario u set u.senha = '$senha_nova' WHERE u.senha = '$senha_antiga' 
        AND u.id_usuario = $codusuario";

        if ($obj_conexao->consultar($sql)) {

            $linhas_afetadas = mysqli_affected_rows($obj_conexao->getInstancia());

            if ($linhas_afetadas > 0) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $obj_conexao->desconectar();
            return 0;
        }
    }
}
