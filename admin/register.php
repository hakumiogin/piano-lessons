<?php
if (!defined('WPINC')) {
	die;
}

function register_lessons_post_type(){
	$labels = array(
		'name'                    => _x( 'Lessons', 'post type general name', 'piano-lessons' ),
		'singular_name'           => _x( 'Lesson', 'post type singular name', 'piano-lessons' ),
		'menu_name'               => _x( 'Lessons', 'admin menu', 'piano-lessons' ),
		'name_admin_bar'          => _x( 'Lesson', 'add new on admin bar', 'piano-lessons' ),
		'add_new'                 => _x( 'Add New', 'book', 'piano-lessons' ),
		'add_new_item'            => __( 'Add New Lesson', 'piano-lessons' ),
		'new_item'                => __( 'New Lesson', 'piano-lessons' ),
		'edit_item'               => __( 'Edit Lesson', 'piano-lessons' ),
		'view_item'               => __( 'View Lesson', 'piano-lessons' ),
		'all_items'               => __( 'All Lessons', 'piano-lessons' ),
		'search_items'            => __( 'Search Lessons', 'piano-lessons' ),
		'parent_item_colon'       => __( 'Parent Lessons:', 'piano-lessons' ),
		'not_found'               => __( 'No lessons found.', 'piano-lessons' ),
		'not_found_in_trash'      => __( 'No lessons found in Trash.', 'piano-lessons' ),
		'item_published'          => __( 'Lesson published.', 'piano-lessons' ),
		'item_published_privately'=> __( 'Lesson published privately.', 'piano-lessons' ),
		'item_reverted_to_draft'  => __( 'Lesson reverted to draft.', 'piano-lessons' ),
		'item_updated'            => __( 'Lesson updated.', 'piano-lessons' ),
		'item_scheduled'          => __( 'Lesson scheduled', 'piano-lessons' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'piano-lessons' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => _x('lesson', 'rewrite slug', 'piano-lessons')),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'comments' )
	);

	register_post_type( "lessons", $args );
}

function register_genre_taxonomy(){

}


?>