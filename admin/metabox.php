<?php
if (!defined('WPINC')) {
	die;
}

function meta_box_handler(){
	add_meta_box(
        'difficulty',
        __( 'Difficulty', 'piano-lessons' ),
        'difficulty_meta_box_callback',
        'lessons'
        'pl_lessons'
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
	$terms = get_terms( 'pl_teacher', array( 'hide_empty' => false ) );
	$post  = get_post();
	$teacher = wp_get_object_terms( $post->ID, 'pl_teacher', array( 'orderby' => 'term_id', 'order' => 'ASC' ) );
	$name  = '';
    if ( ! is_wp_error( $teacher ) ) {
    	if ( isset( $teacher[0] ) && isset( $teacher[0]->name ) ) {
			$name = $teacher[0]->name;
	    }
    }
    echo '<select name="pl_teacher" class="widefat">';
    echo '<option select disabled'.selected($name, '').'>Choose a Teacher</option>';
	foreach ( $terms as $term ) {
		echo "<option value ='".esc_attr( $term->name )."' ".selected( $term->name, $name ).">".esc_attr($term->name)."</option>";
	}
    echo '</select>';
}

function pl_save_post($post_id){
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}
	if (isset($_POST['pl_teacher'])){
		$teacher = sanitize_text_field($_POST['pl_teacher']);
		$term = get_term_by( 'name', $teacher, 'pl_teacher' );
		if ( ! empty( $term ) && ! is_wp_error( $term ) ) {
			wp_set_object_terms( $post_id, $term->term_id, 'pl_teacher', false );
		}
	}
	if (isset($_POST['pl_difficulty'])){
		update_post_meta( $post_id, 'pl_difficulty', sanitize_text_field( $_POST['pl_difficulty'] ) );
	}

}

?>