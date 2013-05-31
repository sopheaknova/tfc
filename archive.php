<?php get_header(); ?>

	<div id="contents">
    	<div id="c1">        
        	<div class="top"></div>
            <div class="middle">                         
               
              <?php if (have_posts()) : ?>

			  <?php $post = $posts[0]; ?>
              
              <?php if (is_category()) { ?>
                
                <h2 class="pagetitle"><?php single_cat_title(); ?></h2>
                
              <?php } elseif( is_tag() ) { ?>
                <h2 class="pagetitle"><?php echo 'Tag archive for'; ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
              
              <?php } elseif (is_day()) { ?>
                <h2 class="pagetitle"><?php echo 'Date archive for'; ?> <?php the_time('F jS, Y'); ?></h2>
              
              <?php } elseif (is_month()) { ?>
                <h2 class="pagetitle"><?php echo 'Date archive for'; ?> <?php the_time('F, Y'); ?></h2>
              
              <?php } elseif (is_year()) { ?>
                <h2 class="pagetitle"><?php echo 'Date archive for'; ?> <?php the_time('Y'); ?></h2>
              
              <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                <h2 class="pagetitle"><?php echo 'Blog Archives'; ?></h2>
              <?php } ?>
        
           <ul class="archive-list">
                <?php while (have_posts()) : the_post(); ?>
                
                <?php if (is_category('newsletters')) { 
					$eng_file = get_post_meta($post->ID, 'newslettereng_value', true);
					$kh_file = get_post_meta($post->ID, 'newsletterkh_value', true);
				?>
                
                <li class="newsletter-archive">
                	<?php echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?q=100&amp;w=74&amp;h=98&amp;src='); ?>
                    <div class="newsletterinfo">
                    <h4><?php the_title(); ?></h4>                             
                    <span class="date-post"><?php the_time('F j, Y') ?></span>                    
                    
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
                </li>
                
                <?php } else { ?>
                    <!--place post archive lists-->
                    <li class="clearfloat">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?q=100&amp;w=120&amp;h=98&amp;src='); ?></a>
                    
            <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4> 
                    
                <span class="date-post"><?php the_time('n/d/y'); ?> &bull;</span>                  
                <?php the_excerpt(''); ?>
                <div class="clear"></div>
                    </li>
                <?php } ?>    
        		
                <?php endwhile; ?>

            </ul>
        
                <div class="navigation">
                    <?php if (function_exists('wp_pagenavi')) { ?>
					<?php wp_pagenavi(); ?>
                    <?php } ?>
                </div>
                <div class="clear"></div>
                
            <?php else : ?>
        
                <h2><?php echo 'Not Found'; ?></h2>
                
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