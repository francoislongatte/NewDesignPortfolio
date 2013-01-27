<?php
/*
Template Name: blog
*/
?>
<?php 
	get_header();
	
	?>
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
	<section id="blog">
		<div id="contentArticle">
				<?php
					$the_query = new WP_Query(array('post_type' => 'blogs', 'orderby' => 'title', 'order' => 'DESC'));
					while ($the_query->have_posts()) :
					$the_query->the_post();
					
				?>
			<article>
				<a class="thumb" href="<?php the_permalink(); ?>">
					<?php if(!is_mobile()): ?>
					<?php the_post_thumbnail( 'BlogAffiche' ); ?>
					<?php else: ?>
					<?php the_post_thumbnail( 'BlogAfficheMobile' ); ?>
					<?php endif; ?>
				</a>
				<span class="Dateforward"><?php the_time('d') ?><br /><?php the_time('M') ?> </span>
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
						<a title="" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<?php the_excerpt();?>					
				</div>
			</article>
			<?php endwhile; ?>
		</div>
		<div class="contentSidebar">
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>
		<div class="contentSidebar">
			<?php wp_list_categories('show_count=1&taxonomy=categorie'); ?>
		</div>
		<?php dynamic_sidebar('primary'); ?> 
		<?php dynamic_sidebar('flux'); ?>
		
	</section>

	
	<?php
	
	
	get_footer();