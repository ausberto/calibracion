<script type="text/javascript">
$(document).ready(function() {
	$("#formulario").validate();
        $("input[type=text]").css("height","20px");
        $("input[type=submit]").css("height","30px");
        $("input[type=submit]").css("width","100px");
        $("#Clave").attr('readonly','true');
        $("#NombreUsuario").change(function(){
            
            $.ajax({
                url:'<?php echo base_url();?>index.php/Usuario/Verificacion',
                dataType:'text',
                type:'POST',
                data:{
                    Usuario:$(this).val()
                },
                success: function(data){
                    if(data=="1")
                        {
                            alert("El nombre de usuario ya existe!");
                            $("#NombreUsuario").val('');
                            $("#NombreUsuario").focus();
                            $("#formulario").validate().element($("#NombreUsuario"));
                        }
                        else if(data=="0")
                            {
                                alert("Nombre de usuario disponible!");
                                    $("#Clave").attr('readonly','');
                                    $("#Clave").focus();
                            }
                }
                
            });
        });
        
})
</script>


<?php
echo "<hr>";
echo "<div class='span-12 prefix-6 suffix-6  center'>";//aqui quiero el bendito layout de dos columnas


echo "<form action='".  base_url()."index.php/Usuario/Guardar' method='post' id='formulario'>";
echo "<fieldset>";
echo "<legend> Nuevo Usuario</legend>";

echo "<div class='span-6 center' ><label>Paterno:</label>". "<input  type='text' name='Paterno' id='Paterno' maxlength='50'  value='' class='required' /></div>";
echo "<div class='span-6 center last' ><label>Materno:</label>". "<input  type='text' name='Materno' id='Materno' maxlength='50'  value='' class='required' /></div>";
echo "<div class='span-6 center' ><label>Nombre:</label>". "<input  type='text' name='Nombres' id='Nombre' maxlength='50'  value='' class='required' /></div>";
echo "<div class='span-6 center last'  ><label>Telefono:</label>". "<input  type='text' name='Telefono' id='Telefono' maxlength='50'  value='' class='required'  /></div>";
echo "<div class='span-6 center'  ><label>Celular:</label>". "<input  type='text' name='Celular' id='Celular' maxlength='50'  value='' class='required' /></div>";
echo "<div class='span-6 center last' ><label>E-Mail:</label>". "<input  type='text' name='Email' id='Email' maxlength='50'  value='' class='required' /></div>";
echo "<div class='span-6  center'><label>Usuario:</label>". "<input  type='text' name='NombreUsuario' id='NombreUsuario' maxlength='50'  value='' class='required' /></div>";
echo "<div class='span-6 center last'><label>Clave:</label>". "<input  type='text' name='Clave' id='Clave' maxlength='50'  value='' class='required' /></div>";
echo "<div class='span-6 center '><label>Perfil:</label>". $ComboPerfil."</div>";
echo "<input  type='hidden' name='Tipo' id='Tipo' value='$Tipo' />";
echo "<div class='span-6 prefix-6 center'><input type='submit' name='button' value='Enviar' id='submit' class='button positive' /></div>";
echo "</fieldset>";
echo "</form>";

echo "</div>";

?>
