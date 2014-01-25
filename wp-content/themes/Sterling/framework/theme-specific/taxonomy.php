<?php 
function gallery_init() {
	// create a new taxonomy
	register_taxonomy(
		'gallery-category',
		'gallery',
		array(
			'label' => __('Categories' , 'tt_theme_framework'),
			'sort' => true,
			'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 'gallery-category' )
		)
	);
}
add_action( 'init', 'gallery_init' );