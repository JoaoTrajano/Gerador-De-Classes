<?php

class VisaoUsuario
{

    public function layoutLogin()
    {
        $this->corpo =
            '
            <html>
            <head>
                <title>Login</title>
                <meta charset="UTF-8">
                <link rel="stylesheet" type="text/css" href="http://localhost/plataforma/_css/style_default.css" >
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
                <link rel="icon" type="shortcut icon" href="http://localhost/plataforma/_img/logo.ico" />
                <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
                <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
                <script>
                    $(document).ready(function(){
                        $("#form-principal").submit(function(){
                            if($("#usuario").val() == "" || $("#usuario_senha").val() == "")
                            {
                                alert("Preencha os Campos Corretamente!");
                                return false;
                            }else{
                                return true;
                            }     
                        });
                    });
                </script>
            </head>
            <body style=" background-color: #dcecea;">
                <div class="container w-50 p-3" >
                    <div class="row" style="height:45px;">
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-12" style="background-color:#00786e;text-align: center;color:white;height:30px;padding:5px;">
                           
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="row" style="background-color:white;padding:10px;">
                        <div class="col-md-12" style="padding:10px;">
                            <form action="index.php" method="POST" id="form-principal">
                                <div class="form-group">
                                    <label for="usuario"><span style="float:left;"><img src="http://localhost/plataforma/_img/login.jpg" alt="user" width="45"><span></label>
                                    <input class="form-control" "type="text" id="usuario" name ="usuario_login" 
                                    placeholder="Digite o seu usu&aacute;rio." />
                                    <br>
                                    <label for="usuario_senha"><span style="float:left;"><img src="http://localhost/plataforma/_img/cadeado.png" alt="user" width="45"><span></label> 
                                    <input class="form-control" type="password" id="usuario_senha" name ="usuario_senha" 
                                    placeholder="Digite a sua senha."/> 
                                    <br>
                                    <input name="confirmar" class="btn btn-outline-success form-control" type="submit" value="Entrar">
                                </div>
                            </form>
                            <div class="row" style="text-align:center;">
                                <div class="col-md-12">
                                    <span ><a href="http://localhost/plataforma/view/usuario_recuperar_senha.php" > Esqueceu sua senha?</a></span>
                                    <br>
                                    <span ><a href="http://localhost/plataforma/view/usuario_atualizar_senha.php" > Editar Login.</a></span><br>
                                </div>
                                <div class="col-md-6">
                                    <img src="http://localhost/plataforma/_img/logo-cliente.jpg" alt="user" width="150">
                                </div>
                                <div class="col-md-6">
                                    <img src="http://localhost/plataforma/_img/logo.png"" alt="WiseSystem" width="105">
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-12" style="background-color:#00786e;text-align: center;height:30px;"></div>
                        
                    </div>
             </div>
            </body>
        </html>';

        echo $this->corpo;
    }

    public function layoutResgatarSenha()
    {
        $this->corpo =
            '
            <html>
            <head>
                <title>Recuperar Senha.</title>
                <meta charset="UTF-8">
                <link rel="stylesheet" type="text/css" href="http://localhost/plataforma/_css/style_default.css" >
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
                <link rel="icon" type="shortcut icon" href="http://localhost/plataforma/_img/logo.ico" />
                <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
                <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
                <script>
                    $(document).ready(function(){
                        $("#form-principal").submit(function(){
                            if($("#cod_usuario").val() == "")
                            {
                                alert("Preencha os Campos Corretamente!");
                                return false;
                            }else{
                                return true;
                            }     
                        });
                    });

                    function infoUsuer(){
                        var codusuario = $("#cod_usuario").val();
                        var conteudo = $("#user").html();

                        $.ajax({
                            type: "POST",
                            url: "http://localhost/plataforma/_ajax/ajax_mostrar_senha_usuario.php",
                            data: "&codusuario="+codusuario,
                            success: function(msg){
                                $("#user").html("Carregando...");
                                $("#user").html(msg);
                                
                            },
                            error: function(){
                                console.log("erro");
                            }                        
                        });
                    }
                </script>
            </head>
            <body style=" background-color: #dcecea;">
                <div class="container w-50 p-3" >
                    <div class="row" style="height:45px;">
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-12" style="background-color:#182653;text-align: center;color:white;height:30px;padding:5px;">
                           
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="row" style="background-color:white;padding:10px;">
                        <div class="col-md-12" style="padding:10px;">
                            <form action="http://localhost/plataforma/view/usuario_recuperar_senha.php" method="POST" id="form-principal">
                                <div class="form-group">
                                    <label for="usuario"><span style="float:left;"><img src="http://localhost/plataforma/_img/login.jpg" alt="user" width="45"><span></label>
                                    <input class="form-control" "type="text" id="cod_usuario" name ="usuario_login" 
                                    placeholder="Informe seu código de Usuário." />
                                    <br>
                                    <input name="confirmar" class="btn btn-outline-secondary form-control" type="button" value="Enviar" onclick="infoUsuer()">
                                </div>
                            </form>
                            <div class="row" style="text-align:center;">
                                <div class="col-md-12" id="user"></div>
                                <br><br><br>      
                                <div class="col-md-3">
                                 <img src="http://localhost/plataforma/_img/ico_voltar.png" width="20"> <a name="" id="" class="btn btn-outline-primary" href="http://localhost/plataforma/index.php" role="button">Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-12" style="background-color:#182653;text-align: center;height:30px;"></div>
                    </div>
             </div>
            </body>
        </html>';

        echo $this->corpo;
    }

