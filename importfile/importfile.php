<?php
/*
Plugin Name: Import File
Description: This plugin lets you import a file as a shortcode, useful for importing short html files into your posts and pages. Upload your files into the plugin files directory, then use the shortcode: [importfile filename="example.html"]
Version:     1.0
Author:      Benjamin Dahl
Author URI:  http://bendahldesigns.com
*/

function importfile_shortcode( $atts ) {
 
	$output = '';

	$atts = shortcode_atts( array(
	    'filename' => 'example.html'
	), $atts );

	try {
		$output = file_get_contents( plugin_dir_path( __FILE__ ) . 'files/' . $atts['filename']);
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

	return $output;
}

add_shortcode( 'importfile', 'importfile_shortcode' );