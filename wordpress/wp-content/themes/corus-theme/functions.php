<?php
/**
 * corus-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package corus-theme
 */


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.1' );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corus_theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'corus-theme' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'corus-theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'corus_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function corus_theme_scripts() {

    //Include Slick Slider CSS
    wp_enqueue_style( 'slick-slider', get_bloginfo('template_directory') . '/components/slick-slider/slick.css', array(), _S_VERSION );
    //wp_enqueue_style( 'slick-slider-theme', get_bloginfo('template_directory') . '/components/slick-slider/slick-theme.css', array(), _S_VERSION );

    //Include default styles
    wp_enqueue_style( 'wonder-style', get_stylesheet_uri(), array(), _S_VERSION );

    //Include Slick Slider Javascript
    wp_enqueue_script( 'slick-slider-js', get_bloginfo('template_directory') . '/components/slick-slider/slick.js', array( 'jquery' ), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'corus_theme_scripts' );

/**
 * Include this in footer to execute slider
 */
function slider_init_script() {
    echo '<script>
	jQuery( document ).ready(function() {
            jQuery(".exercise-slider").slick();
        });
     </script>';
}
add_action('wp_footer', 'slider_init_script');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Add Gallery Custom Post Type
 */
require get_template_directory() . '/inc/add-custom-post-type.php';

/**
 * Add Galley Class
 */
require get_template_directory() . '/inc/GalleryClass.php';
