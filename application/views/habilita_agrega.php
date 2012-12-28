<script type="text/javascript">
$(document).ready(function() {
	$("#Hablitacion").validate();
});
</script>
<div class="span-10 prefix-7 suffix-7 last center">
<?php 
echo form_open("habilita/agrega",  array('id' => 'Hablitacion', 'name' => 'Hablitacion'));
?>
<fieldset><legend>Hablitacion (<?php echo $this->session->userdata('GESTION');?>)</legend>

<br /><label for='FechaInicio'>Fecha de inicio </label>
<?php
echo "<input type='text' name='FechaInicio' id='FechaInicio' size='12' maxlength='10' onclick='";
echo 'fPopCalendar("FechaInicio")'."' value=''/>";
?><br /><br />

<br /><label for='FechaFin'>Fecha de fin </label>
<?php
echo "<input type='text' name='FechaFin' id='FechaFin' size='12' maxlength='10' onclick='";
echo 'fPopCalendar("FechaFin")'."' value=''/>";
?><br /><br />

<br /><label for='CodCarrera'>Carrera </label>
<?php echo $this->modelo_habilitacion->ComboCarrera(); ?><br /><br />

<label for='DesdeNombre'>Desde nombre </label>
<input type='text' id='DesdeNombre' name='DesdeNombre' size='10' class='required' maxlength='10' value='' /><br /><br />

<label for='HastaNombre'>Hasta nombre</label>
<input type='text' id='HastaNombre' name='HastaNombre' size='10' class='required' maxlength='10' value='' /><br /><br />

<hr /><br />
<div class='span-3 prefix-4 suffix-3 last center'>
	<button class="button positive">
		<img src="<?php echo base_url(); ?>css/images/icons/tick.png" alt=""> Guardar 
	</button>
</div>

</fieldset>
</form>
</div>