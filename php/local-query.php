<?php

use Illuminate\Database\Capsule\Manager as Capsule;

require './vendor/autoload.php';
use Carbon\Carbon;
Carbon::setLocale('no');

$config = include("config.php");

if($config['debug']==true){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
}

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => $config["driver"],
    'host' => $config["host"],
    'port' => $config["port"],
    'database' => $config["database"],
    'username' => $config["username"],
    'password' => $config["password"],

]);
$capsule->bootEloquent();

?>
