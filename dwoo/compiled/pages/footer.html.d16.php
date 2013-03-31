<?php
ob_start(); /* template body */ ?></article>

<footer>
    <a href="all.html" title="All the texts I wrote">Everything</a>
</footer>
</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>