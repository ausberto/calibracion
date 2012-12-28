<?php
echo "<h2 class='centro'>Lista de Perfiles</h2>";
echo "<div style='width:500px; margin: auto; margin-bottom:20px;'><a href='".  base_url()."index.php/Perfil/Nuevo' >Nuevo Perfil de Usuario</a></div>";
echo $Tabla;
?>
<script>
    function mensaje()
    {
        alert('mi mensaje');
    }
    </script>