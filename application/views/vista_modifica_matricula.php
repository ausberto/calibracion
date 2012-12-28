<script type="text/javascript">
$(document).ready(function() {
	$("#Matriculacion").validate();
})
</script>

<hr />		
<?php 
echo form_open("matriculacion/NuevaMatricula/$CodPersona",  array('id' => 'Matriculacion', 'name' => 'Matriculacion', 'class' => 'horizontal_form'));
?>
<fieldset><legend>Formulario de matriculaci&oacute;n - <?php echo $this->session->userdata('Gestion'); ?></legend>
<h6><?php echo "Univ. ".$this->modelo_persona->GetNombre($CodPersona); ?> </h6>

<div class='full text_center'> <?php echo validation_errors(); ?> </div>
<div class="third  top_margin_10 vpad_10 bg_lightblue" >
	<label for='AnioIngreso'>A&ntilde;o de ingreso </label> 
	   <input type='text' name='AnioIngreso' id='AnioIngreso' size=4 maxlength=4 class='required number' value='<?php echo $AnioIngreso; ?>' /><br />
</div>
<div class="third  top_margin_10 vpad_10 bg_lightblue">
	<label for='Matricula'>Matr&iacute;cula </label>
	   <input type='text' name='Matricula' id='Matricula' size=11 maxlength=11 class='required number' value='<?php echo $Matricula; ?>'><br />
</div>
<div class="third top_margin_10 vpad_10 bg_lightblue">
	<label for='RegUniversitario'>Reg. univ. </label>
	   <input type='text' name='RegUniversitario' id='RegUniversitario' size=9 maxlength=10 class='required number' value='<?php echo $RegUniversitario; ?>'>

		<input type='text' name='Anexo' id='Anexo' size=2 maxlength=2 class='number' value='<?php echo $Anexo; ?>'><br />   	   
</div>

<div class="twothird text_center top_margin_10 vpad_10 bg_lightblue">
	<input type="checkbox" id="Egresado" name="Egresado" <?php echo $Egresado ?> value="Egresado" /> Egresado&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" id="Profesional" name="Profesional" <?php echo $Profesional ?> value="Profesional" /> Profesional&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" id="Traspaso" name="Traspaso" <?php echo $Traspaso ?> value="Traspaso" /> Traspaso&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" id="Magisterio" name="Magisterio" <?php echo $Magisterio ?> value="Magisterio" /> Plan magisterio<span>
</div>
<div class="third top_margin_10 vpad_10 bg_lightblue">
	<label for='AnioEgreso'>A&ntilde;o de egreso </label>
	   <input type ='text' name='AnioEgreso' id='AnioEgreso' size=4 maxlength=4 class='number' value='<?php echo $AnioEgreso; ?>'></span>
</div>

<div class="full text_center top_margin_10 vpad_10 bg_lightblue">
	<input type="checkbox" id="Titulo" name="Titulo" <?php echo $Titulo ?> value="Titulo" /> T&iacute;tulo de bachiller&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" id="FotocopiaCI" name="FotocopiaCI" <?php echo $FotocopiaCI ?> value="FotocopiaCI" /> Fotocopia de C.I.&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" id="Certificado" name="Certificado" <?php echo $Certificado ?> value="Certificado" /> Certificado de nacimiento&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" id="Fotografia" name="Fotografia" <?php echo $Fotografia ?> value="Fotografia" /> Fotograf&iacute;as<br />
</div>

<div class="half top_margin_10 vpad_10 bg_lightblue">
	<label for='DocIngreso'>Doc. de ingreso </label><?php echo $ComboDocIngreso;?>
</div>
<div class="half top_margin_10 vpad_10 bg_lightblue">
	<label for='NumArchivo'>N&uacute;mero de archivo </label>
		<input type ='text' name='NumArchivo' id='NumArchivo' size=10 maxlength=10 value='<?php echo $NumArchivo;?>'><br />
</div>

<div class="half text_center top_margin_10 vpad_10 bg_lightblue">
	<label for='CodCarrera'>Carrera actual </label><?php echo $this->modelo_carrera->ComboCarrera($CodCarrera, 'CodCarrera', True); ?>
	<br /><br /><br /><br /><br />
</div>
<div class="half text_center top_margin_10 vpad_10 bg_lightblue">
	<label for='CodCarreraOrigen'>Carrera origen </label><?php echo $this->modelo_carrera->ComboCarrera($CodCarreraOrigen, 'CodCarreraOrigen'); ?><br />
	<label for='CodCambio1'>1er. cambio </label><?php echo $this->modelo_carrera->ComboCarrera($CodCambio1, 'CodCambio1'); ?><br />
	<label for='CodCambio2'>2do. cambio </label><?php echo $this->modelo_carrera->ComboCarrera($CodCambio2, 'CodCambio2'); ?>
</div>

<div class="third text_center top_margin_10 vpad_10 bg_lightblue">
	<label for='Fecha'>Fecha </label>
	<?php
	echo "<input type='text' name='Fecha' id='Fecha' size='12' maxlength='10' class='required' onclick='";
	echo 'fPopCalendar("Fecha")'."' value='".$Fecha."'/>";
	?>
</div>
<div class="third text_center top_margin_10 vpad_10 bg_lightblue">
	<label for='NumDeposito'>N&uacute;m. dep&oacute;sito </label>
	  <input type='text' id='NumDeposito' name='NumDeposito' size='10' maxlength='10' value='<?php echo $NumDeposito; ?>' /><br />
</div>
<div class="third text_center top_margin_10 vpad_10 bg_lightblue">
	<label for='Deposito'>Dep&oacute;sito </label>
	  <input type='text' id='Deposito' name='Deposito' size='10' maxlength='10' class='required number' value='<?php echo $Deposito; ?>' /><br />  
</div>

<div class="full text_center top_margin_10 vpad_10 bg_lightblue">
<label for='Notas'>Notas</label>
<textarea id='Notas' name='Notas' cols='100' rows='2'>
<?php echo $Notas; ?>
</textarea>
</div>
</fieldset>
<input type='hidden' id='Opcion' name='Opcion' value='<?php echo $Opcion; ?>' />
<fieldset class="fieldsetbuttons">
  <div>
	 <button type="submit" class="confirm_button grey styled_button">Guardar</button>
  </div>
</fieldset> 
</form>