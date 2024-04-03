<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'w1' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'L=*$Hw8vq]4(vOuwq{;mp4<dGS +?jx1}YuqWk-7(/SxNx89g_7]jD0IrX_@d>jt' );
define( 'SECURE_AUTH_KEY',  '(@L~Hn7;=s^~%T[D>&ao8)mbPC)^%~&@Mk5])k&S]aq:5j#PR S(*vZdZ/x.&AZ-' );
define( 'LOGGED_IN_KEY',    'D,3F8xQRcHk~q%GFBb}D6uMqb!,;CyhIjdMeU!Vul`NvThZWMAL o;1YFEm+I,gL' );
define( 'NONCE_KEY',        'e{Awm1vqW%XI~5l&6.Ou oE#@;!a T&I!PUrkr4|j+vU+xw26QWt8B&5OGo8<1]_' );
define( 'AUTH_SALT',        '+pzkDkDvRv#v#jL4e-H$O%i.ADS7S7aS7rhhnS/d2a<.dfu-MBG7:AD0o)Wy6Z5F' );
define( 'SECURE_AUTH_SALT', ',gEa`Yu,PoZS/uo)hPXU0z^ g9<x?!URp|U}gL-WN4k%&.4&KWe6j:fx?hK 6EHt' );
define( 'LOGGED_IN_SALT',   ')QIeU9#$~L}^%umY5P]d:h>H^o,d]Jpe`TAdZ#Zz{LeJh2APdTV@|lMyry9TQRn|' );
define( 'NONCE_SALT',       'tfqmY+f?]1DFz88>UzW/MRf&Y*hlG9o=7?-* plfkTduW;EHNQ]n)Zq}OsxK1%%T' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
