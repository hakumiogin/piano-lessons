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
	$also_difficulty = get_post_meta($post->ID, 'pl_difficulty', true);
	foreach (["easy", "intermediate", "hard"] as $difficulty){
?>
		<label for="pl_<?php echo $difficulty; ?>" class="selectit">
			<input type="radio" name="pl_difficulty" 
				value="<?php echo $difficulty; ?>" 
				id="pl_<?php echo $difficulty; ?>" <?php checked($also_difficulty, $difficulty); ?> />
			<?php echo ucfirst($difficulty); ?>
		</label>
		<br/>
<?php
	}
}

function teacher_meta_box_callback($post){
}

function pl_save_post($post_id){
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}
	if (isset($_POST['pl_difficulty'])){
		update_post_meta( $post_id, 'pl_difficulty', sanitize_text_field( $_POST['pl_difficulty'] ) );
	}

}

?>