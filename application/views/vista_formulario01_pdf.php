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
        
        ?>
        <script>
            
            $(document).ready(function(){
                $("input[type=submit],input[type=button]").hover(function(){
                    $(this).css("opacity", "0.8");
                    
                }, function(){
                    $(this).css("opacity", "1");
                }
            );
            
            });
        
        </script>
        <style>

            #container{ 
        
                margin: auto;

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
                height: 40px;
                font-size: 16px;
            }
        </style>
    </head>
    <body>        
        <div id="container">
            <?php
            date_default_timezone_set('America/La_Paz');
            ?>
            <h1>Sistema de Matriculaci&oacute;n de la Universidad P&uacute;blica de El Alto</h1>

            <div id="formulario">

                <div id="titulo">Versi&oacute;n PDF para Imprimir</div>
                <form action="<?php echo base_url() ?>index.php/Formulario_pdf/Pdf/<?php echo $CodPersona;?>" method="post" style="margin:auto;">
                    <br/>
                    <input type="submit" value="PDF"  id="Entrar"/>
                    <input type="hidden" name="CodPersona" value="<?php echo $CodPersona;?>" />

                    <p>
                        Tu formulario fue guardado exitosamente, Imprima el Formulario y apersonese a ventanilla de Registros y admisiones.
                    </p>
                </form>
            </div>
            <br/>

        </div>
    </body>
</html>



