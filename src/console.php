<?php
require "./vendor/autoload.php";

require_once ('AppClass.php');

use DariuszAndryskowski\App\AppClass;
use DariuszAndryskowski\App\Model\ParserRss;
//use DariuszAndryskowski\App\Lib\Validator;

/**
 * 1. Odebranie danych z konsoli
 * 2. Validacja danych wejścowych
 * 3. Rozdzieleni danych z konsoli do zmiennych
 * 4. Eksport danych z XML
 * 5. Wybranie odpowiedniej funkcji odpowiedzialnej za csv:simple/sv:extended
 * 6. Utworzyc readme.md
 *
 */

if (http_response_code()) {
    echo 'Error! Use console if You want generate csv';
    exit;
}


$app = new AppClass();
$app->setArgvConsole($argv);
$app->separationArgvData();
$app->runApp();
