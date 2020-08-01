<?php

    error_reporting(0);
  
   $corpo = '
   <html>
   <head>
       <title>Tela Principal</title>
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
                   if($("#nome_classe").val() == "" || $("#atributo").val() == "" || $("#caminho_projeto").val() == "")
                   {
                       alert("Preencha os Campos Corretamente!");
                       return false;
                   }else{
                       return true;
                   }     
               });
           });

           function gerarIconRemover(id)
           {
                var div = document.querySelector("#div_excluir_atributo");

                var div_icn = document.createElement("div");
                var ImgExcluir = document.createElement("img");
                
                ImgExcluir.src = "http://localhost/plataforma/_img/excluir.png";
                ImgExcluir.style.width = "20";
                ImgExcluir.style.marginBottom = "15";
                ImgExcluir.style.marginTop = "8";
                ImgExcluir.style.cursor = "pointer";
                ImgExcluir.setAttribute("alt","excluir atributo");

                ImgExcluir.onclick = function removerItem(){
                    $("#"+id).remove();
                    $(this).remove();
                    
                }
                div_icn.setAttribute("id","div-excluir");
                div_icn.style.marginLeft = "5";
                div_icn.appendChild(ImgExcluir);
                
                div.appendChild(div_icn);

           }

           function gerarId()
           {
                return Math.floor(Math.random() * 100000);
           }

           function gerarAtributo()
           {
                id = gerarId();
                var name_atributo = $("#atributo").val();
                var input_atributo = document.createElement("input");

                if(name_atributo != "")
                { 
                    gerarIconRemover(id);
                    input_atributo.setAttribute("name", "atributo[]");
                    input_atributo.setAttribute("id",id);
                    input_atributo.setAttribute("class", "form-control");
                    input_atributo.setAttribute("value", name_atributo);
                    input_atributo.setAttribute("readonly", "readonly");
                    input_atributo.style.marginBottom = "5";

                    return input_atributo;
                }else {
                    return false;
                }
           }

           function addAtributo()
           {
               
               var div = document.querySelector("#div_atributos");
               var atributo =  gerarAtributo();
            
               if(atributo === false)
               {

                alert("Preencha o campo Atributo!");

               }else{
                div.appendChild(atributo);
               }
           }
       </script>
   </head>
   <body style=" background-color: #dcecea;">
           '.$alerta.'
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
                   <form action="../criar_classe.php" method="POST" id="form-principal">
                       <div class="form-group">
                           <label for="nome_classe"><span style="float:left;">Digite o nome da Classe.</span></label>
                           <input class="form-control" "type="text" id="nome_classe" name ="nome_classe" 
                           placeholder="Nome da Classe." />
                           <br>
                           <!-- <label for="caminho_projeto"><span style="float:left;">Digite o caminho do projeto.</span></label>
                           <input class="form-control" "type="text" id="caminho_projeto" name ="caminho_projeto" 
                           placeholder="Exemplo: (C:\User\Projeto)" /> 
                           <br> -->
                           <label for="atributo"><span style="float:left;">Digite pelo menos <strong> DOIS </strong> atributos.</span></label> 
                           <input class="form-control" id="atributo" placeholder="Nome do atributo"/>
                            <br>
                            <div class="row" >
                                <div class="col-5">
                                <input class="btn btn-info form-control w-75 " type="button"  value="Adicionar" onclick = "addAtributo()">
                                </div>
                                 
                                <div class="col-5" id="div_atributos"></div>
                                <div class="col-2" id="div_excluir_atributo"></div>
                            </div>
                            
                           <br><br>
                           <label>
                           <input  type="checkbox" id="get_and_set" name ="get_and_set"/>
                           <span> Adicionar Gets e Sets.</span>
                           </label> <br>
                           <label>
                           <input  type="checkbox" id="crud" name ="crud"/>
                           <span> Adicionar CRUD.</span>
                           </label><br>
                           <label>
                           <input  type="checkbox" id="counstrutor" name ="counstrutor"/>
                           <span> Adicionar método counstrutor.</span>
                           </label>
                           <br><br>
                           <input type="submit" name="criar" class="btn btn-outline-success form-control"  value="Criar">
                       </div>
                   </form>
                   <div class="row" style="text-align:center;">
                      
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

echo $corpo;
?>