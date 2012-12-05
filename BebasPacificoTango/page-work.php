<?php
/*
Template Name: Work
*/
?>

<section id="work">
        <header>
        	<?php $pageWork_id = '16';
				$pageWork_data[1] = get_page($pageWork_id);
				$descriptionWorkPage = get_post_meta($pageWork_id, 'description');
			?>
            <h1><?php echo($pageWork_data[1]->post_name); ?></h1><span><?php echo($descriptionWorkPage[0]); ?></span>
        </header>
        <div id="fieldFilter">
        <?php	$terms = get_terms("techniques");
			 $count = count($terms);
			 if ( $count > 0 ){
			     foreach ( $terms as $term ) {
			       echo '<a href="javascript:void(0)" id="'.$term->name .'" class="filtre" >' . $term->name .'</a>';
			     }
			 } ?>
        </div>
        
        <ul class="content">
           
	        <?php 
				$the_query = new WP_Query(array('post_type' => 'works','posts_per_page' => 9, 'orderby' => 'date'));
				while ( $the_query->have_posts() ) : $the_query->the_post();?>

					<li ><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('WorkThumbnails'); ?></a></li>
					 <?php	
				endwhile;
				wp_reset_postdata();
			?>
	 
        </ul>
    </section>
