<?php
/*
Template Name: About
*/
?>

<section id="about">
		
        <header>
            <h1>About</h1><span>Everything about me</span>
        </header>

        <div id="paralax"></div>

        <h1>francois longatte</h1>

        <div id="aboutme">
            <?php 
			     $TaxMeQueries = array(
					    'tax_query' => array(
					        array(
					            'taxonomy' => 'whichType',
					            'field' => 'slug',
					            'terms' => 'me'
				       )
				    )
				);
				$the_tax_query = new WP_Query($TaxMeQueries);
				while ( $the_tax_query->have_posts() ) : $the_tax_query->the_post();?>
				<?php $exemple_metas = get_post_custom(); ?>
				<div class="social">	
						<span class="<?php echo $exemple_metas['class'][0] ?>"></span>
						<?php the_content(); ?>
				</div>
			<?php	
				endwhile;
				wp_reset_postdata();
			?>
        </div>

        <h1>Skills</h1>

        <ul class="skills">
        	<?php 
			     $TaxSkillQueries = array(
					    'tax_query' => array(
					        array(
					            'taxonomy' => 'whichType',
					            'field' => 'slug',
					            'terms' => 'skills'
				       )
				    )
				);
				$the_query = new WP_Query($TaxSkillQueries);
				while ( $the_query->have_posts() ) : $the_query->the_post();?>
				<?php $skills_metas = get_post_custom(); ?>
				<li>
						<div class="<?php echo $skills_metas['class'][0]; ?>"></div>	
						<meter class="meterSkills" min="0" max="100" value="<?php echo $skills_metas['meterValue'][0]; ?>"><?php echo $skills_metas['meterValue'][0]; ?>/100</meter>
						<div class="description">
							<?php the_content(); ?>
						</div>
				</div>
			<?php	
				endwhile;
				wp_reset_postdata();
			?>
       </ul>
    </section>
