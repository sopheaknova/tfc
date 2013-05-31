<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google-site-verification" content="C7xE70cmwTIghbOkqiQpEgh_Ml_kkvouizjkLuUD8HA" />

<title><?php dynamictitles(); ?></title>

<style type="text/css">
	@import url("<?php bloginfo('template_url'); ?>/css/base.css");
	@import url("<?php bloginfo('stylesheet_url'); ?>");
</style>

<link href="<?php bloginfo('template_url'); ?>/images/favicon.png" rel="shortcut icon" type="image/png" />
<link href="<?php bloginfo('template_url'); ?>/images/favicon.png" rel="icon" type="image/png" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.4.2.min.js"></script>	
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>

<?php if (is_home()) { ?>
<!-- Anything Slider Plugin -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/anything.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/anything-settings.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/anything-slider.css" />
<?php } ?>

<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); // support for comment threading ?>

<?php wp_head(); ?>

</head>

<body <?php if (is_home()) { ?>id="home" <?php } ?>class="<?php bodystyle(); ?>">
<div id="wrap">
	
	<div id="header">
    	<h2><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h2>
    </div>
    <!--/header-->
    <div id="nav">    	                	
		<?php wp_nav_menu(array('menu' => 'Main Menu', 'menu_class' => 'menu', 'container' => '')); ?>
        
        <ul class="languages">
        	<li class="first">Languages: </li>
        	<li><a href="#" title="ភាសាខ្មែរ"><img src="<?php bloginfo('template_url'); ?>/images/kh.gif" alt="Khmer" /></a></li>
            <li><a href="#" title="English"><img src="<?php bloginfo('template_url'); ?>/images/gb.gif" alt="Eglish" /></a></li>
        </ul>
        <!--/languages-->
    </div>
    <!--/nav-->