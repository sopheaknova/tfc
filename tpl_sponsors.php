<?php
/*
Template Name: Sponsors Page
*/
?>

<?php get_header(); ?>

	<div id="contents">
    	<div id="c1">        
        	<div class="top"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" alt="top blank" /></div>
            <div class="middle">
            	<?php if (have_posts()) : ?>

					<?php while (have_posts()) : the_post(); ?>        
                    <div class="post">                    
                        <div class="post-title">
                            <h2><?php the_title(); ?></h2>
                            <br />                                                  
                        </div>
                        <div class="entry">        
                            <?php the_content(); ?>                            
                        </div>
                        
                    </div>
                    <?php //comments_template(); ?>
                    <?php endwhile; 
                    edit_post_link(__('Edit this post','TFC'), '<p>', ' &raquo;</p>');
                    else : ?>
            
                    <h2>Not Found</h2>
                    <p>Sorry, but you are looking for something that isn't here.</p>
            
                <?php endif; ?>
                
                <?php query_posts("posts_per_page=20&post_type=sponsor&sponsors-categories=pages"); ?>
                <?php
					if (have_posts()) : while(have_posts()) : the_post();
	
					$image_id = get_post_thumbnail_id();  
					$image_url = wp_get_attachment_image_src($image_id, 'full');
					$o_sponsor_item_url =	get_post_meta($post->ID, 'o_sponsorlink_item', true);					  
				?>
                
                <div class="sponsors-items">
                <?php if($o_sponsor_item_url !=='') { ?>                	
                
                <a href="<?php echo $o_sponsor_item_url; ?>" title="<?php the_title(); ?>" target="_blank">
                	<img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>&amp;w=100&amp;h=100&amp;zc=1&amp;q=100" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />                    
                    </a>
                
				<?php } else { ?>  
                
                <img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>&amp;w=100&amp;h=100&amp;zc=1&amp;q=100" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                
                <?php } ?>
                  
                    <div class="desc">
                    	<strong><?php the_title(); ?></strong><br />
                        <?php the_content(); ?>                        
                    </div>
                    <div class="clear"></div>
                </div>
                
                <?php 	
					endwhile; endif; wp_reset_query(); 
				?>
                
            </div>
            <!--/middle-->
            <div class="bottom"></div>
        </div>
        <!--/c1-->
        
        <div id="c2">        	
        	<?php get_sidebar(); ?>
            
            
        </div>
        <!--/c2-->
        <div class="clear"></div>
    </div>
    <!--/contents-->
</div>
<!--/wrap-->
<?php get_footer(); ?>