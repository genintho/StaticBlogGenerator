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

        article p{
            text-indent: 20px;
        }

        article img{
            border: 5px;
            border-style: solid;
        }
    </style>
</head>
<body>
<header>
    <h1><a href="/">Thomas Genin</a></h1>
    <h2>Photography, Large scale Web App</h2>
    <a id="about" href="about.html">About</a>
</header>
<article><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>