<?php
require_once '../vendor/autoload.php';
require_once 'core/App.php';
error_reporting(E_ALL); //Error exception engine, siempre usar E_ALL
ini_set("ignore_repeated_errors", TRUE);
ini_set("display_errors", FALSE);
ini_set("log_errors", TRUE);
ini_set("error_log", "php-error.log");
error_log("##############################################");
$app = new App();
?>
