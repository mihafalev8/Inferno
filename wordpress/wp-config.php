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
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'fitnes' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'admin' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '12345' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'IYdluVTH,k++0K_S,IuUnn:fouL_gi,6A;)T!21!O^,U8p@-{tq<9)Y^Q02K?!&<' );
define( 'SECURE_AUTH_KEY',  '}3I`M8(hKx5zp=]%>B%)o;c[0)s{9+DPNCa+yt0Qy<&WBN,xlJnT5S$:7CT)(t4_' );
define( 'LOGGED_IN_KEY',    'x%pQTwD9C(c|>7<6@7H>9T9P6R@C)j;S<m>Mi:t_B~v@O49B=crZrvctY<Xp=!-9' );
define( 'NONCE_KEY',        ' 8#gRZ823 p)`TT?,b4H$3H5T|(f5`v:Lphu}}sh8o|#0z4%;2|kay_BMeG2Qmg(' );
define( 'AUTH_SALT',        'ClxPG7Nyn6 /xX8J@w)<*J<R@a%GOD!8UFg4TJ7Hbvor]SGiAgZ.27%+vs>IV];k' );
define( 'SECURE_AUTH_SALT', '9vElJE!#=}#cK%0n,(J SqRM_?sM+?V`_(E?k)5GSoHAAvtbhc~HVW@n!z6R3d.n' );
define( 'LOGGED_IN_SALT',   'f,@s*{8^%toWOWQd@6!PH7nteO^d/,F2edFT=nnHy85d$*M:lph[cKgX%=A 5yl^' );
define( 'NONCE_SALT',       'SghtcUM$|7R>u<xW<(*KyB@MsD(`F454T&lPWQ.SKQ42Afj lxJ)DVYpP^..k%0-' );

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

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
