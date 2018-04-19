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
define('DB_NAME', 'mywordpress');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'InYqY9G;++INRPuG~uI,Ocm BjbS1i-`O$Qp%6[xxrT5cZ25i)ll/k00$TdPxQ#[');
define('SECURE_AUTH_KEY',  'VVz&c;-u->UgRpIqa=MgO0lGWCY4iO;9S x,-o0f|6eQ!MUI9:aGQP|Xbt3!1Kcu');
define('LOGGED_IN_KEY',    'svYtIE6yg;({KVq9/m$u?jR3sR>7xf>CU1#`.T&$vNOdN/#OWR5W7f;3>WNH/]%P');
define('NONCE_KEY',        '`7A&a99CF ./(&?7)i+i3v_~Za6>m2ZBK5+R]VVVT503c8UtlXWqa+R?qxm%YqZS');
define('AUTH_SALT',        'H[:u/!Y;6A0/.&r7VV[Ku;WbjF;b>=VwpNbZnm]/pg-QhjPW$,#UwjBp;vW%Y?H?');
define('SECURE_AUTH_SALT', '>slH8X)$!Y;,SS5vrcDgfSP`W9WWYOmQ+Vq7[|Hp-d(<d&TJ2*V$^jk_gu98uUE7');
define('LOGGED_IN_SALT',   'nK;DK=C(s~GhXSQHEbm[dGs74e%0F)oGQ7O7Rh<OJPxJ)_-q%e|=JpbJ3)9$5i{x');
define('NONCE_SALT',       'QT6+(Lq6qOT[b.pMN;Oz|<3}FX>|hHlBR]`km}bnz!}p} ^6XyJ]->tCC[`K8Qe&');

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
