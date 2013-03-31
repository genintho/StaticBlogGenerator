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
<h1>Bye Bye Wordpress</h1>
<p>
    Curabitur blandit tempus porttitor. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Nullam quis risus eget urna mollis ornare vel eu leo. Etiam porta sem malesuada magna mollis euismod.
</p>
<img src="images/test.jpg" />
<p>
    Nullam quis risus eget urna mollis ornare vel eu leo. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod.
</p>

<p>
    Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur.
</p>

<p>
    Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
</p>

<div>
    <h3>You might also like</h3>
    <ul>
        <ol><a href="">An other articel relate</a></ol>
        <ol><a href="">An other articel relate</a></ol>
    </ul>

    <a href="all.html">More</a>
</div>

</article>

<footer>

</footer>
</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>