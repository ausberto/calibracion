<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Calibracion</title>
		<!-- Stylesheets -->
        <?php echo $css; ?>
		<!-- Javascript -->
        <?php echo $javascript; ?>

		<style>
			.primero{
				margin-right:<?php echo (isset($espacios)) ?($espacios['hs']):'0'; ?>px;
			}
			.debajo{
				margin-top:<?php echo (isset($espacios)) ?($espacios['vs']):'0'; ?>px;
			}
		</style>
		<script>
		$(document).ready(function() {
			window.print();
		});
		</script>
    </head>
    <body style="background:#FFF;">
	<div id="sub_container">
		<div id="anverso" class="bloque primero">
			<?php if (isset($anverso)){ echo stripslashes($anverso);} ?>
		</div><div id="anverso1" class="bloque">
			<?php if (isset($anverso)){ echo stripslashes($anverso);} ?>
		</div><br />
		<div id="reverso" class="bloque primero debajo">
			<?php if (isset($reverso)){ echo stripslashes($reverso);} ?>
		</div><div id="reverso" class="bloque debajo">
			<?php if (isset($reverso)){ echo stripslashes($reverso);} ?>
		</div><br />
		<div id="reverso" class="bloque primero debajo">
			<?php if (isset($reverso)){ echo stripslashes($reverso);} ?>
		</div><div id="reverso" class="bloque debajo">
		<?php if (isset($reverso)){ echo stripslashes($reverso);} ?>
		</div>
	</div>
    </body>
</html>