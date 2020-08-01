<?php
    error_reporting(0);
    
    $nome_classe = ucfirst($_POST['nome_classe']);

    $array_atributos = $_POST['atributo'];

   # $caminho_projeto = $_POST['caminho_projeto'];

    $get_and_set = $_POST['get_and_set'];

    $crud = $_POST['crud'];

    $counstrutor = $_POST['counstrutor'];
    
    if(count($_POST['atributo']) < 2)
        {
            $alerta = '<div class="container w-50 p3">
            <div class="row">
                <div class="col-md-12" style="height:10px;"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert" style="text-align:center;">
                    <span ><strong>Insira mais um atributo!</strong></span>
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="http://localhost/plataforma/_css/style_default.css" >
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
       <link rel="icon" type="shortcut icon" href="http://localhost/plataforma/_img/logo.ico" />
       <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
       <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>';
        echo $alerta;
        die;
    }else {
        
        if($get_and_set)
        {
            foreach($array_atributos as $i => $valor)
            {
                $atributos .= 'private $'.$valor.';
        ';
                $metodos_set .= 
            'public function set'.ucfirst($valor).'($'.$valor.') {
            $this->'.$valor.' = $'.$valor.';
        }
        
        ';   
            }

            foreach($array_atributos as $i => $valor)
            {
                $metodos_get .= 
            'public function get'.ucfirst($valor).'() {
            return $this->'.$valor.';
        }
        
        ';
            
            }
            
        }else{
            foreach($array_atributos as $i => $valor)
            {
                $atributos .= 'private $'.$valor.';';
            }
        }

        if($crud)
        {
            $tamanho = count($array_atributos);
            foreach($array_atributos as $i => $valor)
            {
                
               $values .= $valor.',';
               
            }

            $values = substr($values, 0, -1);

            $insert = 
            'public function Inserir () {
            $sql = "INSERT INTO '.$nome_classe.' ('.$values.') VALUES (/*valores*/)";
        }
            
            ';

            $select = 
            'public function Selecionar () {
            $sql = "SELECT * FROM '.$nome_classe.'";
        }
        
            ';

            $update = 
            'public function Atualizar () {
            $sql = "UPDATE '.$nome_classe.' SET = /*valor ou valores*/ WHERE /* Não esqueça de garantir seu emprego após o update :p */";
        }
        
            ';

            $delete = 
            'public function Excluir () {
            $sql = "DELETE '.$nome_classe.' WHERE /* Não esqueça de garantir seu emprego após o delete :p */";
        }
        
            ';
        }
        
        if($counstrutor)
        {
            foreach($array_atributos as $i => $valor)
            {
                
               $atr_const .= '$'.$valor.',';
               
            }
            
            $atr_const = substr($atr_const, 0, -1);
           
            $values2 = explode(',', $atr_const);
            
            foreach($values2 as $i => $valor)
            {
                
               $atr .= '$this->'.$valor.' = $'.$valor.';
            '
            ;
               
            }

            $const = 
            'public function __construct('.$atr_const.'){
                
            '.$atr.'
        }
        
            ';
        }
        
            
        $classe ='<?php

    public class '.$nome_classe.'(){    
        
        '.$atributos.'
        '.$const.'
        '.$metodos_set.'
        '.$metodos_get.'
        '.$insert.'
        '.$select.'
        '.$update.'
        '.$delete.'
    } 
?>';
        if(file_put_contents(''.$nome_classe.'.class.php', trim($classe).PHP_EOL, FILE_APPEND))
        {
            $alerta = '<div class="container w-50 p3">
            <div class="row">
                <div class="col-md-12" style="height:10px;"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert" style="text-align:center;">
                    <span ><strong>Classe Criada Com Sucesso!</strong></span>
                    </div>
                </div>
            </div>
        </div>
            <link rel="stylesheet" type="text/css" href="http://localhost/plataforma/_css/style_default.css" >
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
            <link rel="icon" type="shortcut icon" href="http://localhost/plataforma/_img/logo.ico" />
            <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>';
        echo $alerta;
        die;
        }
    }
    
    
?>