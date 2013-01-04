<div id='formulario' class='span-14 prefix-5 suffix-5 center last'>
<fieldset><legend>Listado por carrera</legend>
<?php 
if( validation_errors()!=false ) {  
	echo '<br />'.validation_errors();
}
echo form_open("listados/ListaPorCarrera1"); 
?>
<br />
<label for='Estado'>Carrera </label>
<?php echo $ComboCarrera; ?><br /><br />

<label for='Hasta'>Gesti&oacute;n </label>
<?php echo $ComboGestion; ?><br /><br />


<label for='CI'>CI</label>
<input type="checkbox" id="CI" name="CI" <?php echo ($CI? 'checked':''); ?> /> &nbsp;&nbsp;&nbsp;&nbsp;

<label for='RegUniversitario'>Reg. universitario </label>
<input type="checkbox" id="RegUniversitario" name="RegUniversitario" <?php echo ($RegUniversitario? 'checked': ''); ?> /> 
<br /><br /><hr />
<button class='button positive' style='margin-left:220px;'> 
	<img src='<?php echo base_url();?>css/images/icons/tick.png' alt='' /> Imprimir
</button>
</form>
</fieldset>
</div>