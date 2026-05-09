<?php

/*
|--------------------------------------------------------------------------
| START SESSION
|--------------------------------------------------------------------------
*/

if (session_status() === PHP_SESSION_NONE) {

   session_start();
}

/*
|--------------------------------------------------------------------------
| ERROR REPORTING
|--------------------------------------------------------------------------
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

/*
|--------------------------------------------------------------------------
| LOAD ENV
|--------------------------------------------------------------------------
*/

function env($key, $default = null)
{
   static $env = [];

   /*
    |--------------------------------------------------------------------------
    | LOAD ONLY ONCE
    |--------------------------------------------------------------------------
    */

   if (empty($env)) {

      $envPath =
         __DIR__ . '/../.env';

      /*
        |--------------------------------------------------------------------------
        | CHECK ENV FILE
        |--------------------------------------------------------------------------
        */

      if (!file_exists($envPath)) {

         die('.env file not found');
      }

      /*
        |--------------------------------------------------------------------------
        | READ ENV FILE
        |--------------------------------------------------------------------------
        */

      $lines = file(
         $envPath,
         FILE_IGNORE_NEW_LINES |
            FILE_SKIP_EMPTY_LINES
      );

      foreach ($lines as $line) {

         $line = trim($line);

         /*
            |--------------------------------------------------------------------------
            | SKIP COMMENT
            |--------------------------------------------------------------------------
            */

         if (
            empty($line) ||
            strpos($line, '#') === 0
         ) {
            continue;
         }

         /*
            |--------------------------------------------------------------------------
            | SPLIT KEY VALUE
            |--------------------------------------------------------------------------
            */

         list($name, $value) = array_pad(
            explode('=', $line, 2),
            2,
            null
         );

         $env[trim($name)] =
            trim($value, "\"'");
      }
   }

   return $env[$key] ?? $default;
}

/*
|--------------------------------------------------------------------------
| APP CONFIG
|--------------------------------------------------------------------------
*/

define('APP_NAME', env('APP_NAME'));
define('APP_ENV', env('APP_ENV'));
define('APP_DEBUG', env('APP_DEBUG'));
define('APP_URL', env('APP_URL'));

define('BASE_URL', env('BASE_URL'));
define('API_URL', env('API_URL'));

/*
|--------------------------------------------------------------------------
| DATABASE CONFIG
|--------------------------------------------------------------------------
*/

$dbHost =
   env('DB_HOST');

$dbPort =
   env('DB_PORT');

$dbName =
   env('DB_DATABASE');

$dbUser =
   env('DB_USERNAME');

$dbPass =
   env('DB_PASSWORD');

/*
|--------------------------------------------------------------------------
| DATABASE CONNECTION
|--------------------------------------------------------------------------
*/

try {

   $pdo = new PDO(

      "mysql:host={$dbHost};
        port={$dbPort};
        dbname={$dbName};
        charset=utf8mb4",

      $dbUser,
      $dbPass

   );

   /*
    |--------------------------------------------------------------------------
    | PDO SETTING
    |--------------------------------------------------------------------------
    */

   $pdo->setAttribute(
      PDO::ATTR_ERRMODE,
      PDO::ERRMODE_EXCEPTION
   );

   $pdo->setAttribute(
      PDO::ATTR_DEFAULT_FETCH_MODE,
      PDO::FETCH_ASSOC
   );

   $pdo->setAttribute(
      PDO::ATTR_EMULATE_PREPARES,
      false
   );
} catch (PDOException $e) {

   /*
    |--------------------------------------------------------------------------
    | DB ERROR
    |--------------------------------------------------------------------------
    */

   die("<div style='
            padding:30px;
            font-family:Poppins,sans-serif;
            background:#fff5f5;
            color:#ff3b3b;
            border-radius:20px;
            margin:40px;
        '>

            <h2>
                ❌ Database Connection Failed
            </h2>

            <p>" .

      $e->getMessage()

      . "</p>

        </div>");
}

/*
|--------------------------------------------------------------------------
| HELPER FUNCTIONS
|--------------------------------------------------------------------------
*/

function redirect($path = '')
{
   header(
      'Location: ' .
         BASE_URL .
         '/' .
         ltrim($path, '/')
   );

   exit;
}

function dd($data)
{
   echo '<pre>';

   print_r($data);

   echo '</pre>';

   die();
}

function isLogin()
{
   return isset($_SESSION['login']);
}

function user()
{
   return $_SESSION['user'] ?? null;
}

function userRole()
{
   return $_SESSION['user']['role'] ?? null;
}
