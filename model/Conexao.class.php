<?php

    class Conexao {

        private $localhost;
        private $nome_usuario;
        private $senha_banco;
        private $instancia;
        private $dataset;

        function __construct($bd, $user, $password){
            $this->localhost = $bd;
            $this->nome_usuario = $user;
            $this->sennha_banco = $password;
            $this->dataset = 'bd_venda';
        }

        public function getInstancia(){
            return $this->instancia;
        }

        public function conectar()
        {
            $this->instancia = mysqli_connect($this->localhost,$this->nome_usuario,$this->sennha_banco,$this->dataset);

            if(!$this->instancia){
               echo mysqli_error($this->instancia);
               return false;
            } 

            return true;
        }

        public function desconectar()
        {
            return mysqli_close($this->instancia);
        }

        public function consultar($sql) {
            $this->conectar();
            $consulta = mysqli_query($this->instancia,$sql);
            
            if($consulta){
                $this->desconectar();
                return $consulta;
                
            }else {
                $this->desconectar();
            }
            
        }

    }
?>