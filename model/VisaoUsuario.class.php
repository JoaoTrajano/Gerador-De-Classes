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
                                    placeholder="Digite o seu usu&aacute;rio. teste" />
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

}
