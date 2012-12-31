<?php
echo "<hr><h2 class='centro'>Lista de Usuarios</h2>";

echo $Tabla;
echo "<div style='width:500px; margin: auto; margin-bottom:20px;'><a href='".  base_url()."index.php/Usuario/Nuevo' >Nuevo Usuario</a></div>";
?>
<script>
    function mensaje()
    {
        alert('mi mensaje');
    }
    </script>