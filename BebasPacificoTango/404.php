<?php
/**
 * The template for displaying 404 pages (Not Found).
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
    <section id="noFound">
        <?php wp_nav_menu(array( 'container' => 'nav', 'id' => 10 )); ?>
	    <img src="<?php bloginfo('template_url'); ?>/images/404.png" alt="404" width="" height="" />
	    <span id="return"><a href="<?php bloginfo('wpurl'); ?>">Retour au site</a></span>
	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title">Acces reservee, veuillez circuler</h1>
					
				</header>
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>