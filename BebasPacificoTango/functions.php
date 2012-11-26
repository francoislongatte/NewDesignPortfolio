<?php

add_action('widgets_init', 'myweb_sidebars');
add_action('after_setup_theme', 'myweb_setup');
add_action('init', 'create_post_type');
add_action('init','build_taxonomies');

if(!function_exists('build_taxonomies')){
	function build_taxonomies(){
		register_taxonomy("techniques","works", array(
				"label" => "Techniques utilisées",
				"hierarchical" => true,
				"query_var" => true,
				"rewrite" => true
			)

		);

	}
}



if(! function_exists('myweb_sidebars')){
	function myweb_sidebars(){
		register_sidebar(
			array(
				'id' => 'primary',
				'name' => __('primary'),
				'description' => __( ' A short description of the sidebar.'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => ' </div> ',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'

			)
		);
		register_sidebar(
			array(
				'id' => 'Newsletter',
				'name' => __('Newsletter'),
				'description' => __( ' A short description of the sidebar.'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => ' </div> ',
				'before_widget' => '<h3 class="widget-title">',
				'after_title' => '</h3>'

			)
		);
		register_sidebar(
			array(
				'id' => 'Text-information',
				'name' => __('Text-information'),
				'description' => __( 'My text information about me.'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => ' </div> ',
				'before_widget' => '<h3 class="widget-title">',
				'after_title' => '</h3>'

			)
		);
		register_sidebar(
			array(
				'id' => 'MenuFiltre',
				'name' => __('MenuFiltre'),
				'description' => __( 'My Menu Work.'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => ' </div> '

			)
		);

		register_sidebar(
			array(
				'id' => 'Twitter',
				'name' => __('Twitter'),
				'description' => __( 'My Twitter coms'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => ' </div> ',
				'before_widget' => '<h3 class="widget-title">',
				'after_title' => '</h3>'

			)
		);
	}
}

if(! function_exists('myweb_setup')){
	function myweb_setup(){
		add_theme_support('post-thumbnails');
		if(function_exists('add_image_size')){
			add_image_size('folio-work',640,480,false);
		}
		add_theme_support('post-formats', array('aside','link','gallery','statut','quote','image'));

		register_nav_menu('header-menu', __('Header Menu', 'titi'));
	}
}

if(! function_exists('create_post_type')){
	function create_post_type(){
		register_post_type('works',
			array(
				'description' => 'Few examples of my work',
				'labels' =>array(
					'name' => __('travaux'),
					'singular_name' => __('travail')
				) ,
				'supports' =>array(
					'title', 'editor', 'thumbnail', 'post-format'),
				'public' => true,
				'has_archive' => true
			)

		);
		register_post_type('Blogs',
			array(
				'labels' =>array(
					'name' => __('blog'),
					'singular_name' => __('blog')
				) ,
				'supports' =>array(
					'title', 'editor', 'thumbnail', 'post-format','comments'),
				'public' => true,
				'has_archive' => true
			)

		);
		register_post_type('About',
			array(
				'labels' =>array(
					'name' => __('about'),
					'singular_name' => __('about')
				) ,
				'supports' =>array(
					'title', 'editor', 'thumbnail', 'post-format','comments'),
				'public' => true,
				'has_archive' => true
			)
		);
	}
}
