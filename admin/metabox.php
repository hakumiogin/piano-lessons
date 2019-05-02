<?php

function meta_box_handler(){
	add_meta_box(
        'difficulty',
        __( 'Difficulty', 'piano-lessons' ),
        'difficulty_meta_box_callback',
        'lessons'
    );
}

function difficulty_meta_box_callback($post){
}

function teacher_meta_box_callback($post){
}

function pl_save_post($post_id){
}

?>