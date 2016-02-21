<?php

/**
* Enqueue scripts and stylesheets
*
* @author Frenchtastic.eu
* @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
*/


function coeur_scripts() {
	// CSS
	wp_enqueue_style('bootstrap', get_template_directory_uri() . "/framework/css/bootstrap.min.css", array(), '0.1', 'screen');
	wp_enqueue_style('blog', get_template_directory_uri() . "/framework/css/blog.css", array(), '0.1', 'screen');

	// Font Awesome
	wp_enqueue_style('font_awesome_css',
		get_template_directory_uri()."/framework/css/font-awesome.min.css", array(), '0.1', 'screen' );

	// Coeur JS
	wp_enqueue_script('coeur_js', get_template_directory_uri() . "/framework/js/coeur.js", array( 'jquery' ));

	// JavaScript
	wp_enqueue_script('bootstrap-js', get_template_directory_uri()."/framework/js/bootstrap.min.js", array( 'jquery' ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
    }

}

add_action('wp_enqueue_scripts','coeur_scripts');

function coeur_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="'. get_template_directory_uri() .'/framework/js/html5shiv.min.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'coeur_ie_html5_shim');