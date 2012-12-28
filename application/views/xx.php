<?php
echo "<br/><br/><br/>";
echo form_open("Usuario/Guardar",  array('id' => 'formulario', 'name' => 'formulario'));

echo "<div class='span-5 prefix-7'><label>Paterno:</label></div>". "<div class='span-5 suffix-7 last'><input type='text' name='Paterno' id='Paterno' maxlength='50' value='' class='required' /></div>";
echo "<div class='span-5 prefix-7'><label>Materno:</label></div>". "<div class='span-5 suffix-7 last'><input type='text' name='Materno' id='Materno' maxlength='50' value='' class='required' /></div>";
echo "<div class='span-5 prefix-7'><label>Nombre:</label></div>". "<div class='span-5 suffix-7 last'><input type='text' name='Nombres' id='Nombre' maxlength='50' value='' class='required' /></div>";

echo "<div class='span-5 prefix-7'><label>Telefono:</label></div>". "<div class='span-5 suffix-7 last'><input type='text' name='Telefono' id='Telefono' maxlength='50' value='' class='required' /></div>";
echo "<div class='span-5 prefix-7'><label>Celular:</label></div>". "<div class='span-5 suffix-7 last'><input type='text' name='Celular' id='Celular' maxlength='50' value='' class='required' /></div>";
echo "<div class='span-5 prefix-7'><label>E-Mail:</label></div>". "<div class='span-5 suffix-7 last'><input type='text' name='Email' id='Email' maxlength='50' value='' class='required' /></div>";

echo "<div class='span-5 prefix-7'><label>Usuario:</label></div>". "<div class='span-5 suffix-7 last'><input type='text' name='NombreUsuario' id='NombreUsuario' maxlength='50' value='' class='required' /></div>";
echo "<div class='span-5 prefix-7'><label>Clave:</label></div>". "<div class='span-5 suffix-7 last'><input type='text' name='Clave' id='Clave' maxlength='50' value='' class='required' /></div>";
echo "<div class='span-5 prefix-7'><label>Perfil:</label></div>". "<div class='span-5 suffix-7 last'>$ComboPerfil</div>";
echo "<input type='hidden' name='Tipo' id='Tipo' value='$Tipo' />";
echo "<div class='span-12 prefix-6 suffix-6 center'><input type='submit' name='button' value='Enviar' id='submit' class='button positive' /></div>";

echo "</form>";
echo "</div>";