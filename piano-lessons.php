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
define('PL_DIR_PATH', plugin_dir_path( __FILE__ ) );

function pl_init(){
	pl_load_dependencies();
	pl_set_admin_hooks();
	pl_set_public_hooks();
}

function pl_load_dependencies(){
	require_once PL_DIR_PATH.'/admin/register.php';
	require_once PL_DIR_PATH.'/admin/metabox.php';
	require_once PL_DIR_PATH.'/admin/shortcode.php';
}

function pl_set_admin_hooks(){
	add_action('init', 'register_lessons_post_type'); //register.php
	add_action('init', 'register_genre_taxonomy'); //register.php
	add_action('init', 'register_teacher_taxonomy'); //register.php

	add_action('add_meta_boxes', 'meta_box_handler'); //metabox.php
	add_action('save_post', 'pl_save_post'); //metabox.php

	add_action('wp_enqueue_scripts', 'pl_add_styles'); //this file
}

function pl_set_public_hooks(){
	add_shortcode('lessons', 'lessons_shortcode'); //shortcode.php
}


function pl_add_styles(){
	wp_register_style('lessons_shortcode_style', plugins_url("/piano-lessons/public/css/shortcode.css"));
}

pl_init();


?>