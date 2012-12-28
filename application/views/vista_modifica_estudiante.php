<script type="text/javascript">
$(document).ready(function() {
	$("#Cliente").validate();
});
</script>
<div>
<fieldset><legend>Modificacion de datos</legend>
<br />
<?php 
echo form_open('estudiante/ModificaEstudiante',  array('id' => 'Cliente', 'name' => 'Cliente'));
?>

</form>
</fieldset>
</div>