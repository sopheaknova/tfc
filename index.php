<?php get_header(); ?>

	<div id="contents">    	
    	<div id="c1"> 
        
            <div class="top"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" alt="top blank" /></div>
            <div class="middle">
				<div id="media">
                <ul id="anythingSlider">
                <?php 
					query_posts('posts_per_page=5&cat=4,5');
					if (have_posts()) {  while (have_posts()) { the_post(); 					
				?>
                	<li>
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php  echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?q=100&amp;w=284&amp;h=196&amp;src='); ?></a>
                    <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php limit_word(get_the_title(), 42); ?></a></h2>                     
                    <span class="date-post"><?php the_time('l, F j, Y') ?></span>                    
                    <?php the_excerpt(' Read More &rsaquo;&rsaquo;'); ?>
                    </li>                   
               <?php
			   		}
				} wp_reset_query();
			   ?>
               </ul>                    
               </div><!--/media-->
                
                <div id="breaking-news">
                	<h3 class="headline">TFC Breaking News</h3>                    
                    <ul id="breakingnews">
                    <?php 
						query_posts('posts_per_page=10&cat=13');
						if (have_posts()) {  while (have_posts()) { the_post(); 					
					?>
                    	<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a><span class="date-post"> <?php the_time('n/d/y'); ?></span></li>
                    <?php
						}
					} wp_reset_query();
				   ?>                        
                    </ul>
                    <a class="morebycats" href="<?php echo get_category_link( get_cat_ID( 'Breaking News' ) ); ?>">More Breaking News <span>&rsaquo;&rsaquo;</span></a>
                </div>
                
                <div class="clear"></div>
            </div><!--/middle-->
            <div class="bottom"></div>            
            
            
            <div class="top"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" alt="top blank" /></div>
            <div class="middle">
            <h3 class="sections">Archives</h3>            
            <div class="grid-02">
                <h3 class="headline">Newsletter</h3>
                <?php 
					query_posts('posts_per_page=2&category_name=newsletters');
					if (have_posts()) {  while (have_posts()) { the_post();
					$eng_file = get_post_meta($post->ID, 'newslettereng_value', true);
					$kh_file = get_post_meta($post->ID, 'newsletterkh_value', true); 					
				?>
					<div class="archives-items">
                    	<?php  echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?q=100&amp;w=74&amp;h=98&amp;src='); ?>
                    	<div class="newsletterinfo">
                            <h4><?php the_title(); ?></h4><span class="date-post"> <?php the_time('l, F j, Y') ?></span>
                            <div class="btn-download">
                                <span>Download PDF</span> for
                                <?php if ($eng_file !=='') { ?>                            
                                <a href="<?php echo $eng_file; ?>">English</a>
                                <?php } ?>
                                <?php if ($kh_file !=='') { ?>                            
                                or <a href="<?php echo $kh_file; ?>">Khmer</a>
                                <?php } ?>
                            </div>                            
                        </div>
                        <div class="clear"></div>
                        <!-- / newsletterinfo -->
                    </div>    
				<?php
					}
				} wp_reset_query();
			   ?>                 	
               <a class="morebycats" href="<?php echo get_category_link( get_cat_ID( 'Newsletters' ) ); ?>">More Newsletters <span>&rsaquo;&rsaquo;</span></a>
                
            </div>
            <!-- / Newsletter -->
            
            <div class="grid-02 last">
                <h3 class="headline">Old Memories</h3>
                
 				<?php 
					query_posts('posts_per_page=2&cat=19');
					if (have_posts()) {  while (have_posts()) { the_post(); 					
				?>
					<div class="archives-items">
                    	<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php  echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?q=100&amp;w=74&amp;h=98&amp;src='); ?></a>
                    	<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4><span class="date-post"> <?php the_time('l, F j, Y') ?></span>
                        <?php echo excerpt(16); ?>
                        <div class="clear"></div>
                    </div>    
				<?php
					}
				} wp_reset_query();
			   ?>                 	
               <a class="morebycats" href="<?php echo get_category_link( get_cat_ID( 'Old Memories' ) ); ?>">More Old Memories <span>&rsaquo;&rsaquo;</span></a>                
            </div>   
            <!-- / Old Memories -->
            <div class="clear"></div>
            <!--/Archives-->
            
            </div><!--/middle-->
            <div class="bottom"></div>
            
            <div class="top"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" alt="top blank" /></div>
            <div class="middle">
            <h3 class="sections">Photo Gallery</h3>
            <?php echo do_shortcode('[slickr-flickr type="gallery" items="14"]'); ?>
            
            </div><!--/middle-->
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