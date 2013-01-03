<div id='formulario' class='span-14 prefix-5 suffix-5 center last'>
<fieldset><legend>Estad&iacute;sticas por carrera y edad</legend>
<?php 
if( validation_errors()!=false ) {  
	echo '<br />'.validation_errors();
}
echo form_open("listados/EstadisticaPorCarreraEdad"); 
?>
<br />
<label for='Hasta'>Gesti&oacute;n </label>
<?php echo $ComboGestion; ?><br /><br />

<br /><hr />

<button class='button positive' style='margin-left:220px;'>
	<img src='<?php echo base_url();?>css/images/icons/tick.png' alt='' /> Imprimir
</button>
</form>
</fieldset>
</div>