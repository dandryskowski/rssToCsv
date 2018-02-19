<?php
require "./vendor/autoload.php";

require_once ('Application.php');

use DariuszAndryskowski\App\Application;

if (http_response_code()) {
    echo 'Error! Use console if You want generate CSV';
    exit;
}

$app = new Application();

// set param from CLI
$app->setArgvConsole($argv);
$app->separationArgvData();

// run parse RSS/ATOM and generate CSV file
$app->runApp();

?>