<?php

use Illuminate\Database\Capsule\Manager as Capsule;

require './vendor/autoload.php';

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'port' => 3306,
    'database' => 'eksamen',
    'username' => 'root',
    'password' => '',

]);
$capsule->bootEloquent();

?>
