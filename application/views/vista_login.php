
        <script>
            $(document).ready(function(){
                 
                /*$(".texto").hover(function(){
                    $(this).css('border','2px solid #cd474b');
                }, function(){
                    $(this).css('border','1px solid #cd474b');
                }
            );
            
            
            $("#submit").hover(function(){
                    $(this).css("opacity", "0.8");
                    
                }, function(){
                    $(this).css("opacity", "1");
                }
            );*/
            
            });
        
        </script>
    
        
            <?php
            date_default_timezone_set('America/La_Paz');
            ?>
            <div id="upea"></div>
            <div id="login">
                
            
                <div id="formulario">
                    <form action="<?php echo base_url() ?>index.php/Login/Verifica" method="POST" id="formlogin">
                        <fieldset>        
                             <legend>Introduzca sus datos</legend>   
                        <div>
                            <label for="NombreUsuario">Usuario:</label>  <input type="text" name="NombreUsuario" id="NombreUsuario" value="" />
                        </div>
                        <div>
                            <label>Contraseña:</label><input type="password" name="Clave" id="Clave" value="" />
                        </div>
                        <div style="text-align: center">
<button class="button positive">
<img src="<?php echo base_url(); ?>css/images/icons/tick.png" alt=""> Ingresar 
</button>
                        </div>
                            </fieldset> 

                    </form>

                </div>
            </div>
        
   


