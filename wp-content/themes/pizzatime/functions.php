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

add_action( 'after_setup_theme', 'theme_support' );

function theme_support() {
    register_nav_menu( 'menu_main_header', 'Меню в шапке' );
    add_theme_support('post-thumbnails'); // без него фото в товарах не будет
}

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
    require_once( 'includes/carbon-fields-options/post-meta.php' );
}

add_action('init', 'create_global_variables');
function create_global_variables(){
    global $pizza_time;
    $pizza_time = [
        'phone' => carbon_get_theme_option( 'site_phone'),
        'phone_digits' => carbon_get_theme_option( 'site_phone_digits'),
        'address' => carbon_get_theme_option('site_address'),
        'map_coordinates' => carbon_get_theme_option('site_map_coordinates'),
        'vk_url' => carbon_get_theme_option('site_vk_url'),
        'facebook_url' => carbon_get_theme_option('site_fb_url'),
        'inst_url' => carbon_get_theme_option('site_inst_url'),

    ];
}

// http://wodpres.loc/wp-content/uploads/2024/04/bg.jpg
// http://wodpres.loc/wp-content/uploads-webpc/uploads/2024/04/bg.jpg.webp

function convertToWebpSrc($src){
    $src_webp = str_replace('uploads', 'uploads-webpc/uploads', $src) . '.webp';
    return $src_webp;
}

add_action( 'init', 'register_post_types' );

function register_post_types(){

    register_post_type( 'product', [
        'label'  => null,
        'labels' => [
            'name'               => 'Товары', // основное название для типа записи
            'singular_name'      => 'Товар', // название для одной записи этого типа
            'add_new'            => 'Добавить товары', // для добавления новой записи
            'add_new_item'       => 'Добавление товара', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование товара', // для редактирования типа записи
            'new_item'           => 'Новый товар', // текст новой записи
            'view_item'          => 'Смотреть товар', // для просмотра записи этого типа.
            'search_items'       => 'Искать товар', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'menu_name'          => 'Товары', // название меню
        ],
        'menu_icon'           => 'dashicons-cart',
        'public'                 => true,
        'menu_position'       => 5,
        'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt', ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'has_archive'         => true,
        'rewrite'             => ['slug' => 'products'],
    ] );

    register_taxonomy( 'product-categories', [ 'product' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Категории товаров',
            'singular_name'     => 'Категория товаров',
            'search_items'      => 'Искать категории',
            'all_items'         => 'Все категории',
            'view_item '        => 'Просмотр категории',
            'edit_item'         => 'Изменить категорию',
            'update_item'       => 'Обновить категорию',
            'add_new_item'      => 'Добавить категорию',
            'new_item_name'     => 'Новое название категории',
            'separate_items_with_commas' => 'Отделить категорию запятыми',
            'add_or_remove_items' => 'Добавить или удалить категорию',
            'choose_from_most_used' => 'Выбрать самую популярную категорию',
            'menu_name'         => 'Категории',
            'back_to_items'     => '← Назад к категории',
        ],
        'hierarchical'          => true,
        ]);
}