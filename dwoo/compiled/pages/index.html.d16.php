<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ;
echo Dwoo_Plugin_include($this, 'pages/header.html', null, null, null, '_root', null);?>

<h1><?php echo $this->scope["article"]["title"];?></h1>
<?php echo $this->scope["article"]["content"];?>

<div>
    <?php if ((isset($this->scope["previous"]) ? $this->scope["previous"] : null)) {
?>
        <h3>Previously</h3>
        <i><a href="<?php echo $this->scope["previous"]["file"];?>"><?php echo $this->scope["previous"]["title"];?></a></i>
    <?php 
}?>

    <?php if ((isset($this->scope["article"]["similar"]) ? $this->scope["article"]["similar"]:null)) {
?>
    <h3>You might also like</h3>
    <ul>
        <?php 
$_fh1_data = (isset($this->scope["article"]["similar"]) ? $this->scope["article"]["similar"]:null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['keySimilar'])
	{
/* -- foreach start output */
?>
            <ol><a href=""><?php echo $this->readVar("all.".(isset($this->scope["keySimilar"]) ? $this->scope["keySimilar"] : null).".title");?></a></ol>
        <?php 
/* -- foreach end output */
	}
}?>

    </ul>
    <?php 
}?>


</div>

<?php echo Dwoo_Plugin_include($this, 'pages/footer.html', null, null, null, '_root', null);
 /* end template body */
return $this->buffer . ob_get_clean();
?>