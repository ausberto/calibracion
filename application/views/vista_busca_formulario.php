<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <?php
        header('Content-type: text/html; charset=utf-8');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        echo "<title>Matriculaci&oacute;n UPEA</title>";
        echo "<script type='text/javascript' src='" . base_url() . "js/jquery.js'></script>";
        echo "<script type='text/javascript' src='" . base_url() . "js/jquery.validate.js'></script>";
        ?>
        <script>
            function Verifica()
            {
                $("#formulario");
            }
            $(document).ready(function(){
                $("#formulario div input[type=text]").hover(function(){
                    $(this).css('border','1px solid #676aaf');
                }, function(){
                    $(this).css('border','1px solid #cd474b');
                }
        );
            
            $("input[type=submit],input[type=button]").hover(function(){
                $(this).css("opacity", "0.8");
                    
            }, function(){
                $(this).css("opacity", "1");
            }
        );
            
            $("#form").validate({
                errorContainer: "#errorContainer",
                errorLabelContainer: "#errorContainer",
                errorElement: "li" ,
                rules: {
                    'Nombres': 'required',
                    'Carnet': { required: true, number: true },
                    'email': { required: true, email: true }
                        
                },
                messages: {
                    'Nombres': 'Debe ingresar el nombre!',
                    'Carnet': {
                        required:'Debe ingresar su n&uacute;mero de Identificaci&oacute;n!',
                        number:'El documento de identificaci&oacute;n debe ser un n&uacute;mero!'
                    } 
                },
                debug: true,
                submitHandler: function(form){
                    if($("#Paterno").val()!="")
                    {
                        $("#errorContainer li").remove();
                        $("#errorContainer").append("<li><strong style='color:green;'>El formulario ha sido validado correctamente!</strong></li>");
                        $("#errorContainer").css('display','');
                        //return true;//
                        form.submit();
                        
                    }
                    else if($("#Materno").val()!="")
                    {
                        
                        $("#errorContainer li").remove();
                        $("#errorContainer").append("<li><strong style='color:green;'>El formulario ha sido validado correctamente!</strong></li>");
                        $("#errorContainer").css('display','');
                        //$("#form").submit();
                        //return true;
                        form.submit();
                        
                    }
                    else
                        {
                            $("#errorContainer").css('display','');
                            $("#errorContainer").append("<li>Debe ingresar por lo menos un apellido!</li>");
                            return false;
                        }
                }
                
    });
            
});
        
        </script>
        <style>

            #container{ 
                /*border:1px black solid;*/
                margin: auto;

            }
            #errorContainer{
                border:0px red solid;
                color: #cd474b;
                margin: auto;
                width:400px;
                font-family: Arial narrow;
                font-size: 12px;
                font-weight: bold;
                margin-bottom: 20px;
                

            }
            #container h1{

                color:#676aaf;
                font-family: Arial Narrow;
            }

            #login{
                border:2px #676aaf solid;
                width: 50%;
                margin: auto;
                position: relative;

            }

            #titulo{

                background-color: #676aaf;
                color:#ffffff;
                text-align: center;
                font-family: Arial Narrow;
                font-weight: bold;
                margin: auto;
            }

            #formulario{
                width: 100%;
                margin: auto;

            }

            #formulario input[type=submit]{
                background-color: #cd474b;
                color: #ffffff;
                font-family: Arial Narrow;
                font-weight: bold;
                margin: auto;
                text-align: center;
                vertical-align: middle;
                border: none;
                width: 45%;
                height: 25px;
                font-size: 16px;
            }
            #formulario input[type=text],input[type=password]{
                margin: auto;
                width: 200px;
                border: 1px solid #cd474b;
            }


            #formulario div label{

                font-family: Arial Narrow;
                float: left;
                width: 200px;
            }

            #formulario div{
                margin: 10px 10px 10px 10px;

            }
            #help{
                border:2px #676aaf solid;
                width: 70%;
                margin: auto;
                position: relative;
                color: black;
                font-family: Arial narrow;
                font-weight: bold;
                padding: 10px 10px 10px 10px;
                text-align: justify;
                
            }


        </style>
    </head>
    <body>        
        <div id="container">
            <?php
            date_default_timezone_set('America/La_Paz');
            ?>
            <h1 class='center'>Sistema de Matriculaci&oacute;n de la Universidad P&uacute;blica de El Alto</h1>
            
            <div id="login">
                
                <div id="titulo">Introduzca sus datos para la busqueda</div>
                
                <div id="formulario">
                    <form action="<?php echo base_url() ?>index.php/Formulario/Busqueda" method="POST" id="form" name="form">

                        <div>
                            <label>Nombre de estudiante :</label>  <input type="text" name="Nombres" id="Nombres" value=""/>
                        </div>

                        <div>
                            <label>Paterno :</label>  <input type="text" name="Paterno" id="Paterno" value=""/>
                        </div>

                        <div>
                            <label>Materno :</label>  <input type="text" name="Materno" id="Materno" value=""/>
                        </div>

                        <div>
                            <label>N&uacute;mero de Carnet/Pasaporte :</label><input type="password" name="Carnet" id="Carnet" value=""/>
                        </div>
                        <p style="text-align: center;">
                            <input type="submit" value="Ingresar"  id="Entrar"/>
                        </p>
                    </form>

                </div>
                <div id="errorContainer"></div>
            </div>
            <br/>
            <div id="help">
            <p><strong>Nuevos: </strong>Deben llenar correctamente sus datos y luego imprimir su formulario.</p>
            <p><strong>Antiguos: </strong>Su matriculaci&oacute;n se realiza directamente en ventanilla.</p>
            <p>Gracias.</p>
            </div>
        </div>
    </body>
</html>



