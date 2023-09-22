<?php
require_once dirname(__DIR__).'/../vendor/autoload.php';
use App\Core\App;
error_reporting(E_ALL); //Error exception engine
ini_set("ignore_repeated_errors", TRUE);
ini_set("display_errors", FALSE);
ini_set("log_errors", TRUE);
ini_set("error_log", "php-error.log");
error_log("##############################################");
$app = new App();
