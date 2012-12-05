<?php 
	get_header();
?>

<aside>
		<a class="icon-twitter-circled" target="_blank" href="https://twitter.com/francoislongatt"></a>
		<a class="icon-linkedin-circled" target="_blank" href="http://lnkd.in/eu2jZs"></a>
		<a class="icon-vimeo-circled" target="_blank" href="https://vimeo.com/user14826387"></a>
	</aside>
    <section id="home">
        <header>
            <h1><a href="<?php bloginfo('wpurl'); ?>"><?php  bloginfo('name'); ?></a></h1><span><?php  bloginfo('description'); ?></span>
        </header>
        <?php wp_nav_menu(array( 'container' => 'nav' )); ?>
        <div class="slider">
            <ul>
            	<?php 
				$the_query_home = new WP_Query(array('post_type' => 'post'));
				while ( $the_query_home->have_posts() ) : $the_query_home->the_post();?>

					<li ><?php the_post_thumbnail('Slide'); ?></li>
					 <?php	
				endwhile;
				wp_reset_postdata();
			?>
            </ul>

            <div id="bRadio">
                <a class="current" href="javascript:void(0)"></a><a href="javascript:void(0)"></a>
            </div>
        </div>
    </section>
    <?php 
    	get_template_part( 'page', 'work' );  
    	get_template_part( 'page', 'about' ); 
    	get_template_part( 'page', 'contact' );
	
	get_footer();