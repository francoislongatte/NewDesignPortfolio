<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
	<aside id="socialList">
		<a class="icon-twitter-circled" target="_blank" href="https://twitter.com/francoislongatt"></a>
		<a class="icon-linkedin-circled" target="_blank" href="http://lnkd.in/eu2jZs"></a>
		<a class="icon-vimeo-circled" target="_blank" href="https://vimeo.com/user14826387"></a>
		
	</aside>
	<section id="home">
		<?php $pageBlog_id = '194';
				$pageBlog_data[1] = get_page($pageBlog_id);
				$descriptionBlogPage = get_post_meta($pageBlog_id, 'description');
			?>
        <header>
        	<h1><?php echo($pageBlog_data[1]->post_title); ?></h1><span><?php echo($pageBlog_data[1]->post_content); ?></span>
        </header>
        <?php wp_nav_menu(array( 'container' => 'nav', 'id' => 10 )); ?>
    </section>

	<?php
		 if ( is_search() ) :
		 echo 'Resultats de recherche pour "'.get_search_query().'"';
		 
		 else :
		 wp_title('|', true, 'right');
		 endif;
		?>
		<h2>
			 <?php 
			   $count = $wp_query->found_posts;
			   $several = ($count<=1) ? '' : 's'; //pluriel
			
			   if ($count>0) : $output =  $count.' resultat'.$several.' pour la recherche';
			   else : $output = 'Aucun résultat pour la recherche';
			   endif;
			   
			   $output .= ' "<span class="terms_search">'. get_search_query() .'</span>"';
			   
			   echo $output;
			 ?>
		</h2>
		<section id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>


				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_title(); ?>

				<?php endwhile; ?>


			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>