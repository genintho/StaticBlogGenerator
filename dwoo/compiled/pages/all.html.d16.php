<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, 'pages/header.html', null, null, null, '_root', null);?>

    <h1>All the stuff I wrote</h1>
        <ul>
            <?php 
$_fh0_data = (isset($this->scope["articles"]) ? $this->scope["articles"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['article'])
	{
/* -- foreach start output */
?>
                <li><i><?php echo $this->scope["article"]["date"];?></i> - <a href="<?php echo $this->scope["article"]["file"];?>"><?php echo $this->scope["article"]["title"];?></a></li>
            <?php 
/* -- foreach end output */
	}
}?>

        </ul>

<?php echo Dwoo_Plugin_include($this, 'pages/footer.html', null, null, null, '_root', null);
 /* end template body */
return $this->buffer . ob_get_clean();
?>