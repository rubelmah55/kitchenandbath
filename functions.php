<?php
/**
 * mrinterlock functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mrinterlock
 */

if ( ! function_exists( 'mrinterlock_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mrinterlock_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mrinterlock, use a find and replace
	 * to change 'mrinterlock' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mrinterlock', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'mrinterlock' ),
	) );

	register_nav_menus( array(
		'blog' => esc_html__( 'Blog Page Menu', 'mrinterlock' ),
	) );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mrinterlock_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mrinterlock_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mrinterlock_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mrinterlock_content_width', 640 );
}
add_action( 'after_setup_theme', 'mrinterlock_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mrinterlock_widgets_init() {
	/* Foote Widgets 1 */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets Left', 'mrinterlock' ),
		'id'            => 'foote_widgets_1',
		'description'   => esc_html__( 'Add widgets here.', 'mrinterlock' ),
		'before_widget' => '<div class="site_info">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets Middle', 'mrinterlock' ),
		'id'            => 'foote_widgets_3',
		'description'   => esc_html__( 'Add widgets here.', 'mrinterlock' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
	/* Foote Widgets 2 */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets Right', 'mrinterlock' ),
		'id'            => 'foote_widgets_2',
		'description'   => esc_html__( 'Add widgets here.', 'mrinterlock' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
	
}
add_action( 'widgets_init', 'mrinterlock_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mrinterlock_scripts() {
	/*Css Enqueue*/
	wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:300,400,400i,600,700,800', array(), false, 'all');
	wp_enqueue_style('fonts_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), false, 'all');
	wp_enqueue_style('bootstrap_min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
	wp_enqueue_style('fonts_gotham', get_template_directory_uri() . '/fonts/fonts_gotham.css', array(), false, 'all');
	wp_enqueue_style('slick_min', get_template_directory_uri() . '/css/slick.css', array(), false, 'all');
	wp_enqueue_style('slick_theme', get_template_directory_uri() . '/css/slick-theme.css', array(), false, 'all');
	wp_enqueue_style('mr_interlock', get_template_directory_uri() . '/css/mr_interlock.css', array(), false, 'all');
	wp_enqueue_style( 'mrinterlock-style', get_stylesheet_uri() );


	/*JS Enqueue*/
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap_min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true);
	wp_enqueue_script('slick_min', get_template_directory_uri() . '/js/slick.min.js', array(), false, true);
	wp_enqueue_script('setting', get_template_directory_uri() . '/js/settings.js', array(), false, true);

	/* localize script */
	$slide_delay = get_theme_mod('slide_delay');
	wp_localize_script('setting', 'local', array(
		'slide_delay' => $slide_delay,
	));
	wp_enqueue_script( 'ajax-load-more', get_stylesheet_directory_uri() . '/js/ajax-load.js', array( 'jquery' ), '1.0', true );

		global $wp_query;
	
		$data = array(
			'total_pages' => $wp_query->max_num_pages
		);
	
	wp_localize_script( 'ajax-load-more', 'total_pages', $data );


	wp_enqueue_script( 'mrinterlock-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mrinterlock-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mrinterlock_scripts' );

require get_template_directory() . '/inc/options.php';
/*** wp bootstrap navwalker.*/
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
//require get_template_directory() . '/template-parts/content-ajax.php';




/* customize login screen */
function mrinterlock_custom_login_page() {
    echo '<style type="text/css">
        h1 a { background-image:url("'. get_stylesheet_directory_uri().'/img/logo.png") !important; height: 55px !important; width: 100% !important; margin: 0 auto !important; background-size: 80% !important; }
		h1 a:focus { outline: 0 !important; box-shadow: none; }
        body.login { background-image:url("'. get_stylesheet_directory_uri().'/img/banner.jpg") !important; background-repeat: no-repeat !important; background-attachment: fixed !important; background-position: center !important; background-size: cover !important; position: relative; z-index: 999;}
  		body.login:before { background-color: rgba(0,0,0,0.7); position: absolute; width: 100%; height: 100%; left: 0; top: 0; content: ""; z-index: -1; }
  		.login form {
  			background: rgba(255,255,255, 0.2) !important;
  		}
  		.login #backtoblog a, .login #nav a{
			color:#fff;
  		}
		.login form .input, .login form input[type=checkbox], .login input[type=text] {
			background: transparent !important;
			color: #ddd;
		}
		.login label {
			color: #DDD !important;
		}
		.login #login_error, .login .message {
			color: #ddd;
			margin-top: 20px;
			background: rgba(255,255,255, 0.2) !important;
		}
		.login h1 {
		    text-align: center;
		    background-color: #FFF;
		    padding: 10px 0;
		}
    </style>';
}
add_action('login_head', 'mrinterlock_custom_login_page');

function mrinterlock_login_logo_url_title() {
 	return 'MB THIRTY';
}
add_filter( 'login_headertitle', 'mrinterlock_login_logo_url_title' );

function mrinterlock_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'mrinterlock_login_logo_url' );
