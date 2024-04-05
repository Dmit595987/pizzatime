<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', 'Дополнительные поля' )
    ->show_on_page(19)
    ->add_tab( 'Общие настройки', [
        Field::make( 'text', 'top_info', 'Надзаголовок' )
        ->set_width(50),
        Field::make( 'text', 'top_title', 'Заголовок' )
        ->set_width(50),
        Field::make( 'text', 'top_btn_text', 'Текст Кнопки' )
        ->set_width(50),
        Field::make( 'text', 'top_btn_scroll_to', 'Класс секции для перехода по кнопке' )
        ->set_width(50),
        Field::make( 'image', 'top_img', 'Главное изображение' ),
    ])
    ->add_tab( 'Каталог', [
        Field::make( 'text', 'catalog_title', 'Заголовок Меню' ),
    ])
    ->add_tab( 'О нас', [
        Field::make( 'text', 'about_title', 'Заголовок о нас' ),
        Field::make( 'rich_text', 'about_text', 'Текст о нас' ),
        Field::make( 'image', 'about_img', 'Изображение о нас' ),
    ])
    ->add_tab( 'Контакты', [
        Field::make( 'text', 'contacts_title', 'Заголовок контакты' ),
        Field::make( 'checkbox', 'contacts_is_img', 'Показать помидоры' ),
    ]);

Container::make( 'post_meta', 'Для страницы ТЕСТ' )
    ->show_on_page(30)
    ->add_tab( 'Настройки', [
        Field::make( 'media_gallery', 'gallery', 'Галерея изображений' ),
    ]);

Container::make( 'post_meta', 'Товары' )
    ->show_on_post_type('product')
    ->add_tab( 'Настройки товара', [
        Field::make( 'text', 'product_price', 'Цена товара' ),
        Field::make( 'complex', 'product_attr', 'Атрибуты' )
            ->set_max(3)
            ->add_fields( array(
                Field::make( 'text', 'name', 'Название' )->set_width(50),
                Field::make( 'text', 'price', 'цена' )->set_width(50),
            ))
    ]);
