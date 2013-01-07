<div id='formulario' class='span-14 prefix-5 suffix-5 center last'>
<fieldset><legend>Listado por universidad que expidio el titulo</legend>
<?php 
if( validation_errors()!=false ) {  
	echo '<br />'.validation_errors();
}
echo form_open("listados/ListaPorUniversidadTitulo"); 
?>
<br />
<label for='Hasta'>Gesti&oacute;n </label>
<?php echo $ComboGestion; ?><br /><br />

<label for='Varones'>Varones</label>
<input type="checkbox" id="Varones" name="Varones" <?php echo ($Varones? 'checked':''); ?> /> &nbsp;&nbsp;&nbsp;&nbsp;
<label for='Mujeres'>Mujeres</label>
<input type="checkbox" id="Mujeres" name="Mujeres" <?php echo ($Mujeres? 'checked':''); ?> /> &nbsp;&nbsp;&nbsp;&nbsp;

<br /><br /><hr />
<button class='button positive' style='margin-left:220px;'> 
	<img src='<?php echo base_url();?>css/images/icons/tick.png' alt='' /> Imprimir
</button>
</form>
</fieldset>
</div>