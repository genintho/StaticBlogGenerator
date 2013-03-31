<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, 'pages/header.html', null, null, null, '_root', null);?>

Hola

<?php echo Dwoo_Plugin_include($this, 'pages/footer.html', null, null, null, '_root', null);
 /* end template body */
return $this->buffer . ob_get_clean();
?>