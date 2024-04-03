<?php

remove_action('wp_head',             'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles',     'print_emoji_styles' );
remove_action('admin_print_styles',  'print_emoji_styles' );

remove_action('wp_head', 'wp_resource_hints', 2 ); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

add_action('wp_enqueue_scripts', 'site_scripts');

function site_scripts(){
    $version = '0.0.0.0';
    wp_dequeue_style( 'wp-block-library' );
    wp_deregister_script( 'wp-embed' );

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:900%7CRoboto:300&display=swap&subset=cyrillic', [], $version);
    wp_enqueue_style('main-style', get_stylesheet_uri(), [], $version);

    wp_enqueue_script('focus-visible', 'https://unpkg.com/focus-visible@5.0.2/dist/focus-visible.js', [], $version, true);
    wp_enqueue_script('lazy-load', 'https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js', [], $version, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', ['focus-visible', 'lazy-load'], $version, true);

    wp_localize_script('main-js', 'WPJS', [
        'siteUrl' => get_template_directory_uri(),
    ]);
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once(ABSPATH . 'includes/carbon-fields/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields()
{
    require_once( 'includes/carbon-fields-options/theme-options.php' );
}

add_action('init', 'create_global_variables');
function create_global_variables(){
    global $pizza_time;
    $pizza_time = [
        'phone' => carbon_get_theme_option( 'site_phone'),
        'phone_digits' => carbon_get_theme_option( 'site_phone_digits'),
        'address' => carbon_get_theme_option('site_address'),
        'map_coordinates' => carbon_get_theme_option('site_map_coordinates'),

    ];
}