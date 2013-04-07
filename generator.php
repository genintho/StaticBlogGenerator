<?php
/**
 * Blog generator.
 *
 * @TODO Create categories index files
 * @TODO Sort article by date
 */


//    4 : array(
//        "title" : "Why did we build our own Single Page Framewor?",
//        "date"  : "2013-04-06",
//        "file"  : "expensify/engineering/why_build_own_single_page_framework.html",
//        "similar": [3]
//    )

// load Dwoo
include( 'dwoo/dwooAutoload.php' );
$dwoo = new Dwoo();

// load the list of all our articles
$allArticles = json_decode( file_get_contents( 'map.json' ), true );

// sort them by date
usort( $allArticles, 'SortArticlesByDate' );

//----------------------------------------------------------------------------------------------------------------------
/**
 * Directory storing all the articles being written
 * @var String
 */
define( "DIR_ARTICLE", 'articles/' );

/**
 * Directory where to export the site
 * @var String
 */
define( "DIR_EXPORT" , 'site/' );

/**
 * Directory containing all the page to build in addition to the articles
 * @var String
 */
define( "DIR_TEMPLATE", 'pages/' );

/**
 * Store all the categroy for articles
 *
 * @var Array
 */
$mapCategories = array();

//----------------------------------------------------------------------------------------------------------------------
// Prepare directories

echo "Delete output directory\n";
rrmdir( DIR_EXPORT );

echo "Recreate output directory\n";
mkdir( DIR_EXPORT );

//@TODO find a real way to manage images
shell_exec( 'ln -s images site/images' );

echo "Create Articles Path directories\n";
ArticlePathDirectories( DIR_ARTICLE, DIR_EXPORT );
echo "\n";

//----------------------------------------------------------------------------------------------------------------------
// ARTICLES

echo "Start render article\n";
foreach( $allArticles as $key => $article ){
    echo "\t$article[title]\n";

    $article['content'] = file_get_contents( DIR_ARTICLE . $article['file'] );
    $renderedPage = $dwoo->get( DIR_TEMPLATE . 'article.html', array(
        'article' => $article,
        'all' => $allArticles
    ));

    file_put_contents( DIR_EXPORT . $article['file'], $renderedPage);

    if( isset( $article['category'] ) ){
        foreach( $article['category'] as $category ){
            $category = ucwords( strtolower($category) );
            if( !isset( $mapCategories[$category]) ){
                $mapCategories[$category] = array();
            }
            array_push( $mapCategories[$category], $key );
        }
    }
}

//----------------------------------------------------------------------------------------------------------------------
// Index
echo "Start render Index\n";
$article = $allArticles[count($allArticles)-1];
$previous = $allArticles[count($allArticles)-2];
$article['content'] = file_get_contents( DIR_ARTICLE . $article['file'] );
$renderedPage = $dwoo->get( DIR_TEMPLATE . 'index.html', array(
    'article' => $article,
    'all' => $allArticles,
    'previous' => $previous
));
file_put_contents( DIR_EXPORT . 'index.html', $renderedPage );

//----------------------------------------------------------------------------------------------------------------------
// Category
echo "Start render categories index\n";
foreach( $mapCategories as $category => $index ){
    echo "\t$category\n";
//    $renderedPage = $dwoo->get( DIR_TEMPLATE. 'category.html', array(
//        'category' => $category,
//        'index'    => $index,
//        'articles' => $allArticles
//    ));
//    file_put_contents( DIR_EXPORT . strtolower( $category ) . '.html', $renderedPage );
}
//----------------------------------------------------------------------------------------------------------------------
// ALL Category
$renderedPage = $dwoo->get( DIR_TEMPLATE. '.html', array(
    'categories'=> $mapCategories,
    'articles' => $allArticles
));
file_put_contents( DIR_EXPORT . 'categories.html', $renderedPage );


//----------------------------------------------------------------------------------------------------------------------
// ALL
$renderedPage = $dwoo->get( DIR_TEMPLATE. 'all.html', array(
    'articles' => $allArticles
));
file_put_contents( DIR_EXPORT . 'all.html', $renderedPage );

//----------------------------------------------------------------------------------------------------------------------
// about
file_put_contents( DIR_EXPORT . 'about.html', $dwoo->get( DIR_TEMPLATE . 'about.html' ) );

//----------------------------------------------------------------------------------------------------------------------
// Empty
file_put_contents( DIR_EXPORT . 'empty.html', $dwoo->get( DIR_TEMPLATE . 'article.html' ) );

//----------------------------------------------------------------------------------------------------------------------
echo "\n\n";
echo "All done, ready to deploy NOW\n";
//    shell_exec( 'say TASK COMPLETE' );
//----------------------------------------------------------------------------------------------------------------------


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
 * Go through the articles directory to copy in the output directory the dir structure, which map the categories
 *
 * @param string $inPath
 * @param string $outPath
 * @param        $depth
 */
function ArticlePathDirectories( $inPath, $outPath, $depth = -1 ){
    $depth++;
    $files = scandir( $inPath );
    foreach( $files as $file ){
        if( $file == '.' || $file == '..' ){
            continue;
        }
        $newPath = $inPath . DIRECTORY_SEPARATOR . $file;
        if( is_dir( $newPath ) ){
            for( $i=0; $i<$depth; $i++){
                echo "\t";
            }
            echo "|- $file\n";
            $newOutPath = $outPath . DIRECTORY_SEPARATOR . $file;
            mkdir( $newOutPath );
            ArticlePathDirectories( $newPath, $newOutPath, $depth ); // recursion
        }
    }
}

/**
 * Sort callback used to sort the articles by date
 *
 * @param $a
 * @param $b
 * @return Boolean
 */
function SortArticlesByDate( $a, $b ){
    return $a['data'] > $b['date'];
}

