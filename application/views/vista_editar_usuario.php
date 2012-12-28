
<?php

echo "<h2 class='centro'>Registro de nuevo Usuario</h2>";
echo "<div id='formulario2'>";
echo "<form action='".  base_url()."index.php/Usuario/Guardar' method='post' id='formulario'>";
echo "<input class='texto' type='hidden' name='CodUsuario' id='CodUsuario' value='".$Fila->CodUsuario."' /></p>";
echo "<input class='texto' type='hidden' name='CodPersona' id='CodPersona' value='".$Fila->CodPersona."' /></p>";


echo "<p><label>Paterno:<label>". "<input class='texto' type='text' name='Paterno' id='Paterno' maxlength='50'  value='".$Fila->Paterno."' /></p>";
echo "<p><label>Materno:<label>". "<input class='texto' type='text' name='Materno' id='Materno' maxlength='50'  value='$Fila->Materno' /></p>";
echo "<p><label>Nombre:<label>". "<input class='texto' type='text' name='Nombres' id='Nombre' maxlength='50'  value='$Fila->Nombres' /></p>";

echo "<p><label>Telefono:<label>". "<input class='texto' type='text' name='Telefono' id='Telefono' maxlength='50'  value='$Fila->Telefono' /></p>";
echo "<p><label>Celular:<label>". "<input class='texto' type='text' name='Celular' id='Celular' maxlength='50'  value='$Fila->Celular' /></p>";
echo "<p><label>E-Mail:<label>". "<input class='texto' type='text' name='Correo' id='Correo' maxlength='50'  value='$Fila->Correo' /></p>";


echo "<p><label>Usuario:<label>". "<input class='texto' type='text' name='NombreUsuario' id='NombreUsuario' maxlength='50'  value='$Fila->NombreUsuario' /></p>";
echo "<p><label>Clave:<label>". "<input class='texto' type='password' name='Clave' id='Clave' maxlength='50'  value='$Fila->Clave' /></p>";
echo "<p><label>Perfil:<label>". $ComboPerfil;
echo "<input  type='hidden' name='Tipo' id='Tipo' value='$Tipo' />";
echo "<p><input type='submit' name='button' value='Enviar' id='submit' /></p>";
echo "</form>";
echo "</div>";
?>
<script>
    $(document).ready(function(){
       //alert("aqui") ;
       $('#CodPerfil option[value=<?php echo $Fila->TipoUsuario;?>]').attr('selected',true);
    });
</script>