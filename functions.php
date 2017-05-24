<?php
/**
 * Twenty Seventeen Child Theme
 *
 */
 
/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_child_scripts() {

	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-child-style', get_stylesheet_uri() );
	wp_enqueue_style( 'aseel-style', get_stylesheet_directory_uri() . '/dist/style.css'  );

	wp_enqueue_script( 'react', 'https://unpkg.com/react@15/dist/react.min.js' , array(), '1.0', false );
	wp_enqueue_script( 'react-dom', 'https://unpkg.com/react-dom@15/dist/react-dom.min.js' , array(), '1.0', false );
	wp_enqueue_script( 'babel', 'https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.js' , array(), '1.0', false );

	wp_enqueue_script( 'scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js' , array(), '1.0', false );
	wp_enqueue_script( 'scrollmagic-indicators', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js' , array(), '1.0', false );

	wp_enqueue_script( 'aseel-script', get_stylesheet_directory_uri() . '/dist/app.js' , array(), '1.0', true );
	
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_child_scripts' );

function ss_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'ss_custom_excerpt_length', 999 );

function ss_excerpt_more( $more ) {
    return ' ...';
}
add_filter( 'excerpt_more', 'ss_excerpt_more' );
