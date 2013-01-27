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
            <h1><?php echo($pageWork_data[1]->post_title); ?></h1><span><?php echo($pageWork_data[1]->post_content); ?></span>
        </header>
        <div id="fieldFilter">
        <?php	$terms = get_terms("techniques");
			 $count = count($terms);
			 if ( $count > 0 ){
			     foreach ( $terms as $term ) {
			       echo '<a href="javascript:void(0)" id="'. $term->slug .'" class="filtre" >' . $term->name .'</a>';
			     }
			 } ?>
        </div>
        <a href="javascript:void(0)" id="btnAll">TouT</a>
        <ul class="content">
           
	        <?php 
				$the_query = new WP_Query(array('post_type' => 'works','posts_per_page' => 9, 'orderby' => 'date'));
				while ( $the_query->have_posts() ) : $the_query->the_post();
				$termsPost = get_the_terms( get_the_id(), 'techniques'); ?>
					<li class="taxonomie <?php if($termsPost): foreach($termsPost as $termPost): echo $termPost->slug; endforeach; endif; ?>" ><?php the_post_thumbnail('WorkThumbnails'); ?>
						<div>
							<span class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
							<?php the_excerpt(); ?>
						</div>
					</li>
					 <?php	
				endwhile;
				wp_reset_postdata();
			?>
	 
        </ul>
    </section>
