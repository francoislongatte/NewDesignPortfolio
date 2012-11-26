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
            <h1>François</h1><span>Developer &amp; Web Designer</span>
        </header>
        <?php wp_nav_menu(array( 'container' => 'nav' )); ?>
        <div class="slider">
            <ul>
                <li><img src="images/slider/mac.png" alt="mac" width="450" height="316"></li>
            </ul>

            <div id="bRadio">
                <a class="current" href="#"></a> <a href="#"></a> <a href="#"></a>
            </div>
        </div>
    </section>
    <?php get_template_part( 'page', 'work' ); ?> 
    <?php get_template_part( 'page', 'about' ); ?> 
    <?php get_template_part( 'page', 'contact' ); ?>
<?php
	
	get_footer();