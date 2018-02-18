<?php
require "./vendor/autoload.php";

require_once ('AppClass.php');

use DariuszAndryskowski\App\AppClass;

if (http_response_code()) {
    echo 'Error! Use console if You want generate csv';
    exit;
}

$app = new AppClass();

// set param from CLI
$app->setArgvConsole($argv);
$app->separationArgvData();

// run parse RSS/ATOM and generate csv
$app->runApp();