    public function layoutAttLogin()
    {
        $this->corpo =
            '
        <html>
        <head>
            <title>Editar Usuário</title>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="http://localhost/plataforma/_css/style_default.css" >
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
            <link rel="icon" type="shortcut icon" href="http://localhost/plataforma/_img/logo.ico" />
            <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
            <script>
                $(document).ready(function(){
                    $("#form-principal").submit(function(){
                        if($("#cod_usuario").val() == "")
                        {
                            alert("Preencha os Campos Corretamente!");
                            return false;
                        }else{
                            return true;
                        }     
                    });
                });

                function infoUsuer(){
                    var codusuario = $("#cod_usuario").val();
                    var conteudo = $("#user").html();

                    $.ajax({
                        type: "POST",
                        url: "http://localhost/plataforma/_ajax/ajax_atualizar_senha_usuario.php",
                        data: "&codusuario="+codusuario,
                        success: function(msg){
                            $("#user").html("Carregando...");
                            $("#user").html(msg);
                            
                        },
                        error: function(){
                            console.log("erro");
                        }                        
                    });
                }
            </script>
        </head>
        <body style=" background-color: #B0E0E6;">
            <div class="container w-50 p-3" >
                <div class="row" style="height:45px;">
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-12" style="background-color:#182653;text-align: center;color:white;height:30px;padding:5px;">
                       
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="row" style="background-color:white;padding:10px;">
                    <div class="col-md-12" style="padding:10px;">
                        <form action="http://localhost/plataforma/view/usuario_atualizar_senha.php" method="POST" id="form-principal">
                            <div class="form-group">
                                <label for="usuario"><span style="float:left;"><img src="http://localhost/plataforma/_img/login.jpg" alt="user" width="45"><span></label>
                                <input class="form-control" "type="text" id="cod_usuario" name ="usuario_login" 
                                placeholder="Informe seu código de Usuário." onblur="infoUsuer()" />
                                <br>
                                <div id="user"></div>
                            </div>
                        </form>
                        <br><br><br>
                        <div class="row" style="text-align:center;">
                            <br><br><br>     
                            <div class="col-md-3">
                             <img src="http://localhost/plataforma/_img/ico_voltar.png" width="20"> <a name="" id="" class="btn btn-outline-primary" href="http://localhost/plataforma/index.php" role="button">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-12" style="background-color:#182653;text-align: center;height:30px;"></div>
                </div>
         </div>
            </body>
        </html>';
        echo $this->corpo;
    }

    public function visaoMenuPrincipal(){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $nome = $_SESSION['nome_usuario'];
        $nivel = $_SESSION['nivel_usuario'];
        $titulo = $_SESSION['titulo_pagina_atual'];

       echo '<html>
        <head>
            <title>'.$titulo.'.</title>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="http://localhost/plataforma/_css/style_default.css" >
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
            <link rel="icon" type="shortcut icon" href="http://localhost/plataforma/_img/logo.ico" />
            <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        </head>
        <body style=" ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-md bg-primary  navbar-dark ">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="container" style="text-align:center;">
                                        <img src="http://localhost/plataforma/_img/login.jpg" alt="user" width="45" style="border-radius:50%;float:left;">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <span >'.$nome.'</span>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <span class="dropdown-item" onclick="sair()" style="cursor:pointer;" >Logout <img src="http://localhost/plataforma/_img/icone_sair.png" alt="user" width="25" style="float:right;"></span>
                                </div>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                                <ul class="navbar-nav" style="padding-left:5px;">
                                
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span>Solicitação de Compras.</span>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="btn btn-link" href="http://localhost/plataforma/view/solicitacao_compras_inserir.php">Inserir Solicitação.</a>
                                                <a class="btn btn-link" href="http://localhost/plataforma/view/solicitacao_compras_consultar.php">Consultar Solicitação.</a><br>
                                            </div>
                                        </div> 
                                    </li>
                                </ul>
                            </div>  
                        </nav>
                    </div>
                </div>
            </div>';
    }

}
