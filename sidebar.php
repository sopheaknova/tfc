<div id="sidebar">
	<div class="small-box">            
        <div class="t"><h3>Tournaments</h3></div>
        <div class="mid">
        	<?php 				
				query_posts('cat=28&showposts=1');
					while (have_posts()) : the_post(); ?>
			
            <a href="<?php the_permalink(); ?>"><?php  echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?q=100&amp;w=284&amp;h=134&amp;src='); ?></a>
            <h5>
            	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <span class="date-post">(<?php the_time('n/d/y'); ?>)</span>
            </h5>
            
			<?php //the_advanced_excerpt("length=190&use_words=0"); ?>
            <?php the_excerpt(''); ?>
            
            <?php endwhile; ?>

        </div>
        <!--/mid-->
        <div class="b"></div>
    </div>
    <!--/small-box-->
    
    <div class="small-box">            
        <div class="t"><h3>Advertising</h3></div>
        <div class="mid">
   	<?php query_posts("posts_per_page=1&post_type=sponsor&sponsors-categories=sidebar"); ?>
			<?php
                if (have_posts()) : while(have_posts()) : the_post();

                $image_id = get_post_thumbnail_id();  
                $image_url = wp_get_attachment_image_src($image_id, 'full');					  
            ?>
            
                <img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>&amp;w=284&amp;h=284&amp;zc=1&amp;q=100" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            
            <?php 	
                endwhile; endif; wp_reset_query(); 
            ?>
	     </div>
        <!--/mid-->
        <div class="b"></div>
    </div>
    <!--/small-box-->       
    
    <div class="small-box">            
        <div class="t"><h3>International News</h3></div>
        <div class="nopadded">
        
        <div class="international">
        <ul class="tabsinternational">
        <?php
			$i = 1; 			
			$categories=  get_categories('child_of=21&orderby=id'); 
			  foreach ($categories as $category) {
			  	if($i<=1) {
					$option = '<li><a href="#'.$category->category_nicename.'" class="selected">';
				} else{
					$option = '<li><a href="#'.$category->category_nicename.'">';
				}
				$option .= $category->cat_name;
				$option .= '</a></li>';
				echo $option;
				$i++;
			  }
		?>
            <div class="clear"></div>
        </ul>
		
        <?php
			foreach ($categories as $category_items) {
		?>        
                
        <div id="<?php echo $category_items->category_nicename; ?>">
        <ul>
        	<?php
			$catname = $category_items->category_nicename; 			
			query_posts('category_name='.$catname.'&showposts=5');
				
				while (have_posts()) : the_post(); 
			?>
                
			<li>
            <a href="<?php the_permalink(); ?>">
            <img src="<?php  echo get_bloginfo('template_url') .'/scripts/timthumb.php?q=100&amp;w=80&amp;h=80&amp;src=' . sp_post_image('thumbnail'); ?>" />
            </a>
            
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
            <span class="date-post"><?php the_time('l, F j, Y') ?></span>            
            <div class="clear"></div>
            </li>
            
            <?php endwhile; wp_reset_query();?>
        </ul>
        </div>
        <!--// <?php echo $category_items->cat_name; ?> -->
        
        <?php } ?>
        
        <a class="morebycats" href="<?php echo get_category_link( get_cat_ID( 'International' ) ); ?>">More International <span>&rsaquo;&rsaquo;</span></a>
        
        </div>
        <!--/.International-->
                
	    </div>
        <!--/mid-->
        <div class="b"></div>
    </div>
    <!--/small-box-->  
    

	</div>
	<!--/sidebar -->