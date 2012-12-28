<div class='full text_center'>

<?php
//echo form_open("matriculacion/NuevaMatricula/$CodPersona",  array('id' => 'Matriculacion', 'name' => 'Matriculacion', 'class' => 'horizontal_form'));
//echo "<fieldset><legend>Registro de nuevo Usuario</legend>"
echo "<h2 class='centro'></h2>";
echo "<div id='formulario2'>";
echo "<form action='".  base_url()."index.php/Usuario/Guardar' method='post' id='formulario'>";


echo "<p><label>Paterno:<label>". "<input class='texto' type='text' name='Paterno' id='Paterno' maxlength='50'  value='' /></p>";
echo "<p><label>Materno:<label>". "<input class='texto' type='text' name='Materno' id='Materno' maxlength='50'  value='' /></p>";
echo "<p><label>Nombre:<label>". "<input class='texto' type='text' name='Nombres' id='Nombre' maxlength='50'  value='' /></p>";

echo "<p><label>Telefono:<label>". "<input class='texto' type='text' name='Telefono' id='Telefono' maxlength='50'  value='' /></p>";
echo "<p><label>Celular:<label>". "<input class='texto' type='text' name='Celular' id='Celular' maxlength='50'  value='' /></p>";
echo "<p><label>E-Mail:<label>". "<input class='texto' type='text' name='Email' id='Email' maxlength='50'  value='' /></p>";


echo "<p><label>Usuario:<label>". "<input class='texto' type='text' name='NombreUsuario' id='NombreUsuario' maxlength='50'  value='' /></p>";
echo "<p><label>Clave:<label>". "<input class='texto' type='text' name='Clave' id='Clave' maxlength='50'  value='' /></p>";
echo "<p><label>Perfil:<label>". $ComboPerfil;
echo "<input  type='hidden' name='Tipo' id='Tipo' value='$Tipo' />";
echo "<p><input type='submit' name='button' value='Enviar' id='submit' /></p>";
echo "</form>";
echo "</div>";
?>
</div>