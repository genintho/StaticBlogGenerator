<?php
ob_start(); /* template body */ ?><!DOCTYPE html>
<html>
<head>
    <title>Thomas Genin</title>
    <style>
        body{
            font-family: Avenir, HelveticaNeue, Helvetica, Arial;
        }

        header{
            margin: 20px;
        }

        header h1{
            font-weight: 500;
        }

        header h2{
            font-weight: 300;
            font-style: italic;
            font-size: 20px;
            margin-left: 20px;
            display: inline;
        }

        #about{
            float: right;
        }

        article{
            width: 800px;
            margin: auto;
            text-align: justify;
            font-size: 20px;
            margin-top: 60px;
        }

        article img{
            border: 5px;
            border-style: solid;
        }
    </style>
</head>
<body>
<header>
    <h1>Thomas Genin</h1>
    <h2>Photography, Large scale Web App</h2>
    <a id="about" href="about.html">About</a>
</header>
<article>
    <h1>All the stuff I wrote</h1>
        <ul>
                            <li><a href="test.html">Expensify Single Page Framework</a></li>
                            <li><a href="ouppa.html">Bye Bye Wordpress</a></li>
            
        </ul>

</article>

<footer>

</footer>
</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>