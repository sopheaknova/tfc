<?php

##  CUSTOM LOGO LOGIN
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; height:130px!important;}
    </style>';
}

add_action('login_head', 'my_custom_login_logo');


##   CHANGE DASHBOARD FOOTER TEXT
function remove_footer_admin () {
    echo "Thank you for creating with nova";
} 

add_filter('admin_footer_text', 'remove_footer_admin');


##   REMOVE WORDPRESS VERSION GENERATION   
function remove_version_info() {
     return '';
}
add_filter('the_generator', 'remove_version_info');

##  REMOVE ERROR MESSAGE LOGIN
add_filter('login_errors',create_function('$a', "return null;"));


##   REMOVE WORDPRESS LINK ON ADMIN LOGIN LOGO 
function remove_link_on_admin_login_info() {
     return  bloginfo('url');
}
  
add_filter('login_headerurl', 'remove_link_on_admin_login_info');

## MISC

add_theme_support('post-thumbnails');


## limited the character
function limit_word($desc, $num){
	$max_len = $num;
	$len_title = strlen($desc);
	if ($len_title >= $max_len) {
		echo substr($desc, 0, $max_len) . '...'; 
	} else {
		echo $desc;
	}
	
}


## Customer Excerpt More
function new_excerpt_more($more) {
	return '<a class="readmore" href="'. get_permalink($post->ID) . '"> Read More &rsaquo;&rsaquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
	


## REGISTER NAV MENUS
register_nav_menu('mainmenu', 'Main Navigation Menu');



?>