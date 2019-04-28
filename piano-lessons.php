<?php
/**
 * Plugin Name: Piano Lessons Plugin
 * Plugin URI:  http://jakefrondorf.com/plugins/piano-lessons
 * Description: Plugin to show add custom lesson post type and display them
 * Version:     .01
 * Author:      Jake Frondorf
 * Author URI:  https://jakefrondorf.com/
 */


// Abort if this file is called directly
if (!defined('WPINC')) {
	die;
}

define('PIANO_LESSONS_VERSION', '0.1');

function pl_init(){
	pl_load_dependencies();
	pl_set_admin_hooks();
	pl_set_public_hooks();
	pl_enque_scripts();
	pl_enque_styles();
}

function pl_load_dependencies(){

}

function pl_set_admin_hooks(){

}

function pl_set_public_hooks(){

}

function pl_enque_scripts(){

}

function pl_enque_styles(){

}

pl_init();

?>