<?php
    include( 'dwoo/dwooAutoload.php' );
    include 'map.php';

define( "DIR_ARTICLE", 'articles/' );
define( "DIR_EXPORT" , 'site/' );
define( "DIR_TEMPLATE", 'pages/' );

    $dwoo = new Dwoo();

    foreach( $categories as $category ){
        $dir = DIR_EXPORT . $category;
        if( !file_exists( $dir ) ){
            echo "Render $category\n";
            mkdir( $dir );
        }
    }
    //------------------------------------------------------------------------------------------------------------------
    // ARTICLES
    foreach( $allArticles as $article ){
        echo "Render $article[title]\n";

        $article['content'] = file_get_contents( DIR_ARTICLE . $article['file'] );
        $renderedPage = $dwoo->get( DIR_TEMPLATE . 'article.html', array(
            'article' => $article,
            'all' => $allArticles
        ));

        file_put_contents( DIR_EXPORT . $article['file'], $renderedPage);
    }

    //------------------------------------------------------------------------------------------------------------------
    // Index
    $article = $allArticles[count($allArticles)-1];
    $previous = $allArticles[count($allArticles)-2];
    $article['content'] = file_get_contents( DIR_ARTICLE . $article['file'] );
    $renderedPage = $dwoo->get( DIR_TEMPLATE . 'index.html', array(
        'article' => $article,
        'all' => $allArticles,
        'previous' => $previous
    ));
    file_put_contents( DIR_EXPORT . 'index.html', $renderedPage );

    //------------------------------------------------------------------------------------------------------------------
    // ALL
    $renderedPage = $dwoo->get( DIR_TEMPLATE. 'all.html', array(
        'articles' => array_reverse( $allArticles )
    ));
    file_put_contents( DIR_EXPORT . 'all.html', $renderedPage );

    //------------------------------------------------------------------------------------------------------------------
    // about
    file_put_contents( DIR_EXPORT . 'about.html', $dwoo->get( DIR_TEMPLATE . 'about.html' ) );

    //------------------------------------------------------------------------------------------------------------------
    // Empty
    file_put_contents( 'empty.html', $dwoo->get( DIR_TEMPLATE . 'article.html' ) );

    //------------------------------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------