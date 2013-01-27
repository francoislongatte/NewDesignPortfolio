<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<aside id="socialList">
		<a class="icon-twitter-circled" target="_blank" href="https://twitter.com/francoislongatt"></a>
		<a class="icon-linkedin-circled" target="_blank" href="http://lnkd.in/eu2jZs"></a>
		<a class="icon-vimeo-circled" target="_blank" href="https://vimeo.com/user14826387"></a>

	</aside>
	<section id="intro">
		<?php $pageBlog_id = '194';
			$pageBlog_data[1] = get_page($pageBlog_id);
			$descriptionBlogPage = get_post_meta($pageBlog_id, 'description');
		?>
        <header>
        	<h1><?php echo($pageBlog_data[1]->post_title); ?></h1><span><?php echo($pageBlog_data[1]->post_content); ?></span>
        </header>
        <?php wp_nav_menu(array( 'container' => 'nav', 'id' => 10 )); ?>
    </section>

	<section id="single">
		<div id="primary" class="site-content">
				<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<div class="thumb">
						<?php the_post_thumbnail( 'BlogAffiche' ); ?>
					</div>	
					<aside class="meta">
						<p class="date">
							<?php the_date(); ?>
						</p>
						<p class="author">
							Posted by <a href="<?php the_author_link(); ?> "><?php the_author(); ?></a>
						</p>
					</aside>
					<div class="contentArticle">
					<h2>
						<?php the_title(); ?>
					</h2>
					<span><a href="/blog/">Retour au blog</a></span>
					<?php the_content();?>	
					<span class="next"><?php next_post_link(); ?></span>
					<span><a href="/blog/">Retour au blog</a></span>
					<span class="previous"><?php previous_post_link(); ?></span>
					
				</div>
				</article>
				
				<?php endwhile; // end of the loop. ?>
				<?php wp_reset_query(); ?> 
				 
		</div><!-- #primary -->
		<div id="secondary">
				<h2>Quelques autres articles</h2>
				<ul>
					
				<?php
					$recentPosts = new WP_Query(array('post_type' => 'blogs', 'orderby' => 'date', 'order' => 'DESC'));
					while ($recentPosts->have_posts() ) : $recentPosts->the_post(); ?>
					<li>
						<a href="<?php the_permalink() ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</li>
				<?php endwhile; ?>
				</ul>
		</div>
	</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>