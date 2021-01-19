<?php
ini_set('display_errors', 1);
define('DB_NAME', 'ogites');
define('DB_DSN', 'mysql:host=localhost;dbname=' . DB_NAME . ';charset=utf8');
define('DB_USER', 'geoworld');
define('DB_PASSWORD', 'geoworldadmin');
define('DEBUG', false);

$dbError = '';

function connect()
{
  global $dbError;
  $opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_EMULATE_PREPARES => false
  );
  try {
    return new PDO(DB_DSN, DB_USER, DB_PASSWORD, $opt);
  } catch (PDOException $e) {
    $dbError = 'Oups ! Connexion SGBD impossible !';
    if (DEBUG) :
      $dbError .= "<br/>" . $e->getMessage();
    endif;
  }
}

// initialisation de la variable globale $pdo
$pdo = connect();

if ($dbError) {
  die('<div class="ui red inverted segment"> <p>'
          . $dbError
          . '</p></div></body></html>');
}
