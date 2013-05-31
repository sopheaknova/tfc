<?php

$meta_box_custom_post =
array(
	"newslettereng" => array(
	"name" => "newslettereng",
	"type" => "input",
	"std" => "",
	"title"	=> "<strong>Newsletter English:</strong>",
	"description" => "Use insert image tools for upload Newsletter, then copy URL and past into this text box",
	),
	"newsletterkh" => array(
	"name" => "newsletterkh",
	"type" => "input",
	"std" => "",
	"title"	=> "<strong>Newsletter Khmer:</strong>",
	"description" => "Use insert image tools for upload Newsletter, then copy URL and past into this text box",
	)	
);


//Create Custom Post Metabox
function meta_box_custom_post(){
	global $post, $meta_box_custom_post;
	
	foreach($meta_box_custom_post as $meta_box) {
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';				
		echo '<p>'.$meta_box['title'].'<br />';
	
		if( $meta_box['type'] == "input" ) { 
		
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
			if($meta_box_value == "")
				$meta_box_value = $meta_box['std'];
		
			echo'<input type="text" id ="'.$meta_box['name'].'" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="80" /> ';
			
		}
		echo'<label for="'.$meta_box['name'].'_value" style="color:#666;">'.$meta_box['description'].'</label></p>';
	}	
		
}

function create_custom_post_meta_box() {
global $theme_name, $meta_box_custom_post;
	if (function_exists('add_meta_box') ) {	
	add_meta_box( 'meta-box-custom-post', 'Newsletter Files', 'meta_box_custom_post', 'post', 'normal', 'high' );	
	}
}

function save_newsletter_panel( $post_id ) {
	global $post, $meta_box_custom_post;  
	
	foreach($meta_box_custom_post as $meta_box) {  
		
		// Verify  
		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {  
		return $post_id;  
		}  
	
	if ( 'page' == $_POST['post_type'] ) {  
	if ( !current_user_can( 'edit_page', $post_id ))  
	return $post_id;  
	} else {  
	if ( !current_user_can( 'edit_post', $post_id ))  
	return $post_id;  
	}  
	
	$data = $_POST[$meta_box['name'].'_value'];  
	
	if(get_post_meta($post_id, $meta_box['name'].'_value') == "")  
	add_post_meta($post_id, $meta_box['name'].'_value', $data, true);  
	elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))  
	update_post_meta($post_id, $meta_box['name'].'_value', $data);  
	elseif($data == "")  
	delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));  
	}
	
}

add_action('admin_menu', 'create_custom_post_meta_box');
add_action('save_post', 'save_newsletter_panel');


## CREATE SPONSORS CUSTOM POST TYPE META BOXES

add_action('save_post', 'o_save_sponsorlink_settings');

function o_add_sponsorlink_meta () {

add_meta_box('o_sponsorlink_settings', "Sponsor Link", 'o_sponsorlink_settings_meta_box', 'sponsor', 'normal', 'high');

}

function o_sponsorlink_settings_meta_box () {

wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

?>

<div style="padding: 0px 20px 20px 20px;">

<h2>Website Address:</h2>

<input type="text" style="width: 29%;" name="o_sponsorlink_item" value="<?php echo get_post_meta($_GET['post'], 'o_sponsorlink_item', 12351); ?>" /> <span>e.g. http://www.domainname.com</span>
</div>

<?
}

function o_save_sponsorlink_settings ($post_id) {

  if ( !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }

  update_post_meta($post_id, 'o_sponsorlink_item', $_POST['o_sponsorlink_item']);    
  
}


?>