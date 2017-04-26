<?php
require './vendor/autoload.php';
use Carbon\Carbon;
Carbon::setLocale('no');

$port = 3306;
$username = 'lybotech_com';
$password = 'Te6kxjvvbx';
$name = 'events';

$connection = new PDO('mysql:host=lybotech.com.mysql;dbname=lybotech_com', $username, $password);
$statement = $connection->prepare('SELECT * FROM events ORDER BY date ASC');
$statement->execute();
$events = [];

while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
   $row['date'] = new Carbon($row['date']);
   $events[] = $row;
}
?>
