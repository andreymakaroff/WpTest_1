<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'mabbly');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Z7TJ1MP-12-%:eY&#-lOVuLYWnW_ND?ep3oZ&z0s)#EdZztqS.e@>EVp;=N)S1#h');
define('SECURE_AUTH_KEY',  'yO7tY7K()[-`u.ER$G BAyTXrQ5TUi^MBxaRO&DaberZWm.W`3#LN4&0VnsvuaW-');
define('LOGGED_IN_KEY',    'Pg$cII@~6XGUUkcQP`jdgn>pn6ikcIQ140@.v-MVb};N5!Q>Eql #(h&d0K|8KBt');
define('NONCE_KEY',        'UMbnd*9Yc@QoRfRKJ(v[%ZB{JfWXOzfKk+ZFt@:-jWq4TPcCh*RWe>+uh`T0(L*g');
define('AUTH_SALT',        '*igNOEmmeZ#o&@V) `SCU1:Gv0YHe-tB:}&y:L*{cgncmQY- Hzg~MfMHceEYr8A');
define('SECURE_AUTH_SALT', 'ev0A?g6ID<R`q=-sJ[@@L^,SnT<- [_37RF+Kzg# >^&GyDkB4Xvb5+~<?ZAY&og');
define('LOGGED_IN_SALT',   ',CB,C[)>-uy:]a}qNVoEl}pZF&MYTIbnxWEI88?E|`}ppPi4yB+;KaeWQ|fyrb!9');
define('NONCE_SALT',       'JLm]*n/k$WBlA8+sm3i9:x-,Zym}%.^+wcQ5,qUcXN!XU#mPD{|6I%d}G9brnx8R');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
