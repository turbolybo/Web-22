<?php

use Illuminate\Database\Capsule\Manager as Capsule;
require_once 'vendor/autoload.php';

use Carbon\Carbon;
Carbon::setLocale('no');

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'port' => 3306,
    'database' => 'eksamen',
    'username' => 'lybotech.com',
    'password' => 'Te6kxjvvbx',

]);

$capsule->bootEloquent();

?>


