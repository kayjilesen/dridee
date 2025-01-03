<?php

    defined( 'ABSPATH' ) || exit;

    /**
     * Scripts
     */
    function kj_scripts() {

        if ( ! wp_script_is( 'jquery', 'enqueued' )) {
            wp_enqueue_script( 'jquery' );
        }

        wp_register_script('swiper', get_template_directory_uri() . '/assets/libs/swiper/swiper.js', array(), filemtime( get_stylesheet_directory() . (kj_is_live_domain() ? '/dist/' : '/assets/') . '/css/style.css'), 'all');
        wp_enqueue_script('swiper');
    }
    add_action('wp_enqueue_scripts', 'kj_scripts');

    /**
     * Stylesheets
     */
    function kj_styles() {    

        wp_register_style('style', get_template_directory_uri() . (kj_is_live_domain() ? '/dist/' : '/assets/') . 'css/style.css', array(), filemtime(get_theme_file_path((kj_is_live_domain() ? '/dist/' : '/assets/') . 'css/style.css')), 'all');
        wp_enqueue_style('style'); // Style

    }
    add_action('wp_enqueue_scripts', 'kj_styles');