<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

	<div id="contents">
    	<div id="c1">        
        	<div class="top"></div>
            <div class="middle">                         
               <h2>Archives by Month:</h2>
                <ul>
                    <?php wp_get_archives('type=monthly'); ?>
                </ul>
            
                <h2>Archives by Subject:</h2>
                    <ul>
                         <?php wp_list_categories(); ?>
                    </ul>            

                
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