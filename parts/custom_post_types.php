<?php
## Переименуем таксономию category (рубрики)
add_action( 'init', function(){
	global $wp_taxonomies;

	$labels                     = & $wp_taxonomies['category']->labels;
	$labels->name               = 'Collections';
	$labels->singular_name      = 'Collection';
	$labels->add_new            = 'Add Collection';
	$labels->add_new_item       = 'Add Collection';
	$labels->edit_item          = 'Edit Collection';
	$labels->new_item           = 'Collection';
	$labels->view_item          = 'View Collections';
	$labels->search_items       = 'Search Collections';
	$labels->not_found          = 'No Collections found';
	$labels->not_found_in_trash = 'No Collections found in Trash';
	$labels->all_items          = 'All Collections';
	$labels->menu_name          = 'Collection';
	$labels->name_admin_bar     = 'Collection';

	$labels_tag                     = & $wp_taxonomies['post_tag']->labels;
	$labels_tag->name               = 'Feature';
	$labels_tag->singular_name      = 'Feature';
	$labels_tag->add_new            = 'Add Feature';
	$labels_tag->add_new_item       = 'Add Feature';
	$labels_tag->edit_item          = 'Edit Feature';
	$labels_tag->new_item           = 'Feature';
	$labels_tag->view_item          = 'View Feature';
	$labels_tag->search_items       = 'Search Features';
	$labels_tag->not_found          = 'No Features found';
	$labels_tag->not_found_in_trash = 'No Features found in Trash';
	$labels_tag->all_items          = 'All Features';
	$labels_tag->menu_name          = 'Feature';
	$labels_tag->name_admin_bar     = 'Feature';

} );



add_filter('post_type_labels_post', 'rename_posts_labels');
function rename_posts_labels( $labels ){
	$new = array(
		'name'                  => 'Plates',
		'singular_name'         => 'Plate',
		'add_new'               => 'Add new plate picture size 350x350px JPEG',
		'add_new_item'          => 'Add plate',
		'edit_item'             => 'Edit plate',
		'new_item'              => 'New plate',
		'view_item'             => 'View',
		'search_items'          => 'Search plates',
		'not_found'             => 'Not found.',
		'not_found_in_trash'    => 'Not found in trash.',
		'parent_item_colon'     => '',
		'all_items'             => 'All plates',
		'archives'              => 'Plates archive',
		'insert_into_item'      => 'Insert to plate',
		'uploaded_to_this_item' => 'Loadede for this plate',
		'featured_image'        => 'Plate\'s image',
		'filter_items_list'     => 'Filter plates list',
		'items_list_navigation' => 'Plates list navigation',
		'items_list'            => 'Plates list',
		'menu_name'             => 'Plates',
		'name_admin_bar'        => 'Plate', // пункте "добавить"
	);

	return (object) array_merge( (array) $labels, $new );
}



add_action('init', 'wood_register_post_types');
function wood_register_post_types(){
	// SLIDER
	register_post_type('slider', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Slider',
			'singular_name'      => 'Slide',
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new slide picture size 1169x750px JPEG',
			'edit_item'          => 'Edit slide',
			'new_item'           => 'New slide',
			'view_item'          => 'View slide',
			'search_items'       => 'Search slide',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'All slides',
		),
		'description'         => 'Use size 1169x750px JPEG',
		'public'              => true,
		'publicly_queryable'  => null,
		'exclude_from_search' => null,
		'show_ui'             => null,
		'show_in_menu'        => null,
		'show_in_admin_bar'   => null,
		'show_in_nav_menus'   => null,
		'show_in_rest'        => null,
		'rest_base'           => null,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-slides', 
		'hierarchical'        => false,
		'supports'            => array('title', 'thumbnail'),
		'taxonomies'          => array(''),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );


	register_taxonomy('dimensions', array('post'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Dimensions list',
			'singular_name'     => 'Dimensions',
			'search_items'      => 'Search Dimensions',
			'all_items'         => 'All Dimensions',
			'view_item '        => 'View Dimensions',
			'parent_item'       => 'Parent Dimensions',
			'parent_item_colon' => 'Parent Dimensions:',
			'edit_item'         => 'Edit Dimensions',
			'update_item'       => 'Update Dimensions',
			'add_new_item'      => 'Add New Dimensions',
			'new_item_name'     => 'New Dimensions',
			'menu_name'         => 'Dimensions list',
		),
		'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array('post'),
		'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );


}
