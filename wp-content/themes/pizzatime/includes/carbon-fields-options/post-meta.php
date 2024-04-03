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
    ]);

