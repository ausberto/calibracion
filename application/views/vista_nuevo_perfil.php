<script type="text/javascript">
$(document).ready(function() {
	$("#formulario").validate();
        $("input[type=text]").css("height","30px");
        $("input[type=submit]").css("height","30px");
        $("input[type=submit]").css("width","100px");
        
})
</script>

<?php
echo "<hr>
    <h2 class='centro'>Registro de Perfil de usuario</h2>";
echo "<div id='formu'>";
echo "<form action='".  base_url()."index.php/Perfil/Guardar' method='post' id='formulario'>";
echo "<p><label>Nombre del Perfil:</label>". "<input  type='text' name='Perfil' id='Perfil' value='' class='required' /></p>";
echo "<table width='85%' align='center'  >
    <tr>
        <td>";


echo "<p><label>Universitarios:<label>". "<input  type='checkbox' name='menu1' id='menu1' value='1' />
<label>Nuevo:<label>". "<input  type='checkbox' name='menu2' id='menu2' value='1' />
<label>Editar:<label>". "<input  type='checkbox' name='menu3' id='menu3' value='1' />
<label>Eliminar:<label>". "<input  type='checkbox' name='menu4' id='menu4' value='1' /></p>";

echo "</td>
        <td>";
echo "<p><label>Matriculaci&oacute;n:</label>". "<input  type='checkbox' name='menu5' id='menu5' value='1' />
<label>Nuevo:</label>". "<input  type='checkbox' name='menu6' id='menu6' value='1' />
<label>Editar:</label>". "<input  type='checkbox' name='menu7' id='menu7' value='1' />
<label>Eliminar:</label>". "<input  type='checkbox' name='menu8' id='menu8' value='1' /></p>";
echo "</td>";
echo "</tr>
    <tr>";
echo "<td>";
echo "<p><label>Impresi&oacute;n de matr&iacute;culas:<label>". "<input  type='checkbox' name='menu9' id='menu9' value='1' /></p>";
echo "</td>";

echo "<td>";

echo "<p>";
echo "<label>Estad&iacute;sticas:</label>". "<input  type='checkbox' name='menu10' id='menu10' value='1' />";
echo "</p>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan=2>"; 
echo "<p><label>N&oacute;minas de universitarios</p><p>
    <label>Reporte de matr&iacute;culas expedidas:</label>". "<input  type='checkbox' name='menu11' id='menu11' value='1' />
    <label>Gesti&oacute;n:</label>". "<input  type='checkbox' name='menu12' id='menu12' value='1' />
    <label>Por carrera:</label>". "<input  type='checkbox' name='menu13' id='menu13' value='1' />";
echo "<label>Arqueo:</label>". "<input  type='checkbox' name='menu14' id='menu14' value='1' /></p>";
echo "</td>";
echo "</tr>";

    echo "<tr>
        <td>"; 
echo "<label>Reporte de irregularidades</label><input  type='checkbox' name='menu15' id='menu15' value='1' />";
echo"</td>
        <td>"; 
echo "<p><label>Exportaci&oacute;n a Excel:<label>". "<input  type='checkbox' name='menu16' id='menu16' value='1' />
    </p>";
echo "</td>";

echo "</tr>
    
    <tr>";
    
echo "<td colspan=2>
    <p><label>Utilidades</label></p> 
    <label>Calibraci&oacute;n de la matricula :</label>". "<input  type='checkbox' name='menu17' id='menu17' value='1' />
    <label>Control de cupos de matriculas</label>". "<input  type='checkbox' name='menu18' id='menu18' value='1' />
    <label>Habilitaci&oacute;n de Registro Web</label>". "<input  type='checkbox' name='menu19' id='menu19' value='1' />
    <label>Depuraci&oacute;n de Registro Web</label>". "<input  type='checkbox' name='menu20' id='menu20' value='1' />
    <label>Varios</label>". "<input  type='checkbox' name='menu21' id='menu21' value='1' />
    <label>Administraci&oacute;n de usuarios:</label>". "<input  type='checkbox' name='menu22' id='menu22' value='1' />
    <label>Auditor&iacute;a</label>". "<input  type='checkbox' name='menu23' id='menu23' value='1' />
    </p>";
echo "</td>";
    echo "</tr>


    
    </table>";


echo "<input  type='hidden' name='Tipo' id='Tipo' value='$Tipo' />";


echo "<p><input type='submit' name='button' value='Enviar' id='submit' /></p>";
echo "</form>";
echo "</div>";
?>

