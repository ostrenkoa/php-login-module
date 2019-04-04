<?php
error_reporting(E_ALL);

// путь к библиоетеке goDB для работы с базой
// измените этот путь, если будете хранить библиотеку goDB в другом месте
require_once ($_SERVER['DOCUMENT_ROOT'].'/assets/libs/godb/autoload.php');
\go\DB\autoloadRegister();

// данные для подключения к базе
$params = array(

// адрес сервера MySQL
'host'     => 'localhost',

// название базы данных
'dbname'   => '',

// имя пользователя
'username' => '',

// пароль
'password' => '',

// кодировка
'charset'  => 'utf8',

'_debug'   => false,
'_prefix'  => '',
);

// вызов подключения к базе
$db = go\DB\DB::create($params, 'mysql');


// основные параметры системы
// значение по умолчанию для статуса пользователя
$user_login = false;

// массив с опциями системы, можно использовать для хранения своих опций
$config = array(

// активность системы для входа
// true - система активна
// false - зайти в систему смогут только администраторы (значение "1" в поле "user_admin" базы)
'system_state'					=> true,

// возможность регистрации новых пользователей
// true - регистрация разрешена
// false - регистрация запрещена
'new_registration_open'			=> true,

// регистрация новых пользователей только по кодам приглашений
// true - новые пользователь могут зарегистрироваться только имея код приглашения
// false - регистрация открыта для всех желающих
'new_registration_only_invite'	=> false,

// активация новых пользователей с отправкой писем на e-mail
// true - производится отправка письма, логин запрещён до активации
// false - логин возможен сразу после регистрации
'user_email_activation'			=> false,

// возможность восстановления пароля с отправкой писем по e-mail
// true - пользователь может самостоятельно запросить сброс пароля через почту
// false - сброс пароля невозможен
'user_email_passwordreset'		=> false,

// адрес сайта для подключения скриптов и стилей в html
'base_site_url'					=> 'http://localhost',

// название сайта, для использования в текстах и письмах
'site_name'						=> 'YourSite',

// расположение основной директории по отношению к файлу конфигурации
// измените этот путь, если переносите текущий файл конфигурации в другое место, например так:
//'base_include_url'			=> dirname(__FILE__), 		// если файл конфигурации будет в корневой директории
'base_include_url'				=> dirname(__FILE__).'/..', // если файл конфигурации будет в директории config/
//'base_include_url'			=> dirname(__FILE__).'/../your_site', // если файл конфигурации будет в отдельной директории уровнем выше
// не забудьте изменить адрес к файлу в каждом исполняемом файле системы

// адрес и название файла аутентификации пользователей, вынесено в переменную на случай необходимости переименования
'url_UAC_file'					=> '/login/user_access_control.php',

// маска для проверки валидности e-mail
// если включена активация по почте, то не усложняем, сейчас адреса бывают очень разные
// если активация выключена - можно раскомментировать второй вариант или придумать свой
'regex_email'					=> '/.+@.+\..+/i',
//'regex_email'					=> '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,7})$/',

// соль для надёжного шифрования паролей пользователей, замените на любое своё слово
// !!!!!!!!!!!!			ВНИМАНИЕ		!!!!!!!!!!!!
// При изменении соли все пароли, записанные в базу, станут недействительными
'salt'							=> 'login_module',

// страница сайта, на котору должен попадать пользователь после успешного логина
'system_page'					=> 'index.php',

// страница с условиями использования сайта, ссылка на неё будет показываться при регистрации
'terms_page'					=> '/terms.php',

// e-mail службы поддержки, будет указываться в сообщениях об ошибках
'email_support'					=> 'support@yoursite.com',
);

// опции почтового сервера для отправки писем активации и восстановления пароля
// приведены корректные примеры опций для использования сервиса Яндекс Коннект
$mailconfig = array(

// адрес smtp сервера
//'smtphost'				=> 'smtp.yandex.ru',
'smtphost'					=> '',

// порт smtp сервера
//'smtpport'				=> '465',
'smtpport'					=> '',

// тип шифрования smtp сервера
//'smtpsecure'				=> 'ssl',
'smtpsecure'				=> '',

// авторизация smtp сервера
//'smtpauth'				=> true,
'smtpauth'					=> true,

// адрес почты smtp сервера
//'smtpmail'				=> 'robot@yoursite.com',
'smtpmail'					=> '',

// логин smtp сервера
//'smtpusername'			=> 'robot@yoursite.com',
'smtpusername'				=> '',

// пароль smtp сервера
//'smtppassword'			=> 'YoUrPaSSword',
'smtppassword'				=> '',

// название отправителя для писем
//'smtpfrom'				=> 'YourSiteName',
'smtpfrom'					=> '',
);

?>
