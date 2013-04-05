<?php
    include( 'dwoo/dwooAutoload.php' );
    include 'map.php';

    define( "DIR_ARTICLE", 'articles/' );
    define( "DIR_EXPORT" , 'site/' );
    define( "DIR_TEMPLATE", 'pages/' );


    echo "Clean output directory";

    rrmdir( DIR_EXPORT );
    mkdir( DIR_EXPORT );

    shell_exec( 'ln -s images site/images' );

    echo "Create categories directory\n";
    rCreateCategoriesDir( DIR_ARTICLE );

    $dwoo = new Dwoo();

    //------------------------------------------------------------------------------------------------------------------
    // ARTICLES
    echo "Start render article\n";
    foreach( $allArticles as $article ){
        echo "\t$article[title]\n";

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
    file_put_contents( DIR_EXPORT . 'empty.html', $dwoo->get( DIR_TEMPLATE . 'article.html' ) );

    //------------------------------------------------------------------------------------------------------------------
    echo "All done, ready to deploy NOW\n";
//    shell_exec( 'say TASK COMPLETE' );
    //------------------------------------------------------------------------------------------------------------------


/**
 * Remove a directory and th crap inside
 *
 * @param $dir
 */
function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

/**
 * Create cat folder
 *
 * @param string $inPath
 * @param string $outPath
 */
function rCreateCategoriesDir( $inPath, $outPath = DIR_EXPORT ){
    $files = scandir( $inPath );
    foreach( $files as $file ){
        if( $file == '.' || $file == '..' ){
            continue;
        }
        $newPath = $inPath . DIRECTORY_SEPARATOR . $file;
        if( is_dir( $newPath ) ){
            echo "\tCategory $file\n";
            $newOutPath = $outPath . DIRECTORY_SEPARATOR . $file;
            mkdir( $newOutPath );
            rCreateCategoriesDir( $newPath, $newOutPath ); // recursion
        }
    }
}


