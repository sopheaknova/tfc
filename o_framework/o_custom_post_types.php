<?php 

add_action('init', 'o_register_sponsors_type');

## ADD SPONSORS POST TYPE

function o_register_sponsors_type () {

$labels = array(

    'name' => _x('Sponsor Items', 'post type general name'),
    'singular_name' => _x('Sponsor Item', 'post type singular name'),
    'add_new' => _x('Add New', 'Sponsor'),
    'add_new_item' => __('Add A New Sponsor Item'),
    'edit_item' => __('Edit Sponsor Item'),
    'new_item' => __('New Sponsor Item'),
    'view_item' => __('View Sponsor Item'),
    'search_items' => __('Search Sponsor Items'),
    'not_found' =>  __('No Sponsor items found'),
    'not_found_in_trash' => __('No Sponsor items found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Sponsor Items'

);

$args = array (
'labels' => $labels,
'public' => true,
'show_ui' => true,
'publicly_queryable' => true,
'capability_type' => 'post',
'supports' => array ('thumbnail', 'editor', 'title', 'revisions', 'author'),
'menu_position' => 20, 
'register_meta_box_cb' => 'o_add_sponsorlink_meta',
'query_var' => true,
'rewrite' => true
);

register_post_type('sponsor', $args);

$g_labels = array(
    'name' => _x( 'Sponsors', 'taxonomy general name' ),
    'singular_name' => _x( 'Sponsor', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Sponsors' ),
    'popular_items' => __( 'Popular Sponsors' ),
    'all_items' => __( 'All Sponsors' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Sponsors' ), 
    'update_item' => __( 'Update Sponsors' ),
    'add_new_item' => __( 'Add New Sponsor' ),
    'new_item_name' => __( 'New Sponsor Name' ),
    'separate_items_with_commas' => __( 'Separate Sponsors with commas' ),
    'add_or_remove_items' => __( 'Add or remove Sponsors' ),
    'choose_from_most_used' => __( 'Choose from the most used Sponsors' ),
    'menu_name' => __( 'Sponsors' ),
);
  
register_taxonomy("sponsors-categories", array("sponsor"), array("hierarchical" => true, "label" => "Sponsors", "singular_label" => "Sponsors Category", "labels" => $g_labels, 'query_var' => true, "rewrite" => true, "show_in_nav_menus" => true));

add_post_type_support('sponsors', 'thumbnail'); 

}



## Sponsor_columns, <-  register_post_type then append _columns
add_filter("manage_edit-sponsor_columns", "sponsor_edit_columns");
add_action("manage_posts_custom_column",  "sponsor_custom_columns");

function sponsor_edit_columns($columns){

		$newcolumns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => "Title",
			"thumbnail" => "Images",
			"sponsors-categories" => "Categories"
		);
		
		$columns= array_merge($newcolumns, $columns);

		return $columns;
}

function sponsor_custom_columns($column){
		global $post;
		switch ($column)
		{
			case "description":
				#the_excerpt();
				break;
			case "thumbnail":								
				echo the_post_thumbnail(array(100,100));
				
				break;
			case "sponsors-categories":
				echo get_the_term_list($post->ID, 'sponsors-categories', '', ', ','');
				break;
		}
}

?>