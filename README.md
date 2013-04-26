StaticBlogGenerator
===================

A simple PHP based static site/blog generator

## Goals

1. A simple blog generator
2. Support some kind of category system
3. Support relation betweens article
4. HTML / CSS
5. No mandatory external ressources

## How does it work?
1. Checkout the repository
2. Write down the body of your post in an HTML file in /articles
3. Add it to the map.php file ( look at the map_example.php )
4. Run the generator: ````php generator.php````
5. Ready to deploy

## Customize the look
The files in /pages.html contain the basic structure.

* ````header.html```` Define the header of every page
* ````footer.html```` Define the footer of every page
* ````article.html```` Define the look of one article
* ````all.html```` A user friendly site map containing links to all your articles
* ````about.html````  A page where you can tell more about who you are
* ````index.html```` The main page of your site, which is by default an article

This structure is flexible, nothing is preventing you to customize it.


## Why not Jenkyll?
1. Jenkyll is really awesome, and so is Markdown, but I want to primarly use HTML.
2. Too much stuff to install. This can be run on any PHP hosting, or Mac
3. I still want to write some JS for some pages


## Why not Yeoman?
Too complex. No need of compass. No coffee script ( please ! ). No support of IE / shim / feature detection.
Keep it very simple. Just write stuf.

## Why using Dwwoo?
Because it works. Because it is simple to use. Because I know how to use it. Because I am too lazy to create my own templating engine which will do the same exact same thing with more bug and no documentation.


## To Do

* Improve "creator mode"
* HTML minification
* Push state for page switch ( useless but cool )
* Improve grunt operation to generate stuff from grunt
* Generate RSS feed
* Generate Sitemap

