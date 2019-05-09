<?php
if (!defined('WPINC')) {
	die;
}


function lessons_shortcode($atts){
	$number_of_posts = apply_filters('pl_number_of_lessons_to_display', 10);
	//By using a filter, it's easily changebale by future devs. Probably belongs in settings, but you didn't ask for a settings page
	$args = array(
		'numberposts' => $number_of_posts,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'post_type' => 'pl_lessons',
	);
	$recent_lessons = wp_get_recent_posts($args);


	echo '<div class="lesson_container">';
	foreach( $recent_lessons as $recent ){
		$post_teachers = get_the_terms($recent["ID"], "pl_teacher");
		$teacher = $post_teachers[0]->name;
		$teacher_url = get_term_link($post_teachers[0]);

		$difficulty = get_post_meta($recent["ID"], 'pl_difficulty', true);

		$thumbnail = get_the_post_thumbnail($recent["ID"], array(9999, 200), array( 'class' => 'lesson_thumbnail' ));


		$post_genres = get_the_terms($recent["ID"], "pl_genre");
		$genre_keys = array_keys($post_genres);
		$last_key = end($genre_keys);
		$genres = '';
		foreach ($post_genres as $key => $term){
			$genres = $genres.'<span class="genre"><a href="'.get_term_link( $term ).'">'.$term->name."</a></span>";
			$genres = $key === $last_key ? $genres : $genres. ", ";
		}

?>
		<div class="lesson_item">
			<?php echo $thumbnail; ?>
			<div class="lesson_difficulty"><?php echo $difficulty;?></div>
			<div class="lesson_teacher">By <a href="<?php echo $teacher_url; ?>"><?php echo $teacher;?></a></div>
			<div class="lesson_genres"><?php echo $genres;?></div>
		</div>


<?php
	}
	echo '</div>';
	wp_reset_query();

	wp_enqueue_style('lessons_shortcode_style'); //by enqueueing the style here, it only appears where the shortcode does.

}

?>