<style>
    table tr td{
        border:  2px solid #ffffff;
        background-color: #cd474b;
        color: #ffffff;
        font-family: Arial narrow;
        font-size: 12px;
        font-weight: bold;
    }
     label{display: inline;
     color: #ffffff;
        font-family: Arial narrow;
        font-size: 14px;
        font-weight: bold;}
    
</style>
               <?php

echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <h2 class='centro'>Registro de Perfil de usuario</h2>";
echo "<div id='formulario2'>";
echo "<form action='".  base_url()."index.php/Perfil/Guardar' method='post' id='formulario'>";
echo "<p><label>Nombre del Perfil:<label>". "<input  type='text' name='Perfil' id='Perfil' value='' /></p><hr>";
echo "<table border=1 width='1200px' >
    <tr>
        <td>";


echo "<p><label>Acceso Estudiantes Nuevos:<label>". "<input  type='checkbox' name='menu1' id='menu1' value='1' /></p>";
echo "<p><label>Acceso Estudiantes Nuevos - Nuevo:<label>". "<input  type='checkbox' name='menu2' id='menu2' value='1' /></p>";
echo "<p><label>Acceso Estudiantes Nuevos - Editar:<label>". "<input  type='checkbox' name='menu3' id='menu3' value='1' /></p>";
echo "<p><label>Acceso Estudiantes Nuevos - Eliminar:<label>". "<input  type='checkbox' name='menu4' id='menu4' value='1' /></p>";

echo "</td>
        <td>";
echo "<p><label>Acceso Estudiantes Antiguos:<label>". "<input  type='checkbox' name='menu5' id='menu5' value='1' /></p>";
echo "<p><label>Acceso Estudiantes Antiguos - Nuevo:<label>". "<input  type='checkbox' name='menu6' id='menu6' value='1' /></p>";
echo "<p><label>Acceso Estudiantes Antiguos - Editar:<label>". "<input  type='checkbox' name='menu7' id='menu7' value='1' /></p>";
echo "<p><label>Acceso Estudiantes Antiguos - Eliminar:<label>". "<input  type='checkbox' name='menu8' id='menu8' value='1' /></p>";
echo "</td>
        <td>";
echo "<p><label>Confirmacion:<label>". "<input  type='checkbox' name='menu9' id='menu9' value='1' /></p>";

echo "</td>
    </tr>
    <tr>
        <td>";

echo "<p><label>Impresi&oacute;n de matr&iacute;culas:<label>". "<input  type='checkbox' name='menu10' id='menu10' value='1' /></p>";
echo "<p><label>Reporte de matr&iacute;culas Expedidas:<label>". "<input  type='checkbox' name='menu11' id='menu11' value='1' /></p>";
echo "</td>
        <td>"; 
echo "<p><label>Nóminas de universitarios - Gestión:<label>". "<input  type='checkbox' name='menu12' id='menu12' value='1' /></p>";
echo "<p><label>Nóminas de universitarios - Por carrera:<label>". "<input  type='checkbox' name='menu13' id='menu13' value='1' /></p>";
echo "<p><label>Nóminas de universitarios - Nro. de archivo:<label>". "<input  type='checkbox' name='menu14' id='menu14' value='1' /></p>";
echo "</td>
        <td>";

echo "<p><label>Reporte de irregularidades - Documentación incompleta:<label>". "<input  type='checkbox' name='menu15' id='menu15' value='1' /></p>";
echo "<p><label>Reporte de irregularidades - C.I. Repetido<label>". "<input  type='checkbox' name='menu16' id='menu16' value='1' /></p>";
echo "<p><label>Reporte de irregularidades - R.U. Repetido:<label>". "<input  type='checkbox' name='menu17' id='menu17' value='1' /></p>";
echo "</td>
    </tr>
    <tr>
        <td>"; 
echo "<p><label>Arqueo de caja :<label>". "<input  type='checkbox' name='menu18' id='menu18' value='1' /></p>";
echo"</td>
        <td>"; 
echo "<p><label>Estadisticas - Documentaci&oacute;n :<label>". "<input  type='checkbox' name='menu19' id='menu19' value='1' /></p>";
echo "<p><label>Estadisticas - R.U. Repetido :<label>". "<input  type='checkbox' name='menu20' id='menu20' value='1' /></p>";
echo "<p><label>Estadisticas - Estado civil :<label>". "<input  type='checkbox' name='menu21' id='menu21' value='1' /></p>";
echo "<p><label>Estadisticas - Tipo de colegio :<label>". "<input  type='checkbox' name='menu22' id='menu22' value='1' /></p>";
echo "<p><label>Estadisticas - Vivienda :<label>". "<input  type='checkbox' name='menu23' id='menu23' value='1' /></p>";
echo "<p><label>Estadisticas - Universidad:<label>". "<input  type='checkbox' name='menu24' id='menu24' value='1' /></p>";
echo "<p><label>Estadisticas - Zona :<label>". "<input  type='checkbox' name='menu25' id='menu25' value='1' /></p>";
echo "<p><label>Estadisticas - Tipo de trabajo :<label>". "<input  type='checkbox' name='menu26' id='menu26' value='1' /></p>";
echo "<p><label>Estadisticas - Trabajo :<label>". "<input  type='checkbox' name='menu27' id='menu27' value='1' /></p>";
echo "<p><label>Estadisticas - Jornada Laboral :<label>". "<input  type='checkbox' name='menu28 id='menu28' value='1' /></p>";
echo "<p><label>Estadisticas - Propiedad :<label>". "<input  type='checkbox' name='menu29' id='menu29' value='1' /></p>";
echo "</td>
        <td>"; 
echo "<p><label>Utilidades - Auditoria :<label>". "<input  type='checkbox' name='menu30' id='menu30' value='1' /></p>";
echo "<p><label>Utilidades - Calibración de la matricula :<label>". "<input  type='checkbox' name='menu31' id='menu31' value='1' /></p>";
echo "</td>
    </tr>
    
    <tr>
        <td colspan=3>"; 

echo "<p><label>Excel - Auditoria :<label>". "<input  type='checkbox' name='menu32' id='menu32' value='1' /></p>";
echo "<p><label>Excel - C.I. Reg. universitario :<label>". "<input  type='checkbox' name='menu33' id='menu33' value='1' /></p>";
echo "<p><label>Excel - Datos Personales :<label>". "<input  type='checkbox' name='menu34' id='menu34' value='1' /></p>";
echo "<p><label>Excel - Categorias :<label>". "<input  type='checkbox' name='menu35' id='menu35' value='1' /></p>";
echo "<p><label>Excel - Administrador de usuarios y perfiles :<label>". "<input  type='checkbox' name='menu36' id='menu36' value='1' /></p>";
echo "<p><label>Excel - Control de cupos de materias :<label>". "<input  type='checkbox' name='menu37' id='menu37' value='1' /></p>";
echo "<p><label>Excel - Habilitaci&oacute;n de inscritos por carrera :<label>". "<input  type='checkbox' name='menu38' id='menu38' value='1' /></p>";
echo "<p><label>Excel - Depuraci&oacute;n de inscritos Web :<label>". "<input  type='checkbox' name='menu39' id='menu39' value='1' /></p>";

echo "</td>
    </tr>


    
    </table>";


echo "<input  type='hidden' name='Tipo' id='Tipo' value='$Tipo' />";
echo "<p><input type='submit' name='button' value='Enviar' id='submit' /></p>";
echo "</form>";
echo "</div>";
?>

