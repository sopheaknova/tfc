<div id="footer-container">
	<div id="short-page">
    	<div class="grid-05">
        <h4><a href="<?php echo get_option('home'); ?>/about">About TFC</a></h4>
        <p>Our Mission is to promote, organize and develop the growth of tennis in Cambodia and our Vision is to bring Cambodian tennis to a competitive level ...</p>
        </div>
        
        <div class="grid-05">
        <h4><a href="<?php echo get_option('home'); ?>/tep-k-memorial">Tep K. Memorial</a></h4>
        <p>Mr Tep Khunnah was a role model in his dedication in his commitment and love for tennis.  His love for the game started at a young age when he was ...</p>
        </div>
        
        <div class="grid-05">
        <h4><a href="<?php echo get_option('home'); ?>/contact">Contact Us</a></h4>
        <p>Tennis Federation of Cambodia<br />
DELANO Center, #144, Street 169, Sangkat Veal Vong,
Khan 7 Makara, Phnom Penh, Cambodia.<br />
Tel / Fax: +855 23 218 580</p>
        </div>
        <div class="clear"></div>        
    </div>
    <!--/short-page-->
    <div id="sponsors">
    	<!--Size of each sponsor's images are 100px x 60-->    	
        <?php query_posts("posts_per_page=7&post_type=sponsor&sponsors-categories=footer"); ?>
			<?php
                if (have_posts()) : while(have_posts()) : the_post();

                $image_id = get_post_thumbnail_id();  
                $image_url = wp_get_attachment_image_src($image_id, 'full');
				$o_sponsor_item_url =	get_post_meta($post->ID, 'o_sponsorlink_item', true);					  
            ?>
            
			<?php if($o_sponsor_item_url !=='') { ?>                	
            
            <a href="<?php echo $o_sponsor_item_url; ?>" title="<?php the_title(); ?>" target="_blank">
                <img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>&amp;w=100&amp;h=60&amp;zc=1&amp;q=100" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />                    
                </a>
            
            <?php } else { ?>  
            
            <img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>&amp;w=100&amp;h=60&amp;zc=1&amp;q=100" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            
            <?php } ?>
            
            <?php 	
                endwhile; endif; wp_reset_query(); 
            ?>
            
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sponsor-Footer') ) ?>
    </div>
    <!--/sponsor-->    
</div>
<!--/footer-container-->
<div id="copyright">
	&copy; Tennis Federation of Cambodia <?php echo date("Y") ?> - Design by <a href="http://www.novacambodia.com" title="Nova Cambodia">Nova</a>
</div>
<!--/copyright-->

<?php wp_footer(); ?>
</body>
</html>