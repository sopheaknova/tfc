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
                        <div class="post-date"><span class="post-month"><?php the_time('l, F') ?></span> <span class="post-day"><?php the_time('j, Y') ?></span></div>
                    </div>
                    <div class="entry">        
                        <?php the_content('Read the rest of this entry &raquo;'); ?>        
        				<div class="clear"></div>
                    </div>
                    
                </div>
                <?php //comments_template(); ?>
        
                <?php endwhile; 
        
            	else : ?>
        
                <h2>Not Found</h2>
                <p>Sorry, but you are looking for something that isn't here.</p>
        
            <?php endif; ?>
                
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